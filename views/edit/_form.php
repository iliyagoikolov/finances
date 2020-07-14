<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Charges */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="charges-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php //echo $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'date')->widget(DatePicker::className(), [
        'model' => $model,
        'name' => 'date',
        'language' => 'ru',
        'dateFormat' => 'php:Y/m/d'
    ]) ?>

    <?php //echo $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
