<!-- Content start -->

	    	<div class="pageContent">
	    	 <div class="wid-25 gry-bg tbl ">
	    	<div class="container">
		<?php
                         include "system/config/config.php";
                            $sql="select * from berita where judul_berita='$_GET[judul_berita]'";

                            $tampil=mysql_query($sql);
                            $data=mysql_fetch_array($tampil);
                        ?>								


			
					
				<!-- view -->
				<div class="col-md-12 col-sm-12 col-xs-12" align="left">
				<div class="hears">
		    	<div class="container">
				<a class=" btn uppercase main-gradient skew-btn" href="#"><span>bERITA</span></a>
		    	</div>	<p>
		    	</div>	
		    
				<img src="system/upload_foto/<?php echo $data['file_foto']; ?>" style="width:100%; height:100%;">  
				<p>
				<h2><?php  $text = $data[judul_berita];   echo str_replace("-", " ", $text);?></h2>
				
				<?php echo $data['isi_berita']; ?>
		    	</div>
		    	<!-- end view -->
				
				