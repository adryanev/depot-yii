<?php


namespace backend\models;


use common\models\User;
use Yii;

class PelangganSignupForm extends KaryawanSignupForm
{

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
        $user->nama = $this->nama;
        $user->telepon = $this->telepon;
        $user->alamat = $this->alamat;
        $user->save(false);

        $auth = Yii::$app->authManager;
        $role = $auth->getRole('pelanggan');
        $auth->assign($role,$user->id);

        return $user;
    }

}