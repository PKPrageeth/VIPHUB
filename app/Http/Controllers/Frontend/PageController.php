<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{

    function indexPage()
    {
        $token = env("TOKEN");
        $cat_url = env("CEYLINCO_CATEGORY");
        $pro_url = env("PRODUCT_LIST");
        $merchant_id= env("MERCHANT_ID");

        $client = new Client();

        $res = $client->request('POST',  $cat_url, [
            'form_params' => [
                'token' => $token,
                'merchant_id' => $merchant_id,
                'insuranceCompanyId' => '2',
            ]
        ]);

        $response = $res->getBody();
        $responseArray = json_decode($response, true);
        $menu = null;
        $all = [];
        if ($responseArray['response_code'] == "0x9000" && $responseArray['success'] == true) {
            $menu = $responseArray['insuranceCategories'];
            foreach ($menu as $item) {
                $client1 = new Client();
                $resp = $client1->request('POST', $pro_url, [
                    'form_params' => [
                        'token' => $token,
                        'merchant_id' =>  $merchant_id,
                        'insuranceCompanyId' => '2',
                        "insuranceCategory" => $item['insuranceCategory']
                    ]
                ]);
                $responseCat = $resp->getBody();
                $responseCatArray = json_decode($responseCat, true);
                $rr = $responseCatArray['insuranceList'];
                $all = array_merge($all, $rr[0]['policyPlanDetails']);

            }


        } else {

            echo 'wrong';
        }

        return view('Frontend.index')->with('category', $menu)->with('all', $all)->with('active', 'all');

    }

    public function categoryLoad($Cat)
    {

        $token = env("TOKEN");
        $cat_url = env("CEYLINCO_CATEGORY");
        $pro_url = env("PRODUCT_LIST");
        $merchant_id= env("MERCHANT_ID");



        $client = new Client();

        $res = $client->request('POST', $cat_url, [
            'form_params' => [
                'token' => $token,
                'merchant_id' =>  $merchant_id,
                'insuranceCompanyId' => '2',
            ]
        ]);

        $response = $res->getBody();
        $responseArray = json_decode($response, true);
        $menu = null;
        if ($responseArray['response_code'] == "0x9000" && $responseArray['success'] == true) {
            $menu = $responseArray['insuranceCategories'];
        }


        $client1 = new Client();
        $resp = $client1->request('POST', $pro_url, [
            'form_params' => [
                'token' => $token,
                'merchant_id' => $merchant_id,
                'insuranceCompanyId' => '2',
                "insuranceCategory" => $Cat
            ]
        ]);
        $responseCat = $resp->getBody();
        $responseCatArray = json_decode($responseCat, true);
        $rr = $responseCatArray['insuranceList'];
        $all = $rr[0]['policyPlanDetails'];
        return view('Frontend.index')->with('category', $menu)->with('all', $all)->with('active', $Cat);
    }

    public function basic_details($product,$plan,$premium)
    {

        if ($product == "ceylinco-gedara") {
            return view('Frontend.Apply.Property.basic_details')->with('premium',$premium);

        } else if ($product == "ceylinco-third-party") {
            return view('Frontend.Apply.3rdparty.basic_details')->with('premium',$premium)->with('plan',$plan);
        } else if ($product == "ceylinco-serious-illness") {
            return view('Frontend.Apply.SeriousIlness.basic_details')->with('plan',$plan)->with('premium',$premium);
        } else if ($product == "ceylinco-hospitalization-cover") {
            return view('Frontend.Apply.Hospitalization.basic_details')->with('plan',$plan)->with('premium',$premium);
        } else if ($product == "ceylinco-serious-illness-visa-card-holders") {
            return view('Frontend.Apply.Visa.SeriousIlness.basic_details')->with('plan',$plan)->with('premium',$premium);
        }


        return view('Frontend.Apply.basic_detailsss');
    }



    function success()
    {
        return view('Frontend.Apply.ResponseNotifications.success');

    }
    function fail()
    {
        return view('Frontend.Apply.ResponseNotifications.fial');

    }
    function responseURL(Request $request){

        $paymentStatus = $request->query("status");

        if($paymentStatus =='FAILED'){
            return view('Frontend.Apply.ResponseNotifications.fail')->with([
                'paymentStatus' => $paymentStatus,
            ]);
        }
        else {
            return view('Frontend.Apply.ResponseNotifications.success')->with([
                'paymentStatus' => $paymentStatus,
            ]);
        }
    }

}
