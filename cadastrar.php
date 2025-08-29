<?php 
	// Cabeçalho
	include_once 'includes/header.php';
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light">Nova Conversão</h3>
		
		<form action="php_action/criar_conversao.php" method="POST">
			
			<div class="input-field col s12">
				<input type="text" name="valor" id="valor" required>
				<label for="valor">Valor</label>
			</div>
			
			<div class="input-field col s12">
				<select name="moeda_origem" required>
					<option value="" disabled selected>Escolha a moeda de origem</option>
					<option value="BRL">Real (BRL)</option>
					<option value="USD">Dólar (USD)</option>
					<option value="EUR">Euro (EUR)</option>
					<option value="CNY">Yuan (CNY)</option>
					<option value="GBP">Libra (GBP)</option>
					<option value="RUB">Rublo (RUB)</option>
				</select>
				<label>Moeda de Origem</label>
			</div>

			<div class="input-field col s12">
				<select name="moeda_destino" required>
					<option value="" disabled selected>Escolha a moeda de destino</option>
					<option value="BRL">Real (BRL)</option>
					<option value="USD">Dólar (USD)</option>
					<option value="EUR">Euro (EUR)</option>
					<option value="CNY">Yuan (CNY)</option>
					<option value="GBP">Libra (GBP)</option>
					<option value="RUB">Rublo (RUB)</option>
				</select>
				<label>Moeda de Destino</label>
			</div>

			<button type="submit" name="btn-cadastrar" class="btn">Converter</button>
			<a href="index.php" class="btn green">Histórico</a>

		</form>
	</div>		
</div>

<?php 
	// Rodapé
	include_once 'includes/footer.php';
?>
