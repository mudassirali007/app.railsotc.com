<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Magic;

class MagicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
   
    public function orders(Request $request)
    {
        $did_token = $request->didt ? $request->didt : $request->magic_credential; 
    
        Magic::token()->validate($did_token);
        $user_meta = Magic::user()->get_metadata_by_token($did_token);
      
        return view('order', ['data' => $user_meta->data, 'didt' => $did_token  ]);
    }

    public function logout(Request $request)
    {
        $did_token = $request->didt ? $request->didt : $request->magic_credential; 
       
        Magic::token()->validate($did_token);
       
        $user_meta = Magic::user()->logout_by_token($did_token);
      
        return redirect('/');
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
