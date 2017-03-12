<?php

namespace App\Http\Controllers;

use JavaScript;
use App\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $devId;
    private $key;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->devId = '3000161';
        $this->key = 'b197ee56-4c90-4e03-993f-08dd7794f135';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::query()->orderBy('created_at','desc')->paginate(5);

        return view('admin.index',compact('pages'));
    }

    public function ptvAPI($url){
        $request = str_replace('http://timetableapi.ptv.vic.gov.au','', $url);
        $raw = $request.'?devid='.$this->devId;
        $fullUrl = $url.'?devid='.$this->devId;
        $signature = hash_hmac('sha1',$raw,$this->key);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $fullUrl.'&signature='.$signature,
            CURLOPT_USERAGENT => 'PTV cURL Request'
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        return json_encode($resp);
    }

    public function routeTypes(){
        $url = 'http://timetableapi.ptv.vic.gov.au/v3/route_types';
        $request = str_replace('http://timetableapi.ptv.vic.gov.au','', $url);
        $raw = $request.'?devid='.$this->devId;
        $fullUrl = $url.'?devid='.$this->devId;
        $signature = hash_hmac('sha1',$raw,$this->key);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $fullUrl.'&signature='.$signature,
            CURLOPT_USERAGENT => 'PTV cURL Request'
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        return json_encode($resp);
    }

    public function ptvRoutes(){
        $url = 'http://timetableapi.ptv.vic.gov.au/v3/routes';
        $request = str_replace('http://timetableapi.ptv.vic.gov.au','', $url);
        $raw = $request.'?devid='.$this->devId;
        $fullUrl = $url.'?devid='.$this->devId;
        $signature = hash_hmac('sha1',$raw,$this->key);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $fullUrl.'&signature='.$signature,
            CURLOPT_USERAGENT => 'PTV cURL Request'
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        $array = json_encode($resp);
        $array = json_decode($array);

        return $array;
    }

    public function ptv(){

        /*
         * Stop ID's
         * RMIT-7: 19494
         * */

        $url = 'http://timetableapi.ptv.vic.gov.au/v3/departures/route_type/2/stop/19494';
        $request = str_replace('http://timetableapi.ptv.vic.gov.au','', $url);
        $raw = $request.'?devid='.$this->devId;
        $fullUrl = $url.'?devid='.$this->devId;
        $signature = hash_hmac('sha1',$raw,$this->key);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $fullUrl.'&signature='.$signature,
            CURLOPT_USERAGENT => 'PTV cURL Request'
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        JavaScript::put([
            'timetable' => $resp,
            'routes' => $this->ptvRoutes(),
            'routeTypes' => json_decode($this->routeTypes(),true)
        ]);

        return view('ptv');
    }
}
