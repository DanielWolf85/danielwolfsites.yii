<?php

namespace app\models;

use yii\web\UploadedFile;
use yii\base\Model;
use Yii;

class ImageUpload extends Model
{
    public $image;


    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpeg, jpg, png'],
        ];
    }


    public function uploadFile(UploadedFile $file, $currentImage)
    {
        
        $this->image = $file;

        if ($this->validate())
        {
            if ($this->checkExists($currentImage)) {
                $this->deleteCurrentImage($currentImage);
            }

            $filename = $this->hashFilename($file);

            $this->saveFile($file, $filename);

            return $filename;
        }
    }


    private function checkExists($currentImage)
    {
        return file_exists($this->getCurrentImage($currentImage));       
    }


    private function getCurrentImage($currentImage)
    {
        return $this->getUploadsFolder() . $currentImage;
    }


    public function deleteCurrentImage($currentImage)
    {
        // return unlink($this->getCurrentImage($currentImage));
        return true;
    }


    private function hashFilename($file)
    {
        return strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);
    }


    private function saveFile($file, $filename)
    {
        $file->saveAs($this->getUploadsFolder() . $filename);
        return;
    }


    public function getUploadsFolder()
    {
        return Yii::getAlias('@web') . 'uploads/';
    }
}
