<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\StudentGroupe */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Группа №' . $model->groupe_id;
$this->params['breadcrumbs'][] = ['label' => 'Группы студентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="student-groupe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить группу', ['update', 'id' => $model->groupe_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить группу', ['delete', 'id' => $model->groupe_id], [
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
            'groupe_id',
            'countStudents' => [
                'label' => 'Студентов в группе',
                'value' => $model->studentsInGroup
            ]
        ],

    ]) ?>

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
                        'delete'=> fn() => '',
                        'update' => fn() => '',
                    ]
            ]

        ]


    ])?>

</div>
