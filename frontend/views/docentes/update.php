<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Docentes */

$this->title = 'Update Docentes: ' . $model->id_docente;
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_docente, 'url' => ['view', 'id_docente' => $model->id_docente, 'id_escuela' => $model->id_escuela]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="docentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
