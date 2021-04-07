 <section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            </div>
                <div class="container">
                    <div class="text text-center w-100">
                        <h2 class="mb-2">SISTEM PAKAR DIAGNOSA PENYAKIT PADA TANAMAN PISANG <br>DENGAN METODE EUCLIDEAN PROBABILITY</h2>
                </div>

                <table width="100%" class="table table-striped table-bordered table-hover">
                    <form action="<?php echo base_url().'Diagnosa/proses/';  ?>" method="post">
                <thead>
                            <div class="modal-header">
                                <h5 class="col-md-8"  id="exampleModalLabel">Pilih Gejala Berdasarkan Kondisi Tanaman Pisang</h5>
                            </div>
                            <tr>
                                <th>No</th>
                                <th>Nama Gejala</th>
                            </tr>
                </thead>
                <tbody>
                      <?php 
                        $no = 1;
                        $gejala =$this->db->get('gejala')->result();
                        foreach ($gejala as $p)  {?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><input type="checkbox" name="select[]" value="<?php echo $p->kode_gejala?>"> <?php echo $p->nama_gejala ?></td>
                        </tr>
                        <?php }  ?>
                  </tbody>
            </table>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-ok"></span>Diagnosa</button>
                        </div>
                    </div>
                </div>
            </form>

            </section>