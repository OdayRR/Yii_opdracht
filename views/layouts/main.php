<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'Digizijn Opdracht van OdayRafeh',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-light bg-success  navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ? (
                            ['label' => 'Login', 'url' => ['/site/login']]
                            ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                            )
                ],
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
        <div class="languages" style="text-align: center">
            <?php
            foreach (Yii::$app->params['languages'] as $key => $language) {
                echo '<button class="language" id ="' . $key . '">' . $language . ' </button>';
            }
            ?> 
        </div>

        <footer class="Footer" style="padding-top:300px">
            <div class="container" style="position: relative">
                <ul>
                    <li><a href="index.php">&copy; Digizijn <?= date('Y') ?></a></li>
                    <li><?= Html::a('Contact us', ['/site/contact']) ?></li>
                    <li><?= yii::powered() ?></li>
                </ul>
                <p class="footer-copyright">© 2018 Copyright is Reserved For OdayRafeh </p>
            </div>
            <div class="footer-social">
                <a href="#" class="social-icons"><i class="fa fa-facebook"></i></a>
                <a href="#" class="social-icons"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="social-icons"><i class="fa fa-twitter"></i></a>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
