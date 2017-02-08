<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NewsModel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-model-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-12">
            <h1><?= Html::encode($this->title) ?></h1>
            <p class="small">
                <strong>Updated:</strong>
                <?= date("d/m/Y H:i", $model->updated_at) ?>
            </p>
            <p class="small">
                <strong>Active:</strong>
                <?= $model->active?>
            </p>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Description</h3>
                        </div>
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
        </div>
    </div>
</div>

<?php
    function ChessBoard($weight, $height, $color){
    $arr_color = ['white', 'black', $color];
    $html = '<table border="5">';
    $tr = '';
    $k = 0;
    for($i = 0; $i < $height; $i++){
        $td = '';
        $tr .='<tr>';
        for($j = 0; $j < $weight;$j++){
            $td .= '<td style="background-color: '.$arr_color[$k].'; width: 50px; height: 50px"></td>';
            if(++$k == 3)
                $k = 0;
        }
        $tr .= $td.'</tr>';

    }
    $html .=$tr.'</table>';
    echo $html;
}
    ChessBoard(10, 8, '#DDA0DD');
?>

