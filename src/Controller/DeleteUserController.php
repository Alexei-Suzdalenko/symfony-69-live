<?php
namespace App\Controller;
use App\Repository\DataUserRepository;
use App\Repository\FotosRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteUserController extends AbstractController
{
    private $userRepository, $dataUserRepository, $fotosRepository, $emi;
    public function __construct(UserRepository $userRepository, DataUserRepository $dataUserRepository, FotosRepository $fotosRepository, EntityManagerInterface $emi){
        $this->userRepository     = $userRepository;
        $this->dataUserRepository = $dataUserRepository;
        $this->fotosRepository    = $fotosRepository;
        $this->emi                = $emi;
    }


    /**
     * @Route("/delete_user", name="delete_user")
     */
    public function index(Request $request)
    {
       $data = json_decode($request->getContent(), true);
       $id = $data['user'];

       $user = $this->userRepository->findOneBy(['id' => $id]);
       $dataUser = $this->dataUserRepository->findOneBy(['user' => $user]);

       $fotosEntity = $this->fotosRepository->findOneBy(['user' => $user]);
       if($fotosEntity){
           $stringImages = $fotosEntity->getText();
           if ($stringImages){
               $arrayImages = explode(',', $stringImages);
               if($arrayImages){
                   foreach ($arrayImages as $img){
                       if ($img == '') { continue;
                       } else {
                           $fileSystem = new Filesystem();
                           $fileSystem->remove($this->getParameter('upload_dir').'/'.$img);
                       }
                   }

               }
             }
           $this->emi->remove($fotosEntity);
           $this->emi->flush();
       }

       if($dataUser){
           $mainImage = $dataUser->getImage();
           if ($mainImage) {
               $fileSystem = new Filesystem();
               $fileSystem->remove($this->getParameter('upload_dir') . '/' . $mainImage);
           }
           $this->emi->remove($dataUser);
           $this->emi->flush();
       }


       if($user){
           $this->emi->remove($user);
           $this->emi->flush();
       }

        return new JsonResponse(['result' => $id]);
    }
	
	
	/**
     * @Route("/ok", name="ok")
     */
	 public function index_ok(Request $request)
    {
        $d  = $request->getContent();
		$data = json_decode($request->getContent(), true);
		var_dump ($request->getContent());
		exit();
    }
    

    
    /**
     * @Route("/delete_foto/{id}", name="delete_foto", methods={"GET"})
     * @param string $id
     */
    public function delete(string $id){

      
       $user  = $this->getUser(); if(!$user) { die('User is null, /delete');}
       $fotos = $this->fotosRepository->findOneBy(['user' => $user]);
       $fotos_string = $fotos->getText();
       $array_fotos = explode(',', $fotos_string);
       dump($array_fotos);

       $this->emi->getConnection()->beginTransaction();
       try{
               $fileSystem = new Filesystem();
               $fileSystem->remove($this->getParameter('upload_dir').'/'.$array_fotos[$id]);
               unset($array_fotos[$id]);
               $comma_separated = implode(",", $array_fotos);
               dump($array_fotos);
               $fotos->setText($comma_separated);
               $this->emi->persist($fotos);
               $this->emi->flush();
               $this->emi->commit();
       } catch (\Exception $exception){ $this->emi->rollback(); die('this name is used'); }

       return $this->json(['ok'=>'delete']);
     }
}





























































































































































