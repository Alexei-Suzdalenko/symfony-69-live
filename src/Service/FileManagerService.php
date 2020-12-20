<?php
namespace App\Service;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface FileManagerService
{
    /**
     * @param UploadedFile $file
     * @param string $currentImage
     * @return string
     */
     public function imagePostUpload(UploadedFile $file, ? string $currentImage) :?string ;


     public function onlyUpload(UploadedFile $file) :?string ;

}