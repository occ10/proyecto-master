<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncio extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();// podría hacerlo desde el autoload
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('DetalleAnuncioModel');
        $this->load->model('DetalleUsuarioBusquedaModel');
    }

    public function detalle($correo,$id)
    {

        if($this->session->userdata('user')) {
            $output['detalleUsuario'] = $this->DetalleAnuncioModel->DetalleUsuario($correo,$id);
            $output['numComentarios'] = $this->DetalleUsuarioBusquedaModel->numComentariosPorCorreo($correo);
            $output['comentarios'] = $this->DetalleUsuarioBusquedaModel->ComentariosPorCorreo($correo);
            $this->load->view('private/detalleAnuncio',$output);
        }else{
            $this->load->view('public/home');
        }

    }



}