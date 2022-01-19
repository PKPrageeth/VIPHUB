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
        $menu = null;
        $all = [];
        if ($responseArray['response_code'] == "0x9000" && $responseArray['success'] == true) {
            $menu = $responseArray['insuranceCategories'];
            foreach ($menu as $item) {
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
        $menu = null;
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
        $rr = $responseCatArray['insuranceList'];
        $all = $rr[0]['policyPlanDetails'];
        return view('Frontend.index')->with('category', $menu)->with('all', $all)->with('active', $Cat);
    }

    public function basic_details($product,$plan)
    {

        if ($product == "ceylinco-gedara") {
            return view('Frontend.Apply.Property.basic_details');

        } else if ($product == "ceylinco-third-party") {
            return view('Frontend.Apply.3rdparty.basic_details');
        } else if ($product == "ceylinco-serious-illness") {
            return view('Frontend.Apply.SeriousIlness.basic_details')->with('plan',$plan);
        } else if ($product == "ceylinco-hospitalization-cover") {
            return view('Frontend.Apply.Hospitalization.basic_details')->with('plan',$plan);
        } else if ($product == "ceylinco-serious-illness-visa-card-holders") {
        }


        return view('Frontend.Apply.basic_detailsss');
    }


    public function step3(Request $request)
    {
        $file = $request->file('nicf');

        $name = time() . '_' . $file->getClientOriginalName();
        $path = base_path() . '/public/images/';
        $file->move(public_path('/images'), $name);

        $front = Psr7\Utils::tryFopen($path . $name, 'r');
        $back = Psr7\Utils::tryFopen($path . $name, 'r');

        $client = new Client([
            'headers' => ['Content-Type' => 'multipart/form-data'],
            'verify' => false
        ]);


//dd($front);


        $client = new Client();
        $fileinfo = array(
            'name' => $name,
            'clientNumber' => "102425",
            'type' => 'file',
        );
        $response = $client->post("https://marketplace-test.paymediasolutions.com/api/createGedaraPolicyToThirdPartyCompanyCustomer", [
            'multipart' => [
                [
                    'name' => 'title',
                    'contents' => "Mrs",
                ],
                [
                    'name' => 'full_name',
                    'contents' => "Prageeth Sanjeewa",
                ],
                [
                    'name' => 'permenent_addr',
                    'contents' => "Kalutara",
                ], [
                    'name' => 'date_of_birth',
                    'contents' => "1991/11/30",
                ],
                [
                    'name' => 'customer_nic',
                    'contents' => "913353471V",
                ],
                [
                    'name' => 'email',
                    'contents' => "pitigalaksanjeewa@gmail.com",
                ],
                [
                    'name' => 'mortgagee_name',
                    'contents' => "none",
                ],
                [
                    'name' => 'contact_no',
                    'contents' => "0772834591",
                ],
                [
                    'name' => 'walls',
                    'contents' => "Bricks",
                ],
                [
                    'name' => 'roof',
                    'contents' => "asdasd",
                ],
                [
                    'name' => 'ceiling',
                    'contents' => "asdas",
                ],
                [
                    'name' => 'litby',
                    'contents' => "asdasd",
                ],
                [
                    'name' => 'itemList',
                    'contents' => "asdsad",
                ],
                [
                    'name' => 'seriousIllness',
                    'contents' => "N",
                ],
                [
                    'name' => 'diabetes_hypertension',
                    'contents' => "N",
                ], [
                    'name' => 'surgeries',
                    'contents' => "N",
                ],
                [
                    'name' => 'majorsurgeries',
                    'contents' => "N",
                ],
                [
                    'name' => 'nature_of_illness',
                    'contents' => "N",
                ],
                [
                    'name' => 'typeofsurgerie',
                    'contents' => "N",
                ],
                [
                    'name' => 'nocosscentecode',
                    'contents' => "N",
                ],
                [
                    'name' => 'nocosscentecodebranch',
                    'contents' => "N",
                ],
                [
                    'name' => 'documenttype',
                    'contents' => "N",
                ],
                [
                    'name' => 'productcode',
                    'contents' => 'GD',
                ],
                [
                    'name' => 'premium',
                    'contents' => '5000',
                ],
                [
                    'name' => 'policyCertificate',
                    'contents' => 'Both',
                ], [
                    'name' => 'merchant_id',
                    'contents' => 'ceylinco123',
                ], [
                    'name' => 'token',
                    'contents' => '753799f5eb9c413b957c2dca36897a91a47ca4916ac0400d60b9e40d9b351a4eee786de5e11a26421a0f258a657759118c0cb8fd3c2a39c4269a8bdf5c7dacbb',
                ], [
                    'name' => 'payment_done',
                    'contents' => 'No',
                ], [
                    'name' => 'need_payment_link',
                    'contents' => 'Yes',
                ],
                [
                    'name' => 'nicFront',
                    'contents' => $front,
                    'filename' => 'nicFront.jpg'
                ],
                [
                    'name' => 'nicBack',
                    'contents' => $back,
                    'filename' => 'nicBack.jpg'
                ]
            ]
        ]);
        if (file_exists($path . $name)) {

            @unlink($path . $name);

        }
        $content = $response->getBody();
        $array = json_decode($content, true);

        return Redirect::to($array['paymentLink']);


        return view('Frontend.Apply.Property.step3');
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
