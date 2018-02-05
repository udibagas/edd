<?php

class Kapolsek_model extends MY_Model {

    public $table = 'kapolsek';

    public $fillable = [
        'nama', 'no_hp', 'pangkat', 'nrp'
    ];

    public $rules = [
        [
            'field' => 'Kapolsek[nama]',
            'label' => 'Nama',
            'rules' => 'required'
        ]
    ];

    public function __construct()
    {
        parent::__construct();
    }

}
