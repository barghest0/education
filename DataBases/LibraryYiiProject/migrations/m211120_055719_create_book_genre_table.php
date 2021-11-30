<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_genre}}`.
 */
class m211120_055719_create_book_genre_table extends Migration
{
    const TABLE_NAME = 'library_book_genre';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'id_genre'=>$this->integer()->notNull(),
            'id_book'=>$this->integer()->notNull()
        ]);
    
        $this->createIndex(
            'idx-'.self::TABLE_NAME.'-id-genre',
            self::TABLE_NAME,
            'id_genre'
        );
        $this->addForeignKey(
            'fk-'.self::TABLE_NAME.'-id-genre',
            self::TABLE_NAME,
            'id_genre',
            'library_genre',
            'id'
        );

        $this->createIndex(
            'idx-'.self::TABLE_NAME.'-id-book',
            self::TABLE_NAME,
            'id_book'
        );
        $this->addForeignKey(
            'fk-'.self::TABLE_NAME.'-id-book',
            self::TABLE_NAME,
            'id_book',
            'library_book',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
