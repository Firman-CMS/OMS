<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Models\Product_model;
use App\Models\User_model;
use App\Models\Slider_model;
use Illuminate\Support\Facades\Input;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use Validator,
    Helper,
    Redirect,
    Hash,
    Crypt,
    Mail,
    Auth,
    Session;

class myView extends Controller {

    //function to show home page
    public function home() {
        
        return \Redirect::to(route('login.oms.form'));
    }

}
