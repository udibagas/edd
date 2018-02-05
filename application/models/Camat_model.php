<?php

class Camat_model extends MY_Model {

    public $table = 'camat';

    public $fillable = [
        'nama', 'no_hp', 'alamat', 'nik'
    ];

    public $rules = [
        [
            'field' => 'Camat[nama]',
            'label' => 'Nama',
            'rules' => 'required'
        ]
    ];

    public function __construct()
    {
        parent::__construct();
    }

}
