<?php


namespace common\models;

use common\models\User;
use InvalidArgumentException;
use yii\base\Model;

class UpdatePasswordForm extends Model
{

    public $oldPassword;
    public $newPassword;
    public $repeatPassword;

    private $_user;


    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'oldPassword' => 'Kata Sandi Lama',
            'newPassword' => 'Kata Sandi Baru',
            'repeatPassword' => 'Konfirmasi Kata Sandi Baru'
        ];
    }

    public function rules()
    {
        return [
            [['oldPassword', 'newPassword', 'repeatPassword'], 'required'],
            ['repeatPassword', 'compare', 'compareAttribute' => 'newPassword', 'message' => 'Password tidak sama.'],
            ['oldPassword', 'findPassword', 'skipOnEmpty' => false],

        ];
    }

    public function findPassword($attribute, $params)
    {

        if (!$this->hasErrors()) {
            $user = $this->_user;
            if (!$user || !$user->validatePassword($this->oldPassword)) {
                $this->addError($attribute, 'Password lama tidak sesuai dengan database');
                return false;
            }
        }
        return true;
    }

    public function __construct($user, $config = [])
    {

        if (empty($user)) {
            throw new InvalidArgumentException('Pengguna tidak ditemukan');
        }

        $this->_user = $user;
        if (!$this->_user) {
            throw new InvalidArgumentException('Pengguna yang dicari tidak ada');
        }

        parent::__construct($config);
    }

    public function updatePassword()
    {

        $this->_user->setPassword($this->newPassword);


        return $this->_user->save(false) ? $this->_user : null;
    }
}
