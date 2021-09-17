<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client as GuzzleClient;

use Illuminate\Http\Request;

class NbaController extends Controller
{
    public function getPlayerByName(Request $request){
        $name = strtolower($request->input("name"));
        $player = "https://www.balldontlie.io/api/v1/players?search=$name";
        $client = new GuzzleClient();
        $headers = [
            'Content-type' => 'application/json'
        ];
        $response = $client->request('GET',$player,
        [
            'headers' => $headers
        ]);
        return $response->getBody();
    }
}
