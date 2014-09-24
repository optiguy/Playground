<?php
	session_start();
	//$_SESSION['basket'] = array(); 
	//Navn, pris, antal, id

	if( isset($_POST['produkt_id']) )
	{
		add_to_basket($_POST['produkt_id'],$_POST['navn'],$_POST['antal'],$_POST['pris']);
	}

	if( isset($_POST['slet_produkt_id']) )
	{
		remove_product($_POST['slet_produkt_id']);
	}

	if( isset($_POST['slet_kurv']) )
	{
		remove_all_products();
	}

	function add_to_basket($produkt_id, $navn, $antal, $pris)
	{
		if( isset($_SESSION['basket'][$produkt_id]) )
		{
			$_SESSION['basket'][$produkt_id]['antal'] = $_SESSION['basket'][$produkt_id]['antal'] + $_POST['antal'];
		} else {
			$_SESSION['basket'][$produkt_id] = [
				'navn' => $navn,
				'antal' => $antal,
				'pris' => $pris
			];
		}
	}
	
	function remove_product($produkt_id)
	{
		unset($_SESSION['basket'][$_POST['slet_produkt_id']]);
	}

	function remove_all_products()
	{
		unset($_SESSION['basket']);
	}

	function price_with_vat($pris,$antal)
	{
		return ($pris*$antal)*1.25;
	}

	function price_without_vat($pris,$antal)
	{
		return $pris*$antal;
	}
	function price_only_vat($pris,$antal)
	{
		return ($pris*$antal)*0.25;
	}
	
	function all_price_with_vat($basket)
	{
		foreach ($basket as $produkt_id => $produkt) {
			$samlet_pris += price_with_vat($produkt['pris'],$produkt['antal']);
		}
		return $samlet_pris;
	}

	function all_price_without_vat($basket)
	{
		foreach ($basket as $produkt_id => $produkt) {
			$samlet_pris += price_without_vat($produkt['pris'],$produkt['antal']);
		}
		return $samlet_pris;
	}

	function all_price_only_vat($basket)
	{
		foreach ($basket as $produkt_id => $produkt) {
			$samlet_pris += price_only_vat($produkt['pris'],$produkt['antal']);
		}
		return $samlet_pris;
	}

	function vis_kurv()
	{
		$html = '
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
		</tr>';

		foreach ($_SESSION['basket'] as $produkt_id => $produkt) {
			$html .= '<tr>';
			$html .= '<td>'.$produkt['navn'].'</td>';
			$html .= '<td>'.$produkt['antal'].'</td>';
			$html .= '<td>'.$produkt['pris'].'</td>';
			$html .= '<td>'.price_with_vat($produkt['pris'],$produkt['antal']).'</td>';
			$html .= '<td>'.price_without_vat($produkt['pris'],$produkt['antal']).'</td>';
			$html .= '<td>'.price_only_vat($produkt['pris'],$produkt['antal']).'</td>';
			$html .= '<td>
					<form method="post">
					<input type="submit" value="Slet">
					<input type="hidden" name="slet_produkt_id" value="'.$produkt_id.'">
					</form>
				 </td>';
			$html .= '</tr>';
		}
		$html .='
			<tr>
				<td colspan="2">Samlet pris uden moms : 
					'. all_price_without_vat($_SESSION['basket']) .'
				</td>
				<td colspan="2">Samlet pris med moms :
					'. all_price_with_vat($_SESSION['basket']) .'
				</td>
				<td colspan="2">Moms udgør : 
					'. all_price_only_vat($_SESSION['basket']) .'
				</td>
				<td></td>
			</tr>
		</table>';
		return $html;
	}

	//Gem kurv i session - TJEK
	//Opret produkt i kurv - TJEK
	//Opdater en vare - TJEK
	//Tag kurv - TJEK
	//Vis kurv - TJEK
	//Slet enkelt vare - TJEK
	//Samlet pris med moms for et produkter - TJEK
	//Samlet pris uden moms for et produkter - TJEK
	//Samlet moms for et produkter - TJEK
	//Slet alle vare (Tøm kurv)	- TJEK
	//Samlet pris med moms for alle produkter -TJEK
	//Samlet pris uden moms for alle produkter - TJEK
	//Samlet moms for alle produkter - TJEK
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Kurv</h1>

	<?php echo vis_kurv() ?>

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