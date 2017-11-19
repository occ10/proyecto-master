<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modifyPerfil extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();// podría hacerlo desde el autoload
        $this->load->helper('url');
        $this->load->model('ModifyPerfilModel');
        $this->load->model('RegistroModel');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper('security');
    }

    public function index()
    {
        if($this->session->userdata('user')) {
            $this->load->view('private/modifyPerfil');
        }else{
            $this->load->view('public/home');
        }

    }

    public function updateUser(){

        if($this->session->userdata('user')) {
            $correo = $this->session->userdata('user')->correo;
            /*if ($this->input->post('password') != null) {

                //$pass = $this->encrypt->encode($this->input->post('password'));
                $pass = hash('sha512', $this->input->post('password'));
                $salt = uniqid(mt_rand(), true);
                $pass = crypt($pass, $salt);

                $data = array(
                    'correo' => $this->input->post('correo'),
                    'nombre' => $this->input->post('nombre'),
                    'apellido' => $this->input->post('apellido'),
                    'edad' => $this->input->post('bday'),
                    'telefono' => $this->input->post('telefono'),
                    'contraseña' => $pass,
                    'salt' => $salt
                );
            } else {*/

            $data = array(
                'correo' => $this->input->post('correo'),
                'nombre' => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
                'edad' => $this->input->post('bday'),
                'telefono' => $this->input->post('telefono')
            );
            $data = $this->security->xss_clean($data);
            $Resultado = $this->ModifyPerfilModel->actualizarUsuario($data,$correo);


            if ($Resultado == true) {
                $data2 = array(
                    'correo' => $this->input->post('correo')
                );
                $data2 = $this->security->xss_clean($data2);
                $Resultado = $this->RegistroModel->consultarDatosUsuario($data2);
                $this->session->set_userdata('user', $Resultado);
                $output['Exito'] = 'exito';
            } else {
                $output['Error'] = 'error';
            }
            $this->load->view('private/modifyPerfil', $output);
        }else{
            $this->load->view('public/home');
        }


    }


    public function modifyPassword(){

        if($this->session->userdata('user')) {

            if ($this->input->post('password1') && $this->input->post('password2') && $this->input->post('password3')) {

            //generar el hash a traves de a contraseña propuesta del usuario
            $pass = hash('sha512', $this->input->post('password1'));
            $user = $this->session->userdata('user')->correo;
            $data = array(
                'correo' => $user,

            );
            $data = $this->security->xss_clean($data);
            $this->load->model('LoginModel');
            //recuperar el salt del usuario
            $salt = $this->LoginModel->get_salt($data);

            if (!empty($salt)) {
                //crear el password mezclando el hash y la salt del usuario
                $pass = crypt($pass, $salt);
                $data2 = array(
                    'correo' => $user,
                    'contraseña' => $pass
                );
                $data2 = $this->security->xss_clean($data2);
                $Resultado = $this->LoginModel->get_contents($data2);


                if (!empty($Resultado)) {
                    //$pass = $this->encrypt->encode($this->input->post('password'));
                    $pass = hash('sha512', $this->input->post('password2'));
                    $salt = uniqid(mt_rand(), true);
                    $pass = crypt($pass, $salt);
                    $data = array(

                        'contraseña' => $pass,
                        'salt' => $salt
                    );
                    $data = $this->security->xss_clean($data);
                    $actualizado = $this->ModifyPerfilModel->updatePassword($data, $user);
                    if ($actualizado == true) {
                        $output['Exito'] = 'La contraseña se ha actualizado correctamanet';

                    } else {
                        $output['Error'] = 'Ha habido un error en la actualizcion intentalo de nuevo';
                    }

                } else {

                    $output['Error'] = 'La contraseña actual es incorrecta';
                }
            } else {
                $output['Error'] = 'Los datos son incorrectos';
            }
            $this->load->view('private/modifyPassword', $output);
        }else{
            $this->load->view('private/modifyPassword');
        }
        }else{

            $this->load->view('public/home');
        }


    }

    public function recoverPassword()
    {
        $this->load->view('public/recoverPassword');
    }

    public function updatePassword()
    {
        if ($this->input->post('correo')) {
            $correo = $this->input->post('correo');
            $correo = $this->security->xss_clean($correo);
            $Resultado = $this->RegistroModel->getUserData($correo);
            if (!empty($Resultado)) {
                $mesagge['nombre'] = $Resultado->nombre;

                $this->load->library('email');
                $config['protocol'] = 'smtp';
                //$config['smtp_host']    = 'ssl://smtp.gmail.com';
                $config['smtp_host'] = 'ssl://smtp.gmail.com';
                $config['smtp_port'] = '465';
                $config['smtp_timeout'] = '7';
                $config['smtp_user'] = 'infochamit@gmail.com';
                $config['smtp_pass'] = 'Rector3174';
                $config['charset'] = 'utf-8';
                $config['newline'] = "\r\n";
                $config['mailtype'] = 'text'; // or html
                $config['validation'] = TRUE; // bool whether to validate email or not
                $this->email->initialize($config);

                 /*$config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'infochamit@gmail.com',
                    'smtp_pass' => 'Rector3174',
                    'mailtype'  => 'text',
                    'charset'   => 'utf-8',
                    'starttls'  => true,
                    'newline'   => "\r\n"
                );
                  $this->load->library('email',$config);*/

                $from_email = "infochamit@gmail.com";
                $to_email = $correo;
                $this->email->from($from_email, 'chamit');
                $this->email->to($to_email);
                $this->email->subject('Email Test');
                $this->email->message('haga click en el enlace abajo para actualizar su contraseña,  ' . site_url('private/recoverUpdatePassword/' . $correo));
//site_url("public/confirmRegistro/'
                $this->email->send();
                $this->load->view('private/updatePassword', $mesagge);
            } else {
                $mesagge['Error'] = 'El correo proveido no esta dado de alta en el sistema, compruebe si has introducido los datos correctos';
                $this->load->view('private/updatePassword', $mesagge);
            }
        }else{
            $this->load->view('public/home');
        }
    }

   public function recoverUpdatePassword($correo)
   {


       $output['correo'] = $correo;
       if ($this->input->post('password4') != null && $this->input->post('password5') != null) {

           //$pass = $this->encrypt->encode($this->input->post('password'));
           $pass =hash('sha512', $this->input->post('password5'));
           $salt = uniqid(mt_rand(), true);
           $pass=crypt($pass,$salt);
           $data = array(

               'contraseña' => $pass,
               'salt' => $salt
           );
           $data = $this->security->xss_clean($data);
           $actualizado = $this->ModifyPerfilModel->updatePassword($data,$correo);

           if($actualizado == true){
               $output['Exito'] = 'La contraseña se ha recuperado correctamanet';

           }else{
               $output['Error'] = 'El correo no existe en el sistema';
           }
           $this->load->view('private/recoverUpdatePassword', $output);
       } else {

           $output['correo'] = $correo;
           $this->load->view('private/recoverUpdatePassword', $output);
       }

   }
    /*public function modifyLosedPassword(){

        $this->load->view('private/recoverUpdatePassword');
    }*/


}