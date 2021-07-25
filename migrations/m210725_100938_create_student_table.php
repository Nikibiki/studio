<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m210725_100938_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            'fname' => $this->string(50)->notNull(),
            'lname' => $this->string(50)->notNull(),
            'patronymic' => $this->string(50)->notNull(),
            'email' => $this->string(70)->notNull()->unique(),
            'photo' => $this->string(),
        ]);

        $this->insert('student', ['fname' => 'Nikita', 'lname' => 'Kilin', 'patronymic' => 'Leonidovich', 'email' => 'Nik@mail.ru']);
        $this->insert('student', ['fname' => 'Misha', 'lname' => 'Kilin', 'patronymic' => 'Leonidovich', 'email' => 'Misha@mail.ru']);
        $this->insert('student', ['fname' => 'Dima', 'lname' => 'Kilin', 'patronymic' => 'Leonidovich', 'email' => 'Dima@mail.ru']);
        $this->insert('student', ['fname' => 'Stas', 'lname' => 'Kilin', 'patronymic' => 'Leonidovich', 'email' => 'Stas@mail.ru']);
        $this->insert('student', ['fname' => 'Gena', 'lname' => 'Kilin', 'patronymic' => 'Leonidovich', 'email' => 'Gena@mail.ru']);
        $this->insert('student', ['fname' => 'Andrey', 'lname' => 'Kilin', 'patronymic' => 'Leonidovich', 'email' => 'Andrey@mail.ru']);
        $this->insert('student', ['fname' => 'Veronika', 'lname' => 'Kilina', 'patronymic' => 'Leonidovna', 'email' => 'Veronika@mail.ru']);
        $this->insert('student', ['fname' => 'Irina', 'lname' => 'Kilina', 'patronymic' => 'Leonidovna', 'email' => 'Irina@mail.ru']);
        $this->insert('student', ['fname' => 'Polina', 'lname' => 'Kilina', 'patronymic' => 'Leonidovna', 'email' => 'Polina@mail.ru']);
        $this->insert('student', ['fname' => 'Petya', 'lname' => 'Kilin', 'patronymic' => 'Leonidovich', 'email' => 'Petya@mail.ru']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%student}}');
    }
}
