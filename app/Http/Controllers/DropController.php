<?php

namespace App\Http\Controllers;

use App\Models\Drop;
use Illuminate\Http\Request;

class DropController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Drop $drop) {

        return view('drop', compact('drop'));

    }
}
