<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Breadcrumbs;
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\bootstrap\Modal;
use frontend\models\Escuelas;
use frontend\models\Articulo;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ArticuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulo-index">
  <div id="ajaxCrudDatatable">

    <div class="row" >
      <div class="col-md-1">

      <?php   echo Html::a('Crear Articulos', '/yii2_base-master/frontend/web?r=articulo/create',['class'=>'btn btn-primary btn-md']) ;  ?>

      </div>
      <div class="col-md-11">

        <?php
              Modal::begin([
                  'header' => '<p>Puntajes por escuelas</p>',
                  'headerOptions' => ['class' => 'bg-primary'],
                  'size' => 'modal-lg',
                  //'options' => [ 'class' => 'primary' ],
                  'toggleButton' => ['label' => 'Reporte de calificaciones', 'class' => 'btn btn-primary'],
              ]);
         ?>

        <?php
         $fecha = Articulo::find()->select(['fecha_publicacion'])->all();

          foreach ($fecha as $key => $value) {

          $anio[$key] =  substr($value->fecha_publicacion, 0, 4);

          }
          $anio = array_unique($anio);
          ?>

          <select class="selectpicker" id="idAnio">

          <option value = "">Seleccione la opción</option>

          <?php foreach ($anio as $key => $value) {  ?>

                  <option value = "<?php echo $anio[$key]; ?>"> <p>Año: </p><?php echo $anio[$key]; ?></option>

          <?php } ?>

          </select>


          <div id="puntaje"></div>


        <?php  Modal::end();      ?>

      </div>
    </div><br/>



          <?php

          echo GridView::widget([
              'id'=>'crud-datatable',
              'dataProvider' =>   $dataProvider,
              'filterModel' => $searchModel,
              'pjax'=>true,
              'columns' => [
                [
                 'attribute' => 'fecha_publicacion',
                 'value' => 'fecha_publicacion',
                 'format' => 'raw',
                 'filter' =>  Html::activeTextInput($searchModel,'fecha_publicacion',['class'=>'form-control']),

               ],


                'nombre_articulo',
                'Url',
                'descripcion',


              ],
              'toolbar'=> [
                  ['content'=>
                      Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                      ['role'=>'modal-remote','title'=> 'Crear nuevos artículos','class'=>'btn btn-success']).
                      Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                      ['data-pjax'=>1, 'class'=>'btn btn-warning', 'title'=>'Refrescar']).
                      '{toggleData}'.
                      '{export}'
                  ],
              ],
              'striped' => true,
              'condensed' => true,
              'responsive' => true,
              'panel' => [
                  'type' => 'primary',
                  'heading' => '<i class="glyphicon glyphicon-list"></i> Listado de artículos',
                  'before'=>'<em>*  Listado de artículos.</em>',

              ],
              'showPageSummary' => true
          ]);

            ?>

</div>



</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

<?php
$script = <<< JS
//here you right all you code javascript  stuff CODNACIONALIDAD
$('#idAnio').change(function(){

  $.post("index.php?r=articulo/anio&anio="+$(this).val(), function(data){


      var tabla = '<table class="table table-hover">';
           tabla = tabla + '<th>Escuela</th>';
           tabla = tabla + '<th>Puntaje</th>';
           tabla = tabla + '<th>Cantidad</th>';

           tabla = tabla + data;

           tabla = tabla + '</table>';

      $('#puntaje').html(tabla);
  });

});
$( function() {
  $( "#fecha_publicacion" ).datepicker();
} );
JS;
$this->registerJs($script);
 ?>
