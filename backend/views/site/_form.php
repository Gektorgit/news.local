<?php

    use backend\assets\AppAsset;
    use common\widgets\FileManagerWidget\FileManagerWidget;
    use iutbay\yii2kcfinder\KCFinderInputWidget;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;

    use dosamigos\ckeditor\CKEditor;

    /* @var $this yii\web\View */
    /* @var $model common\models\NewsModel */
    /* @var $form yii\widgets\ActiveForm */

    AppAsset::register($this);

?>

<div class="news-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')
             ->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')
             ->widget(CKEditor::className(), [
                 'options' => ['rows' => 6],
                 'preset'  => 'full'
             ]) ?>

    <?= $form->field($model, 'active')
             ->checkbox(['placeholder' => $model->active]) ?>

    <?= Html::activeHiddenInput($model, 'photo', ['id' => 'logo-input']) ?>
    <?= FileManagerWidget::widget([
                                      'uploadUrl'     => Url::to(['site/upload-logo']),
                                      'removeUrl'     => Url::to(['site/remove-logo']),
                                      'files'         => (!empty($model->photo)) ? $model->photo : [],
                                      'maxFiles'      => 1,
                                      'title'         => 'Logo',
                                      'targetInputId' => 'logo-input'
                                  ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
