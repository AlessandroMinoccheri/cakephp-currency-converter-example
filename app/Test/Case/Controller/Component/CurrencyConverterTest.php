<?php
class CurrencyConverterTestCase extends CakeTestCase {
    var $uses = null;
    public $CurrencyConverter;

    function testConverter() {
        $this->CurrencyConverter = ClassRegistry::init('CurrencyConverterComponent');
        $price = $this->CurrencyConverter->convert('EUR', 'EUR', '1000', 0, 0);
        //echo($price);
    }
}
?>