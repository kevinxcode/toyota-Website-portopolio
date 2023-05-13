
	<body class="bg1">

		<!-- site preloader start -->
		
		<!-- site preloader end -->
		
		<div class="pageWrapper">

			<div class="top-bar main-bg no-border">
				<div class="container">
					
					
					
				    <div class="f-right social-list">
					    <span class="lbl-txt">Follow Us On:</span>
					    <a href="#" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Facebook"><i class="fa fa-facebook ic-facebook no-border"></i></a>
						
						<a href="#" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Instagram"><i class="fa fa-instagram ic-instagram no-border"></i></a>
						<a href="#" data-toggle="tooltip" data-placement="bottom" data-original-title="Twitter"><i class="fa fa-twitter ic-twitter no-border"></i></a>
						<a href="#" data-toggle="tooltip" data-placement="bottom" data-original-title="Google Plus"><i class="fa fa-google-plus ic-gplus no-border"></i></a>
				    </div>

				</div>
			</div>

			<!-- Header start -->
			<header class="top-head minimal">
		    	<div class="container">
			    	<!-- Logo start -->
			    	<div class="logo">
				    	<a href="home"><img alt="" src="assets/agung-toyota.png" /> <b></b></a>
				    </div>
				    <!-- Logo end -->
				    
					<div class="responsive-nav">
	<!-- top navigation menu start -->
						<nav class="top-nav">
							<ul>
								<li><a href="home"><span>HOME</span></a></li>
						
								
								<li><a href="pricelist"><span>PRICELIST</span></a></li>
								
								<li><a href="contact"><span>CONTACT</span></a></li>
								
								<li><a href="system"><span>LOGIN</span></a></li>
								
								
							</ul>
						</nav>
						<!-- top navigation menu end -->
					    <div class="f-right">
					    	
						    
						    
					    </div>
					</div>
		    	</div>
		    </header>
		    <!-- Header start -->
		    
		    
		    
		     <?php
            $pages_dir = 'pages/content';
                if(!empty($_GET['p'])){
                    $pages = scandir($pages_dir, 0);
                    unset($pages[0], $pages[1]);
                    $p = $_GET['p'];
                    if(in_array($p.'.php', $pages)){
                       include($pages_dir.'/home.php');
                    } else {
                        include($pages_dir.'/page_not_found.php');
                    }
                } else {
                    include($pages_dir.'/home.php');
                }
            ?>

	    	