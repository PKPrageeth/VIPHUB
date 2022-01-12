<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use http\Client\Request;

class PageController extends Controller
{

    function indexPage()
    {

        $client = new Client();

        $res = $client->request('POST', 'https://marketplace-test.paymediasolutions.com/api/getInsuranceCategoryListOfCompanyForThirdParty', [
            'form_params' => [
                'token' => '753799f5eb9c413b957c2dca36897a91a47ca4916ac0400d60b9e40d9b351a4eee786de5e11a26421a0f258a657759118c0cb8fd3c2a39c4269a8bdf5c7dacbb',
                'merchant_id' => 'ceylinco123',
                'insuranceCompanyId' => '2',
            ]
        ]);

        $response = $res->getBody();
        $responseArray = json_decode($response, true);
        $menu=null;
        $all=[];
        if ($responseArray['response_code'] == "0x9000" && $responseArray['success'] == true) {
            $menu=$responseArray['insuranceCategories'];
            foreach ($menu as $item)
            {
                $client1 = new Client();
                $resp = $client1->request('POST', 'https://marketplace-test.paymediasolutions.com/api/getActiveInsuranceListOfCompanyForThirdParty', [
                    'form_params' => [
                        'token' => '753799f5eb9c413b957c2dca36897a91a47ca4916ac0400d60b9e40d9b351a4eee786de5e11a26421a0f258a657759118c0cb8fd3c2a39c4269a8bdf5c7dacbb',
                        'merchant_id' => 'ceylinco123',
                        'insuranceCompanyId' => '2',
                        "insuranceCategory" => $item['insuranceCategory']
                    ]
                ]);
                $responseCat = $resp->getBody();
                $responseCatArray = json_decode($responseCat, true);
                $rr=$responseCatArray['insuranceList'];
                $all=  array_merge($all,$rr[0]['policyPlanDetails']);

            }





        } else {

            echo 'wrong';
        }

        return view('Frontend.index')->with('category',$menu)->with('all',$all)->with('active','all');

    }

    public function categoryLoad($Cat){
        $client = new Client();

        $res = $client->request('POST', 'https://marketplace-test.paymediasolutions.com/api/getInsuranceCategoryListOfCompanyForThirdParty', [
            'form_params' => [
                'token' => '753799f5eb9c413b957c2dca36897a91a47ca4916ac0400d60b9e40d9b351a4eee786de5e11a26421a0f258a657759118c0cb8fd3c2a39c4269a8bdf5c7dacbb',
                'merchant_id' => 'ceylinco123',
                'insuranceCompanyId' => '2',
            ]
        ]);

        $response = $res->getBody();
        $responseArray = json_decode($response, true);
        $menu=null;
        if ($responseArray['response_code'] == "0x9000" && $responseArray['success'] == true) {
            $menu = $responseArray['insuranceCategories'];
        }


        $client1 = new Client();
        $resp = $client1->request('POST', 'https://marketplace-test.paymediasolutions.com/api/getActiveInsuranceListOfCompanyForThirdParty', [
            'form_params' => [
                'token' => '753799f5eb9c413b957c2dca36897a91a47ca4916ac0400d60b9e40d9b351a4eee786de5e11a26421a0f258a657759118c0cb8fd3c2a39c4269a8bdf5c7dacbb',
                'merchant_id' => 'ceylinco123',
                'insuranceCompanyId' => '2',
                "insuranceCategory" => $Cat
            ]
        ]);
        $responseCat = $resp->getBody();
        $responseCatArray = json_decode($responseCat, true);
        $rr=$responseCatArray['insuranceList'];
        $all=  $rr[0]['policyPlanDetails'];
        return view('Frontend.index')->with('category',$menu)->with('all',$all)->with('active',$Cat);
    }

    public function basic_details()
    {
      return view('Frontend.Apply.basic_details');
    }

}
