<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 05/04/2018
 * Time: 10:34
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class HelloController {
    public function helloName(string $name) {
        return new Response(
          '<html>
             <body>
               <p>Hello '.$name.'</p>
             </body>
           </html>'
        );
    }
}