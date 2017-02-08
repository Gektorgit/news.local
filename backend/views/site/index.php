<?php

    use yii\helpers\Html;
    use yii\grid\GridView;

    /* @var $this yii\web\View */
    /* @var $searchModel common\models\search\NewsSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = 'News Models';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-12 col-lg-3">
            <p>
                <?= Html::a('Create News Model', ['create'], ['class' => 'btn btn-success']) ?>
                <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            </p>
        </div>
        <div class="col-md-12 col-lg-9">
            <?= GridView::widget([
                                     'dataProvider' => $dataProvider,
                                     'filterModel'  => false,
                                     'layout'       => "{summary}\n<div class='table-responsive'>\n{items}\n</div>\n{pager}",
                                     'columns'      => [
                                         [
                                             'attribute'      => 'id',
                                             'headerOptions'  => [
                                                 'style' => 'width: 2%;max-width: 50px;'
                                             ],
                                             'contentOptions' => ['style' => 'vertical-align:middle;']

                                         ],
                                         [
                                             'attribute'      => 'title',
                                             'label'          => 'Title',
                                             'headerOptions'  => [
                                                 'style' => 'width: 20%;max-width: 150px;'
                                             ],
                                             'contentOptions' => ['style' => 'vertical-align:middle;']

                                         ],
                                         /*[
                                             'attribute'      => 'description',
                                             'label' => 'Description',
                                             'headerOptions'  => [
                                                 'style' => 'width: 30%;max-width: 50px;'
                                             ],
                                             'contentOptions' => ['style' => 'vertical-align:middle;']

                                         ],*/
                                         [
                                             'attribute'      => 'active',
                                             'headerOptions'  => [
                                                 'style' => 'width: 2%;max-width: 50px;'
                                             ],
                                             'contentOptions' => ['style' => 'vertical-align:middle;']

                                         ],
                                         [
                                             'attribute'      => 'updated_at',
                                             'label'          => 'Update',
                                             'format'         => [
                                                 'date',
                                                 'HH:mm:ss dd.MM.YYYY'
                                             ],
                                             'headerOptions'  => [
                                                 'style' => 'width: 10%;max-width: 100px;'
                                             ],
                                             'contentOptions' => ['style' => 'vertical-align:middle;']
                                         ],
                                         [
                                             'attribute'      => 'photo',
                                             'label'          => 'Photo',
                                             'headerOptions'  => [
                                                 'style' => 'width: 10%;max-width: 80px;'
                                             ],
                                             'content'        => function($data){
                                                 $logo = $data->getLogo();
                                                 if(is_null($logo)){
                                                     $logo = '/img/noPicture.png';
                                                 }

                                                 return Html::img($logo, [
                                                     'class' => 'img-circle',
                                                     'style' => 'width: 100%; max-width: 80px;'
                                                 ]);
                                             },
                                             'contentOptions' => ['style' => 'vertical-align:middle;']
                                         ],

                                         [
                                             'class'          => 'yii\grid\ActionColumn',
                                             'headerOptions'  => [
                                                 'style' => 'width: 7%;max-width: 60px;'
                                             ],
                                             'contentOptions' => ['style' => 'vertical-align:middle;']
                                         ],
                                     ],
                                 ]); ?>
        </div>
    </div>
</div>
