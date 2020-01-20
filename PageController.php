<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendarific\Calendarific;

class PageController extends Controller
{
    public function indonesianholiday()
    {
        $key = 'a74e5aec2b72e373e472d132e85aa00600e8a293975f061320fc444ef9a0baf7';
        $country = 'ID';
        $year = 2020;
        $month = null;
        $day = null;
        $location = null;
        $types = ['national'];

        $response = Calendarific::make($key, $country, $year, $month, $day, $location, $types);

        //print_r($response);
        //echo $response["response"]["holidays"][0]["description"];
        for($i = 0; $i < count($response["response"]["holidays"]); $i++)
        {
            $date = $response["response"]["holidays"][$i]["date"]["iso"];
            $date = substr($date, 8,2).'-'.substr($date,5,2).'-'.substr($date,0,4);
            $day = date("l", strtotime($date));
            echo $response["response"]["holidays"][$i]["description"]. " on ".$day.",  ".$date."<br />";
        }
    }
}
