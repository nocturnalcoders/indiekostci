<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['info_kost'] = $this->Welcome_model->getInfoKost();	

		$this->load->view('partial/landing_partial/header_landing');
		$this->load->view('landing_page/landing_view', $data);
		$this->load->view('partial/landing_partial/footer_landing');
	}

	public function ketersediaanKamar(){
		// var_dump($this->Welcome_model->getKamarTersedia());

		$this->load->view('landing_page/ketersediaankamar_view.php');
	}



	public function ajax(){
		$ajax_menu = $this->input->post('menu');

		$data['data_kamar'] = $this->Welcome_model->getKamarTersedia();
		$this->load->view('landing_page/ajax/get_kamar_live', $data);
	}
}
