<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: walid
 * Date: 23/07/2017
 * Time: 10:38
 */
class DetalleAnuncioModel extends CI_Model
{



    public function DetalleUsuario($correo,$idRuta)
    {

        $this->db->select('ruta.*,usuario.*,coche.*');
        $this->db->from('usuario');
        $this->db->join('coche', 'usuario.correo = coche.usuario');
        $this->db->join('realizaruta', 'usuario.correo = realizaruta.usuario');
        $this->db->join('ruta', 'realizaruta.ruta = ruta.id');


        $this->db->where('usuario.correo', $correo);
        $this->db->where('ruta', $idRuta);
        //$this->db->limit($per_page,$uri_segment);
        return $result= $this->db->get()->row();
        //return $result = $query->row();
    }
    public function Comentario($correo)
    {

        $this->db->select('ruta.*,usuario.*,coche.*');
        $this->db->from('usuario');
        $this->db->join('coche', 'usuario.correo = coche.usuario');
        $this->db->join('realizaruta', 'usuario.correo = realizaruta.usuario');
        $this->db->join('ruta', 'realizaruta.ruta = ruta.id');


        $this->db->where('usuario.correo', $correo);
        $this->db->where('ruta');
        //$this->db->limit($per_page,$uri_segment);
        return $result= $this->db->get()->row();
        //return $result = $query->row();
    }
}