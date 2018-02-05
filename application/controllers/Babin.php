<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Babin extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('babin_model', 'babin');
	}

	public function index()
	{
		$this->admin();
	}

	public function admin()
	{
		$this->check_session();
		$this->layout = 'templates/admin';
		$q = $this->input->get('q');

		$pagination = [
			'base_url' => site_url('babin/admin'),
			'total_rows' => $this->db
					->group_start()
						->or_like('babin.nama', $q)
						->or_like('babin.pangkat', $q)
						->or_like('babin.nrp', $q)
						->or_like('babin.no_hp', $q)
					->group_end()
					->count_all_results('babin'),
			'per_page' => 10
		];

		$this->pagination->initialize($pagination);

		$this->breadcrumbs = [
			'/babin/admin' => 'BABHINKAMTIBNAS',
			'#' => 'ADMIN'
		];

		$this->template = 'templates/admin';

		$this->render('babin/admin', [
			'babin' => $this->db
				->group_start()
					->or_like('babin.nama', $q)
					->or_like('babin.pangkat', $q)
					->or_like('babin.nrp', $q)
					->or_like('babin.no_hp', $q)
				->group_end()
				->order_by('babin.nama', 'ASC')
				->get('babin', $pagination['per_page'], $this->uri->segment(3))
				->result(),
		]);
	}

	public function create()
	{
		$this->check_session();

		if ($data = $this->input->post('Babin', true))
		{
			$this->form_validation->set_rules($this->babin->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->babin->save($data);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('babin/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'babin/admin' => 'BABHINKAMTIBNAS',
			'#' => 'TAMBAH'
		];

		$this->render('babin/create');
	}

	public function edit($id)
	{
		$this->check_session();
		
		if ($data = $this->input->post('Babin', true))
		{
			$this->form_validation->set_rules($this->babin->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->babin->save($data, $id);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('babin/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'babin/admin' => 'BABHINKAMTIBNAS',
			'#' => 'EDIT'
		];

		$this->render('babin/edit', [
			'babin' => $this->babin->find($id)
		]);
	}

	public function delete($id)
	{
		$this->check_session();
		$this->babin->delete($id);
		redirect('babin/admin');
	}

}
