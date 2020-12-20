<?php
namespace App\Controller;
use App\Entity\DataUser;
use App\Entity\Fotos;
use App\Entity\Province;
use App\Entity\User;
use App\Form\DataUserType;
use App\Form\FotosType;
use App\Form\UserType;
use App\Repository\DataUserRepository;
use App\Repository\FotosRepository;
use App\Repository\ProvinceRepository;
use App\Repository\SlugWorker;
use App\Service\FileManagerService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{
   private $dataUserRepository; private $urlGenerator; private $emi; private $fotosRepository; private $provinceRepository;
   private $response;
   public function __construct(ProvinceRepository $provinceRepository, FotosRepository $fotosRepository, DataUserRepository $mainRepository, UrlGeneratorInterface $urlGenerator, EntityManagerInterface $emi){
       $this->dataUserRepository = $mainRepository;
       $this->urlGenerator = $urlGenerator;
       $this->emi = $emi;
       $this->fotosRepository = $fotosRepository;
       $this->provinceRepository = $provinceRepository;

        $this -> response = new Response();
        $this -> response -> headers -> set ('Content-Type', 'application/json');
        $this -> response -> headers -> set ('Access-Control-Allow-Origin', '*');
        $this -> response -> headers -> set ('Access-Control-Allow-Headers ', '*');
   }


    /**
    * @Route("/girls", name="girls")
    */
    public function girls(): Response
    {
       $allusers = $this->dataUserRepository->showAllUsers();
       return $this-> response -> setContent(json_encode($allusers));
    }








    /**
     * @Route("/registaracion", name="registaracion")
     */
    public function registaracion (Request $request, UserPasswordEncoderInterface $passwordEncoder){
        $allprovince = $this->provinceRepository->findAll();
         $user = new User();
         $form = $this->createForm(UserType::class, $user);
         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
             $user->setPlain($user->getPassword());
             $user->setPassword($passwordEncoder->encodePassword($user, $user->getPassword()));

             $this->emi->getConnection()->beginTransaction();
             try{
                 $this->emi->persist($user);
                 $this->emi->flush();
                 $this->emi->commit();
             } catch (\Exception $exception){  $this->emi->rollback(); die('error register patch');}

             return new RedirectResponse($this->urlGenerator->generate('login'));
         }
         return $this->render('main/register.html.twig', [ 'description'=> 'Registaracion Chicas Escort',
            'form' => $form->createView(), 'provinces' => $allprovince,
        ]);
    }



    /**
     * @Route("/", name="index")
     */
    public function index(PaginatorInterface  $paginator, Request $request){
        $user = $this->getUser();
        $allusers = $this->dataUserRepository->showAllUsers();
        $allprovince = $this->provinceRepository->findAll();
        $pagination = $paginator->paginate($allusers, $request->query->getInt('page', 1),111);
        return $this->render('main/index.html.twig', [ 
          'allusers' => $allusers, 'user' => $user, 'provinces' => $allprovince, 'pagination' => $pagination, 'slider' => '/i/slide01.jpg',
            'description' => 'Chicos, Chicas Escort, Sube a tu perfil fotos libremente, Mujeres maduras, jovencitas que saben lo que quieren, Chicas Escort, Anuncíate gratis, Sexo Fácil por Recompensa, Sexxx, xxx', 'title' => 'Chicas Escort',
        ]);
    }

    
    /**
     * @Route("/hombre-escort", name="hombre_escort")
     */
    public function hombreescort(PaginatorInterface  $paginator, Request $request){
        $user = $this->getUser();
        $allusers = $this->dataUserRepository->showAllMan();
        $allprovince = $this->provinceRepository->findAll();
        $pagination = $paginator->paginate($allusers, $request->query->getInt('page', 1),111);
        return $this->render('main/index.html.twig', [
          'allusers' => $allusers, 'user' => $user, 'provinces' => $allprovince, 'pagination' => $pagination, 'slider' => '/i/slide03.jpg',
            'description' => 'Chicos, Hombre Escort, Sube a tu perfil fotos libremente, Mujeres maduras, jovencitas que saben lo que quieren, Chicas Escort, Anuncíate gratis, Sexo Fácil por Recompensa, Sexxx, xxx', 'title' => 'Hombre Escort',
        ]);
    }



    /**
     * @Route("/data dfgh", name="data")
     */
    public function putdata(){
     $data = [ 'Ceuta', 'Melilla'
       //  'A Coruña', 'Álava', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Ávila', 'Badajoz', 'Baleares', 'Barcelona', 'Burgos', 'Cáceres', 'Cádiz', 'Cantabria', 'Castellón', 'Ciudad Real', 'Córdoba', 'Cuenca', 'Girona', 'Granada', 'Guadalajara', 'Gipuzkoa', 'Huelva', 'Huesca', 'Jaén', 'La Rioja', 'Las Palmas', 'León', 'Lérida', 'Lugo', 'Madrid', 'Málaga', 'Murcia', 'Navarra', 'Ourense', 'Palencia', 'Pontevedra', 'Salamanca', 'Segovia', 'Sevilla', 'Soria', 'Tarragona', 'Santa Cruz de Tenerife', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Vizcaya', 'Zamora', 'Zaragoza'
         ];
     $slug = new SlugWorker();
     // $atr = $this->getDoctrine()->getRepository(Province::class)->findAll();
        foreach ($data as $a){
        //    $atr = $this->getDoctrine()->getRepository(Province::class)->findOneBy(['id' => $a->getId() ]);
            $prov = new Province();
            $prov->setName($a);
            $prov->setSlug($slug->work($a));
            $em = $this->getDoctrine()->getManager();
            $em->persist($prov);
            $em->flush();
        }
     return $this->render('base.html.twig', []);
    }



    /**
     * @Route("/ajustes/", name="ajustes")
     */
    public function ajustes (Request $request, FileManagerService $fms){
    $slug_worker = new SlugWorker();
    $user = $this->getUser(); if(!$user) { die('User is null, /ajustes');};
     $data_user = $this->dataUserRepository->findOneBy(['user' => $user]);
     if( ! $data_user){
         $data_user = new DataUser(); $province = null;
     } else {
         $province = $this->provinceRepository->findOneBy(['id'=>$data_user->getProvince()->getId() ]);
     }

     $form = $this->createForm(DataUserType::class, $data_user);
     $form->handleRequest($request);
             // upload foto principal
             if($form->isSubmitted() AND $form->isValid()){
                 $image = $form->get('image')->getData();
                 if ($image){
                     $file_name = $fms->imagePostUpload($image, $data_user->getImage());
                     $data_user->setImage($file_name);
                 }
                $data_user->setUser($user);
                $data_user->setSlugProv($data_user->getProvince()->getSlug() );
                $data_user->setSlug($slug_worker->work($form->getData()->getName()));
                $data_user->setTownslug($slug_worker->work($form->getData()->getTown()));

                   $this->emi->getConnection()->beginTransaction();
                try{
                   $this->emi->persist($data_user);
                   $this->emi->flush();
                   $this->emi->commit();
                    return new RedirectResponse($this->urlGenerator->generate('ajustes'));
                } catch (\Exception $exception){ $this->emi->rollback(); die('this name is used'); }
             }

     // fotos galeria upload form  /////////////////////////////////////////////
        $fotos = $this->fotosRepository->findOneBy(['user' => $user]);
        if(is_null($fotos)) $string_fotos = '';
        else $string_fotos = $fotos->getText();
        $array_fotos = [];
        if($string_fotos) $array_fotos = explode(',', $string_fotos);

        if( !$fotos ){ $fotos = new Fotos(); }
        $form_fotos = $this->createForm(FotosType::class, new Fotos());
        $form_fotos->handleRequest($request);
       //     dump($fotos);
       //     dump($array_fotos);
        if($form_fotos->isSubmitted() AND $form_fotos->isValid()){
            $image = $form_fotos->get('image')->getData();
            if ($image) {
                $file_name = $fms->onlyUpload($image);
                $string_fotos .= $file_name.',';
                $fotos->setText($string_fotos);

                $fotos->setUser($user);
                $this->emi->persist($fotos);
                $this->emi->flush();
                return new RedirectResponse($this->urlGenerator->generate('ajustes'));
            }
        }

      return $this->render('main/ajustes.html.twig', [
          'user' => $user, 'province' => $province,
               'form' => $form->createView(), 'data_user' => $data_user, 'form_fotos' => $form_fotos->createView(), 'arr' => $array_fotos,
      ]);
    }



    /**
     * @Route("/escort/{province}/{town}/{user_slug}", name="show_only_user")
     */
    public function showOneUser(string $user_slug, string $province){
        $datauser = $this->dataUserRepository->showOnlyOneUser($user_slug);
        $allprovince = $this->provinceRepository->findAll();
        $listfotos = $this->fotosRepository->findOneBy(['user' => $datauser->getUse()]);
        if($listfotos){
            $list_fotos = explode(',', $listfotos->getText());
        } else{
            $list_fotos = [];
        }
        try{
            $description = 'Escort ' . $datauser->getProvince()->getName() . ', ' . $datauser->getName() . ', ' . $datauser->getSobremi();
        } catch (\Exception $e){
            $description = 'Escort';
        }
        return $this->render('main/only_user.html.twig', [
            'only_user' =>  $datauser, 'list_fotos' => $list_fotos,
            'description' => $description,  'provinces' =>  $allprovince,
        ]);
    }


    /**
     * @Route("/{province}/escort", name="ussprov")
     */
    public function showUsersByProvince(string $province){
        $allprovince = $this->provinceRepository->findAll();
        $provincereal = $this->provinceRepository->findOneBy(['slug' => $province]);
        $users = $this->dataUserRepository->showUsersByProvince($province);
        try{
            $description = 'Escort ' . $provincereal->getName();
        } catch (\Exception $e){
            $description = 'Escort';
        }
        return $this->render('main/province.html.twig', [
            'description' => $description, 'provinces' =>  $allprovince, 'provincereal' => $provincereal, 'users' => $users,
        ]);
    }


    /**
     * @Route("/fotos", name="fotos")
     */
     public function ajustes_foto(Request $request, FileManagerService $fms){
         $redirecction = false;
         $user  = $this->getUser(); if(!$user) { die('User is null, /ajustes');}
         $fotos = $this->fotosRepository->findOneBy(['user' => $user]);
         if(is_null($fotos)) $string_fotos = ',';
         else $string_fotos = $fotos->getText();

         $array_fotos = [];
         if($string_fotos) $array_fotos = explode(',', $string_fotos);

         if( !$fotos ){ $fotos = new Fotos(); }

         $form = $this->createForm(FotosType::class, new Fotos());
         $form->handleRequest($request);

         if($form->isSubmitted() AND $form->isValid()){
                     $image = $form->get('image')->getData();
                     if ($image) {

                         $file_name = $fms->onlyUpload($image);
                         $string_fotos .= $file_name.',';
                         $fotos->setText($string_fotos);

                         $fotos->setUser($user);
                         $this->emi->persist($fotos);
                         $this->emi->flush();
                         $redirecction = true;
                        // return new RedirectResponse($this->urlGenerator->generate('fotos'));
                     }
         }
         return $this->render('main/fotos.html.twig', [
             'form' => $form->createView(), 'arr' => $array_fotos, 'redirection' => $redirecction,
         ]);
     }


    /**
     * @Route("/aviso-legal", name="avisolegal", methods={"GET"})
     */
     public function avisolegal(){
         $allprovince = $this->provinceRepository->findAll();

         return $this->render('main/avisolegal.html.twig', [
             'description' => '', 'provinces' =>  $allprovince,
         ]);
     }



    /**
     * @Route("/politica-privacidad", name="polpri", methods={"GET"})
     */
    public function polprivacidad(){
        $allprovince = $this->provinceRepository->findAll();

        return $this->render('main/avisolegal.html.twig', [
            'description' => '', 'provinces' =>  $allprovince,
        ]);
    }


    /**
     * @Route("/{slugtown}/escort/{town}", name="town_escort", methods={"GET"})
     * @param $slugtown
     */
    public function userInTown(PaginatorInterface  $paginator, Request $request,string $slugtown,string $town){
        $user = $this->getUser();
        $allusers = $this->dataUserRepository->showUsersByTown($slugtown);
       // dump($allusers);
        $allprovince = $this->provinceRepository->findAll();
        $pagination = $paginator->paginate($allusers, $request->query->getInt('page', 1),111);
        return $this->render('main/town.html.twig', [
            'allusers' => $allusers, 'user' => $user, 'provinces' => $allprovince, 'pagination' => $pagination,
            'description' => $town .'Escort, Follar Gratis, Sexo Facil, Sexxx, xxx, putas', 'title' => $town,
        ]);
    }




























}







































