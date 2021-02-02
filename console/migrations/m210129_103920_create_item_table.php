<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item}}`.
 */
class m210129_103920_create_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%item}}', [
            'id' => $this->primaryKey(),
            'nama'=>$this->string()->notNull(),
            'harga'=>$this->integer()->notNull(),
            'gambar'=>$this->string()->notNull(),
            'deskripsi'=>$this->text()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%item}}');
    }
}
