<?php

namespace backend\controllers;

use backend\models\ImageUploadForm;
use Yii;
use yii\filters\AccessControl;
use common\models\Item;
use backend\models\ItemSearch;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\bootstrap4\ActiveForm;
use yii\web\UploadedFile;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends Controller
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
     * Lists all Item models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Item model.
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
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Item();
        $uploadForm = new ImageUploadForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post()) && $uploadForm->load(Yii::$app->request->post())) {
            $data = UploadedFile::getInstance($uploadForm, 'gambar');
            if ($data !== null) {
                $uploadForm->gambar = $data;
                if ($file = $uploadForm->upload(Yii::getAlias('@common/storages/upload'))) {
                    $model->gambar = $file;
                }
            }

            $model->save();
            Yii::$app->session->setFlash('success', 'Berhasil menambahkan Item.');

            return $this->redirect(['view', 'id' => $model->id]);
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_form', ['model'=>$model,'uploadForm'=>$uploadForm]);
        }

        return $this->render('create', [
            'model' => $model,
            'uploadForm'=>$uploadForm
        ]);
    }

    /**
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $uploadForm = new ImageUploadForm();


        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post()) && $uploadForm->load(Yii::$app->request->post())) {
            if($data = UploadedFile::getInstance($uploadForm,'gambar')){
                //hapus gambar yg lama
                $old = $model->gambar;
                $path = Yii::getAlias('@common/storages/upload');
                FileHelper::unlink($path.'/'.$old);

                //upload gambar yg baru
                $uploadForm->gambar = $data;
                if($file = $uploadForm->upload($path)){
                    $model->gambar = $file;
                }


            }
            $model->save();


            Yii::$app->session->setFlash('success', 'Berhasil mengubah Item.');

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'uploadForm'=>$uploadForm,

        ]);
    }

    /**
     * Deletes an existing Item model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('success', 'Berhasil menghapus Item.');

        return $this->redirect(['index']);
    }

//    public function actionUpload()
//    {
//        Yii::$app->response->format = Response::FORMAT_JSON;
//
//        $preview = $config = $errors = [];
//        $model = new ImageUploadForm();
//        $post = Yii::$app->request->post();
//        $path = Yii::getAlias('@common/storages/upload');
//
//        $data = UploadedFile::getInstance($model, 'gambar');
//        if ($data === null) {
//            return [];
//        }
//
//        $model->gambar=$data;
//        $id = [];
//        if ($file = $model->upload($path)) {
//            $url = (Yii::getAlias('@web/upload/' . $file));
//            $preview[] = $url;
//            $config[] = [
//                'caption'=>$file,
//                'size'=>$data->size,
//                'downloadUrl'=>$url,
//                'deleteUrl'=>Yii::$app->urlManager->createAbsoluteUrl(['item/delete-gambar'])
//            ];
//        } else {
//            $errors[] = $file;
//        }
//
//        $out = ['initialPreview' => $preview, 'initialPreviewConfig' => $config, 'initialPreviewAsData' => true];
//        if (!empty($errors)) {
//            $img = count($errors) === 1 ? 'file "' . $errors[0] . '" ' : 'files: "' . implode('", "', $errors) . '" ';
//            $out['error'] = 'Gawat, kami tidak bisa menguggah gambar ' . $img . 'sekarang. Silahkan coba sesaat lagi.';
//        }
//        return $out;
//    }
//
//    public function actionDeleteGambar()
//    {
//        Yii::$app->response->format = Response::FORMAT_JSON;
//        $data = Yii::$app->request->post();
//        $file = $data['key'];
//        $path = Yii::getAlias('@common/storages/upload');
//        return FileHelper::unlink("$path/$file");
//    }

    /**
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Item::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Halaman yang anda minta tidak ditemukan.');
    }
}
