<?php
/**
 * @author Капенкин Дмитрий <dkapenkin@rambler.ru>
 * @date 26.03.15
 * @time 9:25
 * Created by JetBrains PhpStorm.
 */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\icons\Icon;

/* @var $this \yii\web\View */
/* @var $content string */

Icon::map($this, Icon::WHHG);
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
<header class="header">
    <div class="container">
        <div class="row header_logo">
            <div class="col-md-12">
                <div class="search">
                    <div class="input-group search">
                        <span class="input-group-addon grad_blue_1"><?= Icon::show('search', [], Icon::WHHG) ?></span>
                        <?= Html::input('text','search',null,['class'=>'grad_blue_1 search_input']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?= Nav::widget([
                    'options' => ['class' => 'left_menu'],
                    'items' => [
                        [
                            'label' => 'Главная',
                            'url' => ['/'],
                            'active' => Yii::$app->controller->getRoute() == 'default/index',
                            'options'=> ['class'=>'left_menu_item'],
                            'linkOptions'=> ['class'=>'grad_blue_1 border_radius_all_5 left_menu_link']
                        ],
                        [
                            'label' => 'Фотогалерея',
                            'url' => ['/photo'],
                            'active' => Yii::$app->controller->getRoute() == 'default/photo',
                            'options'=> ['class'=>'left_menu_item'],
                            'linkOptions'=> ['class'=>'grad_blue_1 border_radius_all_5 left_menu_link']
                        ],
                        [
                            'label' => 'Калькулятор',
                            'url' => ['/calculator'],
                            'active' => Yii::$app->controller->getRoute() == 'default/calculator',
                            'options'=> ['class'=>'left_menu_item'],
                            'linkOptions'=> ['class'=>'grad_blue_1 border_radius_all_5 left_menu_link']
                        ],
                        [
                            'label' => 'Контакты',
                            'url' => ['/contact'],
                            'active' => Yii::$app->controller->getRoute() == 'default/contact',
                            'options'=> ['class'=>'left_menu_item'],
                            'linkOptions'=> ['class'=>'grad_blue_1 border_radius_all_5 left_menu_link']
                        ],
                        [
                            'label' => 'Вопросы/Ответы',
                            'url' => ['/faq'],
                            'active' => Yii::$app->controller->getRoute() == 'default/faq',
                            'options'=> ['class'=>'left_menu_item'],
                            'linkOptions'=> ['class'=>'grad_blue_1 border_radius_all_5 left_menu_link']
                        ],
                        [
                            'label' => 'Форум',
                            'url' => ['/forum'],
                            'active' => Yii::$app->controller->getRoute() == 'default/forum',
                            'options'=> ['class'=>'left_menu_item'],
                            'linkOptions'=> ['class'=>'grad_blue_1 border_radius_all_5 left_menu_link']
                        ],
                        [
                            'label' => 'Документы',
                            'url' => ['/documents'],
                            'active' => Yii::$app->controller->getRoute() == 'default/documents',
                            'options'=> ['class'=>'left_menu_item'],
                            'linkOptions'=> ['class'=>'grad_blue_1 border_radius_all_5 left_menu_link']
                        ],
                        [
                            'label' => 'Бригады',
                            'url' => ['/brigade'],
                            'active' => Yii::$app->controller->getRoute() == 'default/brigade',
                            'options'=> ['class'=>'left_menu_item'],
                            'linkOptions'=>['class'=>'grad_blue_1 border_radius_all_5 left_menu_link']
                        ],
                    ],
                ]);
            ?>
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
        <div class="col-md-9">
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        FOOTER
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
