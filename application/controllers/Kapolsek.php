<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kapolsek extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kapolsek_model', 'kapolsek');
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
			'base_url' => site_url('kapolsek/admin'),
			'total_rows' => $this->db
					->group_start()
						->or_like('kapolsek.nama', $q)
						->or_like('kapolsek.pangkat', $q)
						->or_like('kapolsek.nrp', $q)
						->or_like('kapolsek.no_hp', $q)
					->group_end()
					->count_all_results('kapolsek'),
			'per_page' => 10
		];

		$this->pagination->initialize($pagination);

		$this->breadcrumbs = [
			'/kapolsek/admin' => 'KAPOLSEK',
			'#' => 'ADMIN'
		];

		$this->template = 'templates/admin';

		$this->render('kapolsek/admin', [
			'kapolsek' => $this->db
				->group_start()
					->or_like('kapolsek.nama', $q)
					->or_like('kapolsek.pangkat', $q)
					->or_like('kapolsek.nrp', $q)
					->or_like('kapolsek.no_hp', $q)
				->group_end()
				->order_by('kapolsek.nama', 'ASC')
				->get('kapolsek', $pagination['per_page'], $this->uri->segment(3))
				->result(),
		]);
	}

	public function create()
	{
		$this->check_session();

		if ($data = $this->input->post('Kapolsek', true))
		{
			$this->form_validation->set_rules($this->kapolsek->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->kapolsek->save($data);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('kapolsek/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'kapolsek/admin' => 'KAPOLSEK',
			'#' => 'TAMBAH'
		];

		$this->render('kapolsek/create');
	}

	public function edit($id)
	{
		$this->check_session();
		
		if ($data = $this->input->post('Kapolsek', true))
		{
			$this->form_validation->set_rules($this->kapolsek->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->kapolsek->save($data, $id);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('kapolsek/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'kapolsek/admin' => 'KAPOLSEK',
			'#' => 'EDIT'
		];

		$this->render('kapolsek/edit', [
			'kapolsek' => $this->kapolsek->find($id)
		]);
	}

	public function delete($id)
	{
		$this->check_session();
		$this->kapolsek->delete($id);
		redirect('kapolsek/admin');
	}

}
