<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student_groupe_course_with_teacher}}`.
 */
class m210725_110427_create_student_groupe_course_with_teacher_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student_groupe_course_with_teacher}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'course_id' => $this->integer()->notNull(),
            'teacher_id' => $this->integer()->notNull(),
            'status' => "enum('0', '1', '2') not null default '0'"
        ]);

        $this->addForeignKey(
            'fk_table-course_id',
            'student_groupe_course_with_teacher',
            'course_id',
            'course',
            'id'
        );

        $this->addForeignKey(
            'fk_table-teacher_id',
            'student_groupe_course_with_teacher',
            'teacher_id',
            'teacher',
            'id'
        );




    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_table-teacher_id',
            'student_groupe_course_with_teacher'
        );

        $this->dropForeignKey(
            'fk_table-course_id',
            'student_groupe_course_with_teacher'
        );

        $this->dropTable('{{%student_groupe_course_with_teacher}}');
    }
}
