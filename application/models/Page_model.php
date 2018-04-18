<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Page_model extends CI_Model {
	
		public function __construct() {
			parent::__construct();
		}
		
		public function get_page_by_tag($page_tag) {
			$query = $this->db->from("pages")
							  ->where( array('tag' => $page_tag) )
							  ->limit(1)
							  ->get(); 	
			if($query->num_rows() === 1){
				$page = $query->row_array();
				return $page;
			}
			return false;
		}
		
		public function get_page_by_id($page_id) {
			$query = $this->db->from("pages")
							  ->where( array('id' => $page_id) )
							  ->limit(1)
							  ->get(); 	
			if($query->num_rows() === 1){
				$page = $query->row_array();
				return $page;
			}
			return false;			
		}
		
		public function get_page_by_name($page_name) {
			$query = $this->db->from("pages")
							  ->where( array('name' => $page_name) )
							  ->limit(1)
							  ->get(); 	
			if($query->num_rows() === 1){
				$page = $query->row_array();
				return $page;
			}
			return false;			
		}
		
	}

?>