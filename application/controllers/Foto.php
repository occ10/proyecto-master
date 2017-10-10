<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();// podría hacerlo desde el autoload
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->helper('form');
        $this->load->helper('security');
    }


    public function index()
    {

        if($this->session->userdata('user')) {
            $foto = "";
            $this->load->model('FotoModel');
            $data = array(
                'correo' => $this->session->userdata('user')->correo,
            );
            $Resultado = $this->FotoModel->get_contents($data);
            if (!empty($Resultado)) {
                $foto = $Resultado->foto;
            }


            $this->load->view('private/foto', array('error' => ' ', 'foto' => $foto));
        }else{
            $this->load->view('public/home');
        }
    }
    public function do_upload()
    {
        if($this->session->userdata('user')) {
            $config['upload_path'] = './assets/userFoto';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 100;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('private/foto', $error);
            } else {

                $data = $this->upload->data();
                $foto = $data['file_name'];
                $fileName = array(
                    'correo' => $this->session->userdata('user')->correo,
                    'foto' => $foto//the filename of the image should go here
                );
                $fileName = $this->security->xss_clean($fileName,true);
                //Transferimos datos al modelo
                $this->load->model('FotoModel');
                $Resultado = $this->FotoModel->insertar_foto($fileName);
                $output['foto'] = $data['file_name'];
                // $data['foto']=$data['file_name'];
                if ($Resultado == true) {
                    $this->load->view('private/foto', $output);
                }
            }
        }else{
            $this->load->view('public/home');
        }

    }
    //funcion para borrar foto
    public function borrarFoto()
    {
        if ($this->session->userdata('user')) {
            //Transferimos datos al modelo
            $this->load->model('FotoModel');
            $data = array(
                'correo' => $this->session->userdata('user')->correo,
            );
            $Resultado = $this->FotoModel->borrarFoto($data);
            $this->load->view('private/foto');
        }else{
            $this->load->view('public/home');
        }
    }
}