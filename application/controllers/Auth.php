<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function login()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('/admin');
		}

		if ($data = $this->input->post())
		{
			$user = $this->db->where('active', 1)
                    ->where('username', $data['username'])
					->get('users')->row();

			if ($user)
			{
				if (!password_verify($data['password'], $user->password)) {
					$this->session->set_flashdata('error', 'Password yang Anda masukkan salah');
					redirect('/login');
				}

				$this->session->set_userdata([
					'logged_in' => true,
					'id' => $user->id,
					'username' => $user->username,
					// 'display_name' => $user->display_name,
					// 'email' => $user->email,
				]);

				redirect('/admin');
			}

			$this->session->set_flashdata('error', 'Username & Password salah.');
		}

        $this->template = 'templates/login';
		$this->render('auth/login');
	}

	public function logout()
	{
		session_destroy();
		redirect('/home');
	}
}
