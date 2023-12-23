<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\CloudflareFunction;

class DomainController extends Controller
{
    public function index()
    {
        return view('admin.domains');
    }
    public function indexAdd(){
        return view('admin.domain_add');
    }
    public function test(){
        $cloudflareFunction = new CloudflareFunction();
        $ns = $cloudflareFunction->add_domain_cloudflare("фывфпфы1в12фывфывфы.com");
        return view("test", ["ns" => $ns]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'domain' => 'required|unique:domains,domain',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $domain = new Domain();
        $domain->domain = $request->domain;
        $domain->save();
        return response()->json(['message' => 'Домен успешно добавлен'], 201);
    }
}
