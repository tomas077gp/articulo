<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DocentesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docentes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_docente') ?>

    <?= $form->field($model, 'nombre_docente') ?>

    <?= $form->field($model, 'apellidos_docente') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'cedula') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'id_escuela') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
