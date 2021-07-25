<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $fname
 * @property string $lname
 * @property string $patronymic
 * @property string $email
 * @property string|null $photo
 *
 * @property StudentGroupe[] $studentGroupes
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
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
            [['photo'], 'string', 'max' => 255],
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
            'photo' => 'Фотография',
        ];
    }

    /**
     * Gets query for [[StudentGroupes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGroupes()
    {
        return $this->hasMany(StudentGroupe::className(), ['student_id' => 'id']);
    }
}
