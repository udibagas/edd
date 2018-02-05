<?php

class Pesan_model extends MY_Model {

    public $table = 'pesan';

    public $fillable = [ 'nama', 'email', 'no_hp', 'subyek', 'pesan'];

    public $rules = [
        [
            'field' => 'Pesan[nama]',
            'label' => 'Nama',
            'rules' => 'required'
        ],[
            'field' => 'Pesan[email]',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ],[
            'field' => 'Pesan[no_hp]',
            'label' => 'No HP',
            'rules' => 'required'
        ],[
            'field' => 'Pesan[subyek]',
            'label' => 'Subyek',
            'rules' => 'required'
        ],[
            'field' => 'Pesan[pesan]',
            'label' => 'pesan',
            'rules' => 'required'
        ],
    ];

    public function __construct()
    {
        parent::__construct();
    }

}
