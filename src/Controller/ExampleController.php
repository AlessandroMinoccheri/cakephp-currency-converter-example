<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class ExampleController extends AppController {
    public $components = array(
        'CurrencyConverter.CurrencyConverter',
        'UserPermissions.UserPermissions'
    );

    public function beforeFilter() {
        
    }

    public function index () {
        $amount = '2100,00';
        $price = $this->CurrencyConverter->convert('GBP', 'EUR', $amount, 1, 1);

        $this->set('original_price', $amount.' GBP');
        $this->set('converted_price', $price.' EUR');
    }

    public function register() {

    }

    public function logout() {
        
    }

    public function login() {
        
    }

    public function add() {
        
    }

    public function edit() {
        
    }
}
?>