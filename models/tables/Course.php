<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property StudentGroupeCourseWithTeacher[] $studentGroupeCourseWithTeachers
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            ['name', 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название курса',
        ];
    }

    /**
     * Gets query for [[StudentGroupeCourseWithTeachers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGroupeCourseWithTeachers()
    {
        return $this->hasMany(StudentGroupeCourseWithTeacher::className(), ['group_id' => 'id']);
    }

    public static function getCoursesList()
    {
        return self::find()
            ->select(['name'])
            ->asArray()
            ->indexBy('id')
            ->column();
    }
}
