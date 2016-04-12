<?php

use yii\helpers\Html;
use app\models\Authors;

/* @var $this yii\web\View */
/* @var $model app\models\Books */

$this->title = 'Update Books: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="books-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'authors' => Authors::getAuthorsSelect()
    ]) ?>

</div>
