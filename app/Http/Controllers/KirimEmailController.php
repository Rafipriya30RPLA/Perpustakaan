<?php

namespace App\Http\Controllers;

use App\Mail\KirimEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KirimEmailController extends Controller
{
    public function index(){
        Mail::to("priyanugraha1306@gmail.com")->send(new KirimEmail());
        return '<h1>Sukses Mengirimkan Email</h1>';
    }
}
