<?php


namespace frontend\controllers;


use backend\models\ImageUploadForm;
use common\models\UpdateAccountForm;
use common\models\UpdatePasswordForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\bootstrap4\ActiveForm;
use yii\db\Exception;
use yii\helpers\FileHelper;
use yii\web\Response;
use yii\web\UploadedFile;

class AkunController extends \yii\web\Controller
{

    public function actionIndex(){
        $model = \Yii::$app->user->identity;
        return $this->render('index',['model'=>$model]);
    }

    public function actionUpdate(){

        $user = Yii::$app->user->identity;
        $model = new UpdateAccountForm($user);
        $modelPassword= new UpdatePasswordForm($user);
        $modelUpload = new ImageUploadForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if($modelPassword->load(Yii::$app->request->post())){
            if($modelPassword->updatePassword()){
                Yii::$app->session->setFlash('success','Berhasil mengganti kata sandi');
                return $this->redirect(['view','id'=>$user->id]);
            }
            throw new InvalidArgumentException('Gagal mengganti kata sandi');


        }
        if ($model->load(Yii::$app->request->post()) && $modelUpload->load(Yii::$app->request->post())) {

            $db = Yii::$app->db->beginTransaction();
            try{
                if ($user = $model->updateUser()) {
                    if ($upload = UploadedFile::getInstance($modelUpload, 'gambar')) {
                        //hapus gambar yg lama
                        $old = $user->foto;
                        $path = Yii::getAlias('@common/storages/upload');
                        FileHelper::unlink($path.'/'.$old);

                        $modelUpload->gambar = $upload;
                        if ($file = $modelUpload->upload(Yii::getAlias('@common/storages/upload'))) {
                            $user->foto = $file;
                            $user->save();
                        }
                    }
                    $db->commit();
                    Yii::$app->session->setFlash('success', 'Berhasil Mengubah Data Akun.');

                    return $this->redirect(['view', 'id' => $user->id]);
                }
            }
            catch (Exception $exception){
                $db->rollBack();
                throw $exception;
            }
            Yii::$app->session->setFlash('danger', 'Gagal mengubah Data Akun.');

            return $this->redirect(['view', 'id' => $user->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelPassword'=>$modelPassword,
            'modelUpload'=>$modelUpload
        ]);
    }
}