<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MapaModel extends CI_Model
{
    function insert_parkings($data)
    {

        $this->db->insert('aparcamiento', $data);
        return ($this->db->affected_rows() > 0);
    }
    function insert_zone($data)
    {

        $this->db->insert('zonas', $data);
        return ($this->db->affected_rows() > 0);
    }
    function usuarioAparcaCoche($data)
    {

        $this->db->insert('usuarioaparcacoche', $data);
        return ($this->db->affected_rows() > 0);
    }
    function obtenerCordenadasUNI()
    {
        $this->db->select('*');
        $this->db->from('aparcamiento');
        $query = $this->db->get();
        return $query->result();
    }

    function obtenerCordenadasZonasParking($data)
    {
        $this->db->select('*');
        $this->db->from('zonas');
        $this->db->where('aparcamiento', $data['codigo']);
        $this->db->where('ocupada', '1');
        $query = $this->db->get();
        return $query->result();
    }
    function ocuparZona($data,$var)
    {
        $this->db->trans_start();
        $this->db->where('id', $var);
        $this->db->update('zonas', $data);
        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
            return false;
        else
            return true;
    }

    function esUsuarioOcupaZona($user)
    {

        //select ocupada from coche c,usuarioaparcacoche u,zonas z where usuario='usuario26@gmail.com' and c.matricula=u.coche and z.id=u.zona
        $this->db->select('zonas.aparcamiento');
        $this->db->from('zonas');
         $this->db->join('usuarioaparcacoche', 'usuarioaparcacoche.zona = zonas.id');
        $this->db->join('coche',  ' usuarioaparcacoche.coche =coche.matricula');
        $this->db->where('coche.usuario', $user);
        $this->db->where('zonas.ocupada', '0');
        //echo "<pre>" .  $this->db->get()->row()->aparcamiento . "</pre>";

        return $result= $this->db->get()->row();
        //return ($this->db->affected_rows() > 0);
    }

    function obtenerCordenadaZonaParking($user)
    {

        $this->db->select('*');
        $this->db->from('zonas');
        $this->db->join('usuarioaparcacoche', 'usuarioaparcacoche.zona = zonas.id');
        $this->db->join('coche',  ' usuarioaparcacoche.coche =coche.matricula');
        $this->db->where('coche.usuario', $user);
        $this->db->where('zonas.ocupada', '0');
        $query = $this->db->get();
        return $query->result();
    }


    function desOcuparZona($data,$var)
    {

        $this->db->trans_start();
        $this->db->where('id', $var);
        $this->db->update('zonas', $data);
        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE)
            return false;
        else
            return true;
    }

}