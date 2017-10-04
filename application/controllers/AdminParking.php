<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminParking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();// podría hacerlo desde el autoload
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('grocery_CRUD');
    }
    public function parkings()
    {

        $crud = new grocery_CRUD();
        $crud->set_table('aparcamiento');
        $crud->set_subject('aparcamiento');
        $crud->set_theme("datatables");
        $crud->set_crud_url_path(site_url('private/listadoAparcamiento'));
        $output = $crud->render();

        $this->load->view('private/adminAparcamiento',$output);
    }

}