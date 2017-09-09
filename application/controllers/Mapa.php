<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapa extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();// podría hacerlo desde el autoload
        $this->load->helper('url');
        $this->load->model('MapaModel');
        $this->load->model('CocheModel');
    }

    /**
     * Portada (muestra la cartelera)
     */
    public function index()
    {
        $this->load->view('public/mapa');
    }
    public function cargarCordenadas()
    {

        if ($this->session->userdata('user')) {

        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', '10000');
        $url = 'https://www.sigua.ua.es/api/pub/aparcamientos/bateria/items';
        $content = file_get_contents($url);
        //echo $content;
        //$json = $content["listadoFechaExamenes"];
        $json = utf8_encode($content);

        $json = json_decode($json, true);
        $result = $json['features'];
        $x = 0;
        $y = 0;
        foreach ($result as $items) {
            //echo  $items['properties']['codigo'];
            $data = array(
                'codigo' => $items['properties']['codigo'],
                'id' => $items['properties']['id_actividad'],
                'plazas' => $items['properties']['plazas'],
                'superficie' => $items['properties']['superficie'],
                'lon' => $items['properties']['lon'],
                'lat' => $items['properties']['lat'],
            );

            $Resultado = $this->MapaModel->insert_parkings($data);
            foreach ($items['geometry']['coordinates'] as $item) {
                //echo  $item[0][0] . " " . $item[0][1];
                foreach ($item as $coorde) {

                    //echo print_r($coorde, true);

                    foreach ($coorde as $item) {
                        $x += $item[0];
                        $y += $item[1];
                        //echo  $item[0] . "hola" . $item[1];
                        //echo '<br>';
                    }
                    $data2 = array(
                        'aparcamiento' => $items['properties']['codigo'],
                        'lon' => ($y / count($coorde)),
                        'lat' => ($x / count($coorde)),
                    );
                    $Resultado = $this->MapaModel->insert_zone($data2);
                    //echo  ($x/count($coorde)) . "," .($y/count($coorde));
                    $x = 0;
                    $y = 0;
                    //echo '<br>';
                }
                //echo '<br>';
            }
            //echo '<br>';


        }

    }

        $this->load->view('public/home');
    }


    public function obtenerCordenadas()
    {
        //if ($this->session->userdata('user')) {
            $Resultado = $this->MapaModel->obtenerCordenadasUNI();
            $result = json_encode($Resultado);
            //echo "<pre>" . $result . "</pre>";
            echo $result;
       // }
    }

    public function buscarParking()
    {
        if ($this->session->userdata('user')) {
            $output['cooredenadas'] = $this->MapaModel->obtenerCordenadasUNI();
            $output['corrdenates'] = $output['cooredenadas'];

            $this->load->view('private/parking', $output);
        }else{
            $this->load->view('public/home');
        }

    }

    public function findZoneParking()
    {
        if ($this->session->userdata('user')) {
            $user = $this->session->userdata('user')->correo;

                if (isset($_GET['codParking'])) {
                    $var = $_GET['codParking'];
                    $result4 = $this->MapaModel->esUsuarioOcupaZona($user);
                    if (empty($result4)) {

                        $data = array(
                            'codigo' => $var,

                        );
                        $result = $this->MapaModel->obtenerCordenadasZonasParking($data);
                        $output['Resultado'] = $result;
                        $output['code'] = $var;
                        $this->load->view('private/zonas', $output);

                    } else {

                        $result = $this->MapaModel->obtenerCordenadaZonaParking($user);
                        //TODO
                        $output['Resultado'] = $result;
                        //echo "<pre>" . $result[0]->id .  "</pre>";
                        $output['espacioOcupado'] = $result[0]->id;
                        $output['Info'] = "Debes desocupar la zona ocupada y luego puedes volver a buscar aparcamiento";
                        $this->load->view('private/liberarZonaParking', $output);
                    }

            } else {
                //TODO  aqui debe guiar a page not found
                    $this->load->view('public/page_Not_Found');
            }


        } else {

            $this->load->view('public/home');
          }
    }
    public function occupyZoneParking(){
        if ($this->session->userdata('user')) {
            if (isset($_GET['codZone']) && isset($_GET['codeParking'])) {
                $var = $_GET['codZone'];
                $user = $this->session->userdata('user')->correo;
                $data = array(
                    //'id' => $var,
                    'ocupada' => '0',

                );
                $result = $this->MapaModel->ocuparZona($data, $var);
                $Result3 = $this->CocheModel->ConsultaMatricula($user);

                $data2 = array(
                    'zona' => $var,
                    'coche' => $Result3->matricula,
                    'fecha' => date("Y-m-d H:i:s"),

                );

                $result2 = $this->MapaModel->usuarioAparcaCoche($data2);
                //$result2 = $this->MapaModel->obtenerCordenadasZonasParking($data);
                //$output['corrdenates'] = $result2;


                $result3 = $this->MapaModel->obtenerCordenadaZonaParking($user);
                //TODO
                $output['Resultado'] = $result3;
                //echo "<pre>" . $result[0]->id .  "</pre>";
                $output['espacioOcupado'] = $result3[0]->id;
                $output['Info'] = "Debes desocupar la zona ocupada y luego puedes volver a aparcar";
                $this->load->view('private/liberarZonaParking', $output);

            } else {



                $this->load->view('public/page_Not_Found');
            }
        }else{
            $this->load->view('public/home');
        }
    }



    public function desoccupyZoneParking()
    {
        if ($this->session->userdata('user')) {
            if (isset($_GET['codeZoneParking'])) {
                $var = $_GET['codeZoneParking'];
                //$user = $this->session->userdata('user')->correo;
                $data = array(
                    //'id' => $var,
                    'ocupada' => '1',
                );
                $result = $this->MapaModel->desOcuparZona($data, $var);

                $output['cooredenadas'] = $this->MapaModel->obtenerCordenadasUNI();
                $output['corrdenates'] = $output['cooredenadas'];

                $this->load->view('private/parking', $output);
                // $this->load->view('private/liberarZoneParking', $output);
            }else{
                $this->load->view('public/page_Not_Found');
            }

        }else{

            $this->load->view('public/home');
        }
    }





}
