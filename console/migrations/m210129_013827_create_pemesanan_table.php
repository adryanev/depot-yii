<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pemesanan}}`.
 */
class m210129_013827_create_pemesanan_table extends Migration
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
        $this->createTable('{{%pemesanan}}', [
            'id' => $this->primaryKey(),
            'id_user'=>$this->integer(),
            'jumlah'=>$this->integer(3),
            'tipe'=>$this->string(),
            'alamat'=>$this->string(),
            'telepon'=>$this->string(),
            'status'=>$this->tinyInteger(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ],$tableOptions);
        $this->addForeignKey('fk-pemesanan-user','{{%pemesanan}}','id_user','{{%user}}','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pemesanan}}');
    }
}
