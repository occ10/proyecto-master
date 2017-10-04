<?php

class RegistroModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insertaUsuario($data)
    {
        //Inserta usuario en la base de datos
        $this->db->insert('usuario', $data);
    }
    function get_contents($data)
    {

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('correo', $data['correo']);
        $this->db->where('contraseña', $data['contraseña']);

        $query = $this->db->get();
        return $result = $query->row();
    }
    public function consultarCorreo($correo){

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('correo', $correo);
        //$this->db->where('contraseña', $data['contraseña']);

        $query = $this->db->get();
        return $query->num_rows() == 0 ;
        //return $result = $query->row();
    }
    public function consultarDatosUsuario($data){

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('correo', $data['correo']);
        //$this->db->where('contraseña', $data['contraseña']);

        $query = $this->db->get();
       // echo "<pre>" . $query->row() . "</pre>";
        return $result = $query->row();
    }
    function confirmRegistro($correo,$data){

        $this->db->trans_start();
        $this->db->where('correo', $correo);
        $this->db->update('usuario', $data);
        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
            return false;
        else
            return true;
        // return ($this->db->affected_rows() > 0);

    }
    function getUserData($correo)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('correo', $correo);

        $query = $this->db->get();
        return $result = $query->row();
    }
}