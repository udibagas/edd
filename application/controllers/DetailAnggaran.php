<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailAnggaran extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('detailAnggaran_model', 'detail_anggaran');
		$this->load->library('upload', [
			'upload_path' => './uploads/',
			'allowed_types' => 'png|jpg|jpeg|bmp|gif|pdf',
		]);
	}

	public function create()
	{
		$this->check_session();
		$anggaran = $this->db
				->select('anggaran.*, desa.nama AS desa, kecamatan.nama as kecamatan')
				->join('desa', 'desa.id = anggaran.desa_id', 'LEFT')
				->join('kecamatan', 'kecamatan.id = desa.kecamatan_id', 'LEFT')
				->where('anggaran.id', $this->input->get('anggaran_id'))
				->get('anggaran')
				->row();

		if (!$anggaran) {
			redirect('anggaran/admin');
		}

		if ($data = $this->input->post('DetailAnggaran', true))
		{
			$this->form_validation->set_rules($this->detail_anggaran->rules);

			if ($this->form_validation->run() == TRUE)
			{
				if ($this->upload->do_upload('foto')) {
					$file = $this->upload->data();
					$data['foto'] = '/uploads/'.$file['file_name'];

				}

				else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
				}

				$this->detail_anggaran->save($data);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('anggaran/edit/'.$anggaran->id);
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'anggaran/admin' => 'ANGGARAN',
			'#' => 'TAMBAH'
		];

		$this->render('detail_anggaran/create', [
			'anggaran' => $anggaran
		]);
	}

	public function edit($id)
	{
		$this->check_session();
		$detail_anggaran = $this->detail_anggaran->find($id);

		if ($data = $this->input->post('DetailAnggaran', true))
		{
			$this->form_validation->set_rules($this->detail_anggaran->rules);

			if ($this->form_validation->run() == TRUE)
			{
				if ($this->upload->do_upload('foto'))
				{
					if ($detail_anggaran->foto && file_exists('.'.$detail_anggaran->foto)) {
						unlink('.'.$detail_anggaran->foto);
					}

					$file = $this->upload->data();
					$data['foto'] = '/uploads/'.$file['file_name'];

				}

				else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
				}

				$this->detail_anggaran->save($data, $id);
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				redirect('anggaran/edit/'.$detail_anggaran->anggaran_id);
			}
		}

		$this->template = 'templates/admin';

		$this->breadcrumbs = [
			'anggaran/admin' => 'ANGGARAN',
			'#' => 'EDIT'
		];

		$this->render('detail_anggaran/edit', [
			'detail_anggaran'	=> $this->detail_anggaran->find($id),
			'anggaran'			=> $this->db
									->select('anggaran.*, desa.nama AS desa, kecamatan.nama as kecamatan')
									->join('desa', 'desa.id = anggaran.desa_id', 'LEFT')
									->join('kecamatan', 'kecamatan.id = desa.kecamatan_id', 'LEFT')
									->where('anggaran.id', $detail_anggaran->anggaran_id)
									->get('anggaran')
									->row()
		]);
	}

	public function delete($id)
	{
		$this->check_session();
		$detail_anggaran = $this->detail_anggaran->find($id);

		if ($detail_anggaran->foto && file_exists('.'.$detail_anggaran->foto)) {
			unlink('.'.$detail_anggaran->foto);
		}

		$this->detail_anggaran->delete($id);
		redirect('anggaran/edit/'.$detail_anggaran->anggaran_id);
	}

	public function hapus_foto($id)
	{
		$this->check_session();
		$detail_anggaran = $this->detail_anggaran->find($id);

		if ($detail_anggaran->foto && file_exists('.'.$detail_anggaran->foto)) {
			unlink('.'.$detail_anggaran->foto);
		}

		$this->detail_anggaran->save(['foto' => ''], $id);
		redirect('/detailAnggaran/edit/'.$detail_anggaran->id);
	}
}
