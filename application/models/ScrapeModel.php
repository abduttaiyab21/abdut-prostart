<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScrapeModel extends CI_Model {

    public function fetchScrapeData($url) {
        
		$html = file_get_html($url);
        $title = $html->find('title', 0)->plaintext;
        $description = $html->find('meta[name=description]', 0)->content;
        $image = $html->find('meta[property=og:image]', 0)->content;

		if (empty($title) && empty($description) && empty($image)) {
			return false;
		}

        return array(
            'title' => $title,
            'description' => $description,
            'image' => $image
        );
    }

	public function countBlogs() {
		return $this->db->count_all('blogmst');
	}
	
	public function getBlogsPerPage($limit, $offset) {
		$this->db->limit($limit, $offset);
		$this->db->order_by('id', 'DESC'); 
    	$query = $this->db->get('blogmst');
		return $query->result();
	}
	
	public function insertBlogData($data) {
		$this->db->insert('blogmst', $data);
	}
    
}
