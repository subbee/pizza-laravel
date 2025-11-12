<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // ✨ EZ HIÁNYZOTT!
use Illuminate\Http\Request;
use App\Models\Contact;

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
        $messages = Contact::orderBy('created_at', 'desc')->get();
        return view('messages.index', compact('messages'));
    }
}
