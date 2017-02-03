<?php
use yii\helpers\Url;
use kartik\grid\GridView;
return [
    //[
    //    'class' => 'kartik\grid\CheckboxColumn',
    //    'width' => '20px',
    //],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    //[
    //    'class'=>'\kartik\grid\DataColumn',
    //    'attribute'=>'id_articulo',
    //],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nombre_articulo',
        'pageSummaryOptions' =>
        [
         'append' => 'Total'
        ]
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Url',
    ],


    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'descripcion',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'puntaje_articulo',
        'pageSummary' => true,
        'pageSummaryFunc' => GridView::F_SUM,
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ciudad',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'fecha_creacion',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'fehca_revision',
    // ],
       [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'fecha_publicacion',
       ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id_estados',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id_categoria',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) {
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'],
    ],

];
