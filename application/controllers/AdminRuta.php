<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminRuta extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();// podría hacerlo desde el autoload
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('CocheModel');
        $this->load->model('RealizaRutaModel');
        $this->load->model('RutaModel');
        $this->load->library('grocery_CRUD');
        $this->load->library('pagination');
        $this->load->library('session');

    }
    public function rutas()
    {
        //$this->load->view('private/listadoParticipantes');

        $crud = new grocery_CRUD();
        $crud->set_table('ruta');
        $crud->set_subject('ruta');
        $crud->set_theme("datatables");
        $crud->set_crud_url_path(site_url('private/listadoRutas'));
        $output = $crud->render();

        $this->load->view('private/adminRuta',$output);
    }

}