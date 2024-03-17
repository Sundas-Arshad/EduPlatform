<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\TopicSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="topic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'topicID') ?>

    <?= $form->field($model, 'topic_title') ?>

    <?= $form->field($model, 'topic_description') ?>

    <?= $form->field($model, 'learning_target') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
