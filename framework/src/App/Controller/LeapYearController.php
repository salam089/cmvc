<?php
// example.com/src/Calendar/Controller/LeapYearController.php
namespace App\Controller;

use App\Model\LeapYear;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController 
{
    public function index(Request $request, $year)
    {
        
       $tpl=  new \App\Core\BaseController( $request);
       $tpl->render_template()->render('/example', ['name' => 'John Doe']);


         
        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            $data = new \stdClass();
            $data->test = 'Yep, this is a leap year!';

            $obj = (object) [
                'name'    =>'Mike',
                'surname' =>'Jovanson',
                'age'     =>'45',
                'time'    =>1234567890,
                'country' =>'Germany',
            ];
            
            
          $data = $blade->render('/example', ['name' => 'John Doe','data'=> (array) $obj ]);
           
            return new Response( $data);
        }
        

        return new Response('Nope, this is not a leap year.');
    }
}