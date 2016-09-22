PARTIALS (can have it display across your entire system. Break up your app into small components then just load them with your view every single time. <?php 
	$this->load->view("partials/header.php");	//you're gonna route this, to clean up the url. Don't expopse your system to malicious users. 
?>
REDIRECT to a route. 

Route: left is what users type into the url, right side is the controller and function method of the thing it is actually doing. 

<?php 
	$route['deleteUser/(:int)'] = 'User/delete/$1';
?>
	<a href = "deleteUser/<?= $theUser['id'] ?>">DELETE</a>
Use route parameters like this to get info out of a form to your method without posting it. 

on a page with 2 forms we don't need hidden fields to distinguish anymore, bc now the buttons send to different routes with different parameters. <form action="thing on the left of the route declaration" method="post">


foreach ($recentReviews as $review){	//k you gotta learn wtf foreach and as mean....
	
}
<?php
class ninjaGold extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("currentGold")){
			$this->reset();
		}
	}

	function index(){
		$this->load->view('ninjagoldview');
	}
	function 
			$this->session->set_userdata("currentGold", 0);
			$this->session->set_userdata("activityArray", []);
		}
	}
	
}
?>

Controller should nevre spit out html. Just write something for the front end to echo out. DAta to send out. Wrap it in a variable for "message".


$this->load->model("User"); //creates the variable User that you can now
$this->user->register($this->input->post);
don't send info from view to model, must be directed thru controller.

User extends CI_Model
	function register($UserData){
	$sql = "Insert into users(smth) values(?,?,?,?)";
	$this->db->query($sql, []);		//use this to query the db every time? insert, update, delete. 
	Return $this->DB->query()->result_array; 	//result array is key value pairs. just putting row will return the first row. Result array returns all?
	
	$userData($values)$this->User

He wrote some stuff that I couldn't read.. get from somebody.
	}

Don't write html on model or controller, don't generate sql in controller.

controller should load model/view and get info from model/view. 
model has a sql string and another line telling to run that on the DB. 
$this->load->model('user');
$userArray = $this->user->getUsers();

//----------------------------------------------------------------------------
It always goes to routes first. So for form action, just put the route name, and on the right of routes you specify controller and method to process it. 




SQL to retrieve book reviews, gotta pass into the bookrev controller and getreviewedbooks(3) <-- method to get most recent 3.
function getReviews($numTOFetch){}
return $this->db->query("SELECT * FROM book_review LEFT JOIN book WHERE book_ID = ")... ORDER BY created_at DESC";
	if ($numToFetch){
	$query . = "LIMIT $numToFetch";
	}

array(bookID)=>result_array();

ok so this is mysql bullshit and should be easy if he didn't make us skip all of that to do php. 
Like what the fuck is a sub select? Different from the Joins. 
YOu also dont know foreach...as, while loops. 
Don't need perfect, know when it just needs fine-tuning and then get the bigger shit done. 
Ask questions, especially clarification. 
shit all over the html, just have enough to get stuff to show.
Meet all the requirements. 
Structure of data, deploy to cloud, good variables. 
SHould be able to make divs sit next to each other... it's not easy, no one can do it. 
instead of stars can just have it echo out the number rating. 
How to get stuff from database display in distinct boxes that you hard coded on view page as html?

$this->load->view("bookDetailView", ["book"=>$book]); When you pass info to view, needs to be with assoc array. 
---------------------
LAMPBeltPrep vs LampBeltExam
finish login + reg, deploy online to make it work?
learn mysql joins/subselect. CRUD commands.
(learn materialize)
actual lamp belt prep assignment (check Chris's solution code)
How to deploy? Literal steps from folder, GIT, to aws.

Can retake the test any time, asap during project week. 
Sit with him one on one to go over the exam after you fail. 