<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Template;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    //

    public function index()
    {
        $templates = Template::where("user_id", Auth::user()->id)->get()->toArray();
        return view('admin.templates', ["templates" => $templates]);
    }
    public function timeElapsedString($date) {
        $carbonDate = Carbon::parse($date);
        $now = Carbon::now();
        $diff = $now->diffForHumans($carbonDate);

        return $diff;
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'text' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $template = new Template();
        $template->user_id = Auth::user()->id;
        $template->title = $request->title;
        $template->text = $request->text;
        $template->save();

        return response()->json(['success' => "Template created successfully"], 200);
    }
    public function get($id)
    {

        $template = Template::where("id", $id)->first();
        if(!$template){
            return response()->json(['errors' => ["template" => ["Template not found"]]], 401);
        }


        return response()->json(['template' => $template], 200);
    }
    public function delete($id)
    {
        $template = Template::where("id", $id)->where("user_id", Auth::user()->id)->first();
        $template->delete();



        return back();
    }
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'text' => 'required',
            'id' => 'required|exists:templates,id',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $template = Template::where("id", $request->id)->where("user_id", Auth::user()->id)->first();
        $template->title = $request->title;
        $template->text = $request->text;
        $template->save();

        return response()->json(['success' => "Template created successfully"], 200);
    }
}
