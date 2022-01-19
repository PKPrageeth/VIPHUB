<?php

namespace App\Http\Controllers\Frontend\Hospitalization;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HospitalizationController extends Controller
{
    function basic_details(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'apply' => 'required',
            'Full_Name' => 'required',
            'email' => 'required',
            'Contact_Number' => 'required|max:10|min:10',
            'nic' => ['required',
                function ($attribute, $value, $fail) {
                    if( is_int( $value ) && strlen($value)==12 && preg_match('/^([0-9]{12})$/',$value)) {
                        return true;
                    } else if(strlen($value)==10 && preg_match('/^([0-9]{9}[vVxX]{1})$/',$value)){
                        return true;
                    }else{
                        $fail($attribute.' is invalid.');
                    }
                },
            ],
            'Permanent_Address' => 'required',
            'dob' => 'required',
            'plan' => 'required',
        ]);
        $client1 = new Client();
        $resp = $client1->request('POST', 'https://marketplace-test.paymediasolutions.com/api/createNationalHealthPolicyToThirdPartyCompanyCustomer', [
            'form_params' => [
                'token' => '753799f5eb9c413b957c2dca36897a91a47ca4916ac0400d60b9e40d9b351a4eee786de5e11a26421a0f258a657759118c0cb8fd3c2a39c4269a8bdf5c7dacbb',
                'merchant_id' => 'ceylinco123',
                'insured_is' => $request->apply,
                "customer_nic" => $request->nic,
                "date_of_birth" => $request->dob,
                "insurance_policy_id" => 'ceylinco-hospitalization-cover',
            ]
        ]);
        $responseCat = $resp->getBody();
        $responseCatArray = json_decode($responseCat, true);
        if($responseCatArray['data']['policyExists']){
            return back()->with('error','this policy already taken by you');
        }

        $data = [];
        $data['title'] = $request->title;
        $data['apply'] = $request->apply;
        $data['plan'] = $request->plan;
        $data['premium'] = $request->premium;
        $data['Guardian'] = $request->Guardian;
        $data['Relationship'] = $request->Relationship;
        $data['Full_Name'] = $request->Full_Name;
        $data['email'] = $request->email;
        $data['Contact_Number'] = $request->Contact_Number;
        $data['nic'] = $request->nic;
        $data['Permanent_Address'] = $request->Permanent_Address;
        $data['dob'] = $request->dob;

        session(['hospitl' => $data]);
        return redirect('/hospitalization/step2');
    }
    public function step1(Request $request)
    {
        if (session('hospitl')) {
            return view('Frontend.Apply.Hospitalization.step1');
        } else {
            return redirect('/basic_details/Hospitalization');
        }


    }
    function Finlstep(Request $request){
        $request->validate([

            'nicf' => 'required',
            'nicb' => 'required',
            'policy' => 'required',
        ]);

        $data = session('serious-illness');
//        dd($data);

        $file = $request->file('nicf');

        $name = time() . '_' . $file->getClientOriginalName();
        $path = base_path() . '/public/images/';
        $file->move(public_path('/images'), $name);
        $file1 = $request->file('nicb');

        $name1 = time() . '_' . $file1->getClientOriginalName();
        $path1 = base_path() . '/public/images/';
        $file1->move(public_path('/images'), $name1);

        $front =  Psr7\Utils::tryFopen( $path.$name,'r');
        $back  =  Psr7\Utils::tryFopen( $path1.$name1,'r');

        $client = new Client([
            'headers' => [ 'Content-Type' => 'multipart/form-data'],
            'verify' => false
        ]);



//dd($front);


        $client = new Client();
        $fileinfo = array(
            'name'          =>  $name,
            'clientNumber'  =>  "102425",
            'type'          =>  'file',
        );
        $response = $client->post("https://marketplace-test.paymediasolutions.com/api/createSeriousIllnessPolicyToThirdPartyCompanyCustomer", [
            'multipart' => [
                [
                    'name' => 'title',
                    'contents' => $data['title'],
                ],
                [
                    'name' => 'full_name',
                    'contents' =>  $data['Full_Name'],
                ],
                [
                    'name' => 'permenent_addr',
                    'contents' =>  $data['Permanent_Address'],
                ],[
                    'name' => 'date_of_birth',
                    'contents' => $data['dob'],
                ],
                [
                    'name' => 'customer_nic',
                    'contents' => $data['nic'],
                ],
                [
                    'name' => 'contact_no',
                    'contents' => $data['Contact_Number'],
                ],
                [
                    'name' => 'email',
                    'contents' => $data['email'],
                ],
                [
                    'name' => 'insured_is',
                    'contents' => $data['apply'],
                ],
                [
                    'name' => 'guardian_name',
                    'contents' => $data['Guardian'],
                ],
                [
                    'name' => 'relationship',
                    'contents' => $data['Relationship'],
                ],
                [
                    'name' => 'preferredPlan',
                    'contents' => $data['plan'],
                ],
                [
                    'name' => 'seriousIllness',
                    'contents' => ($request->seriousillness==1)?'Y':'N',
                ],
                [
                    'name' => 'diabetes_hypertension',
                    'contents' => ($request->seriousillness==1)?'Y':'N',
                ],[
                    'name' => 'surgeries',
                    'contents' => ($request->diabetes_hypertension==1)?'Y':'N',
                ],
                [
                    'name' => 'majorsurgeries',
                    'contents' => ($request->majorsurgeries==1)?'Y':'N',
                ],
                [
                    'name' => 'nature_of_illness',
                    'contents' => $request->nature_of_illness,
                ],
                [
                    'name' => 'typeofsurgerie',
                    'contents' => $request->typeofsurgerie,
                ],

                [
                    'name' => 'premium',
                    'contents' => $data['premium'],
                ],
                [
                    'name' => 'policyCertificate',
                    'contents' => $request->policy,
                ],  [
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
                    'name'     => 'nicFront',
                    'contents' =>  $front ,
                    'filename' => 'nicFront.jpg'
                ],
                [
                    'name'     => 'nicBack',
                    'contents' => $back,
                    'filename' => 'nicBack.jpg'
                ],
                [
                    'name' => 'return_url',
                    'contents' => url('/responseURL'),
                ]
            ]
        ]);
        if (file_exists($path.$name)) {

            @unlink($path.$name);
            @unlink($path1.$name1);

        }
        $content = $response->getBody();
        $array = json_decode($content, true);

        return Redirect::to($array['paymentLink']);





    }
}
