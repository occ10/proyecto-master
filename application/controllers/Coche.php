<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coche extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();// podría hacerlo desde el autoload
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->model('CocheModel');
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
        if($this->session->userdata('user')) {
            $this->load->view('private/coche');
        }else{
            $this->load->view('public/home');
        }
    }
    public function indexRegisterCoche()
    {
        if($this->session->userdata('user')) {

            $config['upload_path'] = './assets/cocheFoto';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('fotofile')) {
                $error = array('errorCar' => $this->upload->display_errors());
                $this->load->view('private/coche', $error);
            } else {
                $dataImage = $this->upload->data();
                $foto = $dataImage['file_name'];
            $data = array(
                'matricula' => $this->input->post('matricula'),
                'marca' => $this->input->post('marca'),
                'modelo' => $this->input->post('modelo'),
                'color' => $this->input->post('color'),
                'categoria' => $this->input->post('categoria'),
                'acientos' => $this->input->post('acientos'),
                'usuario' => $this->session->userdata('user')->correo,
                 'imageFoto' => $foto//the filename of the image should go here
            );

            //Transferimos datos al modelo

            $Resultado = $this->CocheModel->insertaCoche($data);
            if ($Resultado) {
                $output['Exito'] = 'exito';
            } else {
                $output['Error'] = 'error';
            }
            $this->load->view('private/coche', $output);
        }
        }else{
            $this->load->view('public/home');
        }


    }

    public function matricula($matricula){
        $resultado = $this->CocheModel->consultarMatricula($matricula);
        if(!$resultado)
        {
            echo "false";
        }
        else
        {
            echo "true";
        }
    }

}