<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Charges */

$this->title = 'Добавление записи';
$this->params['breadcrumbs'][] = ['label' => 'Расходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="charges-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
