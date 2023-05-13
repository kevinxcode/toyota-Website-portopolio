<!-- Content start -->

	    <div class="pageContent">
			  <div class="wid-25 gry-bg tbl ">
	    	<div class="container">						

<!-- Content start -->
			   <div class="pageContent">
			  <div class="wid-25 gry-bg tbl ">
	    	<div class="container">	
			
			
					
					<!-- slide -->
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
	   <li data-target="#myCarousel" data-slide-to="5"></li>
	    <li data-target="#myCarousel" data-slide-to="6"></li>
		 <li data-target="#myCarousel" data-slide-to="7"></li>
		  <li data-target="#myCarousel" data-slide-to="8"></li>
		   <li data-target="#myCarousel" data-slide-to="9"></li>
		  
  
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
	
      <div class="item active">
      <img src="assets/1.jpg" style="width:100%;" >
      </div>
	  
      <div class="item">
		<img src="assets/2.jpg" style="width:100%;">
      </div>
	  
	   <div class="item">
		<img src="assets/3.jpg" style="width:100%;">
      </div>
	  
	   <div class="item">
		<img src="assets/4.jpg" style="width:100%;">
      </div>
	  
	   <div class="item">
		<img src="assets/5.jpg" style="width:100%;">
      </div>
	  
	  <div class="item">
		<img src="assets/6.jpg" style="width:100%;">
      </div>

 <div class="item">
		<img src="assets/7.jpg" style="width:100%;">
      </div>
 <div class="item">
		<img src="assets/8.jpg" style="width:100%;">
      </div>
 <div class="item">
		<img src="assets/9.jpg" style="width:100%;">
      </div>	  
	   <div class="item">
		<img src="assets/10.jpg" style="width:100%;">
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="pattern-line-1 main-bg">
		    		<div class="container">
					<p class="lg-txt f-left">
							<marquee> Selamat Datang di Agung Toyota Batam Official Website Sales</marquee>
						</p>
						
		    		</div>
		    	</div>
  </div>
  <!-- end slide -->
  
  <style>


div.polaroid {
  width: 100%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
}


</style>
  
  

			
					<div class="container">
					
					
					<!-- product -->
					<div class="row">
					<!-- a -->
	<div class="col-md-12 col-sm-12 col-xs-12" align="center">
		<H2>Selamat Datang di Website Kami</h1>
<b>Toyota Batam</b> - Melayani penjualan mobil secara Cash dan Credit untuk All-Type Mobil Toyota. Pengajuan secara kredit dapat melalui Mitra Finance kami tentunya dengan Down Payment Rendah dan Angsuran Terjangkau. Harga yang tertera belum masuk promo diskon atau cashback yang tersedia, dan harga tersebut dapat berubah kapan saja.
<p>
Pembelian yang dilakukan secara Credit, Anda dapat memilih pembiayaan sendiri atau sesuai rekomendasi dari Sales Consultant Terbaik. Silahkan menghubungi Kontak Sales terbaik kami pada salah satu media komunikasi yang telah di sediakan di Website ini yakni melalui telepon, WhatsApp , email, ataupun kontak social media yang telah tertera.
<p>
<b>
Dapatkan informasi harga mobil toyota terbaru meliputi Toyota Camry, Veloz, Avanza, CHR, Yaris, Rush, Voxy, Agya, Venturer, Calya, Sienta, Fortuner, Kijang Innova, Vellfire, Alphard, Vios & Corolla Altis di wilayah Batam dan Sekitarnya 
</b><hr>


        </div>
	<!-- end product -->
	<!-- end product -->

