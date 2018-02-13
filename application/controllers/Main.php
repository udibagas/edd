<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function index()
	{
		$this->render('home', [
            'kecamatan' => $this->db
                    ->order_by('nama', 'ASC')
                    ->get('kecamatan')
                    ->result()
        ]);
	}

	public function galeri()
	{
		$kecamatan_id = $this->input->get('kecamatan_id');
		$q = $this->input->get('q');

		$this->breadcrumbs = [
			'#' => 'GALERI'
		];

		$condition = $kecamatan_id ? "kecamatan.id = $kecamatan_id" : "1=1";

		$this->render('galeri', [
			'kecamatan' => $this->db
					->order_by('nama', 'ASC')
					->get('kecamatan')
					->result(),
			'filter_kecamatan' => $this->db
					->where('id', $this->input->get('kecamatan_id'))
					->get('kecamatan')
					->row(),
            'galeri' => $this->db
					->select('detail_anggaran.*, desa.nama as desa, kecamatan.nama as kecamatan')
					->where($condition)
					->group_start()
						->or_like('desa.nama', $q)
						->or_like('kecamatan.nama', $q)
						->or_like('detail_anggaran.bentuk_fisik_bangunan', $q)
					->group_end()
					->join('anggaran', 'anggaran.id = detail_anggaran.anggaran_id')
					->join('desa', 'desa.id = anggaran.desa_id')
					->join('kecamatan', 'kecamatan.id = desa.kecamatan_id')
                    ->order_by('id', 'DESC')
                    ->get('detail_anggaran')
                    ->result()
        ]);
	}

	public function about()
	{
		$this->breadcrumbs = [
			'about' => 'TENTANG KAMI'
		];

		$this->render('about');
	}

    public function seed()
    {
        $file = fopen("katingan", "r");

        while (!feof($file)) {
            $line = fgets($file);
            $line = str_replace("\n", "", $line);

            // cari yang ada tulisan kecamatan
            preg_match('/^Kecamatan/', $line, $matches);

            if ($matches) {
                $this->db->insert("kecamatan", [
                    "nama" => str_replace("Kecamatan ", "", $line)
                ]);
                $kecamatan_id = $this->db->insert_id();
            }

            else {
                $this->db->insert("desa", [
                    "kecamatan_id" => $kecamatan_id,
                    "nama" => $line
                ]);
            }

            echo $line."\n";
        }
    }
}
