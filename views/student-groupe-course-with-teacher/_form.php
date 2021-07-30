<?php

use app\models\tables\Course;
use app\models\tables\StudentGroupe;
use app\models\tables\Teacher;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\StudentGroupeCourseWithTeacher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-groupe-course-with-teacher-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_id')->dropDownList(StudentGroupe::getGroups(),[
            'prompt' => 'Выберите группу'
    ]) ?>

    <?= $form->field($model, 'course_id')->dropDownList(Course::getCoursesList(),[
        'prompt' => 'Выберите курс'
    ]) ?>

    <?= $form->field($model, 'teacher_id')->dropDownList(Teacher::getTeachersList(),[
        'prompt' => 'Выберите преподавателя'
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->statuses, [
//            'prompt' => '',
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
