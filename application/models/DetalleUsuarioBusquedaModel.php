<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: walid
 * Date: 29/07/2017
 * Time: 11:28
 */
class DetalleUsuarioBusquedaModel extends CI_Model
{

    public function numViajesUsuarioBuscado($telefono)
    {

        $this->db->select('count(*) as totalCount');
        $this->db->from('usuario');
        $this->db->join('realizaruta', 'usuario.correo = realizaruta.usuario');
        $this->db->join('ruta', 'realizaruta.ruta = ruta.id');
        //$this->db->join('coche', 'usuario.correo = coche.usuario');
        $this->db->where('usuario.telefono', $telefono);
        $result= $this->db->get();
        return $result->row();
    }

    public function numViajesUsuarioBuscadoPorCorreo($correo)
    {

        $this->db->select('count(*) as totalCount');
        $this->db->from('usuario');
        $this->db->join('realizaruta', 'usuario.correo = realizaruta.usuario');
        $this->db->join('ruta', 'realizaruta.ruta = ruta.id');
        //$this->db->join('coche', 'usuario.correo = coche.usuario');
        $this->db->where('usuario.correo', $correo);
        $result= $this->db->get();
        return $result->row();
    }
    public function numComentarios($telefono){

        $this->db->select('count(*) as totalComentarios,');
        $this->db->from('comenta');
        $this->db->join('usuario', 'usuario.correo = comenta.usuarioComentado');
        $this->db->where('usuario.telefono', $telefono);
        $result= $this->db->get();
        return $result->row();
    }

    public function numComentariosPorCorreo($correo){

        $this->db->select('count(*) as totalComentarios,');
        $this->db->from('comenta');
        //$this->db->join('usuario', 'usuario.correo = comenta.usuarioComentado');
        $this->db->where('comenta.usuarioComentado', $correo);
        $result= $this->db->get();
        return $result->row();
    }
    public function numComentariosHechosPorCorreo($correo){

        $this->db->select('count(*) as totalComentarios,');
        $this->db->from('comenta');
        //$this->db->join('usuario', 'usuario.correo = comenta.usuarioComentado');
        $this->db->where('comenta.usuarioComenta', $correo);
        $result= $this->db->get();
        return $result->row();
    }

    public function DetalleUsuarioBuscado($telefono)
    {

        $this->db->select('usuario.*');
        $this->db->from('usuario');
        //$this->db->join('coche', 'usuario.correo = coche.usuario');
        $this->db->where('usuario.telefono', $telefono);
        //$this->db->limit($per_page,$uri_segment);
        return $result= $this->db->get()->row();
        //return $result = $query->row();
    }

    public function DetalleUsuarioBuscadoPorCorreo($correo)
    {

        $this->db->select('usuario.*');
        $this->db->from('usuario');
        //$this->db->join('coche', 'usuario.correo = coche.usuario');
        $this->db->where('usuario.correo', $correo);
        //$this->db->limit($per_page,$uri_segment);
        return $result= $this->db->get()->row();
        //return $result = $query->row();
    }
    public function DetalleCocheBuscadoPorCorreo($correo)
    {

        $this->db->select('coche.*');
        $this->db->from('coche');
        //$this->db->join('', 'usuario.correo = coche.usuario');
        $this->db->where('coche.usuario', $correo);
        //$this->db->limit($per_page,$uri_segment);
        return $result= $this->db->get()->row();
        //return $result = $query->row();
    }


    public function Comentarios($telefono)
    {

        $this->db->select('u.*,c.*');
        $this->db->from('usuario as u');
        $this->db->join('comenta as c', 'c.usuarioComenta = u.correo');
        //$this->db->where('u.telefono', $telefono);
        $this->db->where('c.usuarioComentado IN (SELECT `correo` FROM `usuario` WHERE `telefono`=' . $telefono . ')', NULL, FALSE);
        $this->db->limit(2);
        return $result= $this->db->get()->result();
        //return $result = $query->row();
    }
    public function ComentariosPorCorreo($correo)
    {

        $this->db->select('u.*,c.*');
        $this->db->from('usuario as u');
        $this->db->join('comenta as c', 'c.usuarioComenta = u.correo');
        //$this->db->where('u.telefono', $telefono);
        $this->db->where('c.usuarioComentado', $correo);
        $this->db->limit(2);
        return $result= $this->db->get()->result();
        //return $result = $query->row();
    }
    public function buscarTelefono($telefono){

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('usuario.telefono', $telefono);
        $query = $this->db->get();
        return $query->num_rows() > 0 ;
        //return $result = $query->row();
    }


    public function obtenerTodo($data){

        $this->db->select('usuario.*');
        $this->db->from('usuario');
        $this->db->join('realizaruta', 'usuario.correo = realizaruta.usuario');
        $this->db->join('ruta', 'realizaruta.ruta = ruta.id');
        $this->db->where('ruta.origen', $data);
        $result=$this->db->get();

        return $result->num_rows();
    }
    public function obtenerUsuarios($per_page,$uri_segment,$data)
    {
        $this->db->select('usuario.*');
        $this->db->from('usuario');
        $this->db->join('realizaruta', 'usuario.correo = realizaruta.usuario');
        $this->db->join('ruta', 'realizaruta.ruta = ruta.id');
        $this->db->where('ruta.origen', $data);
        $this->db->limit($per_page,$uri_segment);
        $result= $this->db->get();

        return $result->result();
    }

    public function obtenerTodoPorNombre($data,$correo){

        /*$this->db->select('usuario.*');
        $this->db->from('usuario');
        $this->db->join('realizaruta', 'usuario.correo = realizaruta.usuario');
        $this->db->join('ruta', 'realizaruta.ruta = ruta.id');
        $this->db->where('ruta.origen', $data);*/

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('nombre like ', '%' . $data . '%');
        $this->db->where('correo !=' , $correo );
        $result=$this->db->get();

        return $result->num_rows();
    }
    public function obtenerUsuariosPorNombre($per_page,$uri_segment,$data,$correo)
    {
        /*$this->db->select('usuario.*');
        $this->db->from('usuario');
        $this->db->join('realizaruta', 'usuario.correo = realizaruta.usuario');
        $this->db->join('ruta', 'realizaruta.ruta = ruta.id');
        $this->db->where('ruta.origen', $data);*/

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('nombre like ', '%' . $data . '%');
        $this->db->where('correo !=', $correo );
        $this->db->limit($per_page,$uri_segment);
        $result= $this->db->get();

        return $result->result();
    }

    public function insertarComentario($data){

        $this->db->insert('comenta', $data);
        return ($this->db->affected_rows() > 0);
    }

    public function todosComentariosPorCorreo($per_page,$uri_segment,$correo)
    {

        $this->db->select('u.*,c.*');
        $this->db->from('usuario as u');
        $this->db->join('comenta as c', 'c.usuarioComenta = u.correo');
        //$this->db->where('u.telefono', $telefono);
        $this->db->where('c.usuarioComentado', $correo);
        $this->db->limit($per_page,$uri_segment);
        return $result= $this->db->get()->result();
        //return $result = $query->row();
    }

    public function todosComentariosHechosPorCorreo($per_page,$uri_segment,$correo)
    {

        $this->db->select('u.*,c.*');
        $this->db->from('usuario as u');
        $this->db->join('comenta as c', 'c.usuarioComenta = u.correo');
        //$this->db->where('u.telefono', $telefono);
        $this->db->where('c.usuarioComenta', $correo);
        $this->db->limit($per_page,$uri_segment);
        return $result= $this->db->get()->result();
        //return $result = $query->row();
    }
}