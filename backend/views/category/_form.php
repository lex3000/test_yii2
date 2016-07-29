<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name')->dropDownList(
        ArrayHelper::map(Category::find()->all(), 'categories', 'name'),
        ['prompt' => 'Choose Category']
    ) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'categories')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
