<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%publisher}}`.
 */
class m211120_055656_create_publisher_table extends Migration
{
    const TABLE_NAME = 'library_publisher';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME , [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull()->unique()
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
