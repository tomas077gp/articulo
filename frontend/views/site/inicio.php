  <?php
  /* @var $this yii\web\View */
   use yii\helpers\Html;
   use yii\helpers\Url;
   use yii\bootstrap\ActiveForm;
  $this->title = 'Home';
  ?>

  <div class="body-content bg-info">

        <div class="row mt">
            <div class="col-lg-6">

              <center><?= Html::img(Url::to('/yii2_base-master/frontend/views/site/img/lg.JPG', false), ['alt' => 'My logo', 'width'=>'300']) ?></center>

              <h1 class="text-center">PUCESE</h1>

              <p class="lead text-center">Registros de Artículos Científicos</p>
            </div>
            <div class="col-lg-6">

                  <h1 class="text-left">PUCESE</h1>
                  <p class="bg-info">Favor ingresar sus datos de acceso</p>

                  <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->label('Nombre de Usuario')->textInput(['autofocus' => true, 'placeholder'=>'Ingrese el nombre de usuario']) ?>

                    <?= $form->field($model, 'password')->label('Contraseña')->passwordInput(['placeholder'=>'Ingrese la contraseña']) ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div style="color:#999;margin:1em 0 ">
                        Olvidó la contraseña <?= Html::a('Recuperarla', ['site/request-password-reset']) ?>.
                    </div>
                  <div class="form-group">
                  <?= Html::submitButton('Inicion de seción', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                  </div>

                  <?php ActiveForm::end(); ?>

            </div>

        </div>

    </div>
  </div>
