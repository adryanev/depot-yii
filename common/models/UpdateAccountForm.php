<?php

namespace common\models;

use common\models\User;
use InvalidArgumentException;
use Yii;
use yii\db\Exception;

/**
 * Class UpdateAccountForm
 * @package common\models
 */
class UpdateAccountForm extends \yii\base\Model
{
    public $username;
    public $email;
    public $nama;
    public $alamat;
    public $telepon;


    /**
     * @var User
     */
    private $_user;

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
        ];
    }

    public function __construct($user, $config = [])
    {

        if (empty($user)) {
            throw new InvalidArgumentException('Id tidak boleh kosong');
        }
        $this->_user = $user;
        if (!$this->_user) {
            throw new InvalidArgumentException('User tidak Ditemukan');
        }
        $this->setAttributes([
            'username' => $this->_user->username,
            'email' => $this->_user->email,
            'nama' => $this->_user->nama,
            'alamat'=>$this->_user->alamat,
            'telepon'=>$this->_user->telepon,
        ], false);


        parent::__construct($config);
    }

    public function rules(): array
    {
        return [

            [['username', 'email', 'nama','telepon'], 'required'],
            ['alamat','safe'],
            [['username','email','nama','alamat','telepon'],'string']
        ];
    }

    public function updateUser()
    {

        $user = $this->_user;

        $user->setAttributes(['username' => $this->username,
            'email' => $this->email,
            'nama' => $this->nama,
            'alamat'=>$this->alamat,
            'telepon'=>$this->telepon
        ]);



        return  $user->save(false) ? $user: null;
    }

    public function getUser()
    {
        return $this->_user;
    }

}