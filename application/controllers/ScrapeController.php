<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScrapeController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ScrapeModel');
        $this->load->library('pagination');
        $this->load->library('simple_html_dom');
    }

    public function index() {
        $this->load->view('scrape_view');
    }

    public function fetchScrape() {
		$url = $this->input->post('url');
		$scrapeData = $this->ScrapeModel->fetchScrapeData($url);
	
		if ($scrapeData) {
			$html = '';
			$html .= '<div class="container">';
			$html .= '<form method="post" action="#" id="saveForm">';
			$html .= '<input type="hidden" name="image" id="previewImage" value="' . $scrapeData['image'] . '">';
			$html .= '<input type="hidden" name="title" id="previewTitle" value="' . $scrapeData['title'] . '">';
			$html .= '<input type="hidden" name="description" id="previewDescription" value="' . $scrapeData['description'] . '">';
			$html .= '<div class="row">';
			$html .= '<div class="col-md-6">';
			$html .= '<img src="' . $scrapeData['image'] . '" class="img-fluid" alt="Image">';
			$html .= '</div>';
			$html .= '<div class="col-md-6">';
			$html .= '<h3 class="mt-3">Title: ' . $scrapeData['title'] . '</h3>';
			$html .= '<p class="mt-2">Description: ' . $scrapeData['description'] . '</p>';
			$html .= '<button type="button" onclick="saveScrapeData()" class="btn btn-success mt-3" id="saveButton">Save</button>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</form>';
			$html .= '</div>';
	
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($html));
		} else {
			echo json_encode(array('error' => 'Unable to fetch preview data.'));
		}
	}

	public function saveScrapeData() {
		$data = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'image' => $this->input->post('image')
		);
	
		$this->ScrapeModel->insertBlogData($data);
	
		echo json_encode(array('message' => 'Data saved successfully'));
	}

	public function getBlogs() {
		$page = $this->input->get('page') ?: 1;
		$per_page = 10;
	
		$data['blogs'] = $this->ScrapeModel->getBlogsPerPage($per_page, ($page - 1) * $per_page);
		$total_rows = $this->ScrapeModel->countBlogs();
		$total_pages = ceil($total_rows / $per_page);
	
		$pagination_data = array(
			'blogs' => $data['blogs'],
			'total_pages' => $total_pages,
			'current_page' => $page,
		);
	
		$this->output->set_content_type('application/json')->set_output(json_encode($pagination_data));
	}
}
