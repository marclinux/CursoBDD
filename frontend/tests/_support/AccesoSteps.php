<?php
namespace frontend\tests;
use yii\helpers\Url;
use common\fixtures\UserFixture;

class AccesoSteps 
{
    protected $I;
    public function __construct(AcceptanceTester $I)
    {
        $this->I = $I;
        $this->I->haveFixtures([
            'users' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }    

     /**
     * @Given estoy en la pagina de acceso
     */
    public function estoyEnLaPaginaDeAcceso()
    {
        $user1 = $this->I->grabFixture('users', 'user');
        if($user1 != null)
            $this->I->amOnPage(Url::toRoute('/user/security/login'));
    }

   /**
    * @Given capturo :arg1 en el login
    */
    public function capturoEnElLogin($arg1)
    {
        $this->I->fillField('#loginform-login', $arg1);
    }

   /**
    * @Given capturo :arg1 en el password
    */
    public function capturoEnElPassword($arg1)
    {
        $this->I->fillField('#loginform-password', $arg1);
    }

   /**
    * @When Hago click en aceptar
    */
    public function hagoClickEnAceptar()
    {
        $this->I->click('Sign in');
    }

   /**
    * @Then Recibo el mensaje de error :arg1
    */
    public function reciboElMensajeDeError($arg1)
    {
        $this->I->see($arg1);
    }

}
