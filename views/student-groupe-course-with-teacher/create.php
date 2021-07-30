<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\StudentGroupeCourseWithTeacher */

$this->title = 'Create Student Groupe Course With Teacher';
$this->params['breadcrumbs'][] = ['label' => 'Student Groupe Course With Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-groupe-course-with-teacher-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
