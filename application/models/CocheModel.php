<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: walid
 * Date: 19/04/2017
 * Time: 20:03
 */
class CocheModel extends CI_Model
{
    function insertaCoche($data)
    {
        //Inserta coche en la base de datos
        $this->db->insert('coche', $data);
        return ($this->db->affected_rows() > 0);

    }
    function get_contents($data)
    {
        $this->db->select('*');
        $this->db->from('coche');
        $this->db->where('usuario', $data['usuario']);
        //$this->db->where('contraseña', $data['contraseña']);

        $query = $this->db->get();
        return $result = $query->row();
    }

    function DetalleCocheBuscado($telefono)
    {
        $this->db->select('*');
        $this->db->from('coche');
        $this->db->join('usuario', 'usuario.correo = coche.usuario');
        $this->db->where('usuario.telefono', $telefono);

        //$this->db->where('contraseña', $data['contraseña']);

        $query = $this->db->get();
        return $result = $query->row();
    }

    /*function get_car($data)
    {
        $this->db->select('*');
        $this->db->from('coche');
        $this->db->where('correo', $data['correo']);
        //$this->db->where('contraseña', $data['contraseña']);

        $query = $this->db->get();
        return $result = $query->row();
    }*/
    public function consultarMatricula($matricula){

        $this->db->select('*');
        $this->db->from('coche');
        $this->db->where('matricula', $matricula);
        //$this->db->where('contraseña', $data['contraseña']);

        $query = $this->db->get();
        return $query->num_rows() == 0 ;
        //return $result = $query->row();
    }


    public function consultarCoche($data){

        $this->db->select('*');
        $this->db->from('coche');
        $this->db->where('usuario', $data['correo']);
        //$this->db->where('contraseña', $data['contraseña']);

        $query = $this->db->get();
        return $query->num_rows() > 0 ;
        //return $result = $query->row();
    }

    public function ConsultaMatricula($user){

        $this->db->select('matricula');
        $this->db->from('coche');
        $this->db->where('usuario', $user);
        //$this->db->where('contraseña', $data['contraseña']);

        $query = $this->db->get();
        //return $query->num_rows() > 0 ;
        return $result = $query->row();
    }

    public function updateFoto($data,$matricula){
        //$foto = array('foto' => "");
        $this->db->trans_start();
        $this->db->where('matricula', $matricula);
        $this->db->update('coche', $data);
        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
            return false;
        else
            return true;
    }

    public function borrarCoche($matricula){
        //$foto = array('foto' => "");
        $this->db->trans_start();
        $this->db->where('matricula', $matricula);
        $this->db->delete('coche');
        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
            return false;
        else
            return true;
    }
}