<?php
/**
 * @var $model
 * @var $age
 * @var $open
 * @var $period
 * @var $power
 * @var $territory
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<h1>Калькулятор</h1>
<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'age')->dropDownList($age) ?>
<?= $form->field($model, 'open')->dropDownList($open) ?>
<?= $form->field($model, 'period')->dropDownList($period) ?>
<?= $form->field($model, 'power')->dropDownList($power) ?>
<?= $form->field($model, 'territory')->dropDownList($territory) ?>

<div class="form-group">
    <div class="col-lg-1">
        <?= Html::submitButton('Рассчитать', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<div class="col-lg-offset-1 col-lg-2">
    <?php if (!empty($sum)): ?>
        <h3><?= $sum ?> руб.</h3>
    <?php endif; ?>
</div>

<?php ActiveForm::end() ?>