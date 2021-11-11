<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth', 'form_validation','session'));
	}

	function tema($data = NULL)
	{
		$data['users'] =  $this->ion_auth->user()->row();
		$this->load->view('theme', $data);
	}

}
