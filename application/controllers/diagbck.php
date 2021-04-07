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
    // $data['k'] = $this->m_diagnosis->get2()->result_array();

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

    // print_r($dp);
    // print_r($gejala);
    // print_r($penyakit);

    // $jumlah  = $this->input->post('jumlahnilai_bobot');
    // $hasil1  = $this->input->post('phi');
    // $jumlah2 = $this->input->post('evidence');
    // $hasil2  = $this->input->post('phie');
    // $hasilJumlah = $this->input->post('hasil');

    // ini perhitungan
    foreach ($penyakit as $pen) {
      $jumlah = 0;
      $jumlah2 = 0;
      $jumlah3 = 0;
      $ya = 1;
      $pngkt = 2;
      $itu = [];
      $hasil1 = [];
      $hasil2 = [];
      $pow = [];
      if (isset($dp[$pen['kode_penyakit']])) {
        // echo $pen['kode_penyakit'];
        foreach ($dp[$pen['kode_penyakit']] as $itung) {
          // echo $itung['nilai_bobot'];
          $jumlah = $jumlah + $itung['nilai_bobot'];
          $itu[] = $itung['nilai_bobot'];
        }
        // print_r($itu);
        foreach ($itu as $i => $value) {
          $hasil1[] = $value * $ya;
          $pow[] = pow($hasil1[$i],$pngkt);
          $jumlah = $jumlah + $pow[$i];
          $jumlah2 = sqrt($jumlah);
          // $jumlah2 = $jumlah2 + ($a * $value);
          // echo $jumlah2."<br>";
        }
        // print_r($hasil1);
        // print_r($pow);
        // // print_r($jumlah);
        // print_r($jumlah2);

        foreach ($itu as $l => $alue) {
          $hasil2[] = ($hasil1[$l] * $alue) / $jumlah2;
          $a = ($hasil1[$l] * $alue) / $jumlah2;
          $jumlah3 = $jumlah3 + ($alue * $a);
        }
        $hasil_akhir[$pen['kode_penyakit']] = $jumlah3 * 100;
        $hasil_akhir[] = array (
          'nama_penyakit' => $pen['nama_penyakit'],
          'kode_penyakit' => $pen['kode_penyakit'],
          'presentase'    => $jumlah2 * 100,
        );
        $hasilJumlah[] = $jumlah2 * 100;
      }
    }
    // jumlah evidence print_r($jumlah);

     // perhitungan 2 p(hi) print_r($hasil1);

     // hasil 3 print_r($jumlah2);

    // perhitungan 4 p(hi|e) print_r($hasil2);

   
    // hasil akhir print_r($jumlah3);
    // print_r($jumlah);
    // print_r($hasil1);
    // print_r($jumlah2);
    // print_r($hasil2);
    // print_r($hasilJumlah);
    // print_r($hasil_akhir);

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
      // foreach ($hasilAkhir as $has) {
      //   $tampil_hasil = array (
      //     'nama_penyakit' => $has['nama_penyakit'],
      //     'kode_penyakit' => $has['kode_penyakit'],
      //     'presentase'    => $has['presentase']
      //   );
      // }
      foreach ($hasilAkhir as $has) {
      $tampil_hasil = array (
          'nama_penyakit' => $this->input->post("nama_penyakit"),
          'kode_penyakit' => $this->input->post("kode_penyakit"),
          'presentase'    => $this->input->post("presentase"),
        );
    	 // $this->D_diag->update($tampil_hasil);
    }
       //  $sbayes = $this->D_gejala->save();
       // redirect('H_diagnosa');
    }
       // print_r($tampil_hasil);
    	// $this->template->load('static1','H_diagnosa',$tampil_hasil);
    	// redirect('H_diagnosa');
    // print_r($hasilAkhir);
    // print_r($newHasilAkhir);
    // print_r($dp);

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