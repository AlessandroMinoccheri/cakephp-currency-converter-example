<?php
class ExampleController extends AppController {
	public $name = 'Example';
	public $components = array(
	    'CurrencyConverter.CurrencyConverter'
	);

	public function index () {
		$amount = '2100,00';
		$price = $this->CurrencyConverter->convert('GBP', 'EUR', $amount, 1, 1);

		$this->set('original_price', $amount.' GBP');
		$this->set('converted_price', $price.' EUR');
	}
}
?>