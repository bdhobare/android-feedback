<?php

class Library extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		$this->load->helper(array(
			'language',
			'url',
			'form',
			'account/ssl'
		));
		$this->load->library(array('account/authentication'));
		$this->load->model(array('account/account_model'));
	}

	function index()
	{
		use_ssl(FALSE);

		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}

		$this->load->view('account/account_library', isset($data) ? $data : NULL);
	}

}


/* End of file home.php */
/* Location: ./system/application/controllers/home.php */