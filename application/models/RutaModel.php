<?php

/**
 * Created by PhpStorm.
 * User: walid
 * Date: 20/04/2017
 * Time: 0:21
 */
class RutaModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insertaRuta($data)
    {

        $this->db->insert('ruta', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
        //return ($this->db->affected_rows() > 0);
    }

    public function obtenerRutasUsuario($data){

        $this->db->select('r.*');
        $this->db->from('ruta r, realizaruta z');
        $this->db->where('r.id = z.ruta');
        $this->db->where('z.usuario', $data['usuario']);
        $query = $this->db->get();
        return $query->result();
    }
    public function obtenerRutaUsuario($data){

        $this->db->select('r.*');
        $this->db->from('ruta r');
        $this->db->where('r.id', $data['id']);
        $query = $this->db->get();
        return $result = $query->row();
    }
    public function updateRutaUsuario($data){
        $this->db->trans_start();
        $this->db->where('id', $data['id']);
        $this->db->update('ruta', $data);
        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
            return false;
         else
             return true;
        //return ($this->db->affected_rows() > 0);
    }
    public function borrarRutaUsuario($data){

        $this->db->where('id', $data['id']);
        $this->db->delete('ruta');
        return ($this->db->affected_rows() > 0);
    }
    public function obtenerTodo($data){

        $this->db->select('ruta.*,usuario.*');
        $this->db->from('ruta');
        $this->db->join('realizaruta', 'realizaruta.ruta = ruta.id');
        $this->db->join('usuario', 'usuario.correo = realizaruta.usuario');

        $this->db->where('ruta.origen', $data);
        $this->db->where('(ruta.plazas - ruta.plazasOcupadas) > ', 0);
        $result=$this->db->get();

        return $result->num_rows();
    }
    public function obtenerAnunciosUsuario($per_page,$uri_segment,$data)
    {

        //$result = $this->obtenerTodo($data);
        $this->db->select('ruta.*,usuario.*');
        $this->db->from('ruta');
        $this->db->join('realizaruta', 'realizaruta.ruta = ruta.id');
        $this->db->join('usuario', 'usuario.correo = realizaruta.usuario');

        $this->db->where('ruta.origen', $data);
        $this->db->where('(ruta.plazas - ruta.plazasOcupadas) > ', 0);
        $this->db->limit($per_page,$uri_segment);
        $result= $this->db->get();

        return $result->result();
    }
    public function borrarRutaCoche($correo)
    {
       return $this->db->query("
    DELETE t1, t2
    FROM realizaruta t1 JOIN ruta t2
    ON t1.ruta = t2.id
    WHERE t1.usuario = '".$correo."'");
        //$this->db->trans_start();



    }
/*Delete t1, t2 From realizaruta as t1
INNER JOIN  ruta as t2 on t1.ruta = t2.id
WHERE  t1.usuario='yo@hotmail.com'*/
}