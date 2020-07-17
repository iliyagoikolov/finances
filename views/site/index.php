<?php
/* @var $this yii\web\View */

$this->registerCssFile('css/style.css');
$this->title = 'Контроль расходов';
echo "Версия Yii: ".Yii::getVersion();
?>

<div class="site-index">

        <h2 class="header"><?=$this->title?></h2>
        <div class="row">
            <div class="col-sm-8">
                <p>
                    Поможет вам организовать удобную систему учёта всех ваших расходов.
                    Это приложение обладает интуитивно понятным интерфейсом, позволяющим мгновенно добавлять,
                    новые записи. Также их можно редактировать и удалять. Приложение визуализирует затраты на
                    круговой диаграмме.
                </p>
                <br>
                <p>
                     В данный момент оно находится в стадии разработки. Чтобы приступить к работе, вам осталось
                    только зарегистрироваться.
                </p>
            </div>
            <div class="col-sm-4">
                <img class= "image img-responsive img-rounded" src="images/laptop.jpg" alt="Картинка">
            </div>
        </div>

    </div>





