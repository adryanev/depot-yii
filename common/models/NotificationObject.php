<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "notification_object".
 *
 * @property int $id
 * @property int|null $entity_type
 * @property int|null $entity_id
 * @property int|null $created_at
 * @property int|null $status
 *
 * @property Notification[] $notifications
 * @property NotificationChange[] $notificationChanges
 */
class NotificationObject extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            'timestamp'=>[
                'class'=>TimestampBehavior::class,
                'updatedAtAttribute'=>false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification_object';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entity_type', 'entity_id', 'created_at', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'entity_type' => Yii::t('app', 'Entity Type'),
            'entity_id' => Yii::t('app', 'Entity ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notification::className(), ['notification_object_id' => 'id']);
    }

    /**
     * Gets query for [[NotificationChanges]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationChanges()
    {
        return $this->hasMany(NotificationChange::className(), ['notification_object_id' => 'id']);
    }
}
