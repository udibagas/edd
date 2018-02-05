<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camat extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('camat_model', 'camat');
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
			'base_url' => site_url('camat/admin'),
			'total_rows' => $this->db
					->group_start()
						->or_like('camat.nama', $q)
						->or_like('camat.alamat', $q)
						->or_like('camat.nik', $q)
						->or_like('camat.no_hp', $q)
					->group_end()
					->count_all_results('camat'),
			'per_page' => 10
		];

		$this->pagination->initialize($pagination);

		$this->breadcrumbs = [
			'/camat/admin' => 'CAMAT',
			'#' => 'ADMIN'
		];

		$this->template = 'templates/admin';

		$this->render('camat/admin', [
			'camat' => $this->db
				->group_start()
					->or_like('camat.nama', $q)
					->or_like('camat.alamat', $q)
					->or_like('camat.nik', $q)
					->or_like('camat.no_hp', $q)
				->group_end()
				->order_by('camat.nama', 'ASC')
				->get('camat', $pagination['per_page'], $this->uri->segment(3))
				->result(),
		]);
	}

	public function create()
	{
		$this->check_session();

		if ($data = $this->input->post('Camat', true))
		{
			$this->form_validation->set_rules($this->camat->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->camat->save($data);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('camat/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'camat/admin' => 'CAMAT',
			'#' => 'TAMBAH'
		];

		$this->render('camat/create');
	}

	public function edit($id)
	{
		$this->check_session();
		
		if ($data = $this->input->post('Camat', true))
		{
			$this->form_validation->set_rules($this->camat->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->camat->save($data, $id);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('camat/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'camat/admin' => 'CAMAT',
			'#' => 'EDIT'
		];

		$this->render('camat/edit', [
			'camat' => $this->camat->find($id)
		]);
	}

	public function delete($id)
	{
		$this->check_session();
		$this->camat->delete($id);
		redirect('camat/admin');
	}

}
