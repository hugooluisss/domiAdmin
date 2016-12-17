<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>{$PAGE.empresaAcronimo}</title>
	<link rel="stylesheet" href="{$PAGE.ruta}bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/ionicons.min.css">
		
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/iCheck/flat/blue.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/morris/morris.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/datepicker/datepicker3.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/daterangepicker/daterangepicker-bs3.css">
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/iCheck/square/blue.css">
	{if $PAGE.debug}
		<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/less/AdminLTE.less" />
		<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/less/skins/_all-skins.less" />
	{else}
		<link rel="stylesheet" type="text/css" href="{$PAGE.ruta}dist/css/AdminLTE.css" />
		<link rel="stylesheet" type="text/css" href="{$PAGE.ruta}dist/css/skins/_all-skins.css" />
	{/if}	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
			</div><!-- /.login-logo -->
			<br />
			<div class="login-box-body">
				<p class="login-box-msg">
					<img src="{$PAGE.ruta}img/logo.png" class="img-rounded"/>
					<br />
					Identificate para iniciar sesión
				</p>
				<form action="#" id="frmLogin" method="post">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Clave" id="txtUsuario" name="txtUsuario">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" placeholder="Contraseña" id="txtPass" name="txtPass">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<!-- /.col -->
						<div class="col-xs-offset-8 col-xs-4">
							<button type="submit" class="btn btn-success btn-block btn-flat">Iniciar</button>
						</div><!-- /.col -->
					</div>
				</form>		
			</div><!-- /.login-box-body -->
		</div>
    
    
	    <!-- jQuery 2.1.4 -->
	    <script src="{$PAGE.ruta}plugins/jQuery/jQuery-2.1.4.min.js"></script>
	    <!-- jQuery UI 1.11.4 -->
	    <script src="{$PAGE.ruta}plugins/jQueryUI/jquery-ui.min.js"></script>
	    <!-- Bootstrap 3.3.5 -->
	    <script src="{$PAGE.ruta}bootstrap/js/bootstrap.min.js"></script>
	    <!-- Morris.js charts -->
	    
	    <!-- Sparkline -->
	    <script src="{$PAGE.ruta}plugins/sparkline/jquery.sparkline.min.js"></script>
	    <!-- jvectormap -->
	    <script src="{$PAGE.ruta}plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	    <script src="{$PAGE.ruta}plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	    <!-- jQuery Knob Chart -->
	    <script src="{$PAGE.ruta}plugins/knob/jquery.knob.js"></script>
	    <!-- daterangepicker -->
	    <script src="{$PAGE.ruta}moment.min.js"></script>
	    <script src="{$PAGE.ruta}plugins/daterangepicker/daterangepicker.js"></script>
	    <!-- datepicker -->
	    <script src="{$PAGE.ruta}plugins/datepicker/bootstrap-datepicker.js"></script>
	    <!-- Bootstrap WYSIHTML5 -->
	    <script src="{$PAGE.ruta}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	    <!-- Slimscroll -->
	    <script src="{$PAGE.ruta}plugins/slimScroll/jquery.slimscroll.min.js"></script>
	    <!-- FastClick -->
	    <script src="{$PAGE.ruta}plugins/fastclick/fastclick.min.js"></script>
	    <!-- AdminLTE App -->
	    <script src="{$PAGE.ruta}dist/js/app.min.js"></script>
	    <script type="text/javascript" src="{$PAGE.ruta}plugins/validate/validate.js"></script>
	    
	    {foreach from=$PAGE.scriptsJS item=script}
			<script type="text/javascript" src="{$script}"></script>
		{/foreach}
	    
	    {if $PAGE.debug}
	    	<script src="{$PAGE.ruta}plugins/less.min.js"></script>
	    {else}
	    
	    
	
	    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	    <script>
	      $.widget.bridge('uibutton', $.ui.button);
	    </script>
	    {/if}
  </body>
</html>
