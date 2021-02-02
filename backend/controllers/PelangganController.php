<?php

namespace backend\controllers;

use backend\models\ImageUploadForm;
use backend\models\PelangganSignupForm;
use common\models\UpdateAccountForm;
use common\models\UpdatePasswordForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\db\Exception;
use yii\filters\AccessControl;
use common\models\User;
use backend\models\PenggunaSearch;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\bootstrap4\ActiveForm;
use yii\web\UploadedFile;

/**
 * PelangganController implements the CRUD actions for User model.
 */
class PelangganController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenggunaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PelangganSignupForm();
        $modelUpload = new ImageUploadForm();


        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post()) && $modelUpload->load(Yii::$app->request->post())) {
            $db = Yii::$app->db->beginTransaction();
            try {
                if ($user = $model->signup()) {
                    if ($upload = UploadedFile::getInstance($modelUpload, 'gambar')) {
                        $modelUpload->gambar = $upload;
                        if ($file = $modelUpload->upload(Yii::getAlias('@common/storages/upload'))) {
                            $user->foto = $file;
                            $user->save(false);
                        }
                    }
                    $db->commit();
                    Yii::$app->session->setFlash('success', 'Berhasil menambahkan Pelanggan.');

                    return $this->redirect(['view', 'id' => $user->id]);
                }
            } catch (Exception $exception) {
                $db->rollBack();
                throw $exception;
            }
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('//karyawan/_form', ['model' => $model, 'modelUpload' => $modelUpload]);
        }

//        var_dump($model);
//        var_dump($modelUpload);
//        exit();

    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $user = $this->findModel($id);
        $model = new UpdateAccountForm($user);
        $modelPassword = new UpdatePasswordForm($user);
        $modelUpload = new ImageUploadForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($modelPassword->load(Yii::$app->request->post())) {
            if ($modelPassword->updatePassword()) {
                Yii::$app->session->setFlash('success', 'Berhasil mengganti kata sandi');
                return $this->redirect(['view', 'id' => $user->id]);
            }
            throw new InvalidArgumentException('Gagal mengganti kata sandi');
        }
        if ($model->load(Yii::$app->request->post()) && $modelUpload->load(Yii::$app->request->post())) {
            $db = Yii::$app->db->beginTransaction();
            try {
                if ($user = $model->updateUser()) {
                    if ($upload = UploadedFile::getInstance($modelUpload, 'gambar')) {
                        //hapus gambar yg lama
                        $old = $user->foto;
                        $path = Yii::getAlias('@common/storages/upload');
                        FileHelper::unlink($path . '/' . $old);

                        $modelUpload->gambar = $upload;
                        if ($file = $modelUpload->upload(Yii::getAlias('@common/storages/upload'))) {
                            $user->foto = $file;
                            $user->save();
                        }
                    }
                    $db->commit();
                    Yii::$app->session->setFlash('success', 'Berhasil Mengubah Pelanggan.');

                    return $this->redirect(['view', 'id' => $user->id]);
                }
            } catch (Exception $exception) {
                $db->rollBack();
                throw $exception;
            }
            Yii::$app->session->setFlash('danger', 'Gagal mengubah Pelanggan.');

            return $this->redirect(['view', 'id' => $user->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelPassword' => $modelPassword,
            'modelUpload' => $modelUpload
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('success', 'Berhasil menghapus Pelanggan.');

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Halaman yang anda minta tidak ditemukan.');
    }
}
