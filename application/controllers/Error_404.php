<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: walid
 * Date: 06/09/2017
 * Time: 16:53
 */
class Error_404 extends CI_Controller {

    public function __construct() {
        parent::__construct();

    }

    /**
     * Portada (muestra la cartelera)
     */
    public function index()
    {

        $this->output->set_status_header('404');
        // Make sure you actually have some view file named 404.php
        $this->load->view('home/page_Not_Found');
    }
}