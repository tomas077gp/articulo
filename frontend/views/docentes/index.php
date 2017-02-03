<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DocentesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docentes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Docentes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_docente',
            'nombre_docente',
            'apellidos_docente',
            'direccion',
            'cedula',
            // 'correo',
            // 'id_escuela',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
