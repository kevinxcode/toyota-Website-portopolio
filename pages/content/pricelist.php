<!-- Content start -->

	    <div class="pageContent">
			  <div class="wid-25 gry-bg tbl ">
	    	<div class="container">	
	    					


					

					
					
		    		
		    				<div class="col-md-12">
							 <!-- Line -->
							 <!--<div class="vertical-sep"></div>-->
				<div class="hears">
		    		<div class="container">
						<a class=" btn uppercase main-gradient " href="#"><span>Pricelist</span></a>
		    		</div>
		    	</div>
				<!-- Line -->
		    					<hr>
								
					<?php include "system/config/config.php";
$sql=mysql_query("select * from harga_menu   order by id_harga_menu desc   ");$no=0;
while($datapost=mysql_fetch_array($sql)){$no++?>
					<!-- product -->
					<a href="index.php?p=harga_list&bank=<?php echo $datapost['bank']; ?>">
					<div class="col-md-6 col-sm-12 col-xs-12" align="center">
					<div  align="center"><b><?php echo $datapost['bank']; ?></b><hr></div>
					<img src="system/upload_foto/<?php echo $datapost['file_foto']; ?>" style="width:100%; height:100%;">
				
					 </div> 
				</a>
					<!-- end product -->
					<?php }?>
				
					</div> 
					</div> 
					</div> 
				
					