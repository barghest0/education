<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%issuance}}`.
 */
class m211120_055809_create_issuance_table extends Migration
{
    const TABLE_NAME = 'library_issuance';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'id_book'=>$this->integer()->notNull(),
            'id_user'=>$this->integer()->notNull(),
            'start_date'=>$this->date(),
            'must_date'=>$this->date(),
            'finish_date'=>$this->date(),
        ]);

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

        $this->createIndex(
            'idx-'.self::TABLE_NAME.'-id-user',
            self::TABLE_NAME,
            'id_user'
        );
        $this->addForeignKey(
            'fk-'.self::TABLE_NAME.'-id-user',
            self::TABLE_NAME,
            'id_user',
            'library_user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-'.self::TABLE_NAME.'-id-user',self::TABLE_NAME);
        $this->dropIndex('idx-'.self::TABLE_NAME.'-id-user',self::TABLE_NAME);
        
        $this->dropForeignKey('fk-'.self::TABLE_NAME.'-id-book',self::TABLE_NAME);
        $this->dropIndex('idx-'.self::TABLE_NAME.'-id-book',self::TABLE_NAME);

        $this->dropTable(self::TABLE_NAME);
    }
}
