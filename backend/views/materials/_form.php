<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Materials */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="materials-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?php if (!$model->isNewRecord): ?>

        <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

        <?php if ($model->attachments): ?>
            <table class="table table-bordered">
                <?php foreach ($model->attachments as $attachment): ?>
                    <tr>
                        <td>
                            <img src="<?= Yii::$app->params['staticDomain'].'/'.$attachment->path ?>" width="120">
                        </td>
                        <td>
                            <?= $attachment->path ?>
                        </td>
                        <td>
                            <?php if ($attachment->is_main): ?>
                                <span class="btn btn-success">Главное</span>
                            <?php else: ?>
                                <span class="btn btn-danger set-main-image-admin" data-model_id="<?= $model->id ?>" data-main_image_id="<?= $attachment->id ?>">Сделать главным</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <i class="fa fa-trash delete-image-moderator" data-image_id="<?= $attachment->id ?>"></i>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>