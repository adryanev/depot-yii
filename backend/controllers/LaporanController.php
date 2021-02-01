<?php


namespace backend\controllers;

use Carbon\Carbon;
use common\models\Pemesanan;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Yii;
use yii\base\DynamicModel;
use yii\web\Controller;

class LaporanController extends Controller
{

    public function actionIndex()
    {
        $model = new DynamicModel(['dari', 'sampai']);
        $model->addRule(['dari', 'sampai'], 'required');

        if ($model->load(Yii::$app->request->post())) {
            $laporan = $this->generateLaporan($model->dari, $model->sampai);

            return Yii::$app->response->sendFile($laporan);
        }

        return $this->render('index', compact('model'));
    }

    private function generateLaporan($dari, $sampai)
    {
        $data = Pemesanan::find()->where(['between','created_at',$dari,$sampai])->all();
        $template = Yii::getAlias('@common/storages/template-laporan.xlsx');
        $bulanDari = Carbon::createFromTimestamp($dari);
        $bulanSampai = Carbon::createFromTimestamp($sampai);

        $reader = IOFactory::createReader('Xlsx');

        $spreadsheet = $reader->load($template);

        $startRow =8;
        $currentRow = 8;
        $currentWorksheet = 0;
        $spreadsheet->getSheet($currentWorksheet)
            ->setCellValue('G4',$bulanDari->isoFormat('LL'))
            ->setCellValue('I4',$bulanSampai->isoFormat('LL'))
        ;
        $counter = 1;
        foreach ($data as/** @var $pemesanan Pemesanan  */ $pemesanan){
            foreach ($pemesanan->details as $detail){
                $tanggal =Carbon::createFromTimestamp($pemesanan->created_at);
                $spreadsheet->getSheet($currentWorksheet)->insertNewRowBefore($currentRow + 1);
                $spreadsheet->getSheet($currentWorksheet)
                    ->setCellValue('B'.$currentRow,$counter)
                    ->setCellValue('C'.$currentRow, $tanggal->isoFormat('LL'))
                    ->setCellValue('D'.$currentRow, $pemesanan->user->username)
                    ->setCellValue('E'.$currentRow,$detail->item->nama)
                    ->setCellValue('F'.$currentRow,$detail->qty)
                    ->setCellValue('G'.$currentRow,$detail->total)
            ;
                $counter++;
                $currentRow++;
            }
        }
        $spreadsheet->getSheet($currentWorksheet)->removeRow($currentRow, 2);
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $timestamp = Carbon::now()->timestamp;
        $filename = $timestamp . '-laporan-penjualan-' . $bulanDari->isoFormat('LL') . '-' . $bulanSampai->isoFormat('LL') . '.xlsx';
        $path = Yii::getAlias('@common/storages/laporan');
        $writer->save("$path/$filename");

        return "$path/$filename";
    }
}
