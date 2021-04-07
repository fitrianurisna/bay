<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('D_diag');
	
	}

	public function index()
	{
		$data["gejala"] = $this->D_diag->gabungan();
		$data["gabung"] = $this->D_diag->tampildata();


		$this->template->load('static1','diagnosa',$data);
	}
	public function proses()
  {

    echo "<pre>";
    $penyakit = $this->D_diag->get()->result_array();

    foreach ($this->input->post('select') as $key => $value) {
      $gejala[$value] = $this->D_diag->get2($value)->result_array();
    }

    // ini untuk pengelompokan kegala ke penyakit
    foreach ($gejala as $key => $value) {
      foreach ($penyakit as $p) {
        // $dp[$p['kode_penyakit']] = array();
        foreach ($gejala[$key] as $g) {
          if ($g['penyakit_kode'] == $p['kode_penyakit']) {
            $dp[$p['kode_penyakit']][] = array(
              'kode_gejala' => $g['kode_gejala'],
              'nama_gejala' => $g['nama_gejala'],
              'nilai_bobot' => $g['nilai_bobot'],
            );
          }
        }
      }
    }


    // ini perhitungan
    foreach ($penyakit as $pen) {
      $jumlah = 0;
      $jumlah2 = 0;
      $ya = 1;
      $pngkt = 2;
      $itu = [];
      $hasil1 = [];
      $pow = [];
      if (isset($dp[$pen['kode_penyakit']])) {
        // echo $pen['kode_penyakit'];
        foreach ($dp[$pen['kode_penyakit']] as $itung) {
          // echo $itung['nilai_bobot'];
          // $jumlah = $jumlah + pow( $ya * $itung['nilai_bobot'],$pngkt);
          $itu[] = $itung['nilai_bobot'];
        }
        // print_r($itu);
        foreach ($itu as $i => $value) {
          $hasil1[] = $value * $ya;
          $pow[] = pow($hasil1[$i],$pngkt);
          $jumlah = $jumlah + $pow[$i];
          $jumlah2 = sqrt($jumlah);
        }
        print_r($hasil1);
        print_r($pow);
        // print_r($jumlah);
        print_r($jumlah2);

        $hasil_akhir[] = array (
          'nama_penyakit' => $pen['nama_penyakit'],
          'kode_penyakit' => $pen['kode_penyakit'],
          'presentase'    => $jumlah2 * 100,
        );
        $hasilJumlah[] = $jumlah2 * 100;
      }
    }

    $maxJumlah = max($hasilJumlah);
    $newHasilAkhir = array_filter($hasil_akhir, function($hasil) use ($maxJumlah) {
      if ($hasil['presentase'] == $maxJumlah) {
        return true;
      }
      return false;
    });

    if (count($newHasilAkhir) == 1) {
      foreach ($newHasilAkhir as $has) {
        $tampil_hasil = array (
          'nama_penyakit' => $has['nama_penyakit'],
          'kode_penyakit' => $has['kode_penyakit'],
          'presentase'    => $has['presentase']
        );
      }
    }else if(count($newHasilAkhir) > 1){
      foreach ($newHasilAkhir as $value) {
        $jmlhGejala[$value['kode_penyakit']] = count($dp[$value['kode_penyakit']]);
      }
      $maxGejala = max($jmlhGejala);
      $newGejalaMax = array_filter($jmlhGejala, function($angka) use($maxGejala) {
        if ($angka == $maxGejala) {
          return true;
        }
        return false;
      });
      $kdPenyakit = array_keys($newGejalaMax);
      $hasilAkhir = array_filter($hasil_akhir, function($hasil) use ($kdPenyakit) {
        if ($hasil['kode_penyakit'] == $kdPenyakit[0]) {
          return true;
        }
        return false;
      });
      
      foreach ($hasilAkhir as $has) {
      $tampil_hasil = array (
          'nama_penyakit' => $this->input->post("nama_penyakit"),
          'kode_penyakit' => $this->input->post("kode_penyakit"),
          'presentase'    => $this->input->post("presentase"),
        );
    	 // $this->D_diag->update($tampil_hasil);
    }
     
    }

		    echo "</pre>";

		    $no = 1;
		    echo "Penyakit Terdeteksi <strong>".$tampil_hasil['nama_penyakit']."</strong> dengan nilai ".number_format($tampil_hasil['presentase'],6)."%<br><br>";

		    echo "Gejala yang dipilih :<br>";
		    foreach ($dp as $id => $value) {
		      foreach ($dp[$id] as $gej) {
		        echo $no++.". ".$gej['nama_gejala']."<br>";
      }
    }
  }
}