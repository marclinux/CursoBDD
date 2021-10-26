<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Categorias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ClaveCategoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NombreCategoria')->textInput(['maxlength' => true]) ?>

    <?php
    if(!$model->isNewRecord)
        echo $form->field($model, 'Activo')->checkbox();
    ?>

    <?= $form->field($model, 'idCategoriaPadre')->dropDownList($categorias_padre) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
