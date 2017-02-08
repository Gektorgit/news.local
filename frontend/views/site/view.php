<?php

    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\NewsModel */

    $this->title = $model->title;
    $this->params['breadcrumbs'][] = [
        'label' => 'News Models',
        'url'   => ['index']
    ];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-model-view">

    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-12">

            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-2">
                    <?php
                        $logo = $model->getLogo();
                        if(is_null($logo)){
                            $logo = '/img/noPicture.png';
                        }
                    ?>
                    <div>
                        <?= Html::img($logo, ['class' => 'img-thumbnail']) ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-10">

                        <div class="panel-body">
                            <h1><?= Html::encode($this->title) ?></h1>
                            <p class="small">
                                <strong>Create:</strong>
                                <?= date("d/m/Y H:i", $model->created_at) ?>
                            </p>
                        </div>

                </div>


            </div>
            <div class="col-sm-12 col-md-9 col-lg-10">
                    <div class="panel-body">
                        <?php if(empty($model->description)): ?>
                            <div class="alert alert-info">
                                <p>Not set</p>
                            </div>
                        <?php else: ?>
                            <p><?= $model->description ?></p>
                        <?php endif; ?>
                    </div>

            </div>
        </div>
    </div>
