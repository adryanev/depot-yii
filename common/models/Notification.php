<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property int $id
 * @property int|null $notification_object_id
 * @property int|null $notifier_id
 * @property int|null $status
 *
 * @property NotificationObject $notificationObject
 * @property User $notifier
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['notification_object_id', 'notifier_id', 'status'], 'integer'],
            [['notification_object_id'], 'exist', 'skipOnError' => true, 'targetClass' => NotificationObject::className(), 'targetAttribute' => ['notification_object_id' => 'id']],
            [['notifier_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['notifier_id' => 'id']],
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
            'notifier_id' => Yii::t('app', 'Notifier ID'),
            'status' => Yii::t('app', 'Status'),
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
     * Gets query for [[Notifier]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifier()
    {
        return $this->hasOne(User::className(), ['id' => 'notifier_id']);
    }
}
