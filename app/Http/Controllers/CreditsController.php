<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\SEO;

class CreditsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) {

        SEO::title('Credits');

        return view('credits');

    }
}
