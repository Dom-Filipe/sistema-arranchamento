<!DOCTYPE html>
<html>
<head>
	<title>Administração - Rancho</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="http://10.56.19.152/assets/font-awesome/css/all.min.css" media="print" onload="this.media='all'"/>
	<link rel='stylesheet' href='../assets/css/bootstrap.css'>
	<link rel="stylesheet" href="../assets/css/style-rancho.css">
</head>
<body>
	<div class="jumbotron">
		<div class="container">
			<img style="width:30%;padding-bottom: 20px;" src="../assets/img/logo.png" alt="Logo" class="center" />
			<h3>Administração</h3>
			<form method="POST" id="form_login">
				<div class="box">
					<input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuário">
					<input class="form-control" type="password" name="senha" id="senha" placeholder="Senha">
					<button type="submit" class="btn btn-primary btn-block">Acesso <span class="fa fa-lock"></span></button>
				</div>
				<div class="text-center" id="box-login"></div>
			</form>
		</div>
	</div>
</body>
<script src='../assets/js/jquery.js'></script>
<script src='../assets/dataTables/datatables.js'></script>
<script src='../assets/js/bootstrap.js'></script>
<script src='../assets/js/jquery.validate-1.15.0.js'></script>
<script src='../assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.js'></script>
<script src='../assets/js/mask.js'></script>
<script src='../assets/select2-4.0.3/dist/js/select2.full.js'></script>
<script src='../assets/bootstrap-select-1.12.4/dist/js/bootstrap-select.js'></script>
<script src='../assets/js/app-rancho.js'></script>
</html>
