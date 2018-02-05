<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kades extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kades_model', 'kades');
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
			'base_url' => site_url('kades/admin'),
			'total_rows' => $this->db
					->group_start()
						->or_like('kades.nama', $q)
						->or_like('kades.alamat', $q)
						->or_like('kades.nik', $q)
						->or_like('kades.no_hp', $q)
					->group_end()
					->count_all_results('kades'),
			'per_page' => 10
		];

		$this->pagination->initialize($pagination);

		$this->breadcrumbs = [
			'/kades/admin' => 'KADES',
			'#' => 'ADMIN'
		];

		$this->template = 'templates/admin';

		$this->render('kades/admin', [
			'kades' => $this->db
				->group_start()
					->or_like('kades.nama', $q)
					->or_like('kades.alamat', $q)
					->or_like('kades.nik', $q)
					->or_like('kades.no_hp', $q)
				->group_end()
				->order_by('kades.nama', 'ASC')
				->get('kades', $pagination['per_page'], $this->uri->segment(3))
				->result(),
		]);
	}

	public function create()
	{
		$this->check_session();

		if ($data = $this->input->post('Kades', true))
		{
			$this->form_validation->set_rules($this->kades->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->kades->save($data);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('kades/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'kades/admin' => 'KADES',
			'#' => 'TAMBAH'
		];

		$this->render('kades/create');
	}

	public function edit($id)
	{
		$this->check_session();

		if ($data = $this->input->post('Kades', true))
		{
			$this->form_validation->set_rules($this->kades->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->kades->save($data, $id);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('kades/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'kades/admin' => 'KADES',
			'#' => 'EDIT'
		];

		$this->render('kades/edit', [
			'kades' => $this->kades->find($id)
		]);
	}

	public function delete($id)
	{
		$this->check_session();
		$this->kades->delete($id);
		redirect('kades/admin');
	}

}
