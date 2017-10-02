<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
       // $this->load->model('PeliculaModel');
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
        $this->load->view('public/home');
    }

    public function indexRegistro(){
        $this->load->view('public/registro');
    }
    public function indexPrivada(){
        if ($this->session->userdata('user')){
        $this->load->view('private/adminHome');
    }else{
            $this->load->view('public/home');
        }

    }
}