<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m211120_055352_create_user_table extends Migration
{
    const TABLE_NAME = 'library_user';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME,[
            'id' => $this->primaryKey(),
            'lastname'=> $this->string(50)->notNull(),
            'firstname'=>$this->string(50)->notNull(),
            'birthdate'=> $this->date()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
