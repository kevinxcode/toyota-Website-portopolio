<!-- Content start -->

	    	<div class="pageContent">
	    	
	    	
		<?php
                         include "system/config/config.php";
                            $sql="select * from mobil_foto where mobil='$_GET[mobil]'";

                            $tampil=mysql_query($sql);
                            $data=mysql_fetch_array($tampil);
                        ?>								

  <div class="wid-10 gry-bg tbl ">
  <div class="wid-10 gry-bg tbl "><P>
			
					
				<!-- view -->
				<div class="col-md-6">	
				<div class="hears">
		    	<div class="container">
				<a class=" btn uppercase main-gradient " href="#"><span><?php  $text = $data[mobil];   echo str_replace("-", " ", $text);?></span></a>
		    	</div>
		    	</div>	
				<img src="system/upload_foto/<?php echo $data['file_foto']; ?>" style="width:100%; height:100%;">  
		    	</div>
		    	<!-- end view -->
				
				
				
				
				<p>
				
				<!-- view -->
				<div class="col-md-6">	
				<div class="hears">
		    	<div class="container">
				<a class=" btn uppercase main-gradient " href="#"><span>Deskripsi <?php  $text = $data[mobil];   echo str_replace("-", " ", $text);?></span></a>
		    	</div>
		    	</div>	
				<p>
				<?php 
include "system/config/config.php";
$sql=mysql_query("select * from mobil_deskripsi  where mobil='$_GET[mobil]' order by id_deskripsi desc  limit 1 ");$no=0;
while($datapost=mysql_fetch_array($sql)){$no++?>
<?php echo $datapost['deskripsi']; ?>
<?php }?>	   
		    	</div>
		    	<!-- end view -->
				
				
				<!-- view -->
				<div class="col-md-6">	
				<div class="hears">
		    	<div class="container">
				<a class=" btn uppercase main-gradient " href="#"><span>Spesifikasi Toyota <?php  $text = $data[mobil];   echo str_replace("-", " ", $text);?></span></a>
		    	</div>
		    	</div>	
				<p>
				<?php 
include "system/config/config.php";
$sql=mysql_query("select * from mobil_spek  where mobil='$_GET[mobil]' order by id_spek desc  limit 1 ");$no=0;
while($datapost=mysql_fetch_array($sql)){$no++?>
<?php echo $datapost['spek']; ?>
<?php }?>	   
		    	</div>
		    	<!-- end view -->
				
				<!-- view -->
				<div class="col-md-6">	
				<div class="hears">
		    	<div class="container">
				<a class=" btn uppercase main-gradient " href="#"><span>Video <?php  $text = $data[mobil];   echo str_replace("-", " ", $text);?></span></a>
		    	</div>
		    	</div>	
				<p>
				<?php 
include "system/config/config.php";
$sql=mysql_query("select * from video  where mobil='$_GET[mobil]' order by id_video desc  limit 1 ");$no=0;
while($datapost=mysql_fetch_array($sql)){$no++?>
<iframe width="100%" height="350"  src="<?php echo $datapost['link']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php }?>	   
		    	</div>
		    		</div>
		    	<!-- end view -->
				
				
				
				
				
				
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	