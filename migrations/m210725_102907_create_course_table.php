<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course}}`.
 */
class m210725_102907_create_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);

        $this->insert('course', ['name' => 'Учим PHP']);
        $this->insert('course', ['name' => 'JS']);
        $this->insert('course', ['name' => 'HTML']);
        $this->insert('course', ['name' => 'CSS']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%course}}');
    }
}
