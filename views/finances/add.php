<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ChargesOld */
/* @var $form ActiveForm */

$this->title = 'Добавление записи';
$this->params['breadcrumbs'][] = $this->title;
//$now = new DateTime();
//$now = $now->format('d/m/Y');
//$model->setAttribute('date', $now);
?>
<div class="finances-test">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста заполните следующие поля:</p>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'category') ?>
        <?= $form->field($model, 'amount') ?>
        <?= $form->field($model, 'description')->textarea(["rows"=>5]) ?>
        <?= $form->field($model, 'date')->widget(DatePicker::className(), [
            'model' => $model,
            'name' => 'date',
            'language' => 'ru',
            'dateFormat' => 'php:Y/m/d'
        ]) ?>

    
        <div class="form-group">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- finances-test -->
