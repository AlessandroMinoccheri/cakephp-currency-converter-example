<?php
App::uses('Controller', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

class TestAuthComponent extends AuthComponent {

/**
 * testStop property
 *
 * @var boolean
 */
  public $testStop = false;

/**
 * Helper method to add/set an authenticate object instance
 *
 * @param integer $index The index at which to add/set the object
 * @param Object $object The object to add/set
 * @return void
 */
  public function setAuthenticateObject($index, $object) {
    $this->_authenticateObjects[$index] = $object;
  }

/**
 * Helper method to add/set an authorize object instance
 *
 * @param integer $index The index at which to add/set the object
 * @param Object $object The object to add/set
 * @return void
 */
  public function setAuthorizeObject($index, $object) {
    $this->_authorizeObjects[$index] = $object;
  }

/**
 * stop method
 *
 * @return void
 */
  protected function _stop($status = 0) {
    $this->testStop = true;
  }

  public static function clearUser() {
    self::$_user = array();
  }

}

class AuthTestController extends Controller {

/**
 * uses property
 *
 * @var array
 */
  public $uses = array('AuthUser');

/**
 * components property
 *
 * @var array
 */
  public $components = array('Session', 'Auth');

/**
 * testUrl property
 *
 * @var mixed null
 */
  public $testUrl = null;

/**
 * construct method
 *
 */
  public function __construct($request, $response) {
    $request->addParams(Router::parse('/auth_test'));
    $request->here = '/auth_test';
    $request->webroot = '/';
    Router::setRequestInfo($request);
    parent::__construct($request, $response);
  }

/**
 * login method
 *
 * @return void
 */
  public function login() {
  }

/**
 * admin_login method
 *
 * @return void
 */
  public function admin_login() {
  }

/**
 * admin_add method
 *
 * @return void
 */
  public function admin_add() {
  }

/**
 * logout method
 *
 * @return void
 */
  public function logout() {
  }

/**
 * add method
 *
 * @return void
 */
  public function add() {
    echo "add";
  }

/**
 * add method
 *
 * @return void
 */
  public function camelCase() {
    echo "camelCase";
  }

/**
 * redirect method
 *
 * @param string|array $url
 * @param mixed $status
 * @param mixed $exit
 * @return void
 */
  public function redirect($url, $status = null, $exit = true) {
    $this->testUrl = Router::url($url);
    return false;
  }

/**
 * isAuthorized method
 *
 * @return void
 */
  public function isAuthorized() {
  }

}

class CurrencyConverterTestCase extends CakeTestCase {
    var $uses = null;
    public $CurrencyConverter;

    /*function testConverter() {
        /*$this->CurrencyConverter = ClassRegistry::init('CurrencyConverterComponent');
        $price = $this->CurrencyConverter->convert('EUR', 'EUR', '1000', 0, 0);
        echo($price);*/


        /*$request = new CakeRequest(null, false);
        $this->Controller = new ExampleController($request, $this->getMock('CakeResponse'));
        $collection = new ComponentCollection();
        $collection->init($this->Controller);
        $this->CurrencyConverter = new CurrencyConverterComponent($collection);
    }*/

    public function setUp() {
      parent::setUp();
      $request = new CakeRequest(null, false);
      $this->Controller = new AuthTestController($request, $this->getMock('CakeResponse'));

      $collection = new ComponentCollection();
      $collection->init($this->Controller);
      $this->Auth = new TestAuthComponent($collection);
      $this->Auth->request = $request;
      $this->Auth->response = $this->getMock('CakeResponse');
      AuthComponent::$sessionKey = 'Auth.User';

      $this->Controller->Components->init($this->Controller);

    }

    public function tearDown() {
      parent::tearDown();

      TestAuthComponent::clearUser();
      $this->Auth->Session->delete('Auth');
      $this->Auth->Session->delete('Message.auth');
      unset($this->Controller, $this->Auth);
    }

}
?>