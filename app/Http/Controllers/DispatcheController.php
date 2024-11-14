<?php

namespace App\Http\Controllers;

use App\Models\Dispatche;
use App\Models\Worker;
use App\Models\Event;
use Illuminate\Http\Request;

class DispatcheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dispatches = Dispatche::with("event", "worker")->get();
        return view("dispatches.index", compact("dispatches"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $events = Event::all();
        $workers = Worker::all();
        return view("dispatches.register", compact("events", "workers"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "event" => "required",
            "workers" => "required",
        ]);
        foreach ($request->workers as $worker) {
            // 既に同じevent_idとworker_idの組み合わせが存在するかを確認
            $exists = Dispatche::where('event_id', $request->event)->where('worker_id', $worker)->exists();
            if (!$exists) {
                // 存在しない場合のみ登録
                Dispatche::create([
                    "event_id" => $request->event,
                    "worker_id" => $worker,
                    "approval" => false,
                    "memo" => $request->memo ? $request->memo : ""
                ]);
            }
        }
        return redirect(route('dispatche.index'))->with("res", "派遣情報が登録されました");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dispatche $dispatche)
    {
        $events = Event::all();
        $workers = Worker::all();
        return view("dispatches.edit", compact("dispatche", "events", "workers"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dispatche $dispatche)
    {

        $request->validate([
            "event" => "required",
            "worker" => "required",
        ]);
        // 既に同じevent_idとworker_idの組み合わせが存在するかを確認
        $exists = Dispatche::where('event_id', $request->event)->where('worker_id', $request->worker)->exists();
        if (!$exists) {
            // 存在しない場合のみ更新
            $dispatche->update([
                "event_id" => $request->event,
                "worker_id" => $request->worker,
                "approval" => false,
                "memo" => $request->memo ? $request->memo : ""
            ]);
            return redirect(route('dispatche.index'))->with("res", "派遣情報が更新されました");

        } else {
            return redirect(route('dispatche.index'))->with("res", "すでにある組み合わせです");

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dispatche $dispatche)
    {
        $dispatche->delete();
        return redirect(route('dispatche.index'))->with("res", "削除しました");
    }
}