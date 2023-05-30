<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link id="style" href="<?php echo $_ENV['URL_BASE']; ?>/assets/bootstrap-5.2.3-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link id="style" href="<?php echo $_ENV['URL_BASE']; ?>/assets/admikit/css/app.css" rel="stylesheet" />
    <link id="style" href="<?php echo $_ENV['URL_BASE']; ?>/assets/css/style.css" rel="stylesheet" />
	<link id="style" href="<?php echo $_ENV['URL_BASE']; ?>/assets/js/sweetalert2.min.css" rel="stylesheet" />
	<script src="<?php echo $_ENV['URL_BASE']; ?>/assets/js/sweetalert2.all.min.js"></script>
    <?php $this->loadView("scripts_css",$viewData); ?>

	<?php echo vite('main.js')?>
    
</head>
<body  data-theme="default">


<div class="wrapper"> 
<?php  $this->loadView("layouts/menu_lateral",$viewData); ?>
 <div class="main">
    

 <?php  $this->loadView("layouts/menu_superior",$viewData); ?>
 <main class="content">

     <?php $this->loadView($viewName, $viewData); ?>
 </main>
     <footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
						
								
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
                </div>
 </div>



</div>

<script src="<?php echo $_ENV['URL_BASE']; ?>/assets/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"  ></script>
<script src="<?php echo $_ENV['URL_BASE']; ?>/assets/admikit/js/app.js"  ></script>

<?php $this->loadView("scripts_js",$viewData); ?>
<script src="<?php echo $_ENV['URL_BASE']; ?>/assets/js/initFacebookSDK.js"></script>
<script src="<?php echo $_ENV['URL_BASE']; ?>/assets/js/inicio.js"></script>


</body>
</html>