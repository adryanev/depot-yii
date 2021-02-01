<?php

namespace frontend\controllers;

use common\models\DetailPemesanan;
use common\models\Item;
use common\models\Pemesanan;
use Yii;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PemesananController extends Controller
{
//    public function behaviors()
//    {
//        return [
//            'verbs'=>[
//                'class'=>VerbFilter::class,
//                'actions'=>[
//                    'confirm'=>['POST']
//                ]
//            ]
//        ];
//    }

    public function actionPesan()
    {
        $produkDataProvider = new ActiveDataProvider(['query'=>Item::find()]);
        $cart = Yii::$app->cart;
        return $this->render('pesan',['produkDataProvider'=>$produkDataProvider,'cart'=>$cart]);
    }

    public function actionAddToCart($id)
    {
        $cart = Yii::$app->cart;

        $model = Item::findOne($id);
        if ($model) {
            $cart->put($model);
            return $this->redirect(Yii::$app->request->referrer);
        }
        throw new NotFoundHttpException();
    }

    public function actionRemoveFromCart($id){
        $cart = Yii::$app->cart;

        $model = $cart->getPositionById($id);
        if ($model) {
            $cart->update($model,--$model->quantity);
            return $this->redirect(Yii::$app->request->referrer);
        }
        throw new NotFoundHttpException();
    }

    public function actionCartView()
    {
        $cart = Yii::$app->cart;
        $cartDataProvider = new ArrayDataProvider(['allModels'=>$cart->getPositions()]);
        $user = Yii::$app->user->identity;
        $pemesanan = new Pemesanan();
        if($pemesanan->load(Yii::$app->request->post())){
            $db = Yii::$app->db->beginTransaction();

            try{
                $pemesanan->status = Pemesanan::STATUS_DITERIMA;
                $pemesanan->jumlah = $cart->cost;
                $pemesanan->save(false);
                foreach ($cart->getPositions() as $item) {
                    $detail = new DetailPemesanan();
                    $detail->id_pemesanan = $pemesanan->id;
                    $detail->id_item = $item->id;
                    $detail->qty = $item->quantity;
                    $detail->total = $item->cost;
                    $detail->save(false);
                }

                $db->commit();
                $cart->removeAll();
                Yii::$app->session->setFlash('success','Pesanan anda berhasil dikirim');
                return  $this->redirect(['view','id'=>$pemesanan->id]);

            }catch (Exception $exception){
                $db->rollBack();
                throw  $exception;
            }
        }
        return $this->render('cart-view', ['cart' => $cart,'cartDataProvider'=>$cartDataProvider,'user'=>$user,'pemesanan'=>$pemesanan]);
    }

    public function actionView($id){

        $pemesanan = Pemesanan::findOne($id);
        return $this->render('view',['pemesanan'=>$pemesanan]);
    }

    public function actionRiwayat(){
        $dataProvider = new ActiveDataProvider(['query'=>Pemesanan::find()->where(['id_user'=>Yii::$app->user->identity])->orderBy('id DESC')]);
        return $this->render('riwayat',compact('dataProvider'));
    }

//    public function actionConfirm(){
//        $cart = Yii::$app->cart;
//        $items = $cart->getPositions();
//        $db = Yii::$app->db->beginTransaction();
//        try{
//            $pemesanan = new Pemesanan();
//            $pemesanan->id_user = Yii::$app->user->identity->getId();
//            $pemesanan->alamat =  Yii::$app->user->identity->alamat ??
//            foreach ($items as $item){
//
//            }
//
//            $db->commit();
//        }
//        catch (Exception $exception){
//            $db->rollBack();
//            throw $exception;
//        }
//
//    }
}
