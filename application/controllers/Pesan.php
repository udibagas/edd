<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pesan_model', 'pesan');
	}

	public function create()
	{
		if ($data = $this->input->post('Pesan', true))
		{
			$this->form_validation->set_rules($this->pesan->rules);

			if ($this->form_validation->run() == TRUE)
			{
				$this->pesan->save($data);
				$this->load->library('email');

				$this->email->initialize([
					'protocol' => 'smtp',
					'smtp_host' => 'localhost',
					'smtp_port' => 25,
					'smtp_user' => 'admin@edd-polreskatingan.com',
					'smtp_pass' => 'bismillah12345',
				]);

				$recipients = [
					'udibagas@gmail.com',
				];

				$users = $this->db->get('user');

				foreach ($users->result() as $u) {
					$recipients[] = $u->email;
				}

				$this->email->from($data['email'], $data['nama']);
				$this->email->to($recipients);
				$this->email->subject($data['subyek']);
				$this->email->message($data['pesan']);
				$this->email->send();
				$this->session->set_flashdata('sukses', 'Terimakasih. Pesan Anda telah dikirim. Silakan tunggu respon dari team kami beberapa saat lagi.');
			}
		}

		$this->breadcrumbs = [
			'contact' => 'HUBUNGI KAMI'
		];

		$this->render('pesan/create');
	}

	public function admin()
	{
		$this->check_session();
		$this->template = 'templates/admin';
		$q = $this->input->get('q');
		$this->breadcrumbs = [
			'/pesan/admin' => 'PESAN',
			'#' => 'ADMIN'
		];

		$pagination = [
			'base_url' => '/pesan',
			'total_rows' => $this->db
							->group_start()
								->or_like('nama', $q)
								->or_like('email', $q)
								->or_like('no_hp', $q)
								->or_like('subyek', $q)
								->or_like('pesan', $q)
							->group_end()
							->count_all_results('pesan'),
			'per_page' => 10
		];

		$this->pagination->initialize($pagination);

		$this->render('pesan/admin', [
			'pesans' => $this->db
						->group_start()
							->or_like('nama', $q)
							->or_like('email', $q)
							->or_like('no_hp', $q)
							->or_like('subyek', $q)
							->or_like('pesan', $q)
						->group_end()
						->get('pesan', $pagination['per_page'], $this->uri->segment(3))->result(),
		]);
	}

	public function show($id)
	{
		$this->check_session();
		$this->template = 'templates/admin';
		$pesan = $this->pesan->find($id);

		if (!$pesan) {
			redirect('/');
		}

		$this->pesan->save(['view' => 1], $id);
		$this->breadcrumbs = [
			'/pesan' => 'PESAN',
			'#' => 'LIHAT PESAN',
		];
		
		$this->render('pesan/show', [
			'pesan' => $pesan,
		]);
	}

	public function delete($id)
	{
		$this->check_session();
		$this->pesan->delete($id);
		redirect('/pesan/admin');
	}

	public function setting()
	{
		$this->check_session();
		$this->template = 'templates/admin';
		$this->render('pesan/setting');
	}
}
