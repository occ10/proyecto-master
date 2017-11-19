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
    public function obtenerPaginationRutasUsuario($per_page,$uri_segment,$data){

        $this->db->select('r.*');
        $this->db->from('ruta r, realizaruta z');
        $this->db->where('r.id = z.ruta');
        $this->db->where('z.usuario', $data['usuario']);
        $this->db->limit($per_page,$uri_segment);
        $query = $this->db->get();
        return $query->result();
    }
    public function obtenerTodoPagination($data){

        $this->db->select('r.*');
        $this->db->from('ruta r, realizaruta z');
        $this->db->where('r.id = z.ruta');
        $this->db->where('z.usuario', $data['usuario']);
        $query = $this->db->get();
        //$result = $query->result();

        return $query->num_rows();
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

    public function updatePlazasOcupadas($data){
        $this->db->trans_start();
        $this->db->set('plazasOcupadas', '`plazasOcupadas` + 1' , FALSE);
        $this->db->where('id', $data['id']);
        $this->db->update('ruta');
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

        $this->db->where('ruta.origen', $data['origen']);
        $this->db->where('(ruta.plazas - ruta.plazasOcupadas) > ', 0);
        $this->db->where('ruta.opcion', '0');
        $this->db->where('usuario.correo != ', $data['correo']);
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

        $this->db->where('ruta.origen', $data['origen']);
        $this->db->where('(ruta.plazas - ruta.plazasOcupadas) > ', 0);
        $this->db->where('ruta.opcion', '0');
        $this->db->where('usuario.correo != ', $data['correo']);
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
    public function setOcpionRuta($correo)
    {
        return $this->db->query("
           update ruta t2
           JOIN realizaruta t1
           ON t1.ruta = t2.id
           JOIN usuario t3
           ON t3.correo = t1.usuario
           set t2.opcion='1'
           where t3.correo = '".$correo."'");
        //$this->db->trans_start();
    }
/*update ruta t2
JOIN realizaruta t1
ON t1.ruta = t2.id
JOIN usuario t3
ON t3.correo = t1.usuario
set t2.opcion='1'
where t3.correo='usuario30@gmail.com'*/
}