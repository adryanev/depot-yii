<?php


namespace backend\models;


use Carbon\Carbon;
use yii\base\Model;
use yii\web\UploadedFile;


class ImageUploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $gambar;

    public function rules()
    {
        return [
            [['gambar'],'file']
        ];
    }

    public function upload($path){
        if($this->validate()){
            $timestamp = Carbon::now()->timestamp;
            $filename = $timestamp.'-'.$this->gambar->baseName.'.'.$this->gambar->extension;

            if($this->gambar->saveAs("$path/$filename")){
                return $filename;
            }
        }
        return null;
    }

}