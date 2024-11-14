<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Worker::all();
        return view("workers.index", compact("workers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("workers.register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:workers,email",
            "password" => "required|string",
        ]);

        Worker::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "memo" => $request->memo ? $request->memo : "",
        ]);
        return redirect()->route("worker.index")->with("res", "人材情報が登録されました。");

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
    public function edit(Worker $worker)
    {
        return view("workers.edit", compact("worker"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:workers,email,".$worker->id,
            "password" => "required|string",
        ]);

        $worker->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "memo" => $request->memo,
        ]);
        return redirect()->route("worker.index")->with("res", "更新成功");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();
        return redirect()->route("worker.index")->with("res","削除成功");

    }
}
