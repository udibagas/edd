<?php

class Kades_model extends MY_Model {

    public $table = 'kades';

    public $fillable = [
        'nama', 'no_hp', 'alamat', 'nik'
    ];

    public $rules = [
        [
            'field' => 'Kades[nama]',
            'label' => 'Nama',
            'rules' => 'required'
        ]
    ];

    public function __construct()
    {
        parent::__construct();
    }

}
