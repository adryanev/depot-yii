<?php

use yii\db\Migration;

/**
 * Class m210131_144045_create_table_detail_pemesanan
 */
class m210131_144045_create_table_detail_pemesanan extends Migration
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
        $this->createTable('{{%detail_pemesanan}}',[
            'id'=>$this->primaryKey(),
            'id_pemesanan'=>$this->integer(),
            'id_item'=>$this->integer(),
            'qty'=>$this->integer(),
            'total'=>$this->bigInteger()
        ],$tableOptions);

        $this->addForeignKey('fk-detail_pemesanan-pemesanan','{{%detail_pemesanan}}','id_pemesanan','{{%pemesanan}}','id','cascade','cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('{{%detail_pemesanan}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210131_144045_create_table_detail_pemesanan cannot be reverted.\n";

        return false;
    }
    */
}
