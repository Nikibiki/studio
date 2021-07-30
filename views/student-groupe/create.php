<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\StudentGroupe */

$this->title = 'Создание новой группы';
$this->params['breadcrumbs'][] = ['label' => 'Группы студентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-groupe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
