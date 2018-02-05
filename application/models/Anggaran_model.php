<?php

class Anggaran_model extends MY_Model {

    public $table = 'anggaran';

    public $fillable = [
        'desa_id', 'jumlah', 'tahun'
    ];

    public $rules = [
        [
            'field' => 'Anggaran[desa_id]',
            'label' => 'Desa',
            'rules' => 'required'
        ], [
            'field' => 'Anggaran[jumlah]',
            'label' => 'Jumlah',
            'rules' => 'required|numeric'
        ], [
            'field' => 'Anggaran[tahun]',
            'label' => 'Tahun',
            'rules' => 'required|numeric'
        ]
    ];

    public function __construct()
    {
        parent::__construct();
    }

}
