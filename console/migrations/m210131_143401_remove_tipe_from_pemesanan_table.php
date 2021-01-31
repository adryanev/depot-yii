<?php

use yii\db\Migration;

/**
 * Class m210131_143401_remove_tipe_from_pemesanan_table
 */
class m210131_143401_remove_tipe_from_pemesanan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->dropColumn('{{%pemesanan}}', 'tipe');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%pemesanan}}', 'tipe', $this->string());

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210131_143401_remove_tipe_from_pemesanan_table cannot be reverted.\n";

        return false;
    }
    */
}
