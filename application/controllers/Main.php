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
		$this->breadcrumbs = [
			'#' => 'GALERI'
		];
		$this->render('galeri', [
            'galeri' => $this->db
					->select('detail_anggaran.*, desa.nama as desa')
					->join('anggaran', 'anggaran.id = detail_anggaran.anggaran_id')
					->join('desa', 'desa.id = anggaran.desa_id')
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
