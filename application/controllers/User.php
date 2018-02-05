<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'user');
	}

    // public function seed()
    // {
    //     $this->user->save([
    //         'username' => 'udibagas',
    //         'password' => password_hash('bismillah', 1)
    //     ]);
    //
    //     $this->user->save([
    //         'username' => 'satria',
    //         'password' => password_hash('12345', 1)
    //     ]);
    // }

	public function admin()
	{
		$this->check_session();
		$this->template = 'templates/admin';
		$q = $this->input->get('q');
		$this->breadcrumbs = [
			'/user/admin' => 'USER',
			'#' => 'ADMIN'
		];

		$pagination = [
			'base_url' => '/user',
			'total_rows' => $this->db
						->like('username', $q)
						->count_all_results('users'),
			'per_page' => 10
		];

		$this->pagination->initialize($pagination);

		$this->render('user/admin', [
			'users' => $this->db
					->like('username', $q)
					->get('users', $pagination['per_page'], $this->uri->segment(3))
					->result(),
		]);
	}

	public function create()
	{
		$this->check_session();

		if ($data = $this->input->post('User'))
		{
			$this->form_validation->set_rules($this->user->rules['create']);

			if ($this->form_validation->run() == TRUE)
			{
				$data['password'] = password_hash($this->input->post('password'), 1);
				$this->user->save($data);
				redirect('/user/admin');
			}
		}

		$this->template = 'templates/admin';
		$this->breadcrumbs = [
			'/user/admin' => 'USER',
			'#' => 'ADMIN'
		];

		$this->render('user/create');
	}

	public function edit($id)
	{
		$this->check_session();

		if ($data = $this->input->post('User'))
		{
			$this->form_validation->set_rules($this->user->rules['edit']);

			if ($this->form_validation->run() == TRUE)
			{
				$password = $this->input->post('password');

				if ($password != '') {
					$data['password'] = password_hash($password, 1);
				}

				$this->user->save($data, $id);
				redirect('/user/admin');
			}
		}
		$this->template = 'templates/admin';
		$this->breadcrumbs = [
			'/user/admin' => 'USER',
			'#' => 'EDIT'
		];

		$this->render('user/edit', [
			'user' => $this->user->find($id)
		]);
	}

	public function delete($id)
	{
		$this->check_session();
		$this->user->delete($id);
		redirect('/user/admin');
	}
}
