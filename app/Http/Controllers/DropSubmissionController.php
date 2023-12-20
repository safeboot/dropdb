<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class DropSubmissionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) {

        $request->validate([

            'url'       =>  'required|url',
            'timestamp' =>  'required',

        ]);

        Submission::create($request->only(['url', 'timestamp']));

        Toast::autoDismiss(3)->success('Submission received!');

        return redirect()->back();

    }
}
