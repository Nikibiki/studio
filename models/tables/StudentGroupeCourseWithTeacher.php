<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "student_groupe_course_with_teacher".
 *
 * @property int $id
 * @property int $group_id
 * @property int $course_id
 * @property int $teacher_id
 * @property string $status
 *
 * @property Course $course
 * @property Teacher $teacher
 */
class StudentGroupeCourseWithTeacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_groupe_course_with_teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'course_id', 'teacher_id'], 'required'],
            [['group_id', 'course_id', 'teacher_id'], 'integer'],
            [['status'], 'string'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::class, 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Группа',
            'course_id' => 'Курс',
            'teacher_id' => 'Преподаватель',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }

    public function getStatuses()
    {
        return [
            'На согласовании',
            'Согласовано',
            'Отклонено'
        ];
    }
}
