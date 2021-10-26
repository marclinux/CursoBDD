<?php
namespace backend\tests;

use Codeception\Util\Locator;
use common\fixtures\CategoriasFixture;
use yii\helpers\Url;

class CategoriasSteps
{
    protected $I;
    public function __construct(AcceptanceTester $I)
    {
        $this->I = $I;
        $this->I->haveFixtures([
            'categorias' => [
                'class' => CategoriasFixture::class,
                'dataFile' => codecept_data_dir() . 'categorias_data.php',
            ],
        ]);
    }

    /**
     * @Given que estoy en la pagina de crear categoria
     */
     public function queEstoyEnLaPaginaDeCrearCategoria()
     {
         $this->I->amOnPage(Url::toRoute('/categorias/create'));
     }

    /**
     * @Given capturo :arg1 en el dato de la clave
     */
     public function capturoEnElDatoDeLaClave($arg1)
     {
         $this->I->fillField('#categorias-clavecategoria', $arg1);
     }

    /**
     * @Given capturo :arg1 en el dato de la descripcion
     */
     public function capturoEnElDatoDeLaDescripcion($arg1)
     {
        $this->I->fillField('#categorias-nombrecategoria', $arg1);
     }

    /**
     * @Given selecciono :arg1 en el dato de categoria padre
     */
     public function seleccionoEnElDatoDeCategoriaPadre($arg1)
     {
         $this->I->selectOption('select', $arg1);
     }

    /**
     * @When doy click en :arg1
     */
     public function doyClickEn($arg1)
     {
         $this->I->click($arg1);
         $this->I->wait(3);
     }

    /**
     * @Then debo tener una categoria con los dato de :arg1 en la clave, :arg2 en la descripcion y :arg3 en la categoria padre
     */
     public function deboTenerUnaCategoriaConLosDatoDeEnLaClaveEnLaDescripcionYEnLaCategoriaPadre($arg1, $arg2, $arg3)
     {
        $this->I->seeInDatabase('categorias', ['ClaveCategoria' => $arg1, 'NombreCategoria' => $arg2, 'idCategoriaPadre' => $arg3]);         
     }

    /**
     * @Given que estoy en la pagina de modificar categoria con el id :arg1
     */
     public function queEstoyEnLaPaginaDeModificarCategoriaConElId($arg1)
     {
         $ruta = '/categorias/update?id=' . $arg1;
         $this->I->amOnPage(Url::toRoute($ruta));
     }

    /**
     * @Then debo tener los datos de :arg1 en la clave, :arg2 en la descripcion de la categoria con id :arg3  
     */
     public function deboTenerLosDatosDeEnLaClaveEnLaDescripcionDeLaCategoriaConId($arg1, $arg2, $arg3)       
     {
        $this->I->seeInDatabase('categorias', ['ClaveCategoria' => $arg1, 'NombreCategoria' => $arg2, 'id' => $arg3]);
     }

    /**
     * @Given que estoy en la pagina de mostrar categorias
     */
     public function queEstoyEnLaPaginaDeMostrarCategorias()
     {
         $this->I->amOnPage(Url::toRoute('/categorias'));
     }

    /**
     * @When doy click en el icono de eliminar de la categoria con id :arg1
     */
     public function doyClickEnElIconoDeEliminarDeLaCategoriaConId($arg1)
     {
         $selectorUrl = '/proyectosYii2/ExRestaurantBDD/backend/web/index-test.php/categorias/delete?id=' . $arg1;
         $this->I->click(Locator::href($selectorUrl));
     }

    /**
     * @When confirmo eliminar el registro
     */
     public function confirmoEliminarElRegistro()
     {
        $this->I->wait(3);
        $this->I->acceptPopup();
        $this->I->wait(3);
     }

    /**
     * @Then la categoria con clave :arg1 yo no debe existir
     */
     public function laCategoriaConClaveYoNoDebeExistir($arg1)
     {
         $this->I->dontSeeInDatabase('categorias', ['ClaveCategoria' => $arg1]);
     }
}
