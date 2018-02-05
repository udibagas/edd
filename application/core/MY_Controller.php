<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $template = 'templates/main';

    public $title = 'EDD POLRES KATINGAN';

    public $description = "Anggaran Dana Desa Polres Katingan Kalimantan Tengah";

    public $image = '';

    public $breadcrumbs = [];

    public $auth_only = false;

    function __construct()
    {
        parent::__construct();

        if ($this->auth_only == true) {
            $this->check_session();
        }
    }

    protected function check_session()
    {
        if ($this->session->userdata('logged_in')) {
            return true;
        } else {
            redirect('/login');
        }
    }

    public function render($view, $data = null)
    {
        return $this->load->view($this->template, [
            'content' => $this->load->view($view, $data, true),
        ]);
    }
}
