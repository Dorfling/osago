<h1>Калькулятор</h1>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin() ?>

<?= $form->field($model, 'power')->dropDownList($model->power) ?>
<?= $form->field($model, 'open')->dropDownList($model->open) ?>
<?= $form->field($model, 'age')->dropDownList($model->age) ?>
<?= $form->field($model, 'territory')->dropDownList($model->territory) ?>
<?= $form->field($model, 'period')->dropDownList($model->period) ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Рассчитать', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>