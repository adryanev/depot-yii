<?php


namespace common\components;

use common\models\Notification;
use common\models\NotificationChange;
use common\models\NotificationObject;
use common\models\Pemesanan;
use common\models\User;
use Yii;
use yii\base\Component;
use yii\base\Event;
use yii\base\Exception;
use yii\helpers\Url;

class NotificationHandler extends Component
{


    /**
     * @param $entity
     * @param $entity_type
     * @param $actor
     * @param $notifier
     * @throws Exception
     */
    public function sendNotification(Event $event)
    {
        $data = $this->prepareData($event->data);

        $transaction = Yii::$app->db->beginTransaction();
        try {
            $status = false;
            $object = $this->createNotificationObject($data['entity_type'], $data['entity'], $status);
            $change = $this->createNotificationChange($object, $data['actor'], $status);
            $notifications = $this->createNotification($object, $data['notifier'], $status);
            $transaction->commit();
        } catch (Exception $exception) {
            $transaction->rollBack();
            throw  $exception;
        }

        $messages = $this->generateNotificationMessage($object);

        foreach ($notifications as $notification) {
            Yii::$app->pusher->push($notification->notifier->username, 'pemesanan', [
                'icon' => Url::to('@web/upload/'.$change->actor->foto,true),
                'message'=>$messages,
                'actor'=>$change->actor->nama,
                'entity'=>$object->entity_id
            ]);
        }
    }

    private function createNotificationObject($entity_type, $entity, bool $status)
    {
        $obj = new NotificationObject();
        $obj->entity_type = $entity_type;
        $obj->entity_id = $entity->id;
        $obj->status = $status;
        return $obj->save(false) ? $obj : null;
    }

    private function createNotification(NotificationObject $object, $notifier, $status)
    {
        $notif = [];
        foreach ($notifier as $user) {
            $obj = new Notification();
            $obj->notifier_id = $user->id;
            $obj->notification_object_id = $object->id;
            $obj->status = $status;
            $obj->save(false);

            $notif[] = $obj;
        }

        return $notif;
    }

    private function createNotificationChange(NotificationObject $object, $actor, bool $status)
    {
        $obj = new NotificationChange();
        $obj->actor_id = $actor->id;
        $obj->notification_object_id = $object->id;
        $obj->status = $status;

        return $obj->save(false) ? $obj : null;
    }

    /**
     * @param NotificationObject|null $object
     * @param NotificationChange|null $change
     * @param Notification|null $notification
     * @return string
     */
    private function generateNotificationMessage(?NotificationObject $object)
    {
        $entity_type = Yii::$app->params['notification.entity'];
        $item = $entity_type[$object->entity_type];

        $messages = Yii::t('notification',$item['messageProp']);

        return $messages;
    }

    /**
     * Struktur dari data
     * Insert = ['notifier'=>null,'actor'=>$this->user,'status'=>$this->status,'entity'=>$this,'entity_type'=>1]
     * Update = ['actor'=>'null','notifier'=>$this->user,'status'=>$this->status,'entity'=>$this,'entity_type'=>null]
     * @param $data
     * @return array
     *
     */
    private function prepareData($data)
    {
        $prepared = ['entity' => '', 'entity_type' => '', 'actor' => '', 'notifier' => ''];
        if ($data['entity']->status === Pemesanan::STATUS_DITERIMA) {
            $prepared['actor'] = $data['entity']->user;
            $prepared['notifier'] = User::find()->innerJoinWith('role')->where(['item_name' => 'karyawan'])->orWhere(['item_name' => 'superadmin'])->all();
            $prepared['entity'] = $data['entity'];
            $prepared['entity_type'] = 1;
        } else {
            $prepared['actor'] = Yii::$app->user->identity;
            $prepared['notifier'] = [$data['entity']->user];
            $prepared['entity'] = $data['entity'];
            switch ($data['entity']->status) {
                case Pemesanan::STATUS_DIPROSES:
                    $prepared['entity_type'] = 2;

                    break;
                case Pemesanan::STATUS_DIANTAR:
                    $prepared['entity_type'] = 3;

                    break;
                case Pemesanan::STATUS_SELESAI:
                    $prepared['entity_type'] = 4;

                    break;
            }
        }

        return $prepared;
    }
}
