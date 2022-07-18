<?php

namespace App\Services;

use App\Models\Nilai;

class NilaiService implements INilaiService
{
    protected $nilaiModel;
    public function __construct(Nilai $nilaiModel)
    {
        $this->nilaiModel = $nilaiModel;
    }

    public function add(array $data)
    {
        $x = $data['nilai'];

        // Logic untuk setiap Nilai
        $a = $x >= 85; // x lebih besar sama dengan 85
        $b = $x >= 75;  // x Lebih kecil dari 85
        $c = $x >= 65;  // x lebih kecil dari 75
        $d = $x >= 50; //x Lebih kecil dari 65
        $e = $x < 50; //x Lebih kecil dari 50

        if ($a == true) {
            $grade = "A";
        } elseif ($b == true) {
            $grade = "B";
        } elseif ($c == true) {
            $grade = "C";
        } elseif ($d == true) {
            $grade = "D";
        } else {
            $grade = "E";
        }

        $this->nilaiModel->create([
            'mahasiswa_id' => $data['mahasiswa_id'],
            'matakuliah_id' => $data['matakuliah_id'],
            'nilai' => $data['nilai'],
            'grade' => $grade,
        ]);
    }
}
