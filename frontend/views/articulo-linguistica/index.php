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
      <div class="col-sm-2">

      <?php   echo Html::a('Crear Articulos', '/yii2_base-master/frontend/web?r=articulo-linguistica/create',['class'=>'btn btn-primary btn-md']) ;  ?>

      </div>
    </div><br/>



          <?php

          echo GridView::widget([
              'id'=>'crud-datatable',
              'dataProvider' =>   $dataProvider,
              'filterModel' => $searchModel,
              'pjax'=>true,
              'columns' => [
                //'id_escuela',
                [
                 'attribute' => 'fecha_publicacion',
                 'value' => 'fecha_publicacion',
                 'format' => 'raw',
                 'filter' =>  DatePicker::widget([
                    'model' =>$searchModel,
                    'attribute' => 'fecha_publicacion',

                    'clientOptions' => [
                      'autoclose' => true,
                      'format' => 'yyyy-mm-dd'
                    ]
                  ]),

               ],
                'nombre_articulo',
                'Url',
                'descripcion',


                ['class' => 'yii\grid\ActionColumn'],

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

          ]);

            ?>

</div>



</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
