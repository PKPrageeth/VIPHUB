<?php

namespace App\Http\Controllers\Frontend\SeriousIlness;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SeriousIlnessController extends Controller
{
    function basic_details(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'apply' => 'required',
            'Full_Name' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z][a-zA-Z ]{1,127}$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
            'email' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
            'Contact_Number' => [
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[0-9]{10}$/', $value)) {
                        return true;
                    }else{
                        $fail($attribute . ' is invalid.');
                    }
                },'required', 'max:10', 'min:10',


            ],
            'nic' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^([0-9]{12})$/', $value)) {
                        return true;
                    } else if (strlen($value) == 10 && preg_match('/^([0-9]{9}[vVxX]{1})$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
            'Permanent_Address' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z0-9][a-zA-Z0-9 ]+$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
            'dob' => 'required',
            'plan' => 'required',
        ]);
        $token = env("TOKEN");
        $url = env("CEYLINCO_NIC_VALIDATE");
        $merchant_id= env("MERCHANT_ID");

        $client1 = new Client();
        $resp = $client1->request('POST', $url, [
            'form_params' => [
                'token' => $token,
                'merchant_id' =>  $merchant_id,
                'insured_is' => $request->apply,
                "customer_nic" => $request->nic,
                "date_of_birth" => $request->dob,
                "insurance_policy_id" => 'ceylinco-serious-illness',
            ]
        ]);
        $responseCat = $resp->getBody();
        $responseCatArray = json_decode($responseCat, true);
        if ($responseCatArray['data']['policyExists']) {
            return back()->with('error', 'this policy already taken by you');
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

        session(['serious-illness' => $data]);
        return redirect('/serious-illness/step2');
    }

    public function step1(Request $request)
    {
        if (session('serious-illness')) {
            return view('Frontend.Apply.SeriousIlness.step1');
        } else {
            return redirect('/basic_details/ceylinco-serious-illness');
        }


    }

    function Finlstep(Request $request)
    {
        $request->validate([

            'nicf' => 'required',
            'nicb' => 'required',
            'policy' => 'required',
            'nature_of_illness' => ['required_with:seriousillness'],
            'typeofsurgerie' => ['required_with:majorsurgeries'],
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

        $front = Psr7\Utils::tryFopen($path . $name, 'r');
        $back = Psr7\Utils::tryFopen($path1 . $name1, 'r');

        $client = new Client([
            'headers' => ['Content-Type' => 'multipart/form-data'],
            'verify' => false
        ]);


//dd($front);
        $token = env("TOKEN");
        $url = env("CEYLINCO_SERIOUS_ILLNESS_URL");
        $merchant_id= env("MERCHANT_ID");

        $client = new Client();
        $fileinfo = array(
            'name' => $name,
            'clientNumber' => "102425",
            'type' => 'file',
        );
        $response = $client->post($url , [
            'multipart' => [
                [
                    'name' => 'title',
                    'contents' => $data['title'],
                ],
                [
                    'name' => 'full_name',
                    'contents' => $data['Full_Name'],
                ],
                [
                    'name' => 'permenent_addr',
                    'contents' => $data['Permanent_Address'],
                ], [
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
                    'contents' => ($request->seriousillness == 1) ? 'Y' : 'N',
                ],
                [
                    'name' => 'diabetes_hypertension',
                    'contents' => ($request->seriousillness == 1) ? 'Y' : 'N',
                ], [
                    'name' => 'surgeries',
                    'contents' => ($request->diabetes_hypertension == 1) ? 'Y' : 'N',
                ],
                [
                    'name' => 'majorsurgeries',
                    'contents' => ($request->majorsurgeries == 1) ? 'Y' : 'N',
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
                ], [
                    'name' => 'merchant_id',
                    'contents' =>  $merchant_id,
                ], [
                    'name' => 'token',
                    'contents' => $token,
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
                ],
                [
                    'name' => 'return_url',
                    'contents' => url('/responseURL'),
                ]
            ]
        ]);
        if (file_exists($path . $name)) {

            @unlink($path . $name);
            @unlink($path1 . $name1);

        }
        $content = $response->getBody();
        $array = json_decode($content, true);
        if ($array['success']) {
            return Redirect::to($array['paymentLink']);
        } else {
            return back()->withInput($request->input())->with('error', $array['message']);
        }


    }
}
