<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruta extends CI_Controller {

    public function __construct() {
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


    public function index()
    {
        if($this->session->userdata('user')) {
            $data = array(
                'usuario' => $this->session->userdata('user')->correo,
            );
            //Transferimos datos al modelo
            $output['coche'] = $this->CocheModel->get_contents($data);
            if(!empty($output['coche'])){
                $this->load->view('private/ruta', $output);
            }else{
                $output['noTieneCoche'] = 'No tienes coche para publicar anuncio, ponga datos del coche, y luego, empieze a publicar anuncios';
                $this->load->view('private/ruta', $output);
            }

        }else{
            $this->load->view('public/home');
        }
    }

    public function InsertarRuta()
    {
        if($this->session->userdata('user')) {
            $data = array(
                'origen' => $this->input->post('origen'),
                'precio' => $this->input->post('precio'),
                'plazas' => $this->input->post('plaza'),
                'detalles' => $this->input->post('detalle'),
                'fechaPublicacion' => date("Y/m/d"),
            );


            $user = $this->session->userdata('user')->correo;
            $resultado2 = $this->RutaModel->setOcpionRuta($user);
            if($resultado2){

            }
            $Resultado = $this->RutaModel->insertaRuta($data);
            if (!empty($Resultado)) {

                $Result = $this->CocheModel->ConsultaMatricula($user);
                $data2 = array(
                    'coche' => $Result->matricula,
                    'usuario' => $user,
                    'ruta' => $Resultado,

                );

                $Resultado2 = $this->RealizaRutaModel->insertaRealizaRuta($data2);
                if ($Resultado2 == true) {
                    $output['Exito'] = 'exito';
                } else {
                    $output['Error'] = 'error';
                }
            } else {
                $output['Error'] = 'error';
            }


            $this->load->view('private/ruta', $output);
        }else{
            $this->load->view('public/home');
        }


    }

    public function modificarRuta(){
        if($this->session->userdata('user')) {
            $crud = new grocery_CRUD();
            $crud->set_table('ruta');
            $crud->where('id', 1);
            $crud->set_subject('ruta');
            $crud->set_theme("datatables");
            $crud->set_crud_url_path(site_url('private/listadoRutas'));
            $output = $crud->render();

            $this->load->view('private/listadoRutas', $output);
        }else{
            $this->load->view('public/home');
        }

    }
    public function listaRutasUsuario(){
        if($this->session->userdata('user')) {
            $data = array(
                'usuario' => $this->session->userdata('user')->correo,
            );
            //////
            $var = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $config['base_url'] = base_url().'ruta/listaRutasUsuario';
            //$config['suffix']= '?origen=' . $var;
            $config['total_rows'] = $this->RutaModel->obtenerTodoPagination($data);
            $config['per_page'] = '5';
            $config['uri_segment'] = '3';
            $config['num_links'] = '5';
            //$config['first_link'] = 'Primero';
            // $config['last_link'] = 'Ultimo';
            $config['next_link'] = 'Siguiente ->';
            $config['prev_link'] = '<- Anterior';

            $config['cur_tag_open'] = '<b class="atual">';
            $config['cur_tag_close'] = '</b>';

            $config['full_tag_open'] = '<div class="paginacion" >';
            $config['full_tag_close'] = '</div>';


            $this->pagination->initialize($config);

            //$output = array( 'rutas'=> $this->RutaModel->obtenerAnunciosUsuario($data2),'paginacion'=>$this->pagination->create_links(),'origen'=>$this->input->post('origen'));
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $output['rutas'] = $this->RutaModel->obtenerPaginationRutasUsuario($config['per_page'],$page,$data);
            //$output['origen'] = $this->input->post('origen');
            $output['paginacion'] = $this->pagination->create_links();
            $output['total']= $this->RutaModel->obtenerTodoPagination($data);
            /*echo "<pre>";
            print_r(count($output['rutas']));
            echo "</pre>";*/


             /////////

            //$output['rutas'] = $this->RutaModel->obtenerRutasUsuario($data);
            $this->load->view('private/listadoRutas', $output);
        }else{
            $this->load->view('public/home');
        }
    }


    public function detalle($id){
        if($this->session->userdata('user')) {
            $data = array(
                'id' => $id,
            );
            $Resultado['ruta'] = $this->RutaModel->obtenerRutaUsuario($data);
            //echo "<pre>";
            // print_r($Resultado);
            // echo "<pre>";
            $this->load->view('private/detalleRuta', $Resultado);
        }else{
            $this->load->view('public/home');
        }

    }
    //funcion para obtener ruta y coches de un usuario
    public function obtenerRutaCoches($id){
        if($this->session->userdata('user')) {
            $data = array(
                'id' => $id,
            );
            $Resultado['ruta'] = $this->RutaModel->obtenerRutaUsuario($data);

            $data2 = array(
                'usuario' => $this->session->userdata('user')->correo,
            );

            $Resultado['coche'] = $this->CocheModel->get_contents($data2);
            //echo "<pre>";
            // print_r($Resultado);
            // echo "<pre>";
            $this->load->view('private/ModifyRuta', $Resultado);
        }else{
            $this->load->view('public/home');
        }


    }
    //Funcion para actualizar una ruta dada por su id
    public function updateRuta(){
        if($this->session->userdata('user')) {
            $data = array(
                'id' => $this->input->post('id'),
                'plazas' => $this->input->post('plaza'),
                'plazasOcupadas' => $this->input->post('plazaOcupadas'),
                'origen' => $this->input->post('origen'),
                //'destino' => $this->input->post('destino'),
                'detalles' => $this->input->post('detalle'),
                'precio' => $this->input->post('precio'),

            );
            $data2 = array(
                'ruta' => $this->input->post('id'),
                'coche' => $this->input->post('matricula'),
            );

            $Resultado1 = $this->RutaModel->updateRutaUsuario($data);
            $Resultado2 = $this->RealizaRutaModel->updateRealizarRuta($data2);
            if ($Resultado1 == true and $Resultado2 == true) {
                $output['Exito'] = 'exito';
            } else {
                $output['Error'] = 'error';
            }
            $this->load->view('private/ModifyRuta', $output);
        }else{
            $this->load->view('public/home');
        }
    }

    //funcion borrar ruta
    public function borrarRutaCoches($id){
        if($this->session->userdata('user')) {
            $data = array(
                'id' => $id,
            );
            $Resultado['ruta'] = $this->RutaModel->borrarRutaUsuario($data);

            if ($Resultado == true) {
                $output['Exito'] = 'exito';
            } else {
                $output['Error'] = 'error';
            }

            $this->load->view('private/listadoRutas', $output);
        }else{
            $this->load->view('public/home');
        }

    }
    public function buscarRuta(){
        if($this->session->userdata('user')) {
            $this->load->view('private/buscarRuta');
        }else{
            $this->load->view('public/home');
        }

    }
    public function buscarAnuncios(){
        if($this->session->userdata('user')) {

            $correoUSuarioSesion = $this->session->userdata('user')->correo;
            /*if($this->session->userdata('origen')){
                $var= $this->session->userdata('origen');
            }*/
            if(isset($_GET['origen'])){
               $var= $_GET['origen'];
            }
            $var = ($this->uri->segment(3)) ? $this->uri->segment(3) : $var;
            $data = array(
                'origen' => $var,
                'correo' => $correoUSuarioSesion
            );
            $config['base_url'] = base_url().'ruta/buscarAnuncios/' . $var;
            //$config['suffix']= '?origen=' . $var;
            $config['total_rows'] = $this->RutaModel->obtenerTodo($data);
            $config['per_page'] = '5';
           $config['uri_segment'] = '4';
            $config['num_links'] = '5';
            //$config['first_link'] = 'Primero';
           // $config['last_link'] = 'Ultimo';
            $config['next_link'] = 'Siguiente ->';
            $config['prev_link'] = '<- Anterior';

            $config['cur_tag_open'] = '<b class="atual">';
            $config['cur_tag_close'] = '</b>';

            $config['full_tag_open'] = '<div class="paginacion" >';
            $config['full_tag_close'] = '</div>';


            $this->pagination->initialize($config);

            //$output = array( 'rutas'=> $this->RutaModel->obtenerAnunciosUsuario($data2),'paginacion'=>$this->pagination->create_links(),'origen'=>$this->input->post('origen'));
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $output['rutas'] = $this->RutaModel->obtenerAnunciosUsuario($config['per_page'],$page,$data);
            $output['origen'] = $this->input->post('origen');
            $output['paginacion'] = $this->pagination->create_links();
            $output['total']=$this->RutaModel->obtenerTodo($data);
            /*echo "<pre>";
            print_r(count($output['rutas']));
            echo "</pre>";*/
            $output['prueba']='hola prueba';
            //$output['id']=$id;

            $this->load->view('private/anuncios', $output);
        }else{
            $this->load->view('public/home');
        }

    }
    public function indexRegistro(){
       // $this->load->view('public/registro');
    }
}