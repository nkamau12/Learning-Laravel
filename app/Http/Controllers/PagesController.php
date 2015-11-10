<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //
    public function about(){
        $name = '<span style="color:#00fcff;">Ngumba Kamau</span>';
        $data=[];
        $data['cool']='Ngumba';
        $data['Guy'] = 'Kamau';
        $cool ='tahm';
        $Guy ='Kench';
        $people=[
            'tahm',
            'Jinx',
            'Caitlin'
        ];
        return view('pages.about',compact('cool','Guy','people'))->with([
            'first'=> 'Ngumba',
            'last'=>'Kamau',
            'name'=>$name
        ]);
    }
    public function contact(){
        return view('pages.contact');
    }
}
