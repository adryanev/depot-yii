<?php

namespace backend\controllers;

use common\models\RiwayatStatusPemesanan;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use common\models\Pemesanan;
use backend\models\PemesananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\bootstrap4\ActiveForm;

/**
 * PesananController implements the CRUD actions for Pemesanan model.
 */
class PesananController extends Controller
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
                    'update-status' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pemesanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PemesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pemesanan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
            'riwayat'=>$model->getRiwayatStatusPemesanans()->orderBy('id DESC')->all()
        ]);
    }

    /**
     * Deletes an existing Pemesanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('success', 'Berhasil menghapus Pemesanan.');

        return $this->redirect(['index']);
    }

    public function actionUpdateStatus()
    {
        $data = Yii::$app->request->post();
        $id = $data['id'];
        $status = $data['status'];
        $pemesanan = $this->findModel($id);
        $transaction = Yii::$app->db->beginTransaction();
        try{
            //update status pemesanan
            $pemesanan->status = $status;
            $pemesanan->save(false);
            //tambah riwayat
            $riwayat = new RiwayatStatusPemesanan();
            $riwayat->id_pemesanan = $pemesanan->id;
            $riwayat->status = $status;
            $riwayat->save(false);

            $transaction->commit();
        }
        catch (Exception $exception){
            $transaction->rollBack();
            throw $exception;
        }

        Yii::$app->session->setFlash('success', 'Berhasil memperbarui Status Pemesanan');
        return $this->redirect(Yii::$app->request->referrer);
    }
    /**
     * Finds the Pemesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pemesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pemesanan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'Halaman yang anda minta tidak ditemukan.'));
    }
}
