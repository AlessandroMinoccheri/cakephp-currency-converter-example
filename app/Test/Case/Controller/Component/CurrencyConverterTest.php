<?php
class CurrencyConverterTestCase extends CakeTestCase {
    function testGetTransporter() {
          $this->CurrencyConverterComponentTest = new CurrencyConverterComponent();
          $controller = new ExampleController();
          $controller->Example = new ExampleTest();
          //$this->CurrencyConverterComponentTest->startup(&$controller);

          /*$result = $this->TransporterComponentTest->getTransporter("12345", "Sweden", "54321", "Sweden");
          $this->assertEqual($result, 1, "SP is best for 1xxxx-5xxxx");

          $result = $this->TransporterComponentTest->getTransporter("41234", "Sweden", "44321", "Sweden");
          $this->assertEqual($result, 2, "WSTS is best for 41xxx-44xxx");

          $result = $this->TransporterComponentTest->getTransporter("41001", "Sweden", "41870", "Sweden");
          $this->assertEqual($result, 3, "GL is best for 410xx-419xx");

          $result = $this->TransporterComponentTest->getTransporter("12345", "Sweden", "54321", "Norway");
          $this->assertEqual($result, 0, "Noone can service Norway");*/
    }
}
?>