<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FAQController extends Controller
{
    public function index()
    {
        return Faq::all();
    }
}
