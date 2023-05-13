<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'config/dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		
		
		$id_mobil = $_POST['id_mobil'];// 
		
		$judul_berita = preg_replace("/[^.!A-Za-z0-9]/", "-",$_POST['judul_berita']); // post with str reflace
	
		$isi_berita = $_POST['isi_berita'];// 
		
		
		$imgFile = $_FILES['file_foto']['name'];
		$tmp_dir = $_FILES['file_foto']['tmp_name'];
		$imgSize = $_FILES['file_foto']['size'];
		
		
		if(empty($id_mobil)){
			echo "<script>alert('Nama Siswa Kosong'); window.location = 'berita'</script>";
		}
		else if(empty($judul_berita)){
			$errMSG = "Please Enter Your Job Work.";
		}
		else if(empty($imgFile)){
			echo "<script>alert('File Foto siswa Tidak Ada'); window.location = 'berita'</script>";
		}
		else
		{
			$upload_dir = 'upload_foto/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'JPEG', 'GIF', 'JPG', 'PNG'); // valid extensions
		
			// rename uploading image
			//$userpic = rand(1000,1000000).".".$imgExt;
		
			$file_foto = $judul_berita."-".rand(100,10000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 4600000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$file_foto);
				}
				else{
					
					echo "<script>alert('Sorry, your file is too large. MAX 2,5 MB'); window.location = 'berita'</script>";
				}
			}
			else{
				echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); window.location = 'berita'</script>";
						
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO berita(id_mobil,judul_berita,isi_berita,file_foto) 
			VALUES(:uname, :judul_berita, :isi_berita, :file_foto)');
			$stmt->bindParam(':uname',$id_mobil);
			$stmt->bindParam(':judul_berita',$judul_berita);
			$stmt->bindParam(':isi_berita',$isi_berita);
			
			
			$stmt->bindParam(':file_foto',$file_foto);
			
			if($stmt->execute())
			{
				
				 echo "<script>alert('Upload Success'); window.location = 'berita'</script>";
				
			}
			else
			{
				 echo "<script>alert('Upload Gagal'); window.location = 'berita'</script>";
			}
		}
	}
?>

<div class="page-header">
							<h1>
								Data Berita
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						
						<?php  include 'notif.php';  ?>
						<div class="container-fluid bg-3"  > 

  <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   Add Berita
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
   
						<form method="post" enctype="multipart/form-data" class="form-horizontal">
														  <!-- CKEditor -->
								<div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
														
																<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email"> Judul Berita </label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="judul_berita"    class="col-xs-12 col-sm-6" />
																	
																		<input type="hidden" name="id_mobil"   value="-"  class="col-xs-12 col-sm-6" />
																	</div>
																</div>
															</div>
															<!-- CKEditor -->
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">isi Berita:</label>
																	
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<textarea id="ckeditor" name="isi_berita" ></textarea>
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
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Foto berita:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input class="input-group" type="file" name="file_foto" accept=""/>
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
												<button type="submit" name="btnsave"  class="btn btn-success">
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
        $sql =  "SELECT * FROM berita  ORDER BY id_berita desc";
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
													<th> Judul Berita</th>
													
													
													
													
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

													

													<td><?php echo $data['judul_berita'];  ?></td>
													
													
													
													
													
													

													<td>
													

															<a href="control/hapus_berita.php?id_berita=<?php echo $data['id_berita']; ?>"><button class="btn btn-xs btn-danger">
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