<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Categorias */

$this->title = Yii::t('app', 'Update Categorias: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="categorias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categorias_padre' => $categorias_padre
    ]) ?>

</div>
