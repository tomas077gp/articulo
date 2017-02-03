<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\DashgumAsset;
use common\widgets\Alert;
use yii\helpers\Url;
DashgumAsset::register($this);
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
    <body class="bg-info">
        <?php $this->beginBody() ?>

          <section id="container-fluid" >
              <!-- **********************************************************************************************************************************************************
              TOP BAR CONTENT & NOTIFICATIONS
              *********************************************************************************************************************************************************** -->
              <!--header start-->

              <header class="header black-bg">

                      <div class="sidebar-toggle-box">
                          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                      </div>
                    <!--logo start-->
                    <a href="index.html" class="logo"><b>DASHGUM FREE</b></a>
                    <!--logo end-->
                    <div class="nav notify-row" id="top_menu">
                        <!--  notification start -->
                        <ul class="nav top-menu">
                            <!-- settings start -->
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                                    <i class="fa fa-tasks"></i>
                                    <span class="badge bg-theme">4</span>
                                </a>
                                <ul class="dropdown-menu extended tasks-bar">
                                    <div class="notify-arrow notify-arrow-green"></div>
                                    <li>
                                        <p class="green">You have 4 pending tasks</p>
                                    </li>
                                    <li>
                                        <a href="index.html#">
                                            <div class="task-info">
                                                <div class="desc">DashGum Admin Panel</div>
                                                <div class="percent">40%</div>
                                            </div>
                                            <div class="progress progress-striped">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#">
                                            <div class="task-info">
                                                <div class="desc">Database Update</div>
                                                <div class="percent">60%</div>
                                            </div>
                                            <div class="progress progress-striped">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    <span class="sr-only">60% Complete (warning)</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#">
                                            <div class="task-info">
                                                <div class="desc">Product Development</div>
                                                <div class="percent">80%</div>
                                            </div>
                                            <div class="progress progress-striped">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#">
                                            <div class="task-info">
                                                <div class="desc">Payments Sent</div>
                                                <div class="percent">70%</div>
                                            </div>
                                            <div class="progress progress-striped">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                                    <span class="sr-only">70% Complete (Important)</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="external">
                                        <a href="#">See All Tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- settings end -->
                            <!-- inbox dropdown start-->
                            <li id="header_inbox_bar" class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-theme">5</span>
                                </a>
                                <ul class="dropdown-menu extended inbox">
                                    <div class="notify-arrow notify-arrow-green"></div>
                                    <li>
                                        <p class="green">You have 5 new messages</p>
                                    </li>
                                    <li>
                                        <a href="index.html#">
                                            <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                                            <span class="subject">
                                            <span class="from">Zac Snider</span>
                                            <span class="time">Just now</span>
                                            </span>
                                            <span class="message">
                                                Hi mate, how is everything?
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#">
                                            <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                                            <span class="subject">
                                            <span class="from">Divya Manian</span>
                                            <span class="time">40 mins.</span>
                                            </span>
                                            <span class="message">
                                             Hi, I need your help with this.
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#">
                                            <span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
                                            <span class="subject">
                                            <span class="from">Dan Rogers</span>
                                            <span class="time">2 hrs.</span>
                                            </span>
                                            <span class="message">
                                                Love your new Dashboard.
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#">
                                            <span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
                                            <span class="subject">
                                            <span class="from">Dj Sherman</span>
                                            <span class="time">4 hrs.</span>
                                            </span>
                                            <span class="message">
                                                Please, answer asap.
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#">See all messages</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- inbox dropdown end -->
                        </ul>
                        <!--  notification end -->
                    </div>
                    <div class="top-menu">
                    	<ul class="nav pull-right top-menu">
                            <li><a class="logout" href="login.html">Logout</a></li>
                    	</ul>
                    </div>
                </header>


              <header class="header bg-primary">
                <?php if(!Yii::$app->user->isGuest){ ?>

                      <div class="sidebar-toggle-box">
                          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                      </div>
                      <div class="bar ">
                  <!--logo start-->
                  <?php } ?>

                  <?php  echo Html::a('<b>PUCESE</b>',Url::to('/yii2_base-master/frontend/web/index.php', false), ['class'=> 'logo']); ?>
                  <!--logo end-->
                    <div class="top-menu">
                      <ul class="nav pull-right top-menu">

                        <?php if(!Yii::$app->user->isGuest){ ?>
                        <li>
                        <?= Html::a('Salir (' . Yii::$app->user->identity->username . ')', ['site/logout'], ['data-method' => 'post', 'class'=> 'logout']) ?>
                        </li>
                        <?php }else { ?>

                        <?php  } ?>


                      </ul>
                    </div>
                </header>
              <!--header end-->
<?php if(!Yii::$app->user->isGuest) { ?>
          <aside>
              <div id="sidebar"  class="nav-collapse ">
                  <!-- sidebar menu start-->
                  <ul class="sidebar-menu" id="nav-accordion">

                      <li class="mt">
                          <a class="" href="/yii2_base-master/frontend/web/inicio.php">
                              <i class="fa fa-user"></i>
                              <span>Inicio</span>
                          </a>
                      </li>

                      <li class="mt">
                        <a href="/yii2_base-master/frontend/web?r=articulo-linguistica" >
                        <i class="fa fa-th"></i>
                        <span>Linguistica</span>
                        </a>
                      </li>
                      <li class="mt">
                        <a href="/yii2_base-master/frontend/web?r=articulo-sistemas" >
                        <i class="fa fa-cogs"></i>
                        <span>Sistemas</span>
                        </a>
                      </li>
                      <li class="mt">
                        <a href="/yii2_base-master/frontend/web?r=articulo-ambiental" >
                        <i class="fa fa-desktop"></i>
                        <span>Ambiental</span>
                        </a>
                      </li>
                      <li class="mt">
                        <a href="/yii2_base-master/frontend/web?r=articulo-enfermeria" >
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Enfermeria</span>
                        </a>
                      </li>
                      <li class="mt">
                        <a href="/yii2_base-master/frontend/web?r=articulo-administracion" >
                        <i class="fa fa-book"></i>
                        <span>Administración</span>
                        </a>
                      </li>
                  </ul>
                  <!-- sidebar menu end-->
              </div>

          </aside>
  </section>

    <section id="main-content">
      <section class="wrapper">

        <div class="container-fluid">
            <?=
            Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])
            ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
      </section>
  </section>

<?php } else { ?>
          <!--sidebar end-->


<div class="container-fluid">
<br/><br/><br/><br/><br/>
          <?=
          Breadcrumbs::widget([
              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
          ])
          ?>
          <?= Alert::widget() ?>
          <?= $content ?>

</div>







<?php }  ?>


        <?php $this->endBody() ?>

    </body>
</html>
<?php $this->endPage() ?>
