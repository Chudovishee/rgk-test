<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BooksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'books-search',
        ]
    ]); ?>

    <?= $form->field($model, "author_id")->dropDownList($authors, ["prompt"=> $model->getAttributeLabel("author_id") ])->label(false); ?>
    <?= $form->field($model, 'name')->input("text", ["placeholder" => $model->getAttributeLabel("name")] )->label(false) ?>
    <br/>

    <?= $form->field($model, "dateFrom") ?>
    <?= $form->field($model, "dateTo") ?>
    


    <div class="form-group buttons">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
