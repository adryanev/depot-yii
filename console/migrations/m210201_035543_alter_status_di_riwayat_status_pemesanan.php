<?php

use yii\db\Migration;

/**
 * Class m210201_035543_alter_status_di_riwayat_status_pemesanan
 */
class m210201_035543_alter_status_di_riwayat_status_pemesanan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%riwayat_status_pemesanan}}','status',$this->tinyInteger());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%riwayat_status_pemesanan}}','status',$this->string());

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210201_035543_alter_status_di_riwayat_status_pemesanan cannot be reverted.\n";

        return false;
    }
    */
}
