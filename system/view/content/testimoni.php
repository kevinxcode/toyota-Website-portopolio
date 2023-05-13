
<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'config/dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		
		
		$testimoni = $_POST['testimoni'];// 
		
		
		$keterangan = $_POST['keterangan'];// 
		
		
		
		$imgFile = $_FILES['file_foto']['name'];
		$tmp_dir = $_FILES['file_foto']['tmp_name'];
		$imgSize = $_FILES['file_foto']['size'];
		
		
		if(empty($testimoni)){
			echo "<script>alert('Nama Siswa Kosong'); window.location = 'testimoni'</script>";
		}
		
		else if(empty($imgFile)){
			echo "<script>alert('File Foto siswa Tidak Ada'); window.location = 'testimoni'</script>";
		}
		else
		{
			$upload_dir = 'upload_foto/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'JPEG', 'GIF', 'JPG', 'PNG'); // valid extensions
		
			// rename uploading image
			//$userpic = rand(1000,1000000).".".$imgExt;
		
			$file_foto = $keterangan."-".rand(100,10000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 2600000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$file_foto);
				}
				else{
					
					echo "<script>alert('Sorry, your file is too large. MAX 2,5 MB'); window.location = 'testimoni'</script>";
				}
			}
			else{
				echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); window.location = 'testimoni'</script>";
						
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO testimoni(testimoni,keterangan,file_foto) 
			VALUES(:uname, :keterangan,  :file_foto)');
			$stmt->bindParam(':uname',$testimoni);
			$stmt->bindParam(':keterangan',$keterangan);
			
			
			$stmt->bindParam(':file_foto',$file_foto);
			
			if($stmt->execute())
			{
				
				 echo "<script>alert('Upload Success'); window.location = 'testimoni'</script>";
				
			}
			else
			{
				 echo "<script>alert('Upload Gagal'); window.location = 'testimoni'</script>";
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

									testimoni
									<button class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>
								</div>
						

   
			
			
			<?php
                            include "config/config.php";
                            $sql="select * from mobil where id_mobil='$_GET[id_mobil]'";

                            $tampil=mysql_query($sql);
                            $data=mysql_fetch_array($tampil);
                        ?>
														

														<form method="post" enctype="multipart/form-data" class="form-horizontal">
														
														

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email"> testimoni </label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="testimoni"  value="<?php echo $data['testimoni']; ?>"  class="col-xs-12 col-sm-6" />
																	
																</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">  </label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="hidden" name="keterangan"  value="Testimoni"  class="col-xs-12 col-sm-6" />
																	
																	</div>
																</div>
															</div>
															

															
															<div class="hr hr-dotted"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Foto testimoni :</label>

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
        $sql =  "SELECT * FROM testimoni ";
        $result = mysql_query($sql);
        
        //pagination config start
        $rpp = 20; // jumlah record per halaman
        $reload = "index.php?p=testimoni";
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
													<th>testimoni</th>
													
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

													

													<td><?php echo $data['testimoni'];  ?></td>
													
													<td> <img src="upload_foto/<?php echo $data['file_foto'];  ?>"  height="100"> </td>
													
													
													
													
													

													<td>
													
													<a href="control/delete_foto_testi.php?id_testimoni=<?php echo $data['id_testimoni']; ?>"><button class="btn btn-xs btn-danger">
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
