<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();// podría hacerlo desde el autoload
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('CocheModel');
        $this->load->helper('security');


    }

    public function index()
    {

        $this->load->view('public/log');
    }
    public function indexLogin()
    {

        //generar el hash a traves de a contraseña propuesta del usuario
        $pass =hash('sha512', $this->input->post('contraseña'));
        $user = $this->input->post('correo');
        $data = array(
            'correo' => $user,

        );
        $data = $this->security->xss_clean($data);
        $this->load->model('LoginModel');
        //recuperar el salt del usuario
        $salt=$this->LoginModel->get_salt($data);

        if(!empty($salt)){
                //crear el password mezclando el hash y la salt del usuario
                $pass=crypt($pass,$salt);
                $data2 = array(
                    'correo' => $this->input->post('correo'),
                    'contraseña' => $pass
                );
                $data2 = $this->security->xss_clean($data2);
                $Resultado = $this->LoginModel->get_contents($data2);


                if (!empty($Resultado)) {
                    if ($Resultado->confirmado == 'SI') {

                        //Se guarda el objeto
                        $this->session->set_userdata('user', $Resultado);
                        if($Resultado->opcion == '1'){
                            $this->load->view('private/adminHome');
                        }else{
                            redirect('/');
                        }

                    }else{

                        $output['Error'] = 'Debes confirmar tu registro mediante el correo mandado con la direccion registrada';
                    }
                }else{

                    $output['Error'] = 'La contraseña es incorrecta';
                }
        }else{
            $output['Error'] = 'Los datos son incorrectos';
        }
        if (isset($output))
            $this->load->view('public/log', $output);
    }
    public function unset_session_data() {

        $this->session->unset_userdata('user');
        //$this->session->unset_userdata('origen');
       // $this->session->userdata('origenUsuarioNombre');
        //$this->session->userdata('origenUsuario');
        redirect('/');
    }
    public function indexPrivada(){
        $this->load->view('private/home');
    }
}