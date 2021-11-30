<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m211120_055706_create_book_table extends Migration
{
    const TABLE_NAME = 'library_book';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'id_publisher'=>$this->integer()->notNull()
        ]);

        $this->createIndex(
            'idx-'.self::TABLE_NAME.'-id-publisher',
            self::TABLE_NAME,
            'id_publisher'
        );
        $this->addForeignKey(
            'fk-'.self::TABLE_NAME.'-id-publisher',
            self::TABLE_NAME,
            'id_publisher',
            'library_publisher',
            'id'
        );
    }

    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-'.self::TABLE_NAME.'-id-publisher',self::TABLE_NAME);
        $this->dropIndex('idx-'.self::TABLE_NAME.'-id-publisher',self::TABLE_NAME);
        
        $this->dropTable(self::TABLE_NAME);
    }
}
