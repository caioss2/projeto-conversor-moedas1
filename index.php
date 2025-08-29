<?php 

	include_once 'php_action/conexao_bd.php';

	// Cabeçalho
	include_once 'includes/header.php';

	include_once 'includes/mensagem.php';
?>

<div class="row">
	<div class="col s12 m8 push-m2">
		<h3 class="light">Conversor de Moedas</h3>
		<table class="striped">
			<thead>
				<tr>
					<th>Valor</th>
					<th>Moeda de Origem</th>
					<th>Moeda de Destino</th>
					<th>Resultado</th>
					<th>Ações</th>
				</tr>				
			</thead>
			
			<tbody>
				<?php 
					$sql = "SELECT * FROM tbConversoes";
					$resultado = mysqli_query($connection, $sql);

					while($dados = mysqli_fetch_array($resultado)){
				?>				
						<tr>
							<!-- Formata o valor para 1.234,56 -->
							<td><?php echo number_format($dados['valor'], 2, ',', '.'); ?></td>
							<td><?php echo $dados['moeda_origem']; ?></td>
							<td><?php echo $dados['moeda_destino']; ?></td>
							<td><?php echo number_format($dados['resultado'], 2, ',', '.'); ?></td>

							<td>
								<a href="alterar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange">
									<i class="material-icons">edit</i>
								</a>

								<a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger">
									<i class="material-icons">delete</i>
								</a>
							</td>

							<!-- Modal para confirmação de exclusão -->
							<div id="modal<?php echo $dados['id']; ?>" class="modal">
							    <div class="modal-content">
							      <h4>Aviso</h4>
							      <p>Deseja excluir esta conversão?</p>
							    </div>
							    <div class="modal-footer">
							      <form action="php_action/excluir_conversao.php" method="POST">
							      	<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
							      	<button type="submit" name="btn-excluir" class="btn red">Excluir</button>
							      	<a href="#!" class="modal-close waves-effect waves-green btn">Cancelar</a>
							      </form>
							    </div>
							</div>

						</tr>
						
				<?php } ?>
			</tbody>
		</table>
		<br>
		<a href="cadastrar.php" class="btn">Nova Conversão</a>
	</div>		
</div>

<?php 
	// Rodapé
	include_once 'includes/footer.php';
?>
