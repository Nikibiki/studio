<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student_groupe}}`.
 */
class m210725_102043_create_student_groupe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student_groupe}}', [
            'id' => $this->primaryKey(),
            'groupe_id' => $this->integer()->notNull(),
            'student_id' => $this->integer()->notNull()
        ]);

        
        $this->createIndex(
            'idx-student_groupe-student_id',
            'student_groupe',
            'student_id'
        );

        $this->addForeignKey(
            'fk_student_groupe-student_id',
            'student_groupe',
            'student_id',
            'student',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_student_groupe-student_id',
            'student_groupe'
        );
        $this->dropTable('{{%student_groupe}}');
    }
}
