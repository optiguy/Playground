<?php

/**
 * Class for handling a basket
 */
class Basket
{
	private $basket = array();
	private $session_name = '';

	public function __construct($session_name = 'basket')
	{
		if(session_status() == 1) session_start();

		if(isset($_SESSION[$this->session_name]))
		{
			$this->basket = $_SESSION[$this->session_name];
		} else {
			$this->session_name = $this->session_name;
			$_SESSION[$this->session_name] = array();
		}
	}

	private function save_basket()
	{
		if(!isset($this->basket))
			$this->basket = array();

		$_SESSION[$this->session_name] = $this->basket;
	}

	public function add_to_basket($produkt_id, $navn, $antal, $pris)
	{
		if( isset($this->basket[$produkt_id]) )
		{
			$this->basket[$produkt_id]['antal'] += $antal;
		} else {
			$this->basket[$produkt_id] = [
				'navn' => $navn,
				'antal' => $antal,
				'pris' => $pris
			];
		}
		$this->save_basket();
	}

	public function remove_product($produkt_id)
	{
		unset($this->basket[$produkt_id]);
		$this->save_basket();
	}

	public function remove_all_products()
	{
		unset($this->basket);
		$this->save_basket();
	}

	public function price_with_vat($pris,$antal)
	{
		return ($pris*$antal)*1.25;
	}

	public function price_without_vat($pris,$antal)
	{
		return $pris*$antal;
	}
	
	public function price_only_vat($pris,$antal)
	{
		return ($pris*$antal)*0.25;
	}
	
	public function all_price_with_vat()
	{
		$samlet_pris = 0;
		foreach ($this->basket as $produkt_id => $produkt) {
			$samlet_pris += $this->price_with_vat($produkt['pris'],$produkt['antal']);
		}
		return $samlet_pris;
	}

	public function all_price_without_vat()
	{
		$samlet_pris = 0;
		foreach ($this->basket as $produkt_id => $produkt) {
			$samlet_pris += $this->price_without_vat($produkt['pris'],$produkt['antal']);
		}
		return $samlet_pris;
	}

	public function all_price_only_vat()
	{
		$samlet_pris = 0;
		foreach ($this->basket as $produkt_id => $produkt) {
			$samlet_pris += $this->price_only_vat($produkt['pris'],$produkt['antal']);
		}
		return $samlet_pris;
	}
	
	public function vis_kurv()
	{
		if( isset($this->basket) and count($this->basket)>0 )
		{
			return $this->basket;
		} else {
			return false;
		}
	}

}