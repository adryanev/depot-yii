<?php

use yii\db\Migration;

/**
 * Class m210130_073134_create_notification_tables
 */
class m210130_073134_create_notification_tables extends Migration
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

        //menyimpan detail tentang jenis notifikasi, object yang dinotifikasi apa
        $this->createTable('{{%notification_object}}', [
            'id' => $this->primaryKey(),
            'entity_type' => $this->integer(),
            'entity_id' => $this->integer(),
            'created_at' => $this->integer(),
            'status' => $this->boolean()
        ], $tableOptions);

        $this->createTable('{{%notification}}', [
            'id' => $this->primaryKey(),
            'notification_object_id' => $this->integer(),
            'notifier_id' => $this->integer(),
            'status' => $this->boolean(),
        ], $tableOptions);

        $this->createIndex('notification_object_idx', '{{%notification}}', 'notification_object_id');
        $this->createIndex('notifier_idx', '{{%notification}}', 'notifier_id');
        $this->addForeignKey(
            'fk-notification-notification_object',
            '{{%notification}}',
            'notification_object_id',
            '{{%notification_object}}',
            'id'
        );
        $this->addForeignKey('fk-notification-user', '{{%notification}}', 'notifier_id', '{{%user}}', 'id','cascade','cascade');

        $this->createTable('{{%notification_change}}', [
            'id' => $this->primaryKey(),
            'notification_object_id' => $this->integer(),
            'actor_id' => $this->integer(),
            'status' => $this->boolean()
        ], $tableOptions);
        $this->createIndex('notification_object_2_idx', '{{%notification_change}}', 'notification_object_id');
        $this->createIndex('notification_actor_id_idx', '{{%notification_change}}', 'actor_id');
        $this->addForeignKey(
            'fk-notification_change-notification_object',
            '{{%notification_change}}',
            'notification_object_id',
            '{{%notification_object}}',
            'id'
        );
        $this->addForeignKey('fk-notification_change-user', '{{%notification_change}}', 'actor_id', '{{%user}}', 'id','cascade','cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%notification_change}}');
        $this->dropTable('{{%notification}}');
        $this->dropTable('{{%notification_object}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210130_073134_create_notification_tables cannot be reverted.\n";

        return false;
    }
    */
}
