<div class="page-header">
							<h1>
								Data Mobil
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						
						<?php  include 'notif.php';  ?>
						<div class="container-fluid bg-3"  > 

  <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   ADD MOBIL
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
   
						<form method="post" action="control/input_mobil.php" class="form-horizontal">
														

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Nama Mobil:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="mobil" required  class="col-xs-12 col-sm-6" />
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
        $sql =  "SELECT * FROM mobil ORDER BY id_mobil ASC";
        $result = mysql_query($sql);
        
        //pagination config start
        $rpp = 20; // jumlah record per halaman
        $reload = "index.php?p=post_mobil";
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
													
													
													
													
													
													

													<td>
													
															

															<a  href="index.php?p=mobil_foto&&id_mobil=<?php echo $data['id_mobil']; ?>"><button class="btn btn-xs btn-info">
																HARGA & FOTO
															</button></a>
															<!-- /.span --
															<a  href="index.php?p=harga&&id_mobil=<?php echo $data['id_mobil']; ?>"><button class="btn btn-xs btn-info">
																PriceList
															</button></a>
															<!-- /.span -->
															<a  href="index.php?p=mobil_deskripsi&&id_mobil=<?php echo $data['id_mobil']; ?>"><button class="btn btn-xs btn-info">
																Deskripsi
															</button></a>
															
															<a  href="index.php?p=spek&&id_mobil=<?php echo $data['id_mobil']; ?>"><button class="btn btn-xs btn-info">
																Spesifikasi
															</button></a>
															<!-- /.span --
															<a  href="index.php?p=fitur&&id_mobil=<?php echo $data['id_mobil']; ?>"><button class="btn btn-xs btn-info">
																Fitur
															</button></a>
															<!-- /.span -->
															
															<a  href="index.php?p=video&&id_mobil=<?php echo $data['id_mobil']; ?>"><button class="btn btn-xs btn-info">
																Video
															</button></a>
															<!-- /.span --

															<a href="control/hapus_mobil.php?id_mobil=<?php echo $data['id_mobil']; ?>"><button class="btn btn-xs btn-danger">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</button></a>
															<!-- /.span -->

															 
														

														
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