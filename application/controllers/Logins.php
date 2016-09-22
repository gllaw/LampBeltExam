<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Logins extends CI_Controller{
	function __construct(){			//what do I need to load up every time I come to the controller?
        parent::__construct();
        // $this->load->library('session'); 
        $this->load->model("Login");
	}
	function index(){
		$this->load->view('LoginReg');		
	}
//---------------------------------------------------------------------------------------------------
	function register(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("firstName", "First Name", "trim|required");
		$this->form_validation->set_rules("lastName", "Last Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[user.email]");		//can check db for if it's not a duplicate email right here with the form validation.
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
		$this->form_validation->set_rules("confirmPassword", "Confirm Password", "trim|required|matches[password]");
		
		if($this->form_validation->run() == FALSE){
		     // $this->session->set_flashdata("regError", "Invalid input(s)");
			$this->session->set_flashdata('regError', validation_errors());
		     redirect('/');
		}
		else{									//codes to run on success validation here
			$newUserID = $this->Login->addUser($this->input->post());		//Get user info as their DB/insert ID, and set it to a variable so it's usable.
			$userData = $this->Login->findUser($newUserID);					//Use that ID to get user info as an array.
			$this->session->set_userdata('currentUser', $userData);		//save user's info into session.
			$var = $this->session->userdata('currentUser');				//turning whole array of user info in the session variable into a handy-dandy var that we can use to inject info into targeted spots in a view. 
			redirect('Welcome');											//this is a custom route!
		}
	}
//---------------------------------------------------------------------------------------------------
	function actuallyLogIn(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");

		if($this->form_validation->run() == FALSE){
		     $this->session->set_flashdata("loginError", 'Invalid credential(s)'); 
		     redirect('/');
		}
		else{
			$userinfo = $this->Login->checkAgainstDB($this->input->post());
			if ($userinfo){								//if a row of user info matching that email+password combo came back bc they exist on our db, then...
				$this->session->set_userdata('currentUser', $userinfo);		//give them a new session
				redirect('Welcome');
			}
			else{
		     	$this->session->set_flashdata("DNEerror", "You should register first."); 
		    	redirect('/');
			}
		}
	}
//---------------------------------------------------------------------------------------------------
	function welcomeView(){
		if(!$this->session->userData('currentUser')){		//if no session then redirect to root.
			redirect('/');
		}		
		$this->load->view('Welcome');
	}
//---------------------------------------------------------------------------------------------------
	function destroy(){
		session_destroy();
		redirect('/');
	}
//---------------------------------------------------------------------------------------------------
}
?>