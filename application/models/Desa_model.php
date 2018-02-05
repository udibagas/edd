<?php

class Desa_model extends MY_Model {

    public $table = 'desa';

    public $fillable = [
        'nama', 'kode', 'kecamatan_id', 'babin_id', 'kades_id'
    ];

    public $rules = [
        [
            'field' => 'Desa[nama]',
            'label' => 'Nama Desa',
            'rules' => 'required'
        ], [
            'field' => 'Desa[kecamatan_id]',
            'label' => 'Kecamatan',
            'rules' => 'required'
        ], /*[
            'field' => 'Desa[babin_id]',
            'label' => 'Bhabinkamtibnas',
            'rules' => 'required'
        ], [
            'field' => 'Desa[kades_id]',
            'label' => 'Kades',
            'rules' => 'required'
        ]*/
    ];

    public function __construct()
    {
        parent::__construct();
    }

}
