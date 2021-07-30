<?php

use app\models\tables\Student;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\StudentGroupe */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="student-groupe-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <?= $form->field($model, 'groupe_id')->hiddenInput(['value' => $model->newGroupId])->label('')?>
        <?= $form->field($model, 'student_id[]')->dropDownList($model->studentList, [
//                'prompt'=>'Выберите хотя бы одного студента',
                'multiple' => true
        ])?>
    </div>
    <div class="row">
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>

<script>
    document.getElementById('studentgroupe-student_id').onchange = function( elem ){console.log('Значение изменено', typeof elem.target)};
</script>
