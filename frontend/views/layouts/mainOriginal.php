<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
 use yii\helpers\Url;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'INICIO',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Inicio', 'url' => ['/site/index']],
                    //['label' => 'Contact', 'url' => ['/site/contact']],
            ];
            if (Yii::$app->user->isGuest) {
                //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
            } else {
                $menuItems  = [
                    ['label' => 'Artículos', 'url' => ['/articulo']],
                    ['label' => 'Gii', 'url' => ['/gii']],
                ];
                $menuItems  = [
                    ['label' => 'BACKEND', 'url' => '/../yii2_base-master/backend/web/index.php'],
                ];
                $menuItems[] = [
                    'label' => 'MODULOS',
                    //'visible' => Yii::$app->user->identity->isAdmin || Yii::$app->user->can('marc'),
                    'items' => [
                        ['label' => 'Articulos', 'url' => ['/articulo'],],
                    ],
                ];
                $menuItems[] = '<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">PERFIL <b class="caret"></b></a>'
                               .'<ul id="w4" class="dropdown-menu">'
                                .'<li><a href="'.Yii::$app->homeUrl.'user/settings/account" tabindex="-1">Mi cuenta</a></li>'
                        .'<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                                'Salir (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link']
                        )
                        . Html::endForm()
                        . '</li>'
                        . '</ul>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
<?=
Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])
?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; PUCESE <?= date('Y') ?></p>

                <!--p class="pull-right">< ?= Yii::powered() ?></p-->
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
