<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string $fname
 * @property string $lname
 * @property string $patronymic
 * @property string $email
 *
 * @property StudentGroupeCourseWithTeacher[] $studentGroupeCourseWithTeachers
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fname', 'lname', 'patronymic', 'email'], 'required'],
            [['fname', 'lname', 'patronymic'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 70],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fname' => 'Имя',
            'lname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[StudentGroupeCourseWithTeachers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGroupeCourseWithTeachers()
    {
        return $this->hasMany(StudentGroupeCourseWithTeacher::className(), ['teacher_id' => 'id']);
    }
}
