<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class LoginModel extends CI_Model
{
    function get_contents($data)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('correo', $data['correo']);
        $this->db->where('contraseña', $data['contraseña']);
        //$this->db->where('confirmado', 'SI');

        $query = $this->db->get();
        return $result = $query->row();
    }
    function get_salt($data){
        $this->db->select('salt');
        $this->db->from('usuario');
        $this->db->where('correo', $data['correo']);
        $query = $this->db->get();
        $result = $query->row();
        if($this->db->affected_rows() > 0)
        return $result->salt;
        else
            return $result;
    }

}