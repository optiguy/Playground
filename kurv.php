<?php
	session_start();
	//$_SESSION['basket'] = array(); 
	//Navn, pris, antal, id

	if( isset($_POST['produkt_id']) )
	{
		if( isset($_SESSION['basket'][$_POST['produkt_id']]) )
		{
			$_SESSION['basket'][$_POST['produkt_id']]['antal'] = $_SESSION['basket'][$_POST['produkt_id']]['antal'] + $_POST['antal'];
		} else {
			$_SESSION['basket'][$_POST['produkt_id']] = [
				'navn' => $_POST['navn'],
				'antal' => $_POST['antal'],
				'pris' => $_POST['pris']
			];
		}
	}

	if( isset($_POST['slet_produkt_id']) )
	{
		unset($_SESSION['basket'][$_POST['slet_produkt_id']]);
	}

	if( isset($_POST['slet_kurv']) )
	{
		unset($_SESSION['basket']);
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
		foreach ($_SESSION['basket'] as $produkt_id => $produkt) {
			echo '<tr>';
			echo '<td>'.$produkt['navn'].'</td>';
			echo '<td>'.$produkt['antal'].'</td>';
			echo '<td>'.$produkt['pris'].'</td>';
			echo '<td>'.($produkt['pris']*$produkt['antal'])*1.25.'</td>';
			echo '<td>'.$produkt['pris']*$produkt['antal'].'</td>';
			echo '<td>'.($produkt['pris']*$produkt['antal'])*0.25.'</td>';
			echo '<td>
					<form method="post">
					<input type="submit" value="Slet">
					<input type="hidden" name="slet_produkt_id" value="'.$produkt_id.'">
					</form>
				 </td>';
			echo '</tr>';
		}
	?>
		<tr>
			<td colspan="2">Samlet pris uden moms : 
				<?php 
				foreach ($_SESSION['basket'] as $produkt_id => $produkt) {
					$samlet_pris += $produkt['pris']*$produkt['antal'];
				}
				echo $samlet_pris;
				?>
			</td>
			<td colspan="2">Samlet pris med moms :
				<?php 
				foreach ($_SESSION['basket'] as $produkt_id => $produkt) {
					$samlet_pris_uden_moms += ($produkt['pris']*$produkt['antal'])*1.25;
				}
				echo $samlet_pris_uden_moms;
				?>
			</td>
			<td colspan="2">Moms udgør : 
				<?php 
				foreach ($_SESSION['basket'] as $produkt_id => $produkt) {
					$moms += ($produkt['pris']*$produkt['antal'])*0.25;
				}
				echo $moms;
				?>
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