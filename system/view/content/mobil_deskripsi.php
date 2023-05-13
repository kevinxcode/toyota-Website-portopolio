<div class="page-header">
							<h1>
								Data Mobil Deksripsi
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						
						<?php  include 'notif.php';  ?>
						<div class="container-fluid bg-3"  > 

  <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   ADD Deksripsi
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
						<form method="post" action="control/input_deskripsi.php" class="form-horizontal">
														  <!-- CKEditor -->
								<div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
															<input type="hidden" name="id_mobil" value="<?php echo $data['id_mobil']; ?>"   required  class="col-xs-12 col-sm-6" />
																<input type="hidden" name="mobil" value="<?php echo $data['mobil']; ?>"   required  class="col-xs-12 col-sm-6" />
																
															<!-- CKEditor -->
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Deskripsi:</label>
																	
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<textarea id="ckeditor" name="deskripsi" ></textarea>
																	</div>
																</div>
															</div>
															<!-- Jquery Core Js -->
															<script src="ckeditor/jquery/jquery.min.js"></script>
															<!-- Ckeditor -->
															<script src="ckeditor/ckeditor.js"></script>
																<script src="ckeditor/editors.js"></script>
															<!-- #END# CKEditor -->
															
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
        $sql =  "SELECT * FROM mobil_deskripsi where id_mobil='$_GET[id_mobil]' ORDER BY id_mobil desc";
        $result = mysql_query($sql);
        
        //pagination config start
        $rpp = 20; // jumlah record per halaman
        $reload = "index.php?p=mobil_deskripsi";
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
													<th> Mobil</th>
													<th> Deksripsi</th>
													
													
													
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

													

													<td><?php echo $data['mobil'];  ?></td>
													<td><?php echo $data['deskripsi'];  ?></td>
													
													
													
													
													

													<td>
													

															<a href="control/hapus_deskripsi.php?id_deskripsi=<?php echo $data['id_deskripsi']; ?>"><button class="btn btn-xs btn-danger">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</button></a>

															 
														

														
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