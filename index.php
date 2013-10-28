 <?php include('translations/fr.php'); ?>
 <?php include('functions.php'); ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
	 	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>Générateur de module - PrestaEdit.com</title>	
		<meta content="IE=Edge" http-equiv="X-UA-Compatible" />
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport" />	
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<link href="css/font-awesome.min.css" rel="stylesheet" />
		<link href="css/base.css" rel="stylesheet" />
		<link href="css/layout.css" rel="stylesheet" />
		<link href="css/smartWizard.css" rel="stylesheet" />
		
		<script type="text/javascript">
			labelNext = <?php echo "'".l('labelNext')." <i class=\"icon-double-angle-right\"></i>'"; ?>;			
			labelPrevious = <?php echo "'<i class=\"icon-double-angle-left\"></i> ".l('labelPrevious')."'"; ?>;
			labelFinish = <?php echo "'<i class=\"icon-download-alt icon-large\"></i> ".l('labelFinish')."'"; ?>;
		</script>
		
		<script type="text/javascript" src="js/jquery/jquery-1.7.2.min.js"></script>
		<script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/jquery/plugins/smartWizard/jquery.smartWizard.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</head>
	<body>
		<div class="main_wrapper">
			<header>
				<div class="content">	
					<nav class="head_nav">
						<ul class="mainmenu">
							<li class="act"><a href="index.php"><i class="icon-home"></i> Home</a></li>
							<li class="sep"></li>
							<li><a href="index.php?page=generator"><i class="icon-code"></i> Générateur</a></li>
							<li class="sep"></li>
							<li><a href="index.php?page=about"><i class="icon-question-sign"></i> About</a></li>
						</ul>
						<div class="menu_indicator"></div>
					</nav>
	
					<nav class="mobile_nav">
						<a class="menu_toggle" href="javascript:void(0)">Menu</a>
						<ul class="mobile_menu">
							<li class="act"><a href="index.php"><i class="icon-home"></i> Dashboard</a></li>
						</ul>
					</nav>
				</div>
			</header>
			<div class="site_container container">						
				<?php
					$page = $_GET['page'];
					switch($page)
					{
						case 'about': 		include('about.php');
											break;
						case 'generator': 	include('generator.php');
											break;	
						default: 			include('generator.php');
											break;															
					}
				?>
			</div>
			<footer>
				<div class="footer">
					<p>
						<a href="index.php">Home</a>
						<i class="icon-plus"></i>
						<a href="index.php">Générateur de module</a>
						<i class="icon-plus"></i>
						<a href="http://www.prestaedit.com" target="_blank">PrestaEdit.com</a>
					</p>
				</div>
			</footer>
		</div>
	</body>
</html>