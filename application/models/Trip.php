<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Trip extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function tripSchedDisplay($tripDeets){
		// $query = "SELECT * FROM trip WHERE destination = '{$tripDeets['destination']}', WHERE start_date = '{$tripDeets['start']}', WHERE return_date = '{$tripDeets['return']}'";



		// $query = "SELECT * FROM trip (destination, start_date, return_date, plan) VALUES (?,?,?,NOW(), NOW())";
		// $values = array($tripDeets['destination'], $tripDeets['start'], $tripDeets['return'], $tripDeets['plan']); 
  //       $this->db->query($query, $values);
  //       return $this->db->insert_id();
	}
//---------------------------------------------------------------------------------------------------
	function actuallyAddTripToDB($tripInputs){
		$query = "INSERT INTO trip (destination, plan, start_date, return_date, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
        $values = array($tripInputs['destination'], $tripInputs['plan'], $tripInputs['startDate'], $tripInputs['returnDate']); 
        $this->db->query($query, $values);
        return $this->db->insert_id();
	}
}
?>