<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class StationController extends Controller {
    /**
     * @Route("/station", name="station")
     */

    public function index() {

        $url = 'https://randomuser.me/api/';
        $browser = new Browser();
        $response = $browser->request(Request::METHODE_GET, $url);
        $datas = json_decode($response->getBody()->getContents(), true);

        return ['datas' => $datas];

        /*return $this->render('station/index.html.twig', [
            'controller_name' => 'StationController',
        ]);*/
    }
}
