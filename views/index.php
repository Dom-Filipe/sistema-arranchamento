		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="row">
						<img style="padding-bottom: 30px;" src="assets/img/open-source.png" alt="logo" width=100 class="img-responsive center" />
						<div class="list-group">
							<!-- <a class="list-group-item" href="logout.php"><i class="fa fa-home"></i> Início</a> -->
							<a class="list-group-item" href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-user"></i> Login</a>
							<a class="list-group-item" href="rancho/" target="_blank"><i class="fa fa-lock"></i> Aprovisionador</a>
						</div>
					</div>
				</div>
				<div class="col-sm-10">
					<div class="carousel slide hidden-xs">
						<div class="carousel-inner">
							<div class="item active">
									<p style="text-shadow: 2px 2px 2px #5F9EA0; color:blue;font-size:350%; "><b>Arranchamento Online</b></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="row">
								<div class="col-md-12">
									<h3><i class="fa-solid fa-notes-medical"></i> A chave para uma Alimentação Saudável</h3>
									<p style="font-size:14px;text-align: justify;">
										<b>Uma alimentação equilibrada e balanceada</b> deve atender todas as necessidades nutricionais de um individuo desde a infância
										até a vida adulta. O nosso organismo necessita de nutrientes do tipo <b>proteinas, carboidratos, lipidios (gorduras), vitaminas, minerais
										e fibras</b>, que são substancias presentes nos alimentos, visando promover o <b>crescimento, a reparação dos tecidos, produção de 
										energia e o equilíbrio das diversas funções orgânicas</b>.
									</p>  
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-4 col-sm-6 post">
									<h3><i class="fa-solid fa-dumbbell"></i> Exercícios físicos</h3>
									<p style="text-align: justify;">Os exercícios físicos devem fazer parte da rotina, inclusive, de quem não precisa perder peso. Uma simples caminhada diária pode melhorar o humor e afastar doenças do coração.</p>
								</div>
								<div class="col-md-4 col-sm-6 post">
									<h3><i class="fa fa-glass-water"></i> Hidratação</h3>
									<p style="text-align: justify;">Beba pelo menos dois litros, mais ou menos oito copos de água todos os dias. A água ajuda na hidratação da pele e é fundamental como meio de transporte de algumas vitaminas hidrossolúveis como a vitamina B1, B2, B6, B12 e a vitamina C.</p>
								</div>
								<div class="col-md-4 col-sm-6 post">
									<h3><i class="fa-regular fa-lemon"></i> Fontes de antioxidantes</h3>
									<p style="text-align: justify;">As substâncias antioxidantes bloqueiam a ação dos radicais livres no organismo, prevenindo a oxidação das células. Esses elementos são capazes de prevenir o aparecimento de tumores, o envelhecimento precoce e outras doenças.</p>
								</div>
							</div>
							<div style="width: 800px; display: flex; justify-content: center">
								<div class="col-md-6 col-sm-6 post">
									<a href="http://10.56.19.133/arquivos/aprov/" target="_blank" class="thumbnail" alt="cardapio"><h3 class="text-center">Cardápio da semana</h3></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>   
		</div>
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="loginmodal-container">
					<h4><span style="padding-right:5px;" class="fa fa-user"></span>Acesso ao Sistema</h4><br>
					<form method="POST" id="form-login">
						<input type="text" name="identidade" id="identidade" placeholder="Nº CPF" class="maskIdentidade form-control" autocomplete="off" required>
						<button type="submit" class="btn btn-block btn-primary active">Acessar <span class="fa fa-lock"></span></button>
					</form>
					<div style="padding-top: 15px;" class="login-help">
						<!--<div class="checkbox checkbox-success">
							<input id="checkbox5" type="checkbox">
							<label for="checkbox5">
								<b></b>
							</label>
						</div>-->
						<div class="text-center" id="box-login"></div>
					</div>
				</div>
			</div>
		</div>