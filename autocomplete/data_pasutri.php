<?php
header("Content-Type: application/json; charset=UTF-8");
include "../connect.php";


$nik = $_GET["query"];

// Query ke database.
$query  = mysqli_query($connect, "SELECT biodata_wni.NIK,biodata_wni.NAMA_LGKP,biodata_wni.NO_KK FROM biodata_wni,data_keluarga WHERE biodata_wni.NIK LIKE '%$nik%' AND data_keluarga.NO_KK=biodata_wni.NO_KK AND JENIS_KLMIN='1' AND STAT_KWN='2' ORDER BY biodata_wni.NAMA_LGKP");

// Format bentuk data untuk autocomplete.
while ($data = mysqli_fetch_array($query)) {
    $qi = mysqli_query($connect, "SELECT * FROM data_keluarga,biodata_wni WHERE biodata_wni.NO_KK=data_keluarga.NO_KK AND biodata_wni.NO_KK='$data[NO_KK]' AND biodata_wni.STAT_HBKEL='3'");
    $istri = mysqli_fetch_array($qi);
    $output['suggestions'][] = [
        'value' => $data['NIK'] . " - " . $data['NAMA_LGKP'],
        'nik'  => $data['NIK'],
        'no_kk' => $data['NO_KK'],
        'nama' => $data['NAMA_LGKP'],
        'nik_istri' => $istri['NIK'],
        'nama_istri' => $istri['NAMA_LGKP'],
        'nik_kk'  => $data['NIK_KK'],
        'nama_kep' => $data['NAMA_KEP'],
        'alamat' => $data['ALAMAT'],
        'dusun' => $data['DUSUN'],
        'rt' => $data['NO_RT'],
        'rw' => $data['NO_RW'],
        'kd_pos' => $data['KODE_POS']
    ];
}

if (!empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
