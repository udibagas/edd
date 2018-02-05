<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kecamatan_model', 'kecamatan');
	}

	public function index()
	{
		$this->breadcrumbs = [
			'/' => 'DASHBOARD'
		];
		
		$tahun = $this->input->get('tahun')
			? $this->input->get('tahun')
			: date('Y');

		$this->render('kecamatan/index', [
			'tahun' => $tahun,
			'total_anggaran' => $this->db
						->select('sum(jumlah) as nilai')
						->where('tahun', $tahun)
						->get('anggaran')
						->row(),
			'tahun_anggaran' => $this->db
						->select('distinct(tahun) as tahun')
						->get('anggaran')
						->result(),
            'kecamatan' => $this->db
					->select('
						k.*,
						camat.nama as camat,
						kapolsek.nama as kapolsek,
						(select sum(anggaran.jumlah)
							from anggaran
							join desa on desa.id = anggaran.desa_id
							where desa.kecamatan_id = k.id and anggaran.tahun = '.$tahun.') as anggaran,
						(select sum(detail_anggaran.realisasi_biaya)
							from detail_anggaran
							join anggaran on anggaran.id = detail_anggaran.anggaran_id
							join desa on desa.id = anggaran.desa_id
							where desa.kecamatan_id = k.id and anggaran.tahun = '.$tahun.') as realisasi
					')
					->join('camat', 'camat.id = k.camat_id', 'LEFT')
					->join('kapolsek', 'kapolsek.id = k.kapolsek_id', 'LEFT')
                    ->order_by('nama', 'ASC')
					->from('kecamatan k')
                    ->get()
                    ->result()
        ]);
	}

    public function show($id)
    {
		$kecamatan = $this->db
			->select('kecamatan.*, kapolsek.nama AS kapolsek, camat.nama AS camat')
			->join('kapolsek', 'kapolsek.id = kecamatan.kapolsek_id', 'LEFT')
			->join('camat', 'camat.id = kecamatan.camat_id', 'LEFT')
			->where('kecamatan.id', $id)
			->get('kecamatan')
			->row();

		$this->breadcrumbs = [
			'#' => strtoupper($kecamatan->nama)
		];

		$tahun = $this->input->get('tahun')
			? $this->input->get('tahun')
			: date('Y');

        $this->render('kecamatan/show', [
			'tahun' => $tahun,
			'total_anggaran' => $this->db
						->select('sum(jumlah) as nilai')
						->join('desa', 'desa.id = anggaran.desa_id')
						->join('kecamatan', 'kecamatan.id = desa.kecamatan_id')
						->where('tahun', $tahun)
						->where('desa.kecamatan_id', $id)
						->get('anggaran')
						->row(),
			'tahun_anggaran' => $this->db
						->select('distinct(tahun) as tahun')
						->get('anggaran')
						->result(),
            'kecamatan' => $kecamatan,
            'desa' => $this->db
					->select('
						d.*,
						kades.nama as kades,
						babin.nama as babin,
						(select sum(anggaran.jumlah)
							from anggaran
							where anggaran.desa_id = d.id and anggaran.tahun = '.$tahun.') as anggaran,
						(select sum(detail_anggaran.realisasi_biaya)
							from detail_anggaran
							join anggaran on anggaran.id = detail_anggaran.anggaran_id
							where anggaran.desa_id = d.id and anggaran.tahun = '.$tahun.') as realisasi
					')
					->join('kades', 'kades.id = d.kades_id', 'LEFT')
					->join('babin', 'babin.id = d.babin_id', 'LEFT')
                    ->where('kecamatan_id', $id)
					->from('desa d')
                    ->get()
                    ->result()
        ]);
    }

	public function admin()
	{
		$this->check_session();
		$this->layout = 'templates/admin';
		$q = $this->input->get('q');

		$pagination = [
			'base_url' => site_url('kecamatan/admin'),
			'total_rows' => $this->db
					->group_start()
						->or_like('kecamatan.nama', $q)
					->group_end()
					->count_all_results('kecamatan'),
			'per_page' => 10
		];

		$this->pagination->initialize($pagination);

		$this->breadcrumbs = [
			'/kecamatan/admin' => 'KECAMATAN',
			'#' => 'ADMIN'
		];

		$this->template = 'templates/admin';

		$this->render('kecamatan/admin', [
			'kecamatan' => $this->db
				->group_start()
					->or_like('kecamatan.nama', $q)
				->group_end()
				->select('kecamatan.*, camat.nama AS camat, kapolsek.nama AS kapolsek')
				->join('camat', 'camat.id = kecamatan.camat_id', 'LEFT')
				->join('kapolsek', 'kapolsek.id = kecamatan.kapolsek_id', 'LEFT')
				->order_by('kecamatan.nama', 'ASC')
				->get('kecamatan', $pagination['per_page'], $this->uri->segment(3))
				->result(),
		]);
	}

	public function create()
	{
		$this->check_session();

		if ($data = $this->input->post('Kecamatan', true))
		{
			$this->form_validation->set_rules($this->kecamatan->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->kecamatan->save($data);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('kecamatan/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'kecamatan/admin' => 'KECAMATAN',
			'#' => 'TAMBAH'
		];

		$this->render('kecamatan/create', [
			'kapolsek' => $this->db
							->select('concat(pangkat, " ", nama, " / ", nrp) as label, id')
							->order_by('nama', 'ASC')
							->get('kapolsek')
							->result(),
			'camat' => $this->db
							->order_by('nama', 'ASC')
							->get('camat')
							->result()
		]);
	}

	public function edit($id)
	{
		$this->check_session();

		if ($data = $this->input->post('Kecamatan', true))
		{
			$this->form_validation->set_rules($this->kecamatan->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->kecamatan->save($data, $id);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('kecamatan/admin');
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'kecamatan/admin' => 'KECAMATAN',
			'#' => 'EDIT'
		];

		$this->render('kecamatan/edit', [
			'kecamatan' => $this->kecamatan->find($id),
			'kapolsek' => $this->db
							->select('concat(pangkat, " ", nama, " / ", nrp) as label, id')
							->order_by('nama', 'ASC')
							->get('kapolsek')
							->result(),
			'camat' => $this->db
							->order_by('nama', 'ASC')
							->get('camat')
							->result()
		]);
	}

	public function delete($id)
	{
		$this->check_session();
		$this->kecamatan->delete($id);
		redirect('kecamatan/admin');
	}

}
