<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notification_change".
 *
 * @property int $id
 * @property int|null $notification_object_id
 * @property int|null $actor_id
 * @property int|null $status

 *
 * @property NotificationObject $notificationObject
 * @property User $actor
 */
class NotificationChange extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification_change';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['notification_object_id', 'actor_id'], 'integer'],
            [['notification_object_id'], 'exist', 'skipOnError' => true, 'targetClass' => NotificationObject::className(), 'targetAttribute' => ['notification_object_id' => 'id']],
            [['actor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['actor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'notification_object_id' => Yii::t('app', 'Notification Object ID'),
            'actor_id' => Yii::t('app', 'Actor ID'),
        ];
    }

    /**
     * Gets query for [[NotificationObject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationObject()
    {
        return $this->hasOne(NotificationObject::className(), ['id' => 'notification_object_id']);
    }

    /**
     * Gets query for [[Actor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActor()
    {
        return $this->hasOne(User::className(), ['id' => 'actor_id']);
    }
}
