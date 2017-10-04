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
        $this->load->model('RutaModel');

    }

    public function index()
    {

        if($this->session->userdata('user')) {
            $user = $this->session->userdata('user')->correo;
            $output [''] = "";
            $data = array(
                'correo' => $user,
            );
            $data2 = array(
                'usuario' => $user,
            );
           $result = $this->CocheModel->consultarCoche($data);

            if($result == true){
                $output['result1'] = $result;
                $output['result2'] = $this->CocheModel->get_contents($data2);
                $output['correo'] = $user;

            }


            $this->load->view('private/coche', $output);
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

    public function fotoCoche($matricula){
        $output['matricula'] = $matricula;
        $this->load->view('private/fotoCoche',$output);
    }

    public function do_uploadFoto()
    {
        if($this->session->userdata('user')) {
            $user = $this->session->userdata('user')->correo;
            $config['upload_path'] = './assets/cocheFoto';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 100;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('cochefile')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('private/fotoCoche', $error);
            } else {

                $data = $this->upload->data();
                $foto = $data['file_name'];
                $matricula = $this->input->post('matirculaCoche');
                $fileName = array(
                    //'matricula' => $this->input->post('matriculaCoche'),
                    'imageFoto' => $foto//the filename of the image should go here
                );
                //Transferimos datos al modelo
                $this->load->model('FotoModel');
                $Resultado = $this->CocheModel->updateFoto($fileName,$matricula);
                $output['foto'] = $data['file_name'];
                // $data['foto']=$data['file_name'];
                if ($Resultado == true) {

                    $result = $this->CocheModel->ConsultaMatricula($user);
                    $output['matricula'] = $result->matricula;
                    $output['Exito'] = "La foto se ha actualizado correctamente";
                }else{
                    $output['Error'] = "Ha habido algun error en la actualizacion de los errores.";
                }
                $this->load->view('private/fotoCoche', $output);
            }
        }else{
            $this->load->view('public/home');
        }

    }

    public function borrarCoche($matricula,$correo){
        $Resultado['ruta'] = $this->RutaModel->borrarRutaCoche($correo);
        $output['result3']  = $this->CocheModel->borrarCoche($matricula);

        $this->load->view('private/coche', $output);

    }


}