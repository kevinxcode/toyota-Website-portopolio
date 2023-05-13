<!-- Content start -->

	    	<div class="pageContent">
	    	
	    	
		<?php
                         include "system/config/config.php";
                            $sql="select * from harga_menu where bank='$_GET[bank]'";

                            $tampil=mysql_query($sql);
                            $data=mysql_fetch_array($tampil);
                        ?>								

  <div class="wid-25 gry-bg tbl ">
  <div class="wid-10 gry-bg tbl "><P>
			
					
				<!-- view -->
				<div class="col-md-12">	
				<div class="hears">
		    	<div class="container">
				<a class=" btn uppercase main-gradient skew-btn" href="#"><span><?php echo $data['bank']; ?></span></a>
		    	</div>
		    	</div>	
				<img src="system/upload_foto/<?php echo $data['file_foto']; ?>" style="width:100%; height:100%;">  
		    	</div>
		    	<!-- end view -->
				
				