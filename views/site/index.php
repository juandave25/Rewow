<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MedicalRecord */
/* @var $form ActiveForm */
$this->title= 'Medical Record';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-Index">
<h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'Id_Owner') ?>
        <?= $form->field($model, 'Id_Pet') ?>
        <?= $form->field($model, 'Description') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-Index -->
