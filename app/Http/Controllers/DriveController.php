<?php

namespace App\Http\Controllers;

use App\Drive;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId = auth()->user()->id;
        $drives = Drive::where('userid', '=', $userId)->get();
        return view('drives.index')->with('drives', $drives);
    }

    public function create()
    {
        return view('drives.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role = 1) {

            //validation
            $request->validate([
                "title" => "required|min:3|max:20",
                "inputfile" => "required|file|max:64000|mimes:png,jpg,pdf",
                "description" => "required|min:5|max:50"
            ]);
            $drive = new Drive();
            $drive->title = $request->title;
            $drive->description = $request->description;
            $drive->userid = auth()->user()->id;
            //file code
            $file_data = $request->file('inputfile');
            $file_name = $file_data->getClientOriginalName();
            $file_data->move(public_path() . '/uploads/', $file_name);
            //database insertion
            $drive->file = $file_name;
            $drive->save();
            return redirect('drives')->with('done', "Uploaded Successfuly");
        }
    }

    public function show($id)
    {
        $drive = Drive::find($id);
        return view('drives.show')->with('drive', $drive);
    }

    public function edit($id)
    {
        $drive = Drive::find($id);
        return view('drives.edit')->with('drive', $drive);
    }

    public function update(Request $request, $id)
    {
        //validation
        $request->validate([
            "title" => "required|min:3|max:20",
            "description" => "required|min:5|max:50",
            "inputfile" => "required|file|max:64000|mimes:png,jpg,pdf"
        ]);
        $drive = Drive::find($id);
        $drive->title = $request->title;
        $drive->description = $request->description;
        //file code
        $file_data = $request->file('inputfile');
        $file_name = $file_data->getClientOriginalName();
        $file_data->move(public_path() . '/uploads/', $file_name);
        //database insertion
        $drive->file = $file_name;
        $drive->save();
        return redirect('drives')->with('done', "Updated Successfuly");
    }

    public function destroy($id)
    {
        $drive = Drive::find($id);
        $drive->delete();
        return redirect('drives')->with('done', "Deleted Successfuly");
    }

    public function download($id)
    {
        $drive = Drive::where('id', "=", $id)->firstOrFail();
        $drive_path = public_path('uploads/' . $drive->file);
        return response()->download($drive_path);
    }
}
