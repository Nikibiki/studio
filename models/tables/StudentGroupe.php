<?php

namespace app\models\tables;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "student_groupe".
 *
 * @property int $id
 * @property int $groupe_id
 * @property array $student_id
 *
 * @property Student $student
 */
class StudentGroupe extends \yii\db\ActiveRecord
{
    public $countStudents;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_groupe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id'], 'required'],
            [['groupe_id', 'student_id'], 'validateOptions'],
            [['groupe_id'], 'safe'],
//            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'groupe_id' => 'Группа №',
            'student_id' => 'Список студентов',
        ];
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::class, ['id' => 'student_id']);
    }

    public function getStudentList(){
        $students = Student::find()
            ->select(['lname', 'fname', 'patronymic', 'id', 'email'])
            ->asArray()
            ->indexBy('id')
            ->all();

        foreach($students as &$student){
            $email = $student['email'];
            unset($student['id'], $student['email']);
            $fio = '';
            foreach ($student as $data){
                $fio .= $data . ' ';
            }
            $student = $fio . "[{$email}]";
        }

        return $students;
    }

    public function validateOptions( $attribute,  $params){
        $value = $this->$attribute;
        if( is_int($value) ) return 0;
        if( is_string($value)){
            ((int)$value !== 0) ? ($this->$attribute = (int)$value) : $this->addError($attribute, 'Выбрано некорректное значение!');
            if(!$this->hasErrors()) return 0;
        }
        if( is_array( $value ) && count( $value ) > 0 ){
            foreach( $value as &$val ){
                $val = (int)$val;
                if($val === 0) {
                    $this->addError($attribute, 'Выбрано некорректное значение!');
                    return 1;
                }
            }
            $this->$attribute = $value;
            return 0;
        }
        $this->addError($attribute, 'Выбрано некорректное значение!');
        return 1;
    }

    public function getNewGroupId(){
        return (int)self::find()
            ->select('max(groupe_id)')
            ->column()[0] + 1;
    }

    public function getStudentsInGroup(){
        return self::find()
            ->where(['groupe_id' => $this->groupe_id ])
            ->count();
    }

    public function getIdStudentsIntGroup(){
        return self::find()
            ->select('student_id')
            ->where(['groupe_id' => $this->groupe_id ])
            ->column();
    }


}
