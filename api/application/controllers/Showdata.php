<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Showdata extends CI_Controller {

	public function index($remote_host = null)
	{
		$data['remote_host'] = $remote_host;
		$this->load->view('content/tables', $data);
	}
}
