<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();// podría hacerlo desde el autoload
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('DetalleUsuarioBusquedaModel');
        $this->load->model('CocheModel');
        $this->load->library('pagination');
        $this->load->library('encrypt');
        $this->load->model('RutaModel');
        $this->load->library('session');
        $this->load->helper('security');
    }

    public function index()
    {

        if ($this->session->userdata('user')) {
            $this->load->view('private/buscarUsuario');
        } else {
            $this->load->view('public/home');
        }
    }

    public function detalleUsuario()
    {
        if ($this->session->userdata('user')) {

            if ($this->input->get('telefono')) {
                $aux = $this->input->get('telefono');
                $aux = $this->security->xss_clean($aux);
                $correo = $this->session->userdata('user')->correo;


                        $result = $this->DetalleUsuarioBusquedaModel->buscarTelefono($aux);
                        if ($result ==  true) {

                        $Resultado['numViajes'] = $this->DetalleUsuarioBusquedaModel->numViajesUsuarioBuscado($aux);
                        $Resultado['numComentarios'] = $this->DetalleUsuarioBusquedaModel->numComentarios($aux);
                        $Resultado['detalleUsuario'] = $this->DetalleUsuarioBusquedaModel->DetalleUsuarioBuscado($aux);
                            $Resultado['detalleCoche'] = $this->CocheModel->DetalleCocheBuscado($aux);
                        $Resultado['comentarios'] = $this->DetalleUsuarioBusquedaModel->Comentarios($aux);
                        $Resultado['correo']  = $correo;
                            $Resultado['correoUSuarioSesion'] = $correo;
                        $this->load->view('private/detalleUsuarioBuscado', $Resultado);
                       }else{
                            $Resultado['Info'] ="No hay ningun usuario con este telefono";
                            $this->load->view('private/detalleUsuarioBuscado', $Resultado);
                       }
            }

        } else {
            $this->load->view('public/home');
        }


    }
    public function detalleUsuarioPorCorreo($correo){

        if ($this->session->userdata('user')) {
                        $correo = $this->security->xss_clean($correo);
                        $correoUSuarioSesion = $this->session->userdata('user')->correo;
                        $Resultado['numViajes'] = $this->DetalleUsuarioBusquedaModel->numViajesUsuarioBuscadoPorCorreo($correo);
                        $Resultado['numComentarios'] = $this->DetalleUsuarioBusquedaModel->numComentariosPorCorreo($correo);
                        $Resultado['detalleUsuario'] = $this->DetalleUsuarioBusquedaModel->DetalleUsuarioBuscadoPorCorreo($correo);
                        $Resultado['detalleCoche'] = $this->DetalleUsuarioBusquedaModel->DetalleCocheBuscadoPorCorreo($correo);
                        $Resultado['comentarios'] = $this->DetalleUsuarioBusquedaModel->ComentariosPorCorreo($correo);
                        $Resultado['resrvaPlaza'] =  $this->DetalleUsuarioBusquedaModel->reservaPlazaUser($correo,$correoUSuarioSesion);
                        $Resultado['numComents'] =  $this->DetalleUsuarioBusquedaModel->numComents($correo,$correoUSuarioSesion);

                        $Resultado['correo']  = $correo;
                        $Resultado['correoUSuarioSesion'] = $correoUSuarioSesion;
                        $Resultado['Info'] ="No hay ningun usuario con correo";
                        $this->load->view('private/detalleUsuarioBuscado', $Resultado);
                        //print_r($Resultado);

        } else {
            $this->load->view('public/home');
        }
    }


    public function buscarUsuariosPorOrigen(){
        if($this->session->userdata('user')) {
            $correoUSuarioSesion = $this->session->userdata('user')->correo;
           /* if($this->session->userdata('origenUsuario')){
                $var= $this->session->userdata('origenUsuario');
            }*/
            if(isset($_GET['origenUsuario'])){
                $var= $_GET['origenUsuario'];
                //$config['suffix']= '?origenUsuario=' . $var;
            }
            $var = ($this->uri->segment(3)) ? $this->uri->segment(3) : $var;
            $config['base_url'] = base_url().'usuarios/buscarUsuariosPorOrigen/' . $var;

            $data = array(
                'origen' => $var,
                'correo' => $correoUSuarioSesion
            );
            $data = $this->security->xss_clean($data);
            $config['total_rows'] = $this->DetalleUsuarioBusquedaModel->obtenerTodo($data);
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
            $output['usuarios'] = $this->DetalleUsuarioBusquedaModel->obtenerUsuarios($config['per_page'],$page,$data);
            $output['origen'] = $var;
            $output['paginacion'] = $this->pagination->create_links();
            $output['total']=$this->DetalleUsuarioBusquedaModel->obtenerTodo($data);
            /*echo "<pre>";
            print_r(count($output['rutas']));
            echo "</pre>";*/
            $output['prueba']='hola prueba';
            $Resultado['correoUSuarioSesion'] = $correoUSuarioSesion;

            $this->load->view('private/listaUsuariosBuscados', $output);
        }else{
            $this->load->view('public/home');
        }

    }

    public function buscarUsuariosPorNombre(){
        if($this->session->userdata('user')->correo) {


            $correo = $this->session->userdata('user')->correo;
            if(isset($_GET['usuarioNombre'])){
                $var= $_GET['usuarioNombre'];

            }
            $var = ($this->uri->segment(3)) ? $this->uri->segment(3) : $var;
            $var = $this->security->xss_clean($var);
            $config['base_url'] = base_url().'usuarios/buscarUsuariosPorNombre/' . $var  ;
            //$config['suffix']= '?usuarioNombre=' . $var;
            $config['total_rows'] = $this->DetalleUsuarioBusquedaModel->obtenerTodoPorNombre($var,$correo);
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
            $output['usuarios'] = $this->DetalleUsuarioBusquedaModel->obtenerUsuariosPorNombre($config['per_page'],$page,$var,$correo);
            $output['origen'] = $var;
            $output['paginacion'] = $this->pagination->create_links();
            $output['total']=$this->DetalleUsuarioBusquedaModel->obtenerTodoPorNombre($var,$correo);

            $this->load->view('private/listaUsuariosBuscados', $output);
        }else{
            $this->load->view('public/home');
        }

    }
    public function ComentarUsuario(){
        if ($this->session->userdata('user')) {
            $usuarioComenta = $this->session->userdata('user')->correo;
            //$correoUSuarioSesion = $this->session->userdata('user')->correo;
            $usuarioComentado = $this->input->post('usuarioComentado');
            $comentario = $this->input->post('comentario');
            $data = array(
                'usuarioComentado' => $usuarioComentado,
                'usuarioComenta' => $usuarioComenta,
                'comentario' => $comentario,
            );
            $data = $this->security->xss_clean($data);
            $correcto = $this->DetalleUsuarioBusquedaModel->insertarComentario($data);
            if($correcto==true){
                $Resultado['Exito'] = 'Comentario insertado correctamente';
            }else{
                $Resultado['Error'] = 'Han habido problemas para insertar el comentario, intentalo de nuevo';
            }
            $Resultado['numViajes'] = $this->DetalleUsuarioBusquedaModel->numViajesUsuarioBuscadoPorCorreo($usuarioComentado);
            $Resultado['numComentarios'] = $this->DetalleUsuarioBusquedaModel->numComentariosPorCorreo($usuarioComentado);
            $Resultado['detalleUsuario'] = $this->DetalleUsuarioBusquedaModel->DetalleUsuarioBuscadoPorCorreo($usuarioComentado);
            $Resultado['comentarios'] = $this->DetalleUsuarioBusquedaModel->ComentariosPorCorreo($usuarioComentado);
            $Resultado['resrvaPlaza'] =  $this->DetalleUsuarioBusquedaModel->reservaPlazaUser($usuarioComentado,$usuarioComenta);
            $Resultado['numComents'] =  $this->DetalleUsuarioBusquedaModel->numComents($usuarioComentado,$usuarioComenta);

            $Resultado['correo']  = $usuarioComentado;
            $Resultado['correoUSuarioSesion'] = $usuarioComenta;
            $this->load->view('private/detalleUsuarioBuscado', $Resultado);

        } else {
            $this->load->view('public/home');
        }

    }


    public function comentariosUsuarioPorCorreo($correo){

        if ($this->session->userdata('user')) {
            $correo = $this->security->xss_clean($correo);

            $Resultado['numViajes'] = $this->DetalleUsuarioBusquedaModel->numViajesUsuarioBuscadoPorCorreo($correo);
            $Resultado['numComentarios'] = $this->DetalleUsuarioBusquedaModel->numComentariosPorCorreo($correo);
            $Resultado['detalleUsuario'] = $this->DetalleUsuarioBusquedaModel->DetalleUsuarioBuscadoPorCorreo($correo);
            $Resultado['detalleCoche'] = $this->DetalleUsuarioBusquedaModel->DetalleCocheBuscadoPorCorreo($correo);


            //////////////////////////////////////pagination comentarios
            $config['base_url'] = base_url().'private/verComentarios/' . $correo;
            //$config['suffix']= '?usuarioCorreo=' . $correo;
            $var = $this->DetalleUsuarioBusquedaModel->numComentariosPorCorreo($correo);
            $config['total_rows']  = $var->totalComentarios;
            $config['per_page'] = '3';
            $config['uri_segment'] = '4';
            $config['num_links'] = '3';
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
            $Resultado['comentarios'] = $this->DetalleUsuarioBusquedaModel->todosComentariosPorCorreo($config['per_page'],$page,$correo);
            //$output['origen'] = $var;
            $Resultado['paginacion'] = $this->pagination->create_links();
            $Resultado['total'] = $var->totalComentarios;
            $Resultado['correo']  = $correo;
            $this->load->view('private/verComentarios', $Resultado);

        } else {
            $this->load->view('public/home');
        }
    }

    public function comentariosRecibidos()
    {
        if ($this->session->userdata('user')) {

            $correo = $this->session->userdata('user')->correo;

            $Resultado['numComentarios'] = $this->DetalleUsuarioBusquedaModel->numComentariosPorCorreo($correo);
            //////////////////////////////////////pagination comentarios
            $config['base_url'] = base_url().'private/opinionesRecibidas';
            //$config['suffix']= '?usuarioCorreo=' . $correo;
            $var = $this->DetalleUsuarioBusquedaModel->numComentariosPorCorreo($correo);
            $config['total_rows']  = $var->totalComentarios;
            $config['per_page'] = '3';
            $config['uri_segment'] = '3';
            $config['num_links'] = '3';
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
            $Resultado['comentarios'] = $this->DetalleUsuarioBusquedaModel->todosComentariosPorCorreo($config['per_page'],$page,$correo);
            //$output['origen'] = $var;
            $Resultado['paginacion'] = $this->pagination->create_links();
            $Resultado['total'] = $var->totalComentarios;
            //$Resultado['correo']  = $correo;

            $this->load->view('private/comentariosRecibidos',$Resultado);

        } else {
            $this->load->view('public/home');
        }

    }


    public function comentariosHechos()
    {
        if ($this->session->userdata('user')) {

            $correo = $this->session->userdata('user')->correo;

            $Resultado['numComentarios'] = $this->DetalleUsuarioBusquedaModel->numComentariosHechosPorCorreo($correo);
            //$Resultado['detalleUsuario'] = $this->DetalleUsuarioBusquedaModel->DetalleUsuarioBuscadoPorCorreo($correo);

            //////////////////////////////////////pagination comentarios
            $config['base_url'] = base_url().'private/opinionesHechas';
            //$config['suffix']= '?usuarioCorreo=' . $correo;
            $var = $this->DetalleUsuarioBusquedaModel->numComentariosHechosPorCorreo($correo);
            $config['total_rows']  = $var->totalComentarios;
            $config['per_page'] = '3';
            $config['uri_segment'] = '3';
            $config['num_links'] = '3';
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
            $Resultado['comentarios'] = $this->DetalleUsuarioBusquedaModel->todosComentariosHechosPorCorreo($config['per_page'],$page,$correo);
            //$output['origen'] = $var;
            $Resultado['paginacion'] = $this->pagination->create_links();
            $Resultado['total'] = $var->totalComentarios;
            //$Resultado['correo']  = $correo;

            $this->load->view('private/comentariosRealizados',$Resultado);

        } else {
            $this->load->view('public/home');
        }

    }

    public function passwordInformation()
    {
        $this->load->view('private/modifyPassword');

    }
    public function darBajaUsuario(){
        if ($this->session->userdata('user')) {
            $correo = $this->session->userdata('user')->correo;
            $Resultado = $this->RutaModel->borrarRutaCoche($correo);
            if($Resultado == true){
                $Resultado2 = $this->DetalleUsuarioBusquedaModel->borrarUsuario($correo);
                if($Resultado2 == true){
                    $this->session->unset_userdata('user');
                    $this->load->view('public/home');
                }
            }else{
//TODO
            }

        }else{
            $this->load->view('public/home');
        }

    }

}


