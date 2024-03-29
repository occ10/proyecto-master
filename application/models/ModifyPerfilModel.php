<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ModifyPerfilModel extends CI_Model
{
    function obtenerUsuario($data)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('correo', $data['correo']);

        $query = $this->db->get();
        return $result = $query->row();
    }

    function actualizarUsuario($data,$correo){

        $this->db->trans_start();
        $this->db->where('correo', $correo);
        $this->db->update('usuario', $data);
        $this->db->trans_complete();
//echo "<pre>" . $correo . "</pre>";
        if($this->db->trans_status() === FALSE)
            return false;
        else
            return true;
       // return ($this->db->affected_rows() > 0);

    }

    function updatePassword($data,$user){

        $this->db->where('correo', $user);
        $this->db->update('usuario', $data);

        return $this->db->affected_rows() > 0;



    }
}