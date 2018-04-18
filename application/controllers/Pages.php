<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Pages extends CI_Controller {
		
		protected $path_to_header_fragment = 'fragments/header';
		protected $path_to_menu_fragment = 'fragments/menu';
		protected $path_to_footer_fragment = 'fragments/footer';
		
		public function __construct() {
			parent::__construct();
			$this->load->model('page_model');

			if( !isset($_SESSION['last_url']) || empty($_SESSION['last_url']) ){
				$this->session->set_userdata('last_url', 'home');
			}
		}
		
		public function index() {
			$this->show_page('home');
		}
		
		public function show_page($page_tag, $data = null) {
			$page_data = $this->page_model->get_page_by_tag($page_tag);
			if (is_array($page_data)) {
				$page_name = $page_data['name'];
				$page_path = $page_data['path'];
				if (isset($_SESSION['data'])) {
				    $data = array_merge($data, $_SESSION['data']);
				    $this->session->unset_userdata('data');
				}
				switch($page_tag){
				    case "login":
					case "register":
				    break;
				    default:
				    	$this->session->set_userdata('last_url', explode("?", ltrim($_SERVER['REQUEST_URI'], "/"))[0]);
				    break;
			    }
				if(!$page_data['require_login']) {
					$this->view_page( $page_tag, $page_name, $page_path, $data );
				} else {
					if ($this->ion_auth->logged_in()) {
						$this->view_page( $page_tag, $page_name, $page_path, $data );
					} else {
						$this->show_page('login');
					} 
				}
			} else {
				show_404();
			}
		}
	
		public function view_page( $page_tag, $page_name, $page_path, $data ) {	
			if( file_exists(APPPATH.'views/'.$page_path) ){
				$data['title'] = $page_name;
				$data['baseurl'] = base_url();
				if ($this->ion_auth->logged_in()) {
				    $data['user'] = $this->ion_auth->user()->row();
				}

				$this->load->view( $this->path_to_header_fragment, $data );
				$this->load->view( $this->path_to_menu_fragment, $data );
				$this->load->view( $page_path, $data );
				$this->load->view( $this->path_to_footer_fragment );
			} else {
				show_404();
			}
		}
		
	}

?>