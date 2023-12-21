<?php

namespace App\Http\Controllers;

use App\Models\Drop;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\SEO;

class DropController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Drop $drop) {

        SEO::title('Drop: ' . $drop->title);

        return view('drop', compact('drop'));

    }
}
