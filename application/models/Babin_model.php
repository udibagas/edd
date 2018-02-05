<?php

class Babin_model extends MY_Model {

    public $table = 'babin';

    public $fillable = [
        'nama', 'no_hp', 'pangkat', 'nrp'
    ];

    public $rules = [
        [
            'field' => 'Babin[nama]',
            'label' => 'Nama',
            'rules' => 'required'
        ]
    ];

    public function __construct()
    {
        parent::__construct();
    }

}
