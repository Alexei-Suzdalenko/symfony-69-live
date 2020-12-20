<?php
namespace App\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileManagerUp extends AbstractController implements FileManagerService
{
    // upload foto principal !!!!
    public function imagePostUpload(UploadedFile $file, ? string $currentImage): ?string
    {
        $year = date("Y");
        $month = date('m');
        $urlImage = $this->getParameter('upload_dir').$year.'/'.$month;

        if (!file_exists($urlImage)) {
            mkdir($urlImage, 0777, true);
        }

        $fileName = uniqid().'.'.$file->guessExtension();

        try{
            $file->move($urlImage, $fileName);
            if(!is_null($currentImage)){
                $fileSystem = new Filesystem();
                $fileSystem->remove( $this->getParameter('upload_dir').'/'.$currentImage);
            }
            return $year.'/'.$month.'/'.$fileName;

        } catch (\Exception $exception){
            die('Error file manager system');
        }
        return '';
    }

    // upload foto gallery
    public function onlyUpload(UploadedFile $file): ?string
    {
        $year = date("Y");
        $month = date('m');
        $urlImage = $this->getParameter('upload_dir').$year.'/'.$month;

        if (!file_exists($urlImage)) {
            mkdir($urlImage, 0777, true);
        }

        $fileName = uniqid().'.'.$file->guessExtension();
        try{
            $file->move($urlImage, $fileName);
            return $year.'/'.$month.'/'.$fileName;
        } catch (\Exception $exception){
            die('Error file manager system');
        }
        return '';
    }
}