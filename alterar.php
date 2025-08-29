<?php 
	include_once 'php_action/conexao_bd.php';
	include_once 'includes/header.php';

	if (isset($_GET['id'])) {
		$id = mysqli_escape_string($connection, $_GET['id']);
		$sql = "SELECT * FROM tbConversoes WHERE id = '$id'";
		$resultado = mysqli_query($connection, $sql);
		$dados = mysqli_fetch_array($resultado);
	}
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light">Alterar Conversão</h3>
		
		<form action="php_action/alterar_conversao.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

			<div class="input-field col s12">
				<!-- Formata valor com vírgula para exibição -->
				<input type="text" name="valor" id="valor" value="<?php echo number_format($dados['valor'], 2, ',', '.'); ?>" required>
				<label for="valor">Valor</label>
			</div>

			<div class="input-field col s12">
				<select name="moeda_origem" required>
					<option value="BRL" <?php if($dados['moeda_origem']=='BRL') echo 'selected'; ?>>Real (BRL)</option>
					<option value="USD" <?php if($dados['moeda_origem']=='USD') echo 'selected'; ?>>Dólar (USD)</option>
					<option value="EUR" <?php if($dados['moeda_origem']=='EUR') echo 'selected'; ?>>Euro (EUR)</option>
					<option value="CNY" <?php if($dados['moeda_origem']=='CNY') echo 'selected'; ?>>Yuan (CNY)</option>
					<option value="GBP" <?php if($dados['moeda_origem']=='GBP') echo 'selected'; ?>>Libra (GBP)</option>
					<option value="RUB" <?php if($dados['moeda_origem']=='RUB') echo 'selected'; ?>>Rublo (RUB)</option>
				</select>
				<label>Moeda de Origem</label>
			</div>

			<div class="input-field col s12">
				<select name="moeda_destino" required>
					<option value="BRL" <?php if($dados['moeda_destino']=='BRL') echo 'selected'; ?>>Real (BRL)</option>
					<option value="USD" <?php if($dados['moeda_destino']=='USD') echo 'selected'; ?>>Dólar (USD)</option>
					<option value="EUR" <?php if($dados['moeda_destino']=='EUR') echo 'selected'; ?>>Euro (EUR)</option>
					<option value="CNY" <?php if($dados['moeda_destino']=='CNY') echo 'selected'; ?>>Yuan (CNY)</option>
					<option value="GBP" <?php if($dados['moeda_destino']=='GBP') echo 'selected'; ?>>Libra (GBP)</option>
					<option value="RUB" <?php if($dados['moeda_destino']=='RUB') echo 'selected'; ?>>Rublo (RUB)</option>
				</select>
				<label>Moeda de Destino</label>
			</div>

			<button type="submit" name="btn-alterar" class="btn">Alterar</button>
			<a href="index.php" class="btn green">Histórico</a>
		</form>
	</div>
</div>

<?php 
	include_once 'includes/footer.php';
?>
