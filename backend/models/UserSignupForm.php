<?php


namespace backend\models;


use common\models\User;
use frontend\models\SignupForm;
use Yii;
use yii\helpers\ArrayHelper;

class UserSignupForm extends SignupForm
{
    public $nama;
    public $alamat;
    public $telepon;

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),[
            [['nama','telepon'],'required'],
            ['alamat','safe'],
            [['nama','telepon','alamat'],'string']
        ]);
    }

    /**
     * @return User|null
     * @throws \Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = User::STATUS_ACTIVE;
        $user->save(false);

        $auth = Yii::$app->authManager;
        $role = $auth->getRole('karyawan');
        $auth->assign($role,$user->id);

        return $user;
    }

}