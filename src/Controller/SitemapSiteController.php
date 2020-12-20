<?php
namespace App\Controller;
use App\Entity\DataUser;
use App\Entity\Province;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DataUserRepository;
class SitemapSiteController extends AbstractController
{
    private $datauserrepositiry;
    public function __construct(DataUserRepository $datauserrepositiry)
    {
        $this->dur = $datauserrepositiry;
    }


    /**
     * @Route("/s", name="sitemap_site")
     */
    public function index(Request $request)
    {
       $dataTime = date("Y-m-d", time()) . 'T' . date("H:i:s", time()) .'+00:00';

       $urls = [];
       $hostname = $request->getHost();

       $urls[] = ['loc' => $this->get('router')->generate('index'), 'changefreq' => 'weekly', 'priority' => '1.0'];
       $urls[] = ['loc' => $this->get('router')->generate('registaracion'), 'changefreq' => 'weekly', 'priority' => '0.9'];


        $provinces = $this->getDoctrine()->getRepository(Province::class)->findAll();
        $users = $this->getDoctrine()->getRepository(DataUser::class)->findAll();
        $towns = $this->dur->findAllTowns();
       // dump($users[0]);
       // dump($towns[0]);

        foreach ($provinces as $province) {
            $urls[] = ['loc' => $this->get('router')->generate('ussprov', ['province' => $province->getSlug()])];
        }
        foreach ($users as $user) {
            $urls[] = ['loc' => $this->get('router')->generate('show_only_user', ['province' => $user->getSlugprovince(), 'user_slug' => $user->getSlug(), 'town' => $user->getTown()])];
        }
        foreach ($towns as $town) {
            $urls[] = ['loc' => $this->get('router')->generate('town_escort', ['slugtown' => $town["townslug"], 'town' => $town["town"] ])];
        }

        $puth = $this->getParameter('sitemap_file').'sitemap.xml';
       // dump($puth);
        $myfile = fopen($puth, "w");
        $txt = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
        fwrite($myfile, $txt);

        $body = '';
        foreach ($urls as $url){
          //  dump($url);
            $string = '<url>';
            $string .= '<loc>http://' . $hostname . $url['loc'] . '</loc>';
            $string .= '<lastmod>'. $dataTime .'</lastmod>';
            $string .= '<changefreq>daily</changefreq>';
            $string .= '<priority>1</priority>';
            $string .= '</url>';
            $body .= $string;
        }

        fwrite($myfile, $body);

        fwrite($myfile, '</urlset>');
        fclose($myfile);
     //   dump($puth);

       // return new Response('<a href="https://www.escort69.live/sitemap.xml">sitemap</a> ');
        die('<a href="https://www.escort69.live/sitemap.xml">sitemap</a>');
    }
}
