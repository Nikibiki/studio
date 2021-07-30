<?php

use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\StudentGroupe */
/* @var $dataProvider yii\data\ActiveDataProvider*/

$this->title = 'Изменить группу: ' . $model->groupe_id;
$this->params['breadcrumbs'][] = ['label' => 'Группы студентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Группа' . ' ' . $model->groupe_id, 'url' => ['view', 'id' => $model->groupe_id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="student-groupe-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <? $form = ActiveForm::begin([

    ])?>
        <div class="row">
            <?= $form->field($model, 'groupe_id')->hiddenInput(['value' => $model->groupe_id])->label('')?>
            <?= $form->field($model, 'student_id[]')->dropDownList($model->studentList, [
//                'prompt'=>'Выберите хотя бы одного студента',
                'multiple' => true
            ])?>
        </div>
    <div class="row">
        <div class="form-group">
            <?= Html::submitButton('Добавить выбранных студентов', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <? ActiveForm::end(); ?>


<!--    --><?//= $this->render('_form', [
//        'model' => $model,
//    ]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'student_id' => [
                'label' => 'Id студента',
                'value' => fn($data) => $data->student_id,
            ],
            'student' => [
                'label' => 'Студент',
                'value' => fn($data) => $data->student->lname . ' ' . $data->student->fname . ' ' . $data->student->patronymic,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view'=> function ($url, $model, $key) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['/student/view','id'=>$model['student_id']]);
                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                            ['title' => Yii::t('yii', 'Посмотреть группу'), 'data-pjax' => '0']);
                    },
                    'delete'=> function ($url, $model, $key) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['/student-groupe/delete-student','id'=>$model['id']]);
                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-trash"></span>', $customurl,
                            ['title' => Yii::t('yii', 'Удалить студента из группы'), 'data-pjax' => '0', 'data-method' => 'post']);
                    },
                    'update' => fn() => '',
                ]
            ]

        ]


    ])?>
</div>
