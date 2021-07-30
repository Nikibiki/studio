<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\StudentGroupeCourseWithTeacher */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Groupe Course With Teachers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-groupe-course-with-teacher-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student Groupe Course With Teacher', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'group_id' => [
//                    'label' => $data->getAttributeLabel('group_id'),
                    'value' => fn($data) => 'Группа ' . $data->group_id
            ],
            'course_id' => [
//                    'label' => $data->getAttributeLabel('course_id'),
                    'value' => fn($data) => $data->course->name
            ],
            'teacher_id' => [
//                    'label' => $data->getAttributeLabel('teacher_id'),
                    'value' => fn($data) => $data->teacher->fio
            ],
            'status' => [
//                    'label' => $data->getAttributeLabel('status'),
                    'value' => fn($data) => $data->statuses[$data->status]
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
