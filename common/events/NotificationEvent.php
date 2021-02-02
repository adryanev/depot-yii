<?php


namespace common\events;


use yii\base\Event;

class NotificationEvent extends Event
{

    public $entity;
    public $entity_type;
    public $actor;
    public $notifier;




}