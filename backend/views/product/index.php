<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->name,'/product/view?id='.$model->id);
                },
            ],
            [
                'attribute'=>'category_id',
                'filter'=>ArrayHelper::map(Category::find()->asArray()->all(), 'categories', 'name'),
            ],
            'code',
            'price',
             'availability',
            // 'brand',
             'description:ntext',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
