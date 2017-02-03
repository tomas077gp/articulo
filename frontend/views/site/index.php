<?php
/* @var $this yii\web\View */
 use yii\helpers\Html;
 use yii\helpers\Url;
 use yii\bootstrap\ActiveForm;
 use frontend\models\Escuelas;
use frontend\models\Articulo;
$this->title = 'Home';
?>

<div class="body-content">

      <div class="row mt">

      
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

    </div>

  </div>
<?php
$script = <<< JS
//here you right all you code javascript  stuff CODNACIONALIDAD
$('#idAnio').change(function(){

  $.post("index.php?r=articulo/anio&anio="+$(this).val(), function(data){


      var tabla = '<table class="table table-bordered bg-primary">';
           tabla = tabla + '<th>Escuela</th>';
           tabla = tabla + '<th>Puntaje</th>';
           tabla = tabla + '<th>Cantidad</th>';

           tabla = tabla + data;

           tabla = tabla + '</table>';

      $('#puntaje').html(tabla);
  });

});
JS;
$this->registerJs($script);
 ?>
