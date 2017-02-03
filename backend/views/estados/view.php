<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Estados */
?>
<div class="estados-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_estados',
            'nombre_estado',
        ],
    ]) ?>

</div>
