<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{
	function __construct(){
		parent::__construct();
	}
//---------------------------------------------------------------------------------------------------
	function addUser($userInfo){
		$query = "INSERT INTO user (name, username, password, created_at, updated_at) VALUES (?,?,?,NOW(), NOW())";
        $values = array($userInfo['name'], $userInfo['username'], $userInfo['password']); 
        $this->db->query($query, $values);
        return $this->db->insert_id();
	}
//---------------------------------------------------------------------------------------------------
	function findUser($userID){
		$query = "SELECT * FROM user WHERE user.id = $userID";
		return $this->db->query($query)->row_array();
	}
//---------------------------------------------------------------------------------------------------
	function checkAgainstDB($userinfo){
		$query = "SELECT * FROM user WHERE user.username = '{$userinfo['username']}'";
		// $values = array($userinfo['username')];		Would need this line if you wanna replace the stuff after "=" in $query with just a "?".
		// AND user.password = '{$userinfo['password']}'	Incorrect way where we just checked if a login is legit by having the email+password combo match on a row in the db LOL. Wouldn' have need line 47 in controller, and line 48 would've been just $userinfo in the ().
		return $this->db->query($query)->row_array();
	}
//---------------------------------------------------------------------------------------------------
}
?>