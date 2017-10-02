<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHistorialParking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();// podría hacerlo desde el autoload
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('grocery_CRUD');
    }
    public function historialAparcamientos()
    {
        //$this->load->view('private/listadoParticipantes');

        $crud = new grocery_CRUD();
        $crud->set_table('usuarioaparcacoche');
        $crud->set_subject('usuarioaparcacoche');
        $crud->set_theme("datatables");
        $crud->set_crud_url_path(site_url('private/listadoAparcaCoche'));
        $output = $crud->render();

        $this->load->view('private/adminAparcaCoche',$output);
    }

}