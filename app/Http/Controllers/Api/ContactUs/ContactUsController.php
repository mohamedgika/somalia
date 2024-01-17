<?php

namespace App\Http\Controllers\Api\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        $contactus = Contactus::get();
        return response()->json($contactus);
    }
}
