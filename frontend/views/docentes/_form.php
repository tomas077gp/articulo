<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Docentes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docentes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_docente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos_docente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula')->textInput() ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_escuela')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
