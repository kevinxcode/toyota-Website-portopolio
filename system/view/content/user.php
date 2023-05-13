<div class="page-header">
							<h1>
								Data User
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						
						<?php  include 'notif.php';  ?>
						<div class="container-fluid bg-3"  > 

  <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   Add Data User
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
   
						<form method="post" action="control/input_user.php" class="form-horizontal">
														

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Nama Admin:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="nama_admin" required  class="col-xs-12 col-sm-6" />
																	</div>
																</div>
															</div>
															
																<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Email Admin:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="email_admin" required  class="col-xs-12 col-sm-6" />
																	</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">username:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="username" required   class="col-xs-12 col-sm-6" />
																	</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Pasword:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="password" name="password"  required class="col-xs-12 col-sm-6" />
																	
																	</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email"> user:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<select  name="user" class="select2" data-placeholder="Click to Choose..." >
																		<option value="">&nbsp;</option>
																		<option value="admin">admin</option>
																	
																	</select>
																	</div>
																</div>
															</div>

												<div class="wizard-actions">
												<button class="btn btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Cancel
												</button>
												<button type="submit"  class="btn btn-success">
													<span class="fa fa-save"></span> &nbsp; Save
													</button>
												
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
        $sql =  "SELECT * FROM tb_admin ORDER BY id_admin desc";
        $result = mysql_query($sql);
        
        //pagination config start
        $rpp = 10; // jumlah record per halaman
        $reload = "index.php?p=galery";
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
													<th>Nama admin</th>
													<th>Email</th>
													<th>username</th>
													
													
													<th>Status</th>
													
													
													
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

													

													<td><?php echo $data['nama_admin'];  ?></td>
													<td><?php echo $data['email_admin'];  ?></td>
													
													<td><?php echo $data['username'];  ?></td>
													<td><?php echo $data['user'];  ?></td>
													
													
													
													

													<td>
													
															

															<a  href="index.php?p=edit_user&&id_admin=<?php echo $data['id_admin']; ?>"><button class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</button></a>

															<a href="control/hapus_user.php?id_admin=<?php echo $data['id_admin']; ?>"><button class="btn btn-xs btn-danger">
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