<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Escuelas */
?>
<div class="escuelas-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_escuela',
            'nombre_escuela',
        ],
    ]) ?>

</div>
