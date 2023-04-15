<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ActivityRequest;

class ActivityController extends Controller
{
    public function index(){
        $activities = Activity::where('created_by', Auth::user()->id)->get();
        return view('user.activity.index', compact('activities'));
    }

    public function create(){
        return view('user.activity.create');
    }

    public function store(ActivityRequest $request)
    {
        $data = $request->validated();

        $Activity = new Activity;
        $data['created_by'] = Auth::user()->id;

        $Activity->create($data);

        return redirect('/activity')->with('message', "Activity created successfully");
    }

    public function edit($id){
        $activity = Activity::findOrFail($id);
        return view('user.activity.edit', compact('activity'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $Activity = Activity::findOrFail($id);
        $Activity->update($data);

        return redirect('/activity')->with('message', "Activity updated successfully");
    }
}
