
<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'config/dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		
		
		$id_mobil = $_POST['id_mobil'];// 
		
		
		$mobil = $_POST['mobil'];// 
		$harga = $_POST['harga'];// 
		
		
		$imgFile = $_FILES['file_foto']['name'];
		$tmp_dir = $_FILES['file_foto']['tmp_name'];
		$imgSize = $_FILES['file_foto']['size'];
		
		
		if(empty($id_mobil)){
			echo "<script>alert('Nama Siswa Kosong'); window.location = 'post_mobil'</script>";
		}
		else if(empty($mobil)){
			$errMSG = "Please Enter Your Job Work.";
		}
		else if(empty($imgFile)){
			echo "<script>alert('File Foto siswa Tidak Ada'); window.location = 'post_mobil'</script>";
		}
		else
		{
			$upload_dir = 'upload_foto/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'JPEG', 'GIF', 'JPG', 'PNG'); // valid extensions
		
			// rename uploading image
			//$userpic = rand(1000,1000000).".".$imgExt;
		
			$file_foto = $id_mobil."-".rand(100,10000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 2600000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$file_foto);
				}
				else{
					
					echo "<script>alert('Sorry, your file is too large. MAX 2,5 MB'); window.location = 'post_mobil'</script>";
				}
			}
			else{
				echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); window.location = 'post_mobil'</script>";
						
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO mobil_foto(id_mobil,mobil,harga,file_foto) 
			VALUES(:uname, :mobil, :harga, :file_foto)');
			$stmt->bindParam(':uname',$id_mobil);
			$stmt->bindParam(':mobil',$mobil);
			$stmt->bindParam(':harga',$harga);
			
			
			$stmt->bindParam(':file_foto',$file_foto);
			
			if($stmt->execute())
			{
				
				 echo "<script>alert('Upload Success'); window.location = 'post_mobil'</script>";
				
			}
			else
			{
				 echo "<script>alert('Upload Gagal'); window.location = 'post_mobil'</script>";
			}
		}
	}
?>

           <!-- Horizontal Layout -->
          
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h4>
                                
                            </h2>
                           
                        </div>
                        <div class="body">
						<div class="alert alert-warning">
									<i class="ace-icon fa fa-hand-o-right"></i>

									Foto header
									<button class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>
								</div>
						

   
			
			
														

														<form method="post" enctype="multipart/form-data" class="form-horizontal">
														
														

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">  </label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="hidden" name="header"  value="header"  class="col-xs-12 col-sm-6" />
																	
																		<input type="hidden" name="id_mobil"   value="-"  class="col-xs-12 col-sm-6" />
																		<input type="hidden" name="isi_berita"   value="-"  class="col-xs-12 col-sm-6" />
																	</div>
																</div>
															</div>
															
														
															

															
															<div class="hr hr-dotted"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Foto Header:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input class="input-group" type="file" name="file_foto" accept=""/>
																	</div>
																</div>
															</div>
															
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email"> </label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																	
												<button type="submit" name="btnsave" class="btn btn-success">
													<span class="fa fa-save"></span> &nbsp; Save
													</button>
																	</div>
																</div>
															</div>
												

														</form>
			 <!-- #END# add data   -->

								


<?php 
//        includekan fungsi paginasi
        include 'pagination1.php';
//        koneksi ke database
     include "config/config.php";
//        query
$input=$_POST[tcari];
        $sql =  "SELECT * FROM header ORDER BY id_header desc";
        $result = mysql_query($sql);
        
        //pagination config start
        $rpp = 20; // jumlah record per halaman
        $reload = "index.php?p=header";
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
													
													
													<th> Foto</th>
													
													
													
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
													<td><?php echo $data['harga'];  ?></td>
													<td> <img src="upload_foto/<?php echo $data['file_foto'];  ?>"  height="100"> </td>
													
													
													
													
													

													<td>
													
													<a href="control/delete_foto.php?id_foto_mobil=<?php echo $data['id_foto_mobil']; ?>"><button class="btn btn-xs btn-danger">
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
