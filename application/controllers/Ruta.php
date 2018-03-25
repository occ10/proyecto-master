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
        $this->load->helper('security');

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

                $origen = $this->input->post('origen',true);
                $precio = htmlentities($this->input->post('precio',true));
                $plazas = htmlentities($this->input->post('plaza',true));
                $detalles = htmlentities($this->input->post('detalle',true));
                $fechaPublicacion = date("Y/m/d");

            $data = array(
                'origen' => $this->input->post('origen',true),
                'precio' => $this->input->post('precio',true),
                'plazas' => $this->input->post('plaza',true),
                'detalles' => $this->input->post('detalle',true),
                'fechaPublicacion' => date("Y/m/d"),
            );
            $data = $this->security->xss_clean($data);

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
                    'opcion' => '1'

                );
                $data2 = $this->security->xss_clean($data2);
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
            $page = $this->security->xss_clean($page);
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
            $data = $this->security->xss_clean($data);
            $Resultado['ruta'] = $this->RutaModel->obtenerRutaUsuario($data);
            $Resultado['usuarios'] = $this->RealizaRutaModel->obtenerUsuarios($data);
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
            $data = $this->security->xss_clean($data);
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
                'id' => $this->input->post('id',true),
                'plazas' => $this->input->post('plaza',true),
                'plazasOcupadas' => $this->input->post('plazaOcupadas',true),
                'origen' => $this->input->post('origen',true),
                //'destino' => $this->input->post('destino'),
                'detalles' => $this->input->post('detalle',true),
                'precio' => $this->input->post('precio',true),

            );
            $data = $this->security->xss_clean($data);
            $data2 = array(
                'ruta' => $this->input->post('id',true),
                'coche' => $this->input->post('matricula',true),
            );
            $data2 = $this->security->xss_clean($data2);
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
            $data = $this->security->xss_clean($data);
            $Resultado = $this->RutaModel->borrarRutaUsuario($data);

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
            $data = $this->security->xss_clean($data);
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
            $page = $this->security->xss_clean($page);
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
    public function reservarRuta(){
        if($this->session->userdata('user')) {
            $correoUSuarioSesion = $this->session->userdata('user')->correo;
            $output['reserva'] = "";
            if (isset($_GET['usuarioCorreo']) && isset($_GET['rutaId'])) {
                $correo = $_GET['usuarioCorreo'];
                $idRuta = $_GET['rutaId'];
                $cocheMatricula = $_GET['cocheMatricula'];
                $data = array(
                    'ruta' => $idRuta,
                    'usuario' => $correoUSuarioSesion
                );
                $usuarioReserva = $this->RutaModel->consultarReserva($data);
                if($usuarioReserva == false) {
                    $this->RutaModel->insertaReserva($data);
                    $this->send_mail($correo, $idRuta, $cocheMatricula, 'reserve');
                }else{
                    $output['reserva'] = 'Ya se ha realizado la reserva, solo se debe esperar la respuesta del anunciante';
                }
            }
            $this->load->view('private/reservaPlaza',$output);
        }else
        $this->load->view('public/home');
    }
    public function send_mail($correo,$idRuta,$cocheMatricula,$accion)
    {
        $correoUSuarioSesion = $this->session->userdata('user')->correo;
        $telefonoUsuarioSesion = $this->session->userdata('user')->telefono;
        $nombreUsuarioSesion = $this->session->userdata('user')->nombre;
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        //$config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'infochamit@gmail.com';
        $config['smtp_pass'] = 'Rector3174';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not
        $this->email->initialize($config);

        $from_email = $correoUSuarioSesion;
        $to_email = $correo;
        $this->email->from($from_email, 'chamit');
        $this->email->to($to_email);
        $this->email->subject('Email Test');
        if($accion == 'reserve')
            $this->email->message('El usuario ' . $nombreUsuarioSesion . ', a traves de este correo intenta reservar una plaza, pongase en contacto con el a traves del telefono ' . $telefonoUsuarioSesion . ' o mediante un correo a trves de esta direccion ' . $correoUSuarioSesion . ' en caso de que haces click sobre el enlace siguiente aceptas la reserva, por favor antes de hacer click, pongan de acuerdo, ' . site_url('confirmReserva/' . $correoUSuarioSesion . '/' . $cocheMatricula . '/' . $idRuta));
        else
            $this->email->message('El usuario con correo ' . $correoUSuarioSesion . ' ha confirmado tu reserva para compartir coche hacia la universidad');

        //site_url("public/confirmRegistro/'
       return $this->email->send();

        //echo $this->email->print_debugger();
        //Send mail
        /* if ($this->email->send()) {

            // $this->session->set_flashdata("email_sent", "Email sent successfully.");
            // echo "<pre>" .
             //$this->email->print_debugger() . "</pre>";
             return true;
         }else {

           //  echo "<pre>" .
               //  $this->email->print_debugger() . "</pre>";
             //$this->session->set_flashdata("email_sent", "Error in sending Email.");
             //$this->load->view('email_form');
             return false;
         }*/

    }
    public function confirmReserva($correo,$cocheMatricula,$idRuta){
        //echo "<pre>" . $correo . ' ' . $idRuta . ' ' . $cocheMatricula . "</pre>";

        $data2 = array(
            'coche' => $cocheMatricula,
            'usuario' => $correo,
            'ruta' => $idRuta,

        );
        $existeRuta = $this->RutaModel->isUsuarioReservaPlaza($data2);
        $existeReserva = $this->RutaModel->existeReserva($data2);
        if($existeRuta == false and $existeReserva == true) {
            $data2 = $this->security->xss_clean($data2);
            $Resultado2 = $this->RealizaRutaModel->insertaRealizaRuta($data2);
            $data = array(
                'id' => $idRuta
                //'plazasOcupadas' => 'plazasOcupadas' - 1,
            );
            $data = $this->security->xss_clean($data);
            $Resultado1 = $this->RutaModel->updatePlazasOcupadas($data);
            if ($Resultado2 == true && $Resultado1 == true) {
                $output['Exito'] = 'exito';
                $this->send_mail($correo,$idRuta,$cocheMatricula,'confirm');
            } else {
                $output['Error'] = 'error';
            }
        }else if ($existeRuta == true){
            $output['Error'] = 'Ya esta dada de alta la solicitud de reservar plaza';
        }else
            $output['Error'] = 'El usuario ha cancelado la reserva';

        $this->load->view('private/confirmPlaza',$output);
    }

    public function cancelarReserva(){
        if($this->session->userdata('user')) {
            //$correoUSuarioSesion = $this->session->userdata('user')->correo;
            //$telefonoUsuarioSesion = $this->session->userdata('user')->	telefono;
            if (isset($_GET['usuarioCorreo']) && isset($_GET['rutaId'])) {
                $correo = $_GET['usuarioCorreo'];
                $idRuta = $_GET['rutaId'];
                $cocheMatricula = $_GET['cocheMatricula'];
                $data = array(
                    'ruta' => $idRuta,
                    'usuario' => $correo
                );
                //echo "<pre>" . $correo . ' ' . $idRuta . ' ' . $cocheMatricula . "</pre>";
                $output['boradoReserva'] = $this->RutaModel->cancelarReserva($data);
                //$this->send_mail($correo,$idRuta,$cocheMatricula);
            }


            $this->load->view('private/borradoPlaza',$output);
        }else
            $this->load->view('public/home');

    }

    public function borrarRuta(){
        if($this->session->userdata('user')) {
            //$correoUSuarioSesion = $this->session->userdata('user')->correo;
            //$telefonoUsuarioSesion = $this->session->userdata('user')->	telefono;
            if (isset($_GET['usuarioCorreo']) && isset($_GET['rutaId'])) {
                $correo = $_GET['usuarioCorreo'];
                $idRuta = $_GET['rutaId'];
                //$cocheMatricula = $_GET['cocheMatricula'];
                $data = array(
                    'ruta' => $idRuta,
                    'usuario' => $correo
                    //'coche'  => $cocheMatricula
                );
                $data2 = array(
                    'id' => $idRuta
                );
                //echo "<pre>" . $correo . ' ' . $idRuta . ' ' . $cocheMatricula . "</pre>";
                $borrado = $this->RutaModel->borrarRuta($data);
                $cancelado = $this->RutaModel->cancelarReserva($data);
                if($borrado && $cancelado)
                $desocupado = $this->RutaModel->updatePlazasdesOcupadas($data2);

                $output['boradoReserva'] = $borrado && $cancelado;
                //$this->send_mail($correo,$idRuta,$cocheMatricula);
            }


            $this->load->view('private/borradoPlaza',$output);
        }else
            $this->load->view('public/home');

    }

    public function indexRegistro(){
       // $this->load->view('public/registro');
    }
}