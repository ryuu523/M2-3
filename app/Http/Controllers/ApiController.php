<?php

namespace App\Http\Controllers;

use App\Models\Dispatche;
use App\Models\Event;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function get_events(Request $request)
    {
        if (!isset($request->worker_id)) {
            return response()->json("faild", 404);
        }
        $request->validate([
            "worker_id" => "required|integer",
        ]);
        $dispatches = Dispatche::where("worker_id", $request->worker_id)->pluck("event_id");

        if ($dispatches->isEmpty()) {
            return response("error", 404);
        }

        $query = Event::query()->whereIn("id", $dispatches);

        if ($request->filled("data")) {
            $query->where("date", $request->date);
        }
        if ($request->filled("place")) {
            $query->where("place", $request->place);
        }
        if ($request->filled("title")) {
            $query->where("name", "like", "%" . $request->title . "%");
        }

        $events=$query->get();
        if ($events->isEmpty()) {
            return response("naiyo", 404);
        }

        return response()->json($events, 200);

    }
    public function request_approval(Request $request)
    {
        $request->validate([
            "event_id" => "required|integer",
            "worker_id" => "required|integer",
        ]);
        $dispatche = Dispatche::where("event_id", $request->event_id)->where("worker_id", $request->worker_id)->first();
        if (!$dispatche) {
            return response()->json("error",404);
        }
        $dispatche->update([
            "approval"=>true,
        ]);
        return response()->noContent();

    }
}
