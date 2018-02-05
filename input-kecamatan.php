<?php

$file = fopen("kecamatan");

while (!foef($file)) {
    $line = fgets($file);

    if (strpos($line, "Kecamatan")) {
        $this->db->insert("kecamatan", [
            "nama" => str_replace("Kecamatan ", "", $line)
        ]);
        $kecamatan_id = $this->db->inser_id();
    }

    else {
        $this->db->insert("kelurahan", [
            "kecamatan_id" => $kecamatan_id,
            "nama" => $line
        ]);
    }
}
