<?php

class Kecamatan_model extends MY_Model {

    public $table = 'kecamatan';

    public $fillable = [
        'nama', 'kode', 'camat_id', 'kapolsek_id'
    ];

    public $rules = [
        [
            'field' => 'Kecamatan[nama]',
            'label' => 'Kecamatanname',
            'rules' => 'required'
        ]
    ];

    public function __construct()
    {
        parent::__construct();
    }

}
