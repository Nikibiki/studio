<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\StudentGroupeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Группы студентов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-groupe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новую группу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'groupe_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete'=> function ($url, $model, $key) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['/student-groupe/delete','id'=>$model['groupe_id']]);
                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-trash"></span>', $customurl,
                            ['title' => Yii::t('yii', 'Удалить группу'), 'data-pjax' => '0', 'data-method' => 'post']);
                    },
                    'update'=> function ($url, $model, $key) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['/student-groupe/update','id'=>$model['groupe_id']]);
                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-pencil"></span>', $customurl,
                            ['title' => Yii::t('yii', 'Изменить группу'), 'data-pjax' => '0']);
                    },
                    'view'=> function ($url, $model, $key) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['/student-groupe/view','id'=>$model['groupe_id']]);
                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                            ['title' => Yii::t('yii', 'Посмотреть группу'), 'data-pjax' => '0']);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
