<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Borrowed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function history()
    {
        $user_id = Auth::id();
        
        $history = Borrowed::where('user_id', $user_id)
        ->with('book')
        ->orderByDesc('created_at')
        ->get();

        return view('user.section.history', compact('history'));
    }
}
