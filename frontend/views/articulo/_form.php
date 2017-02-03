<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use enigmatix\yii2select\Select2;
use kartik\select2\Select2;
use frontend\models\Estados;
use frontend\models\Escuelas;
use frontend\models\Categoria;
use yii\helpers\ArrayHelper;
use kartik\touchspin\TouchSpin;
use kartik\date\DatePicker;
use kartik\widgets\FileInput;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\Articulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulo-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'nombre_articulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Url')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
    <div class="row">
      <div class="col-sm-6">
        <?php
            echo '<label class="control-label">Puntaje</label>';
            echo TouchSpin::widget([
              'name' =>  'puntaje_articulo',
              'model' => $model,
              'attribute' => 'puntaje_articulo',
              'options' => ['placeholder' => 'Puntaje...', 'min' => 0,'max' => 100]
          ]);
         ?>
      </div>
      <div class="col-sm-6">
        <?= $form->field($model, 'ciudad')->textInput(['maxlength' => true]) ?>
      </div>
    </div>



    <!--?= $form->field($model, 'fecha_creacion')->textInput() ?-->
<div class="row">

  <div class="col-sm-6">
    <?php
        echo '<label class="control-label">Fecha de Revisión</label>';
        echo DatePicker::widget([
            'name' => 'fehca_revision',
            'model' => $model,
            'attribute' => 'fehca_revision',
            'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'value' => '',
            'pluginOptions' => [
              'autoclose'=>true,
              'format' => 'yyyy-m-dd'
            ]
        ]);
    ?>

  </div>
  <div class="col-sm-6">
    <?php
        echo '<label class="control-label">Fecha de Publicación</label>';
        echo DatePicker::widget([
            'name' => 'fecha_publicacion',
            'model' => $model,
            'attribute' => 'fecha_publicacion',
            'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'value' => '',
            'pluginOptions' => [
              'autoclose'=>true,
              'format' => 'yyyy-m-dd'
            ]
        ]);
    ?>

  </div>

</div>


    <?php
        echo $form->field($model, 'id_escuela')->label('Escuela')->widget(Select2::classname(), [
            'data'  =>ArrayHelper::map(Escuelas::find()->all(), 'id_escuela', 'nombre_escuela'),
            'options' => ['placeholder' => 'Seleccione la opción...'],
            'pluginOptions' => [
            'allowClear' => true
            ],
        ]);
    ?>

    <?php
        echo $form->field($model, 'id_estados')->label('Estados')->widget(Select2::classname(), [
            'data'  => ArrayHelper::map(Estados::find()->all(), 'id_estados', 'nombre_estado'),
            'options' => ['placeholder' => 'Seleccione la opción...'],
            'pluginOptions' => [
               'allowClear' => true
            ],
            ]);
    ?>

    <?php

    // Adjust caption and button size}

  echo $form->field($model, 'file')->fileInput()->widget(FileInput::classname(), [
    'name' => 'attachment_51',
    'pluginOptions' => [
        'showUpload' => false,
        'browseLabel' => '',
        'removeLabel' => '',
        'mainClass' => 'input-group-md'
    ]
     ]);
      ?>


    <div class="form-group">
        <br>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
