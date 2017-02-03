<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Docentes */

$this->title = $model->id_docente;
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docentes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_docente' => $model->id_docente, 'id_escuela' => $model->id_escuela], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_docente' => $model->id_docente, 'id_escuela' => $model->id_escuela], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_docente',
            'nombre_docente',
            'apellidos_docente',
            'direccion',
            'cedula',
            'correo',
            'id_escuela',
        ],
    ]) ?>

</div>
