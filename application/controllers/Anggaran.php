<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('anggaran_model', 'anggaran');
	}

	public function index()
	{
		$this->render('anggaran/index', [
            'anggaran' => $this->db
                    ->order_by('tahun', 'ASC')
                    ->get('anggaran')
                    ->result()
        ]);
	}

	public function admin()
	{
		$this->check_session();
		$this->layout = 'templates/admin';
		$q = $this->input->get('q');

		$pagination = [
			'base_url' => site_url('anggaran/admin'),
			'total_rows' => $this->db
					->group_start()
						->or_like('anggaran.tahun', $q)
						->or_like('desa.nama', $q)
						->or_like('kecamatan.nama', $q)
					->group_end()
					->join('desa', 'desa.id = anggaran.desa_id', 'LEFT')
					->join('kecamatan', 'kecamatan.id = desa.kecamatan_id', 'LEFT')
					->count_all_results('anggaran'),
			'per_page' => 10
		];

		$this->pagination->initialize($pagination);

		$this->breadcrumbs = [
			'/anggaran/admin' => 'ANGGARAN',
			'#' => 'ADMIN'
		];

		$this->template = 'templates/admin';

		$this->render('anggaran/admin', [
			'anggaran' => $this->db
				->group_start()
					->or_like('anggaran.tahun', $q)
					->or_like('desa.nama', $q)
					->or_like('kecamatan.nama', $q)
				->group_end()
				->select('anggaran.*, desa.nama AS desa, kecamatan.nama as kecamatan')
				->join('desa', 'desa.id = anggaran.desa_id', 'LEFT')
				->join('kecamatan', 'kecamatan.id = desa.kecamatan_id', 'LEFT')
				->order_by('anggaran.tahun', 'ASC')
				->get('anggaran', $pagination['per_page'], $this->uri->segment(3))
				->result(),
		]);
	}

    public function show($id)
    {
        $this->render('anggaran/show', [
            'anggaran' => $this->anggaran->find($id)
		]);
    }

	public function create()
	{
		$this->check_session();

		if ($data = $this->input->post('Anggaran', true))
		{
			$this->form_validation->set_rules($this->anggaran->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->anggaran->save($data);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('anggaran/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'anggaran/admin' => 'ANGGARAN',
			'#' => 'TAMBAH'
		];

		$this->render('anggaran/create', [
			'desa' => $this->db
							->order_by('nama', 'ASC')
							->get('desa')
							->result(),
		]);
	}

	public function edit($id)
	{
		$this->check_session();

		if ($data = $this->input->post('Anggaran', true))
		{
			$this->form_validation->set_rules($this->anggaran->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->anggaran->save($data, $id);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('anggaran/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'anggaran/admin' => 'ANGGARAN',
			'#' => 'EDIT'
		];

		$this->render('anggaran/edit', [
			'anggaran'	=> $this->anggaran->find($id),
			'detail'	=> $this->db
							->select('detail_anggaran.*, (detail_anggaran.anggaran_biaya - detail_anggaran.realisasi_biaya) as sisa')
							->where('anggaran_id', $id)
							->get('detail_anggaran')
							->result(),
			'desa'		=> $this->db
							->order_by('nama', 'ASC')
							->get('desa')
							->result(),
		]);
	}

	public function delete($id)
	{
		$this->check_session();
		$this->anggaran->delete($id);
		redirect('anggaran/admin');
	}
}
