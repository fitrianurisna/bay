        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Edit Gejala</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            <h2> Edit Penyakit</h2> 
                        </div> -->
                        <!-- /.panel-heading -->
                         <div class="panel-body" align="center">
                          <form action="<?php echo base_url().'Gejala/update/';?>" method="post">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td>
                                            <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 ">Nama Gejala</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <?php echo form_input('nama_gejala',$gejala['nama_gejala']); ?>
                                                <?php echo form_hidden('kode_gejala',$gejala['kode_gejala']); ?>

                                            </div>
                                            </div>

                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Back</button>
                                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                                        </td>
                                    </tr>
                                    
                                    
                                </thead>
                                </form>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
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
