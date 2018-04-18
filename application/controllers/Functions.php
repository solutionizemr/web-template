<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Functions extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->model('ion_auth_model');
		}
		
		public function index() {

		}
		
		public function user_login() {
		    $username = isset($_POST['username']) ? $_POST['username'] : false;
		    $password = isset($_POST['password']) ? $_POST['password'] : false;
		    if ($username && $password) {
		        if ($this->ion_auth->login($username, $password)) {
		            header('Location: '.base_url().$_SESSION['last_url'], true, 303);
		            die();
		        }
		    }
		    header('Location: '.base_url().'login', true, 303);
		    die();
		}
		
		public function user_logout() {
		    $this->ion_auth->logout();
		    header('Location: '.base_url().$_SESSION['last_url'], true, 303);
		    die();
		}
		
	}

?>