<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Chat;
use App\Models\User;

class AdminChatController extends Controller
{
    public function index()
    {
        // Fetch chats
        $chats = Chat::orderBy('created_at', 'asc')->get();
        return view('chat.index', compact('chats'));
    }

}
