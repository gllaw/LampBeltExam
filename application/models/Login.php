<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Model{
	function __construct(){
		parent::__construct();
	}
//---------------------------------------------------------------------------------------------------
	function addUser($userInfo){					//submit new user info to DB
		$query = "INSERT INTO user (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
        $values = array($userInfo['firstName'], $userInfo['lastName'], $userInfo['email'], $userInfo['password']); 
        $this->db->query($query, $values);		//this is CI syntax for putting stuff in DB...
        return $this->db->insert_id();			//...and getting it back by DB ID. Without this line the welcome page doesn't work.
	}
//---------------------------------------------------------------------------------------------------
	function findUser($userID){
		$query = "SELECT * FROM user WHERE user.id = $userID";	//SQL query string
		return $this->db->query($query)->row_array();
	}
//---------------------------------------------------------------------------------------------------
	function checkAgainstDB($userinfo){
		$query = "SELECT * FROM user WHERE user.email = '{$userinfo['email']}' AND user.password = '{$userinfo['password']}'";
		// $value = array($userinfo['email'], $userinfo['password']);
		return $this->db->query($query)->row_array();
	}
//---------------------------------------------------------------------------------------------------
}
?>