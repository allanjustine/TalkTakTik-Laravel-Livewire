<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
class SiteController extends Controller
{

    public function logs() {
            $logs = Log::orderby('id', 'desc')->paginate(13);
            return view('logs', compact('logs'));
    }
}
