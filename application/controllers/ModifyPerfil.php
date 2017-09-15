<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modifyPerfil extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();// podría hacerlo desde el autoload
        $this->load->helper('url');
        $this->load->model('ModifyPerfilModel');
        $this->load->library('session');
        // $this->load->model('PeliculaVotacionModel');
    }

    /**
     * Portada (muestra la cartelera)
     */
    public function index()
    {
        //$output['cartelera'] = $this->PeliculaModel->obtenerPeliculasCartelera();
        //$output['proximosEstrenos'] = $this->PeliculaModel->obtenerPeliculasProximosEstrenos();
        //$output['votaciones'] = $this->PeliculaVotacionModel->obtenerVotacionesPuntuacionesPeliculas();
       // if (!$this->session->userdata('user')) {
          //  $this->load->view('public/login');
       // }else{
        //$data = array(
        //    'correo' => $this->session->userdata('user')->nombre,
         //   'contraseña' => $this->session->userdata('user')->contraseña,
       // );
        //$output['usuario']=$this->ModifyPerfilModel->obtenerUsuario($data);
        if($this->session->userdata('user')) {
            $this->load->view('private/modifyPerfil');
        }else{
            $this->load->view('public/home');
        }

    }

    public function updateUser(){

        if($this->session->userdata('user')) {
            if ($this->input->post('password') != null) {

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
            } else {

            $data = array(
                'correo' => $this->input->post('correo'),
                'nombre' => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
                'edad' => $this->input->post('bday'),

                'telefono' => $this->input->post('telefono'),

            );
             }
            $Resultado = $this->ModifyPerfilModel->actualizarUsuario($data);


            if ($Resultado == true) {
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


        //generar el hash a traves de a contraseña propuesta del usuario
        $pass =hash('sha512', $this->input->post('password1'));
        $user = $this->session->userdata('user')->correo;
        $data = array(
            'correo' => $user,

        );

        $this->load->model('LoginModel');
        //recuperar el salt del usuario
        $salt=$this->LoginModel->get_salt($data);

        if(!empty($salt)){
            //crear el password mezclando el hash y la salt del usuario
            $pass=crypt($pass,$salt);
            $data2 = array(
                'correo' => $user,
                'contraseña' => $pass
            );
            $Resultado = $this->LoginModel->get_contents($data2);


            if (!empty($Resultado)) {
                //$pass = $this->encrypt->encode($this->input->post('password'));
                $pass =hash('sha512', $this->input->post('password2'));
                $salt = uniqid(mt_rand(), true);
                $pass=crypt($pass,$salt);
                $data = array(

                    'contraseña' => $pass,
                    'salt' => $salt
                );
                $actualizado = $this->ModifyPerfilModel->updatePassword($data,$user);
                if($actualizado == true){
                    $output['Exito'] = 'La contraseña se ha actualizado correctamanet';

                }else{
                    $output['Error'] = 'Ha habido un error en la actualizcion intentalo de nuevo';
                }

            }else{

                $output['Error'] = 'La contraseña actual es incorrecta';
            }
        }else{
            $output['Error'] = 'Los datos son incorrectos';
        }
        $this->load->view('private/modifyPassword',$output);


    }

}