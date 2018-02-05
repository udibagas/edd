<?php

class DetailAnggaran_model extends MY_Model {

    public $table = 'detail_anggaran';

    public $fillable = [
        'anggaran_id', 'realisasi_biaya', 'anggaran_biaya',
        'keterangan', 'bentuk_fisik_bangunan', 'tahap', 'foto'
    ];

    public $rules = [
        [
            'field' => 'DetailAnggaran[anggaran_id]',
            'label' => 'Anggaran',
            'rules' => 'required'
        ], [
            'field' => 'DetailAnggaran[realisasi_biaya]',
            'label' => 'Realisasi Biaya',
            'rules' => 'required|numeric'
        ], [
            'field' => 'DetailAnggaran[anggaran_biaya]',
            'label' => 'Anggaran Biaya',
            'rules' => 'required|numeric'
        ], [
            'field' => 'DetailAnggaran[bentuk_fisik_bangunan]',
            'label' => 'Bentuk Fisik Bangunan',
            'rules' => 'required'
        ]
    ];

    public function __construct()
    {
        parent::__construct();
    }

}
