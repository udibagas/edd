<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->check_session();
		$this->template = 'templates/admin';
		$this->breadcrumbs = [
			'#' => 'DASHBOARD'
		];
		$this->render('admin/index');
	}

}
