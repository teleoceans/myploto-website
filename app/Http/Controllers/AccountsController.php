<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Book;
use App\Models\Pet;

class AccountsController extends Controller
{
    public function myAccount()
    {
        $user = Auth::user();
        $books = Book::where('user_id', $user->id)->get();
        $pets = Pet::where('user_id', $user->id)->get();
        return view('my-account')->withBooks($books)->withPets($pets);
    }
}
