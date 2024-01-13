<?php

namespace App\Http\Controllers;

use App\Classes\CourseFunction;
use App\Classes\PaymentFunction;
use App\Models\Coin;
use App\Models\Domain;
use Illuminate\Http\Request;
use App\Classes\CloudflareFunction;
use Illuminate\Support\Facades\Validator;


class DomainController extends Controller
{
    public function index()
    {
        $domains = Domain::where('user_id', auth()->user()->id)->get();
        return view('admin.domains', ['domains' => $domains]);
    }
    public function indexAdd(){

        return view('admin.domain_add');
    }
    public function test(){
        $CourseFunction = new CourseFunction();
        $coins = Coin::all();
        $data = [];
        foreach ($coins as $coin){
            try{

            $data[] = [$coin["full_name"] => $CourseFunction->getCoinPrice($coin["full_name"])];
            }
            catch (\Exception $e){
                $data[] = [$coin["full_name"] => ""];
            }
        }

        return json_encode($data);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'domain' => 'required|unique:domains,domain',
            'stmp_host' => 'required',
            'stmp_email' => 'required',
            'stmp_password' => 'required',
            'title' => 'required',
//            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
//        $image = $request->file('logo');
//        $imageName = time() . '.' . $image->extension();
//        $image->move(public_path('images/users/logos'), $imageName);
//        $relativePath = 'images/users/logos/' . $imageName;


        $cloudflareFunction = new CloudflareFunction();
        $data = $cloudflareFunction->add_domain_cloudflare($request->domain);
        $zone_id = $data["zone_id"];
        $ns_list = $data["ns_list"];

        $domain = new Domain();
        $domain->domain = $request->domain;
        $domain->stmp_host = $request->stmp_host;
        $domain->stmp_email = $request->stmp_email;
        $domain->stmp_password = $request->stmp_password;
        $domain->ns = json_encode($ns_list);
        $domain->title = $request->title;
//        $domain->logo = $relativePath;
        $domain->user_id = $request->user()->id;
        $domain->zone_id = $zone_id;

        if(!$domain->save()){
            return response()->json(['message' => 'Ошибка при добавлении домена. Возможно этот домен уже привязан к Cloudflare'], 401);
        }
        return response()->json(['message' => 'Домен успешно добавлен. Теперь привяжите NS-записи к домену', 'ns_list'=>$ns_list], 201);
    }

    public function updateStatusCloudflare($id){
        $cloudflareFunction = new CloudflareFunction();
        $domain = Domain::where('id', $id)->first();
        $zone_id = $domain->zone_id;
        $status = $cloudflareFunction->check_domain_status_cloudflare($zone_id);
        $domain->status = $status;
        $domain->save();
        return response()->json(['status' => $status], 201);

    }

    public function delete($id){
        $domain = Domain::where('id', $id)->first();
        $CloudflareFunction = new CloudflareFunction();
        $CloudflareFunction->delete_domain_cloudflare($domain['domain']);
        $domain->delete();
        return response()->json(['message' => 'Домен успешно удален'], 201);
    }
}
