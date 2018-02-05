<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('desa_model', 'desa');
	}

	public function index()
	{
		$this->render('desa/index', [
            'desa' => $this->db
                    ->order_by('nama', 'ASC')
                    ->get('desa')
                    ->result()
        ]);
	}

	public function admin()
	{
		$this->check_session();
		$this->layout = 'templates/admin';
		$q = $this->input->get('q');

		$pagination = [
			'base_url' => site_url('desa/admin'),
			'total_rows' => $this->db
					->group_start()
						->or_like('desa.nama', $q)
						->or_like('kecamatan.nama', $q)
					->group_end()
					->join('kecamatan', 'kecamatan.id = desa.kecamatan_id', 'LEFT')
					->count_all_results('desa'),
			'per_page' => 10
		];

		$this->pagination->initialize($pagination);

		$this->breadcrumbs = [
			'/desa/admin' => 'DESA',
			'#' => 'ADMIN'
		];

		$this->template = 'templates/admin';

		$this->render('desa/admin', [
			'desa' => $this->db
				->group_start()
					->or_like('desa.nama', $q)
					->or_like('kecamatan.nama', $q)
				->group_end()
				->select('desa.*, kecamatan.nama AS kecamatan, babin.nama AS babin, kades.nama AS kades')
				->join('kecamatan', 'kecamatan.id = desa.kecamatan_id', 'LEFT')
				->join('babin', 'babin.id = desa.babin_id', 'LEFT')
				->join('kades', 'kades.id = desa.kades_id', 'LEFT')
				->order_by('desa.nama', 'ASC')
				->get('desa', $pagination['per_page'], $this->uri->segment(3))
				->result(),
		]);
	}

    public function show($id)
    {
		$tahun = $this->input->get('tahun')
			? $this->input->get('tahun')
			: date('Y');

		$anggaran = $this->db
						->where('desa_id', $id)
						->where('tahun', $tahun)
						->get('anggaran')
						->row();

		if ($anggaran) {
			$detail_anggaran = $this->db
								->select('detail_anggaran.*, (detail_anggaran.anggaran_biaya - detail_anggaran.realisasi_biaya) as sisa')
								->where('anggaran_id', $anggaran->id)
								->get('detail_anggaran')
								->result();
		}

		else {
			$detail_anggaran = [];
		}

		$desa = $this->db
					->select('desa.*, kecamatan.nama AS kecamatan, concat(babin.pangkat, " ", babin.nama) AS babin, kades.nama AS kades')
					->join('kecamatan', 'kecamatan.id = desa.kecamatan_id', 'LEFT')
					->join('babin', 'babin.id = desa.babin_id', 'LEFT')
					->join('kades', 'kades.id = desa.kades_id', 'LEFT')
					->where('desa.id', $id)
					->get('desa')
					->row();

		$tahun_anggaran = $this->db
							->select('distinct(tahun) as tahun')
							->get('anggaran')
							->result();

		$this->breadcrumbs = [
			'/' => strtoupper($desa->nama)
		];

        $this->render('desa/show', [
			'tahun' => $tahun,
			'tahun_anggaran' => $tahun_anggaran,
            'desa' => $desa,
			'anggaran' => $anggaran,
			'detail_anggaran' => $detail_anggaran,
        ]);
    }

	public function create()
	{
		$this->check_session();

		if ($data = $this->input->post('Desa', true))
		{
			$this->form_validation->set_rules($this->desa->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->desa->save($data);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('desa/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'desa/admin' => 'DESA',
			'#' => 'TAMBAH'
		];

		$this->render('desa/create', [
			'kecamatan' => $this->db
							->order_by('nama', 'ASC')
							->get('kecamatan')
							->result(),
			'babin' => $this->db
							->select('concat(pangkat, " ", nama, " / ", nrp) as label, id')
							->order_by('nama', 'ASC')
							->get('babin')
							->result(),
			'kades' => $this->db
							->order_by('nama', 'ASC')
							->get('kades')
							->result()
		]);
	}

	public function edit($id)
	{
		$this->check_session();

		if ($data = $this->input->post('Desa', true))
		{
			$this->form_validation->set_rules($this->desa->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->desa->save($data, $id);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('desa/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'desa/admin' => 'DESA',
			'#' => 'EDIT'
		];

		$this->render('desa/edit', [
			'desa' => $this->desa->find($id),
			'kecamatan' => $this->db
							->order_by('nama', 'ASC')
							->get('kecamatan')
							->result(),
			'babin' => $this->db
							->select('concat(pangkat, " ", nama, " / ", nrp) as label, id')
							->order_by('nama', 'ASC')
							->get('babin')
							->result(),
			'kades' => $this->db
							->order_by('nama', 'ASC')
							->get('kades')
							->result()
		]);
	}

	public function delete($id)
	{
		$this->check_session();
		$this->desa->delete($id);
		redirect('desa/admin');
	}
}
