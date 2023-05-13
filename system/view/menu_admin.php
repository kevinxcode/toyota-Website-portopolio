

	<body class="no-skin" style="background-color:white;">
		 <div class="navbar navbar-default navbar-fixed-top">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>
				
				
				 <div class="dropdown pull-right">
  <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">
   <img src="assets/pic.png" class="img-rounded" height="25" width="25"> 
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="profile">profile</a></li>
   <li class="divider"></li>
    <li><a href="control/logout.php">Logout</a></li>
  </ul>
</div> 
				
				
				
				

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							
							AGUNG TOYOTA BATAM
						</small>
					</a>
				

				<div class=" pull-right" >
					<ul class="nav ace-nav">
						

						

						

						
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>
		</div>
		

		
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div class="sidebar responsive sidebar-fixed" id="sidebar">
		
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
					<br>
				
					
					<img src="login_css/logo.png" alt="SMK Pertiwi" style="width:100%;">
						
					</div>
				
					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="home">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> HOME  </span>
						</a>

						<b class="arrow"></b>
					</li>
					
					
					<li class="">
						<a href="post_mobil">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text">POST MOBIL</span>
						</a>

						<b class="arrow"></b>
					</li>
					
					
					
					
					<li class="">
						<a href="harga_menu">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text">PRICELIST</span>
						</a>

						<b class="arrow"></b>
					</li>
					
					<li class="">
						<a href="testimoni">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text">TESTIMONI</span>
						</a>

						<b class="arrow"></b>
					</li>
					
					
					<!-- /.nav-list --

					<li class="">
						<a href="berita">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text">Berita</span>
						</a>

						<b class="arrow"></b>
					</li>
					
					<li class="">
						<a href="user">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> DATA ADMIN </span>
						</a>

						<b class="arrow"></b>
					</li>
					<!-- /.nav-list -->
					
				</ul>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
				
					<br>
					<br>
					<br>

					

						<?php
            $pages_dir = 'view/content';
                if(!empty($_GET['p'])){
                    $pages = scandir($pages_dir, 0);
                    unset($pages[0], $pages[1]);
                    $p = $_GET['p'];
                    if(in_array($p.'.php', $pages)){
                        include($pages_dir.'/'.$p.'.php');
                    } else {
                        include($pages_dir.'/404.php');
                    }
                } else {
                    include($pages_dir.'/home.php');
                }
            ?>

			