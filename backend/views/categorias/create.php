<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Categorias */

$this->title = Yii::t('app', 'Create Categorias');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categorias_padre' => $categorias_padre
    ]) ?>

</div>
