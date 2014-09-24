<?php require_once 'basket.class.php'; ?>
<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$kurv = new Basket();

	if( isset($_POST['produkt_id']) )
	{
		$kurv->add_to_basket($_POST['produkt_id'],$_POST['navn'],$_POST['antal'],$_POST['pris']);
	}

	if( isset($_POST['slet_produkt_id']) )
	{
		$kurv->remove_product($_POST['slet_produkt_id']);
	}

	if( isset($_POST['slet_kurv']) )
	{
		$kurv->remove_all_products();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kurv Klasse</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Kurv</h1>
	<table>
		<tr>
			<th>Navn</th>
			<th>Antal</th>
			<th>Pris per stk</th>
			<th>Samlet pris med moms</th>
			<th>Samlet pris uden moms</th>
			<th>Moms udgør</th>
			<th>
				<form method="post">
					<input type="submit" name="slet_kurv" value="Tøm kurv">
				</form>
			</th>
		</tr>
		<?php
		if($items = $kurv->vis_kurv())
		{
			foreach ($items as $produkt_id => $produkt) {
			echo '<tr>';
			echo '<td>'.$produkt['navn'].'</td>';
			echo '<td>'.$produkt['antal'].'</td>';
			echo '<td>'.$produkt['pris'].'</td>';
			echo '<td>'.$kurv->price_with_vat($produkt['pris'],$produkt['antal']).'</td>';
			echo '<td>'.$kurv->price_without_vat($produkt['pris'],$produkt['antal']).'</td>';
			echo '<td>'.$kurv->price_only_vat($produkt['pris'],$produkt['antal']).'</td>';
			echo '<td>
					<form method="post">
					<input type="submit" value="Slet">
					<input type="hidden" name="slet_produkt_id" value="'.$produkt_id.'">
					</form>
				 </td>';
			echo '</tr>';
			}
		}	
		?>
		<tr>
				<td colspan="2">Samlet pris uden moms : 
					<?php echo $kurv->all_price_without_vat() ?>
				</td>
				<td colspan="2">Samlet pris med moms :
					<?php echo $kurv->all_price_with_vat() ?>
				</td>
				<td colspan="2">Moms udgør : 
					<?php echo $kurv->all_price_only_vat() ?>
				</td>
				<td></td>
			</tr>
		</table>

	<?php for($i = 1; $i <= 10; $i++) { ?>
	<form method="post">
		Produkt <?php echo $i ?> 
		Pris : <?php echo 100*$i ?> 
		Antal : 
		<input type="number" name="antal" value="1">
		<input type="hidden" name="navn" value="Produkt <?php echo $i ?>">
		<input type="hidden" name="produkt_id" value="<?php echo $i ?>">
		<input type="hidden" name="pris" value="<?php echo 100*$i ?>">
		<input type="submit" value="Læg i kurv">
		<hr>
	</form>
	<?php } ?>
	POST : <pre><code><?php var_export($_POST); ?></code></pre>
	SESSION :<pre><code><?php var_export($_SESSION); ?></code></pre>

</body>
</html>