<h1>Login</h1>
<?php
/**
 * @var $login_model
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]) ?>

<?= $form->field($login_model, 'email')->textInput() ?>
<?= $form->field($login_model, 'password')->passwordInput() ?>

<div class="form-group">
    <div class="col-lg-1">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<?php ActiveForm::end() ?>