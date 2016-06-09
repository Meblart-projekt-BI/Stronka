<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author Piotr
 */
 
class Courier {

    protected $db;
    private $result = array();
    
    function __construct(DB $db  = null)
    {
        $this->db = $db;
    }

    public function getCourierById($id)
    {
        $query = $this->db->query('select * from kurier where id_dostawcy = "'.$id.'"');

        return $query->fetchAll();
    }

    public function getCouriers()
    {
        $query = $this->db->query('select * from kurier');

        return $query->fetchAll();
    }
    
}
