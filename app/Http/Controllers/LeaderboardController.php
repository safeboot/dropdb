<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Drop;
use App\Models\Person;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) {

        switch ($request->get('sorting')) {

            case 'host':
                $scores = Person::all()->sortByDesc(function ($host) {
                    return $host->drops->where('is_dropper', true)->count();
                });
                break;

            default:
                $scores = Channel::all()->sortByDesc(function ($channel) {
                    return $channel->drops->count();
                });

        }

        return view('leaderboard', compact('scores'));

    }
}
