<?php

namespace App\Http\Controllers\Mining;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MiningController extends Controller
{
    private $kalimat = 'Pak Isran pantas berhasil menjadi gubernur';
    private $kataAbaikan = array();
    private $kataNegatifPrefix = array();
    private $kamus_kata = array();
    private $minimalPanjangToken = 1;
    private $maksimalPanjangToken = 15;
    private $kelas_opini = array('positif', 'negatif');
	private $jumlahKelasToken = array('positif' => 0, 'negatif' => 0);
	private $jumlahKelasDoc = array('positif' => 0, 'negatif' => 0);
    private $jumlahToken = 0;
    private $jumlahDoc = 0;
    private $prior = array('positif' => 0.5, 'negatif' => 0.5);

    public function __construct() {
        $this->loadKamus();

        $this->kataAbaikan = $this->loadList('ignore');
        $this->kataNegatifPrefix = $this->loadList('prefix');
	}

    public function index()
    {
        return $this->kategoriOpini($this->kalimat);
    }

    public function score($kalimat)
    {
		foreach ($this->kataNegatifPrefix as $kataNegatif) {
			if (strpos($kalimat, $kataNegatif) !== false) {
				$kalimat = str_replace($kataNegatif . ' ', $kataNegatif, $kalimat);
			}
        }

		$tokens = $this->tokenizeKata($kalimat);

		$total_nilai = 0;
        $nilai = array();

		foreach ($this->kelas_opini as $kelas) {

			$nilai[$kelas] = 1; //1

			foreach ($tokens as $token) { //pantas
                if (strlen($token) > $this->minimalPanjangToken && strlen($token) < $this->maksimalPanjangToken && !in_array($token, $this->kataAbaikan)) { //true,true,true
                    //pantas
					if (isset($this->kamus_kata[$token][$kelas])) { //true
                        $count = $this->kamus_kata[$token][$kelas]; //1
                        // print_r($count);
					} else {
                        $count = 0; //false
                        // print_r($count);
					}
                    $nilai[$kelas] *= ($count + 1);
				}
			}
            $nilai[$kelas] = $this->prior[$kelas] * $nilai[$kelas];
        }

		foreach ($this->kelas_opini as $kelas) {
            $total_nilai += $nilai[$kelas];
        }

		foreach ($this->kelas_opini as $kelas) {
            $nilai[$kelas] = round($nilai[$kelas] / $total_nilai, 3);
        }

        print_r($nilai);

        exit();

		arsort($nilai);

		return $nilai;
    }

    public function kategoriOpini($kalimat) {

		$nilai = $this->score($kalimat);

        $klasifikasi = key($nilai);

		return $klasifikasi;
	}

    public function tokenizeKata($string)
    {
        $string = str_replace("\r\n", " ", $string);
		$string = $this->_bersihKata($string);
		$string = strtolower($string);
        $matches = explode(" ", $string);

		return $matches;
    }

    private function _bersihKata($string) {

		$diac =
				/* A */ chr(192) . chr(193) . chr(194) . chr(195) . chr(196) . chr(197) .
				/* a */ chr(224) . chr(225) . chr(226) . chr(227) . chr(228) . chr(229) .
				/* O */ chr(210) . chr(211) . chr(212) . chr(213) . chr(214) . chr(216) .
				/* o */ chr(242) . chr(243) . chr(244) . chr(245) . chr(246) . chr(248) .
				/* E */ chr(200) . chr(201) . chr(202) . chr(203) .
				/* e */ chr(232) . chr(233) . chr(234) . chr(235) .
				/* Cc */ chr(199) . chr(231) .
				/* I */ chr(204) . chr(205) . chr(206) . chr(207) .
				/* i */ chr(236) . chr(237) . chr(238) . chr(239) .
				/* U */ chr(217) . chr(218) . chr(219) . chr(220) .
				/* u */ chr(249) . chr(250) . chr(251) . chr(252) .
				/* yNn */ chr(255) . chr(209) . chr(241);

		return strtolower(strtr($string, $diac, 'AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn'));
    }

    private function loadKamus()
    {
        foreach($this->kelas_opini as $kelas) {
            $fileKamus = __DIR__ . "/data/data.{$kelas}.php";

            if (file_exists($fileKamus)) {
                $temp = file_get_contents($fileKamus);
                $katas = unserialize($temp);
            } else {
                echo 'File does not exist: ' . $fileKamus;
            }

            foreach ($katas as $kata) {

                $this->jumlahDoc++;
                $this->jumlahKelasDoc[$kelas]++;

                $kata = trim($kata);

                if (!isset($this->kamus_kata[$kata][$kelas])) {
                    $this->kamus_kata[$kata][$kelas] = 1;
                }

                $this->jumlahKelasToken[$kelas]++;
                $this->jumlahToken++;
            }
        }
    }

    public function loadList($type) {
		$barisKata = array();

        $fileKata =  __DIR__ . "/data/data.{$type}.php";

		if (file_exists($fileKata)) {
			$temp = file_get_contents($fileKata);
			$katas = unserialize($temp);
		} else {
			return 'File does not exist: ' . $fileKata;
		}

		foreach ($katas as $kata) {
			$kata = stripcslashes($kata);
			$potongKata = trim($kata);
			array_push($barisKata, $potongKata);
		}
		return $barisKata;
	}
}
