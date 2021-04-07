        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Aturan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Aturan 
                        </div>
                        <!-- /.panel-heading -->
                         <div class="panel-body" align="center">
                          <form action="<?php echo base_url().'Brhsluts/update/';?>" method="post">
                            <div class="col-md-1">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addNewdosen">Tambah Data Aturan</button>
                            </div>
                            <br><br>

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penyakit</th>
                                        <th>Nama Gejala</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                     <!-- <?php 
                                        $no = 1;
                                        foreach ($Aturan as $p)  {?>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $p->kode_Aturan; ?></td>
                                        <td><?php echo $p->nama_Aturan; ?></td>
                                        <td>
                                            <button type="button" class=""><?php echo anchor('Aturan/edit/' . $p->kode_Aturan,'Edit Aturan' ); ?></button> 
                                            <button type="button" class="btn btn-danger"><?php echo anchor('Aturan/delete/' . $p->kode_Aturan,'Hapus' ); ?></button>
                                        </td>
                                        
                                    </tr>
                                    <?php } ?> -->
                                </tbody>
                                </form>
                            </table>

                            <form action="<?php echo base_url('Aturan/add'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal fade" id="addNewdosen" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="col-md-3"  id="exampleModalLabel">Tambah Data Aturan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Nama Penyakit</label>
                                    <div class="col-md-9 col-sm-9 ">
                                      <select class="form-control" class="custom-select" name="penyakit">
                                        <option selected>Option</option>
                                        <?php 
                                        $no =1;
                                        foreach ($penyakit as $r) { ?>
                                          <option value="<?php echo $r->kode_penyakit; ?>"><?php echo $r->nama_penyakit; ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Nama Gejala</label>
                                    <div class="col-md-9 col-sm-9 ">
                                      <?php 
                                        $no = 1;
                                        foreach ($gejala as $p)  {?>
                                        <div class="modal-checkbox">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="gejala[]" type="checkbox" value="<?php echo $p->kode_gejala; ?>"> <?php echo $p->nama_gejala; ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php }  ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                </div>
                            </form>

                            
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- <form action="<?php echo base_url('Penyakit/add'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal fade" id="editpenyakit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="col-md-3"  id="exampleModalLabel">Edit Penyakit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Nama Penyakit</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input class="form-control" type="text" name="nama_penyakit" placeholder="Nama Penyakit">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                </div>
                            </form> -->
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
