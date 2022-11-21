<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Magic;

class WyreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public $wyreApiURL;
    public $url;
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
        $this->url = config('app.url');
        $this->wyreAccount = env('WYRE_ACCOUNT', 'XXX');
        $this->wyreApiURL = env('WYRE_API_URL', 'https://api.testwyre.com');
        $this->secret = env('WYRE_SECRETKEY','XXX');
    }
    public function index()
    {
        return view('home');
    }
   
    public function order(Request $request)
    {
        $did_token = $request->didt ? $request->didt : $request->magic_credential; 
        $response = $this->client->request('POST', "$this->wyreApiURL/v3/orders/reserve", [
            'body' => '{"hideTrackBtn":true,"autoRedirect":true,"redirectUrl":"' . $this->url . '/nice?didt=' . $did_token . '","failureRedirectUrl":"' . $this->url . '/fail?didt=' . $did_token . '","referrerAccountId":"' . $this->wyreAccount . '","referenceId":"did:ethr:0x0A37B84F7314e7393b42F3Ad73bbc2B08bA49862"}',
            'headers' => [
                'accept' => 'application/json',
                'authorization' => "Bearer $this->secret",
                'content-type' => 'application/json',
            ],
        ]);
        $jsonResponse = json_decode($response->getBody());
        $statuscode = $response->getStatusCode();
        if (200 === $statuscode && isset($jsonResponse->url)) {
            return redirect($jsonResponse->url);
        }
        else {
            return redirect()->route('orders',  ['didt' => $did_token]);
        }
       
    }

    public function nice(Request $request)
    {
        $did_token = $request->didt ? $request->didt : $request->magic_credential;    
        return redirect()->route('fail',  ['didt' => $did_token]);
    }
  

    public function fail(Request $request)
    {
        $did_token = $request->didt ? $request->didt : $request->magic_credential; 
        return view('fail', ['didt' => $did_token  ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
