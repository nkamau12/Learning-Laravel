<?php namespace App\Http\Controllers;

class WelcomeController extends Controller{

    public function  __construct()
    {
        $this->middleware('guest');
    }

    public function contact(){
        return view('pages.contact');
    }
}
/**
 * Created by PhpStorm.
 * User: ngumba
 * Date: 09/11/15
 * Time: 2:00 PM
 */