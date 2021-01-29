<?php


namespace console\controllers;

use common\auth\rbac\rules\AccessOwnPesanan;
use common\models\User;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

class AuthController extends Controller
{

    public function actionUp()
    {

        $auth = Yii::$app->authManager;

        $this->stdout('Creating Roles' . PHP_EOL);
        $superadmin = $auth->createRole('superadmin');
        $karyawan = $auth->createRole('karyawan');
        $pelanggan = $auth->createRole('pelanggan');

        $auth->add($superadmin);
        $auth->add($karyawan);
        $auth->add($pelanggan);

        $this->stdout('Assigning SuperAdmin' . PHP_EOL);
        $root = User::findOne(['username'=>'root']);
        $auth->assign($superadmin, $root->id);


        $su = $auth->getRole('superadmin');
        $kar = $auth->getRole('karyawan');
        $cust = $auth->getRole('pelanggan');
        $suPermission = ['@app-frontend/*','@app-backend/*'];
        foreach ($suPermission as $k=> $permission){
            $this->stdout('Creating Permission: '.$permission.PHP_EOL);
            $a = $auth->createPermission($permission);
            $auth->add($a);

            $this->stdout('Assign permission to role'.PHP_EOL);
            if($k===1){

                $auth->addChild($su,$a);
                continue;
            }
            $auth->addChild($su,$a);
            $auth->addChild($kar,$a);

        }
        $karyawanPermission = ['@app-backend/pelanggan/*','@app-backend/pesanan/*','@app-backend/laporan/*'];
        foreach ($karyawanPermission as $permission){
            $this->stdout('Creating Permission: '.$permission.PHP_EOL);
            $a = $auth->createPermission($permission);

            $auth->add($a);

            $this->stdout('Assign Permission.'.PHP_EOL);

            $auth->addChild($kar,$a);
        }
        $custPermission = ['@app-frontend/site/*','@app-frontend/pemesanan/pesan', '@app-frontend/pemesanan/riwayat'];

        foreach ($custPermission as $permission){
            $this->stdout('Creating Permission: '.$permission.PHP_EOL);
            $a = $auth->createPermission($permission);
            $auth->add($a);
            $this->stdout('Assign Permission.'.PHP_EOL);

            $auth->addChild($cust,$a);
        }


        $access_own_pesanan = new AccessOwnPesanan();
        $auth->add($access_own_pesanan);

        $izinCustomer = $auth->createPermission('lihatPemesanan');
        $izinCustomer->description = 'Melihat pemesanan galon';
        $izinCustomer->ruleName = $access_own_pesanan->name;
        $auth->add($izinCustomer);

        $lihatPesanana = $auth->createPermission('@app-frontend/pemesanan/lihat');
        $auth->add($lihatPesanana);

        $auth->addChild($izinCustomer,$lihatPesanana);


    }

    public function actionDown()
    {
        $auth = Yii::$app->authManager;
        $this->stdout('Cleaning all RBAC Entries'.PHP_EOL);
        $auth->removeAll();
    }
}
