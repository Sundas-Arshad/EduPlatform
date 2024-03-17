<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\QuestionSet $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="question-set-form">

    <?php $form = ActiveForm::begin(); ?>

   <!-- Removed the text input field for topicID -->
    <!-- Instead, you can display the topicID value as a hidden input -->
    <?= $form->field($model, 'topicID')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'course_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'difficulty_level')->dropDownList(['Easy' => 'Easy', 'Medium' => 'Medium', 'Hard' => 'Hard']) ?>

    <?= $form->field($model, 'approval_status')->dropDownList(['P' => 'Pending', 'A' => 'Approved']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
