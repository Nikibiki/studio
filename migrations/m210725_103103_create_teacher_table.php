<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%teacher}}`.
 */
class m210725_103103_create_teacher_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teacher}}', [
            'id' => $this->primaryKey(),
            'fname' => $this->string(50)->notNull(),
            'lname' => $this->string(50)->notNull(),
            'patronymic' => $this->string(50)->notNull(),
            'email' => $this->string(70)->notNull()->unique(),
        ]);

        $this->insert('student', ['fname' => 'Margarita', 'lname' => 'Kilina', 'patronymic' => 'Leonidovna', 'email' => 'teacherMargo@mail.ru']);
        $this->insert('student', ['fname' => 'Valeria', 'lname' => 'Kilina', 'patronymic' => 'Leonidovna', 'email' => 'teacherValeria@mail.ru']);
        $this->insert('student', ['fname' => 'Lybov', 'lname' => 'Kilina', 'patronymic' => 'Leonidovna', 'email' => 'teacherLybov@mail.ru']);
    }



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%teacher}}');
    }
}
