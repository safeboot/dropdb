<?php

namespace App\Http\Controllers;

use App\Models\Drop;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) {

        $dropOfTheWeek = Drop::dropOfTheWeek();

        $drops = Drop::query();

        if ($request->has('search') && $request->get('search') != null) {

            $search = $request->get('search');

            $drops = $drops->where('title', 'LIKE', '%' . $search . '%');

        }

        if ($request->has('channels') && $request->get('channels') != null) {

            $channels = $request->get('channels');

            $drops = $drops->whereIn('channel_id', $channels);

        }

        if ($request->has('hosts') && $request->get('hosts') != null) {

            $hosts = $request->get('hosts');

            $drops = $drops->whereHas('people', function ($query) use ($hosts) {

                $query->whereIn('id', $hosts)->where('is_dropper', true);

            });

        }

        if ($request->has('date') && $request->get('date') !== null) {

            $date = $request->get('date');

            $date = Str::contains($date, 'to') ? explode(' to ', $date) : $date;

            if (Str::contains($request->get('date'), 'to')) {

                $drops = $drops->whereBetween('created_at', $date);

            } else {

                $drops = $drops->whereDate('created_at', $date);

            }

        }

        $drops = $drops->orderBy('created_at', 'desc')->paginate(50);

        return view('home', compact(['dropOfTheWeek', 'drops']));

    }
}