</div>
<!-- end product -->
	
					
		    		<div class="row row-eq-height">
		    				<div class="col-md-12">
							 <!-- Line -->
							 <!--<div class="vertical-sep"></div>-->
				<div class="hears">
		    		<div class="container">
						<a class="btn uppercase main-gradient " href="#"><span>LIST MOBIL TOYOTA</span></a>
		    		</div>
		    	</div>
				<!-- Line -->
		    					<hr>
								

					<div class="recent-posts-widget">
					<div class="col-md-12 col-sm-12 col-xs-12" align="center">
					<div class="row">
					<?php include "system/config/config.php";
$sql=mysql_query("select * from mobil_foto  order by id_foto_mobil asc  limit 30  ");$no=0;
while($datapost=mysql_fetch_array($sql)){$no++?>
					<!-- product -->
					<a href="<?php echo $datapost['mobil']; ?>">
					<div class="col-md-4 col-sm-12 col-xs-12" align="center">
					
					<img src="system/upload_foto/<?php echo $datapost['file_foto']; ?>" style="width:100%; height:100%;">
					
					<div  align="center">
					<b> <span class="btn uppercase main-gradient  btn-block"><b><?php  $text = $datapost[mobil];   echo str_replace("-", " ", $text);?></b></span></b><p>
					<small>Harga Mulai Dari :</small><br><b> Rp. <?php echo $datapost['harga']; ?> </b>
					<hr>
					</div>
					 </div> 
						</a>
					<!-- end product -->
						<?php }?>		
 </div> 
 </div>
<hr>
</ul>		
</div>	
  </div>
  </div>




		<div class="row row-eq-height">
		    	<div class="col-md-4">
			<!-- Line -->
							 <!--<div class="vertical-sep"></div>-->
				<div class="hears">
		    		<div class="container">
						<a class=" btn uppercase main-gradient " href="#"><span>LOKASI</span></a>
		    		</div>
		    	</div>
				<!-- Line -->
				<HR>
					<!-- product -->
					<div class="col-md-12 col-sm-12 col-xs-12" align="center">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0749810753982!2d104.03157329069286!3d1.1060158503131143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98969075feb73%3A0x27eb346b4302d446!2sAgung%20Toyota%2C%20Batam%20Centre!5e0!3m2!1sen!2sid!4v1583410560068!5m2!1sen!2sid" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
					</div>
					
					<div class="col-md-8">
			<!-- Line -->
							 <!--<div class="vertical-sep"></div>-->
				<div class="hears">
		    		<div class="container">
						<a class=" btn uppercase main-gradient " href="#"><span>TESTIMONIAL</span></a>
		    		</div>
		    	</div>
				<!-- Line -->
				<HR>
					<!-- product -->
					<div class="col-md-12 col-sm-12 col-xs-12" align="center">
					
					
										<!-- slide -->
					<div id="myCarousel1" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
   

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
		
		<?php include "system/config/config.php";
$sql=mysql_query("select * from testimoni   ORDER BY rand(), id_testimoni desc  limit 1  ");$no=0;
while($datapost=mysql_fetch_array($sql)){$no++?>
      <div class="item active">
	  <div class="col-md-6 col-sm-12 col-xs-12" align="center">
      <img src="system/upload_foto/<?php echo $datapost['file_foto']; ?>" style="width:100%;" >
      </div>
	  <?php echo $datapost['testimoni']; ?>
	  </div>
	   <?php }?>
	  <?php include "system/config/config.php";
$sql=mysql_query("select * from testimoni   ORDER BY rand(),  id_testimoni desc limit 8   ");$no=0;
while($datapost=mysql_fetch_array($sql)){$no++?>
	  <div class="item">
	  <div class="col-md-6 col-sm-12 col-xs-12" align="center">
      <img src="system/upload_foto/<?php echo $datapost['file_foto']; ?>" style="width:100%;" >
      </div>
	  <?php echo $datapost['testimoni']; ?>
	  </div>
	    <?php }?>

    </div>

    <!-- Left and right controls -->
    <a class="left " href="#myCarousel1" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right " href="#myCarousel1" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <br>
  <!-- end slide -->
</div>
</div>					
<br>


		
	