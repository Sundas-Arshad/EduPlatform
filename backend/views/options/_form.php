<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Options $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="options-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'questionNo')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'option_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_correct')->dropDownList(['correct' => 'Correct', 'incorrect' => 'Incorrect']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
