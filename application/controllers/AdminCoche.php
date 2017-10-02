<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCoche extends CI_Controller
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
    public function coches()
    {
        //$this->load->view('private/listadoParticipantes');

        $crud = new grocery_CRUD();
        $crud->set_table('coche');
        $crud->set_subject('coche');
        $crud->set_theme("datatables");
        $crud->set_crud_url_path(site_url('private/listadoCoches'));
        $output = $crud->render();

        $this->load->view('private/adminCoche',$output);
    }

}