<?php

use app\models\tables\Course;
use app\models\tables\Teacher;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\StudentGroupeCourseWithTeacher */

$this->title = 'Update Student Groupe Course With Teacher: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Student Groupe Course With Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-groupe-course-with-teacher-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_id')->hiddenInput()->label('') ?>
    <div class="form-group">
        <label for="exampleInputEmail1"><?=$model->getAttributeLabel('group_id')?></label>
        <input type="text" class="form-control" id="exampleInputEmail1" value=" <?=('Группа ' . $model->group_id) ?>" readonly>
    </div>


    <?= $form->field($model, 'course_id')->hiddenInput()->label('') ?>
    <div class="form-group">
        <label for="exampleInputEmail1"><?=$model->getAttributeLabel('course_id')?></label>
        <input type="text" class="form-control" id="exampleInputEmail1" value=" <?= $model->course->name ?>" readonly>
    </div>


    <?= $form->field($model, 'teacher_id')->hiddenInput()->label('') ?>
    <div class="form-group">
        <label for="exampleInputEmail1"><?=$model->getAttributeLabel('teacher_id')?></label>
        <input type="text" class="form-control" id="exampleInputEmail1" value=" <?= $model->teacher->fio ?>" readonly>
    </div>

    <?= $form->field($model, 'status')->dropDownList($model->statuses, [
//            'prompt' => '',
        ]
    ) ?>

<!--    <div class="form-group">-->
<!--        <label class="control-label" for="studentgroupecoursewithteacher-teacher_id">Преподаватель</label>-->
<!--        <input type="text" id="studentgroupecoursewithteacher-teacher_id" class="form-control" name="StudentGroupeCourseWithTeacher[teacher_id]" value="Kilina Margarita Leonidovna [teacherMargo@mail.ru]" readonly="" aria-required="true" aria-invalid="true">-->
<!---->
<!--        <p class="help-block help-block-error">Преподаватель must be an integer.</p>-->
<!--    </div>-->
<!--    <input class="form-control" type="text" placeholder="Readonly input here…" readonly>-->
<!--        </div>-->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<!--    --><?//= $this->render('_form', [
//        'model' => $model,
//    ]) ?>

</div>
