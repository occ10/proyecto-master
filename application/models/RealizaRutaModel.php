<?php

/**
 * Created by PhpStorm.
 * User: walid
 * Date: 20/04/2017
 * Time: 0:21
 */
class RealizaRutaModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insertaRealizaRuta($data)
    {
        //Inserta usuario en la base de datos
        $this->db->insert('realizaruta', $data);
        return ($this->db->affected_rows() > 0);
    }
    public function updateRealizarRuta($data){
        $this->db->trans_start();
        $this->db->where('ruta', $data['ruta']);
        $this->db->update('realizaruta', $data);
        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
            return false;
        else
            return true;
        //return ($this->db->affected_rows() > 0);
    }

    public function obtenerUsuarios($data){

        $this->db->select('u.*');
        $this->db->from('usuario u, realizaruta z');
        $this->db->where('u.correo = z.usuario');
        $this->db->where('z.ruta', $data['id']);
        $this->db->where('z.opcion', '0');
        $query = $this->db->get();
        return $query->result();
    }
}