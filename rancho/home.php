<?php
error_reporting(0);
require_once("../controllers/config/conexao.php");
session_start();

if ($_SESSION['usuario']['id'] && is_numeric($_SESSION['usuario']['id'])) {

	$usuario = $_SESSION['usuario']['id'];

	$con = $cnt->prepare('SELECT u.*,
		c.id AS companhia_id,
		c.nome AS companhia_nome,
		c.descricao AS companhia_desc
		FROM usuarios u
		JOIN cad_cia c ON c.id = u.om
		WHERE u.id = :usuario
		ORDER BY u.id DESC
		LIMIT 1');
	$con->bindValue(':usuario', $usuario, PDO::PARAM_STR);
	$con->execute();
	$total = $con->rowCount();
	if ($total) {
		$usuario_logado = $con->fetch(PDO::FETCH_ASSOC);
	}
} else
	header("location: index.php");

?>
<!DOCTYPE html>
<html>

<head>
	<title>Administração - Rancho</title>
	<meta charset="utf-8">
	<link rel='stylesheet' href='../assets/font-awesome/css/font-awesome.css'>
	<link rel='stylesheet' href='../assets/css/bootstrap.css'>
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="../assets/select2-4.0.3/dist/css/select2.css">
	<link rel="stylesheet" href="../assets/bootstrap-select-1.12.4/dist/css/bootstrap-select.css">
	<link rel="stylesheet" href="../assets/dataTables/datatables.css">

</head>

<body>
	<div class="container">
		<div class="row">
			<h2 class="text-center" style="padding-bottom: 10px;"> ADMINISTRAÇÃO </h2>
			<h4 class="text-center" style="padding-bottom: 10px;">Arranchamento Online</h4>
			<div style="width: 100%;" class="well well-sm">
				<p><b>Usuário:</b> <?php print_r($usuario_logado['usuario']); ?></p>
				<p><b>Cia:</b> <?php print_r($usuario_logado['companhia_desc']); ?></p>
				<p><b>Perfil:</b> <?php if ($usuario_logado['tipo'] == 1) {
										echo "Administrador";
									} else echo "Operador"; ?></p>
				<a style="text-decoration: none;color:#ffffff;box-shadow: 6px 8px 7px -5px #276873;background-color:#0000006E;padding:5px 5px;border-radius:10px;" href="logout.php" title="Sair">Sair <i class="fa fa-sign-out"></i></a>
			</div>
		</div>
		<hr>
		<div class="row">

			<div class="col-lg-3">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<i class="fa fa-bar-chart fa-5x"></i>
							</div>
							<div class="col-xs-6 text-right">
								<p class="announcement-heading">&nbsp;</p>
								<p class="announcement-text">Relatórios</p>
							</div>
						</div>
					</div>
					<a href="#" data-remote="false" data-toggle="modal" data-target="#gerar-relatorio">
						<div class="panel-footer announcement-bottom">
							<div class="row">
								<div class="col-xs-6">
									Acessar
								</div>
								<div class="col-xs-6 text-right">
									<i class="fa fa-arrow-circle-right"></i>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>

			<?php if ($usuario_logado['tipo'] == 1) { ?>
				<div class="col-lg-3">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<i class="fa fa fa-bullhorn fa-5x"></i>
								</div>
								<div class="col-xs-6 text-right">
									<p class="announcement-heading">&nbsp;</p>
									<p class="announcement-text">Avisos</p>
								</div>
							</div>
						</div>
						<a href="#" id="btn-aviso" data-toggle="modal" data-target="#modalAvisos">
							<div class="panel-footer announcement-bottom">
								<div class="row">
									<div class="col-xs-6">
										Acessar
									</div>
									<div class="col-xs-6 text-right">
										<i class="fa fa-arrow-circle-right"></i>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php  } ?>
			<?php if ($usuario_logado['tipo'] == 1) { ?>
				<div class="col-lg-3">
					<div class="panel panel-success">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<i class="fa fa-cogs fa-5x"></i>
								</div>
								<div class="col-xs-6 text-right">
									<p class="announcement-heading">&nbsp;</p>
									<p class="announcement-text">Bloquear dias</p>
								</div>
							</div>
						</div>
						<a href="#" data-toggle="modal" data-target="#modalConfig">
							<div class="panel-footer announcement-bottom">
								<div class="row">
									<div class="col-xs-6">
										Acessar
									</div>
									<div class="col-xs-6 text-right">
										<i class="fa fa-arrow-circle-right"></i>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php  } ?>
			<?php if ($usuario_logado['tipo'] == 1) { ?>
				<div class="col-lg-3">


<!-- militares de Outra OM
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<i class="fa fa-cutlery fa-5x"></i>
								</div>
								<div class="col-xs-6 text-right">
									<p class="announcement-heading">Arranchar</p>
									<p class="announcement-text">(Outra OM)</p>
								</div>
							</div>
						</div>
						<a href="#" data-remote="false" data-toggle="modal" data-target="#modalArrancharOutraOm">
							<div class="panel-footer announcement-bottom">
								<div class="row">
									<div class="col-xs-6">
										Acessar
									</div>
									<div class="col-xs-6 text-right">
										<i class="fa fa-arrow-circle-right"></i>
									</div>
								</div>
							</div>
						</a>
					</div>
miltares de Outra OM ------------------------------------ -->

				</div>
			<?php  } ?>

			<div class="col-lg-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<i class="fa fa-cutlery fa-5x"></i>
							</div>
							<div class="col-xs-6 text-right">
								<p class="announcement-heading">Arranchar</p>
								<p class="announcement-text">(Militares)</p>
							</div>
						</div>
					</div>
					<a href="#" data-remote="false" data-toggle="modal" data-target="#modalArranchar">
						<div class="panel-footer announcement-bottom">
							<div class="row">
								<div class="col-xs-6">
									Acessar
								</div>
								<div class="col-xs-6 text-right">
									<i class="fa fa-arrow-circle-right"></i>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>


			<div class="col-lg-3">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<i class="fa fa-users fa-5x"></i>
							</div>
							<div class="col-xs-6 text-right">
								<p class="announcement-heading">Gerenciar</p>
								<p class="announcement-text">(Militares)</p>
							</div>
						</div>
					</div>
					<a href="#" data-remote="false" data-toggle="modal" data-target="#modalGerenciarMilitares" id="GerenciarMilitares">
						<div class="panel-footer announcement-bottom">
							<div class="row">
								<div class="col-xs-6">
									Acessar
								</div>
								<div class="col-xs-6 text-right">
									<i class="fa fa-arrow-circle-right"></i>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>

			<?php if ($usuario_logado['tipo'] == 1) { ?>
				<div class="col-lg-3">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<i class="fa fa-users fa-5x"></i>
								</div>
								<div class="col-xs-6 text-right">
									<p class="announcement-heading">Gerenciar</p>
									<p class="announcement-text">(Usuários do Sistema)</p>
								</div>
							</div>
						</div>
						<a href="#" data-remote="false" data-toggle="modal" data-target="#modalGerenciarUsuario" id="GerenciarUsuarios">
							<div class="panel-footer announcement-bottom">
								<div class="row">
									<div class="col-xs-6">
										Acessar
									</div>
									<div class="col-xs-6 text-right">
										<i class="fa fa-arrow-circle-right"></i>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php  } ?>

			<?php if ($usuario_logado['tipo'] == 1) { ?>
				<div class="col-lg-3">
					<div class="panel panel-warning">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<i class="fa fa-university fa-5x"></i>
								</div>
								<div class="col-xs-6 text-right">
									<p class="announcement-heading">Gerenciar</p>
									<p class="announcement-text">(Organização)</p>
								</div>
							</div>
						</div>
						<a href="#" data-remote="false" data-toggle="modal" data-target="#modalGerenciarOrg" id="GerenciarOrg">
							<div class="panel-footer announcement-bottom">
								<div class="row">
									<div class="col-xs-6">
										Acessar
									</div>
									<div class="col-xs-6 text-right">
										<i class="fa fa-arrow-circle-right"></i>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php  } ?>

			<?php if ($usuario_logado['tipo'] == 1 || $usuario_logado['tipo'] == 2) { ?>
				<div class="col-lg-3">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<i class="fa fa-unlock-alt fa-5x"></i>
								</div>
								<div class="col-xs-6 text-right">
									<p class="announcement-heading">Alterar Senha</p>
									<p class="announcement-text"></p>
								</div>
							</div>
						</div>
						<a href="#" data-remote="false" data-toggle="modal" data-target="#modalAlterarSenha">
							<div class="panel-footer announcement-bottom">
								<div class="row">
									<div class="col-xs-6">
										Acessar
									</div>
									<div class="col-xs-6 text-right">
										<i class="fa fa-arrow-circle-right"></i>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
	
			<?php  } ?>
		</div>
	</div>
	<?php require_once "views/modals.php"; ?>
</body>
<script src='../assets/js/jquery.js'></script>
<script src='../assets/js/bootstrap.js'></script>
<script src='../assets/js/mask.js'></script>
<script src='../assets/js/jquery.validate-1.15.0.js'></script>
<script src='../assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.js'></script>
<script src='../assets/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js'></script>
<script src='../assets/bootstrap-select-1.12.4/dist/js/bootstrap-select.js'></script>
<script src='../assets/select2-4.0.3/dist/js/select2.full.js'></script>
<script src='../assets/ckeditor/ckeditor.js'></script>
<script src='../assets/dataTables/datatables.js'></script>
<script src='../assets/ckeditor/config.js'></script>
<script src='../assets/js/app-rancho.js'></script>
<script src='../assets/js/jquery.validate-1.15.0.js'></script>

<?php

if (isset($_GET['status']) &&  $_GET['status'] == "success") { ?>
	<script>
		$(function() {
			$('#modalConfig').modal('show');
		});
	</script>
<?php
}
?>

</html>
