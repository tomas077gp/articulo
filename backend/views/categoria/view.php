<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Categoria */
?>
<div class="categoria-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_categoria',
            'nombre_categoria',
        ],
    ]) ?>

</div>
