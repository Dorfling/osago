<?php
/**
 * @var $model
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;

$bundle = AppAsset::register(Yii::$app->view);
$bundle->js[] = 'js/jquery.maskedinput.min.js';
$bundle->js[] = 'js/main.js';
?>

<h1>SignUp</h1>

<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]) ?>

<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'surname')->textInput() ?>
<?= $form->field($model, 'patronymic')->textInput() ?>
<?= $form->field($model, 'birth_date')->textInput(['placeholder' => '__/__/____']) ?>
<?= $form->field($model, 'sex')->radioList([1 => 'Мужчина', 0 => 'Женщина']) ?>
<?= $form->field($model, 'phone_num')->textInput(['placeholder' => '+7(___) ___-____']) ?>

<div class="form-group">
    <div class="col-lg-1">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<?php ActiveForm::end() ?>