<div class="page-header">
							<h1>
								Data Harga Mobil 
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						
						<?php  include 'notif.php';  ?>
						<div class="container-fluid bg-3"  > 

  <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   Add Harga
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
   <?php
                            include "config/config.php";
                            $sql="select * from mobil where id_mobil='$_GET[id_mobil]'";

                            $tampil=mysql_query($sql);
                            $data=mysql_fetch_array($tampil);
                        ?>
						<form method="post" action="control/input_harga.php" class="form-horizontal">
														  <!-- CKEditor -->
								<div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
															<input type="hidden" name="id_mobil" value="<?php echo $data['id_mobil']; ?>"   required  class="col-xs-12 col-sm-6" />
																<input type="hidden" name="mobil" value="<?php echo $data['mobil']; ?>"   required  class="col-xs-12 col-sm-6" />
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Type :</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="type" required  class="col-xs-12 col-sm-6" />
																	</div>
																</div>
															</div>
															
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Harga :</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="harga" required  class="col-xs-12 col-sm-6" />
																	</div>
																</div>
															</div>
															
															
															
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email"></label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<button class="btn btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Cancel
												</button>
												<button type="submit"  class="btn btn-success">
													<span class="fa fa-save"></span> &nbsp; Save
													</button>
																	</div>
																</div>
															</div>
															
																

												

														</form>
		</div></div>
		</div>
		</div>
		</div>
		</div>
		</div>

			
						<hr>

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
								
									<div class="col-xs-12">
									 <?php 
//        includekan fungsi paginasi
        include 'pagination1.php';
//        koneksi ke database
     include "config/config.php";
//        query
$input=$_POST[tcari];
        $sql =  "SELECT * FROM harga where id_mobil='$_GET[id_mobil]' ORDER BY harga asc";
        $result = mysql_query($sql);
        
        //pagination config start
        $rpp = 20; // jumlah record per halaman
        $reload = "index.php?p=fitur";
        $page = intval($_GET["page"]);
        if($page<=0) $page = 1;  
        $tcount = mysql_num_rows($result);
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
        $count = 0;
        $i = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
        //pagination config end
        ?><div class="table-responsive">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">
														#
													</th>
													<th> Type</th>
													<th> Harga</th>
													
													
													
													<th >Action</th>

													
												</tr>
											</thead>

											<tbody>
											 <?php
                    while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $data = mysql_fetch_array($result);
                    ?>
												<tr>
													<td class="center">
														<?php echo ++$id;?> 
													</td>

													

													<td><?php echo $data['type'];  ?></td>
													<td>Rp. <?php echo $data['harga'];  ?></td>
													
													
													
													
													

													<td>
							<form method="post" action="control/hapus_harga.php" class="form-horizontal">
							<input type="hidden" name="id_mobil" value="<?php echo $data['id_mobil']; ?>"   required  class="col-xs-12 col-sm-6" />
							<input type="hidden" name="id_harga" value="<?php echo $data['id_harga']; ?>"   required  class="col-xs-12 col-sm-6" />
															

										<button type="submit" class="btn btn-xs btn-danger">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</button>

													</form>		 
														

														
													</td>
												</tr>

												
											</tbody>
											 <?php
										$i++; 
										$count++; } ?>
										</table></div>
										<div align="center">
            <div><?php echo paginate_one($reload, $page, $tpages); ?></div>
        </div>
									</div><!-- /.span -->
								</div><!-- /.row -->