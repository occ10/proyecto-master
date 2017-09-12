<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();// podría hacerlo desde el autoload
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->library('email');
        $this->load->model('RegistroModel');
        // $this->load->model('PeliculaModel');
        // $this->load->model('PeliculaVotacionModel');
    }

    /**
     * Portada (muestra la cartelera)
     */
    public function index()
    {
        $this->load->view('public/reg');
        //$this->load->view('public/confirmRegister');
    }

    public function indexRegister()
    {
        //$pass = $this->encrypt->encode($this->input->post('password'));
        $pass =hash('sha512', $this->input->post('password'));
        $salt = uniqid(mt_rand(), true);
        $pass=crypt($pass,$salt);
        $correo = $this->input->post('correo');
         $data = array(
            'correo' => $this->input->post('correo'),
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'edad' => $this->input->post('bday'),
            'contraseña' => $pass,
            'telefono' => $this->input->post('telefonoReg'),
             'detalles' => $this->input->post('detalles'),
             'salt' => $salt
        );


        //Transferimos datos al modelo

        $this->RegistroModel->insertaUsuario($data);
       $Resultado=$this->RegistroModel->get_contents($data);
        $data['message'] = $Resultado;
        //echo "<pre>$Resultado->nombre</pre>";
        //$this->session->set_userdata('user', $Resultado);
        //enviar email
        $this->send_mail($correo);
        //echo "<pre>send email</pre>";
        //redirect('/');
        //$this->load->view('public/confirmRegistro');
        $this->load->view('public/confirmRegister',$data);

    }
    public function indexPrivada(){
        $this->load->view('private/home');
    }
    //funcion para mandar email al usuario cuando se registre
    public function send_mail($correo) {


        //configuracion para gmail

        $this->load->library('email');
        $config['protocol']    = 'smtp';
        //$config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'infochamit@gmail.com';
        $config['smtp_pass']    = 'Rector3174';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not
        $this->email->initialize($config);

        $from_email = "infochamit@gmail.com";
        $to_email = 'infoouadi@gmail.com';
        $this->email->from($from_email, 'chamit');
        $this->email->to($to_email);
        $this->email->subject('Email Test');
        $this->email->message('haga click en el enlace abajo para activar tu cuenta, y poder utilizar la aplicacion ' . site_url('confirmRegistro/'. $correo) );
//site_url("public/confirmRegistro/'
        $this->email->send();
        //echo $this->email->print_debugger();
        //Send mail
      /*  if($this->email->send())
            $this->session->set_flashdata("email_sent","Email sent successfully.");
        else
            $this->session->set_flashdata("email_sent","Error in sending Email.");
        $this->load->view('email_form');*/
    }

    public function correo($correo){
        $resultado=$this->RegistroModel->consultarCorreo($correo);
        if(!$resultado)
        {
            echo "false";
        }
        else
        {
            echo "true";
        }
    }

    public function confirmRegistro($correo){
        $data = array(
            'confirmado' => 'SI'
        );
        $resultado=$this->RegistroModel->confirmRegistro($correo,$data);
        if($resultado == true){
            $Resultado = $this->RegistroModel->getUserData($correo);
            if(!empty($Resultado)){
                $this->session->set_userdata('user', $Resultado);
            $this->load->view('public/home',$Resultado);
            }
        }
        redirect('/');

    }


}