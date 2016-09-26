<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions extends CI_Controller{
	function index(){
		$this->load->view('Main');		
	}
//---------------------------------------------------------------------------------------------
	function register(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", "trim|required|min_length[3]");
		$this->form_validation->set_rules("username", "Username", "trim|required|min_length[3]");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
		$this->form_validation->set_rules("confirmPassword", "Confirm Password", "trim|required|matches[password]");
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('regError', validation_errors());
		    redirect('/');
		}
		else{									//codes to run on success validation here
        	$this->load->model("User");
			$newUserID = $this->User->addUser($this->input->post());		//Get user info as their DB/insert ID, and set it to a variable so it's usable.
			$userData = $this->User->findUser($newUserID);					//Use that ID to get user info as an array.
			$this->session->set_userdata('currentUser', $userData);		//save user's info into session.
			$userDeets = $this->session->userdata('currentUser');				//turning whole array of user info in the session variable into a handy-dandy var that we can use to inject info into targeted spots in a view. 
			redirect('travels');											//this is a custom route!
		}
	}
//---------------------------------------------------------------------------------------------------
	function actuallyLogIn(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("username", "Username", "trim|required|min_length[3]");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");

		if($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('loginError', validation_errors()); 
		    redirect('/');
		}
		else{
        	$this->load->model("User");
			$userinfo = $this->User->checkAgainstDB($this->input->post());
			$postdata = $this->input->post();			//setting form inputs to a variable to use. 
			if ($userinfo['password'] == $postdata['password']){		//compare db pw to input pw.
				$this->session->set_userdata('currentUser', $userinfo);		//give them a new session
				redirect('travels');
			}
			else{
		     	$this->session->set_flashdata("DNEerror", "You should register first.");
		    	redirect('/');
			}
		}
	}
//---------------------------------------------------------------------------------------------------
	function travelsView(){
		if(!$this->session->userData('currentUser')){		//if no session then redirect to root.
			redirect('/');
		}		
		// $tripInfo = $this->Trip->tripSchedDisplay($var);
		$this->load->view('Travels');
	}
//---------------------------------------------------------------------------------------------------
	function destinationView(){
		if(!$this->session->userData('currentUser')){		//if no session then redirect to root.
			redirect('/');
		}		
		$this->load->view('Destination');
	}
//---------------------------------------------------------------------------------------------------
	function addTripView(){
		if(!$this->session->userData('currentUser')){		//if no session then redirect to root.
			redirect('/');
		}
		$this->load->view('AddTrip');
	}
	function addTripToDB(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("destination", "Destination", "trim|required");
		$this->form_validation->set_rules("plan", "Description", "trim|required");
		$this->form_validation->set_rules("startDate", "Start Date", "trim|required");
		$this->form_validation->set_rules("returnDate", "Return Date", "trim|required");

		$tripStuff = $this->Trip->actuallyAddTripToDB($this->input->post());

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('tripError', validation_errors());
		    redirect('addTripToDB');
		}

//DIDN'T FINISH AAAAAAAAAAAH
		else{
        	$this->load->model("User");						//codes to run on success validation here
			$newUserID = $this->User->addUser($this->input->post());		//Get user info as their DB/insert ID, and set it to a variable so it's usable.
			$userData = $this->User->findUser($newUserID);					//Use that ID to get user info as an array.
			$this->session->set_userdata('currentUser', $userData);		//save user's info into session.
			$userDeets = $this->session->userdata('currentUser');				//turning whole array of user info in the session variable into a handy-dandy var that we can use to inject info into targeted spots in a view. 
			redirect('travels');											//this is a custom route!
		}

	}
//---------------------------------------------------------------------------------------------------
	function destroy(){
		session_destroy();
		redirect('/');
	}
//---------------------------------------------------------------------------------------------------
}
?>