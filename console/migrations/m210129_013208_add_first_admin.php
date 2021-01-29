<?php

use yii\db\Migration;

/**
 * Class m210129_013208_add_first_admin
 */
class m210129_013208_add_first_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->insert('{{%user}}',[
            'username'=>'root',
            'password_hash'=>Yii::$app->security->generatePasswordHash('12345678'),
            'auth_key'=>Yii::$app->security->generateRandomString(),
            'email'=>'root@depot-yii.test',
            'nama'=>'Super Admin',
            'alamat'=>'Airmolek',
            'telepon'=>'080989999',
            'status'=>\common\models\User::STATUS_ACTIVE,
            'foto'=>'default.jpg',
            'created_at'=>\Carbon\Carbon::now()->timestamp,
            'updated_at'=>\Carbon\Carbon::now()->timestamp
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->truncateTable('{{%users}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210129_013208_add_first_admin cannot be reverted.\n";

        return false;
    }
    */
}
