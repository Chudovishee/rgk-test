<?php
use app\assets\BooksAsset;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Authors;
use yii\bootstrap\Modal;

BooksAsset::register($this);


/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        echo $this->render('_search', [
            'model' => $searchModel,
            'authors' => Authors::getAuthorsSelect()
        ] );
    ?>

    <p>
        <?= Html::a('Create Books', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute'=>'preview',
                "format" => "raw",
                'value'=> function($model){
                    return Html::img($model->preview, ["class" => "expand"]);
                },
            ],
            [
                'attribute'=>'author_id',
                'content'=>function($model){
                    return $model->getAuthorName();
                },
            ],
            'date',
            'date_create',
            
            [
               'class' => \yii\grid\ActionColumn::className(),
               'buttons' => [
                      'view' => function ($url, $model) {
                            return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $url,
                                ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0','data-target' => '#view-modal','data-toggle'=>'modal']);
                        }
                ],
               'template'=>'{view} {update} {delete}',
           ]
        ],
    ]); ?>
</div>

<?php Modal::begin([
    'id' => 'view-modal',
    'header' => 'book view',

]); ?>

<img>

<?php Modal::end(); ?>
