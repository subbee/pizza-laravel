<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // ✨ EZ HIÁNYZOTT!
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Csak bejelentkezett felhasználók láthatják
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Üzenetek listázása
    public function index()
    {
        $messages = Contact::where('email', Auth::user()->email)->orderBy('created_at', 'desc')->get(); //Mindenki csak a saját üzenetét látja
        return view('messages.index', compact('messages'));
    }
}
