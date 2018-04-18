<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Setup extends CI_Controller {
		
		protected $path_to_header_fragment = 'fragments/header';
		protected $path_to_menu_fragment = 'fragments/menu';
		protected $path_to_footer_fragment = 'fragments/footer';
		
		public function __construct() {
			parent::__construct();
		}
		
		public function index() {
			$data['title'] = "Setup back-end template";
			$data['baseurl'] = base_url();
			$this->load->view( $this->path_to_header_fragment, $data );
			$this->load->view( $this->path_to_menu_fragment, $data );
			$this->load->view( "setup", $data );
			$this->load->view( $this->path_to_footer_fragment );
		}
		
	}
	
?>
		