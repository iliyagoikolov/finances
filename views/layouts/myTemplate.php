<?php
use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <div class="container">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <?= Html::a("Главная", "@web") ?>
            </li>
            <li class="nav-item">
                <?= Html::a("Test", ["post/test"]) ?>
            </li>
            <li class="nav-item">
                <?= Html::a("Статья", ["post/show"]) ?>
            </li>
            <li class="nav-item">
                <?= Html::a("Статьи", ["post/index"]) ?>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <h1>Hello myTemplate</h1>
        <?php
            if (isset($this->blocks["block1"])):
                echo  $this->blocks["block1"];
            endif;
        ?>
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
</html>
<?php $this->endPage() ?>