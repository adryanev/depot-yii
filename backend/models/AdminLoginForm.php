<?php


namespace backend\models;

use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\helpers\ArrayHelper;

class AdminLoginForm extends LoginForm
{

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),[
            ['username','validateRole']
        ]);
    }

    /**
     * Validates Role
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateRole($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            $roles = Yii::$app->authManager->getRolesByUser($user->id);
            $allow = ArrayHelper::getValue($roles, 'superadmin') || ArrayHelper::getValue($roles, 'karyawan');
            if (!$user || !$allow) {
                $this->addError($attribute, 'Anda tidak memiliki akses');
            }
        }
    }

}
