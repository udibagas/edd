<?php

class User_model extends MY_Model {

    public $table = 'users';

    public $fillable = [
        'username', 'password', 'active',
    ];

    public $rules = [
        'create' => [
            [
                'field' => 'User[username]',
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username]'
            ], [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]'
            ], [
                'field' => 'passconf',
                'label' => 'Confirm Password',
                'rules' => 'matches[password]'
            ],/* [
                'field' => 'User[email]',
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email]'
            ], [
                'field' => 'User[display_name]',
                'label' => 'Display Name',
                'rules' => 'required'
            ]*/
        ],
        'edit' => [
            [
                'field' => 'User[username]',
                'label' => 'Username',
                'rules' => 'required'
            ], [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'min_length[6]'
            ], [
                'field' => 'passconf',
                'label' => 'Confirm Password',
                'rules' => 'matches[password]'
            ], /*[
                'field' => 'User[email]',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ], [
                'field' => 'User[display_name]',
                'label' => 'Display Name',
                'rules' => 'required'
            ]*/
        ]
    ];

    public function __construct()
    {
        parent::__construct();
    }

}
