<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProxyController extends Controller
{
    //curl http://parsehub.valet/proxy?url=http://httpbin.org/get
    public function get(Request $request, $url) {
        $input = $request->all();
        $client = new Client();
        $response = $client->get($url, [
            "headers" => [
                "Accept" => "*/*", 
                "Accept-Encoding" => "gzip, deflate", 
                "User-Agent" => $request->server("HTTP_USER_AGENT")
            ]
        ]);

        return $response->getBody();
    }

    //curl -X POST -d asdf=blah  http://parsehub.valet/proxy?url=http://httpbin.org/post
    public function post(Request $request, $url) {
        $input = $request->all();

        $client = new Client();
        $response = $client->post($url, [
            "headers" => [
                "Accept" => "*/*", 
                "Accept-Encoding" => "gzip, deflate", 
                "User-Agent" => $request->server("HTTP_USER_AGENT"),
            ],
            "form_params" => $input
        ]);

        return $response->getBody();
    }
}
