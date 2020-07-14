<?php
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<h1>Post index</h1>
<?php
//debug($model);
?>

<?php
if (Yii::$app->session->hasFlash("success")):
    ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong><?=Yii::$app->session->getFlash("success");?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
endif;

if (Yii::$app->session->hasFlash("error")):
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong><?=Yii::$app->session->getFlash("error");?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
endif;
?>

<?php $form = ActiveForm::begin(["options" => ["id"=>"TestForm"]]) ?>
<?= $form->field($model, 'name')?>
<?= $form->field($model, 'email')->input("email")?>
<?= $form->field($model, 'text')->textarea(["rows"=>5])?>
<?=Html::submitButton("OK", ["class"=>"btn btn-success"])?>
<?php ActiveForm::end() ?>





