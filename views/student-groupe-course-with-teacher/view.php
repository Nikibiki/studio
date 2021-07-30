<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\StudentGroupeCourseWithTeacher */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Student Groupe Course With Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="student-groupe-course-with-teacher-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'group_id' => [
                    'label' => $model->getAttributeLabel('group_id'),
                    'value' => fn($data) => 'Группа ' . $data->group_id
            ],
            'course_id' => [
                    'label' => $model->getAttributeLabel('course_id'),
                    'value' => fn($data) => $data->course->name
            ],
            'teacher_id' => [
                    'label' => $model->getAttributeLabel('teacher_id'),
                    'value' => fn($data) => $data->teacher->fio
            ],
            'status' => [
                    'label' => $model->getAttributeLabel('status'),
                    'value' => fn($data) => $data->statuses[$data->status]
            ]
        ],
    ]) ?>

</div>
