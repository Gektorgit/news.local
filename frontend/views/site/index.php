<?php

    /* @var $this yii\web\View
     * @var common\models\NewsModel $news
     */

    use yii\helpers\Html;
    use yii\widgets\LinkPager;

?>
<div class="site-index">
    <div class="image-style">
        <?php
            foreach($news as $new): ?>
                <?php
                $logo = $new->getLogo();
                if(is_null($logo)){
                    $logo = '/backend/img/noPicture.png';
                }
                ?>
                <div>
                    <?= Html::img($logo) ?>
                    <a href="<?= \yii\helpers\Url::to(['site/view', 'id' => $new->id])?>"><?= $new->title ?></a>
                </div>
            <?php endforeach; ?>
    </div>
    <div id="pagination">
        <span>Страница <?= $active_page ?> из <?= $count_pages ?></span>
        <div id="pages">
            <?= LinkPager::widget([
                                      'pagination'     => $pagination,
                                      'firstPageLabel' => 'В начало',
                                      'lastPageLabel'  => 'В конец',
                                      'prevPageLabel'  => '&laquo;'
                                  ]) ?>
        </div>
        <div class="clear"></div>
    </div>
</div>

