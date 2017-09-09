<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class FotoModel extends CI_Model
{
    function insertar_foto($data)
    {
        $this->db->trans_start();
        $this->db->where('correo', $data['correo']);
        $this->db->update('usuario', $data);
        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
            return false;
        else
            return true;
    }
    function get_contents($data)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('correo', $data['correo']);

        $query = $this->db->get();
        return $result = $query->row();
    }
    public function borrarFoto($data){
        $foto = array('foto' => "");
        $this->db->trans_start();
        $this->db->where('correo', $data['correo']);
        $this->db->update('usuario', $foto);
        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
            return false;
        else
            return true;
    }

}