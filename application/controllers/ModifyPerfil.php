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

            //$pass = $this->encrypt->encode($this->input->post('password'));
            $pass =hash('sha512', $this->input->post('password'));
            $salt = uniqid(mt_rand(), true);
            $pass=crypt($pass,$salt);
            $data = array(
                'correo' => $this->input->post('correo'),
                'nombre' => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
                'edad' => $this->input->post('bday'),
                'contraseña' => $pass,
                'telefono' => $this->input->post('telefono'),
                'salt' => $salt
            );
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

}