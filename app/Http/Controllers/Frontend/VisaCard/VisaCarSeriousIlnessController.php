<?php

namespace App\Http\Controllers\Frontend\VisaCard;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VisaCarSeriousIlnessController extends Controller
{

    function basic_details(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'apply' => 'required',
            'Full_Name' => 'required',
            'email' => 'required',
            'Beneficiary_Email' => ['required_if:apply,Child,Spouse,Parent',
                function ($attribute, $value, $fail) {
                    if ($value=='' ||  preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
            'beneficiary_name' => ['required_if:apply,Child,Spouse,Parent',
                function ($attribute, $value, $fail) {
                    if ($value=='' || preg_match('/^[a-zA-Z][a-zA-Z ]{1,127}$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
            'Beneficiary_Contact_Number' => ['required_if:apply,Child,Spouse,Parent',
                function ($attribute, $value, $fail) {
                    if ($value=='' || preg_match('/^[0-9]{10}$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
            'Relationship' => 'required_if:apply,Child,Spouse,Parent',
            'beneficiary_dob' => 'required_if:apply,Child,Spouse,Parent',
            'Beneficiary_NIC' => ['required_if:apply,Spouse,Parent',
                function ($attribute, $value, $fail) {
                    if ($value=='' || preg_match('/^([0-9]{12})$/', $value)) {
                        return true;
                    } else if ($value=='' || strlen($value) == 10 && preg_match('/^([0-9]{9}[vVxX]{1})$/', $value)) {
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
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                }, 'required', 'max:10', 'min:10',


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
            'Permanent_Address' => 'required',
            'dob' => 'required',
            'plan' => 'required',
        ]);
        $token = env("TOKEN");
        $url = env("CEYLINCO_NIC_VALIDATE");
        $merchant_id = env("MERCHANT_ID");
        $client1 = new Client();
        $resp = $client1->request('POST', $url, [
            'form_params' => [
                'token' => $token,
                'merchant_id' => $merchant_id,
                'insured_is' => $request->apply,
                "customer_nic" => $request->nic,
                "date_of_birth" => $request->dob,
                "insurance_policy_id" => 'ceylinco-hospitalization-cover',
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
        $data['beneficiary_name'] = $request->beneficiary_name;
        $data['beneficiary_nic'] = $request->Beneficiary_NIC;
        $data['beneficiary_contact'] = $request->Beneficiary_Contact_Number;
        $data['beneficiary_email'] = $request->Beneficiary_Email;
        $data['beneficiary_dob'] = $request->beneficiary_dob;
        $data['beneficiary_relationship'] = $request->Relationship;
        $data['Full_Name'] = $request->Full_Name;
        $data['email'] = $request->email;
        $data['Contact_Number'] = $request->Contact_Number;
        $data['nic'] = $request->nic;
        $data['Permanent_Address'] = $request->Permanent_Address;
        $data['dob'] = $request->dob;

        session(['visaS' => $data]);
        return redirect('/visa/step2');
    }

    public function step1(Request $request)
    {
        if (session('visaS')) {
            return view('Frontend.Apply.Visa.SeriousIlness.step1');
        } else {
            return redirect('/basic_details/Hospitalization');
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
            'terms' => 'required',
        ]);

        $data = session('visaS');
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
        $url = env("CEYLINCO_VISA_CARD_URL");
        $merchant_id = env("MERCHANT_ID");


        $client = new Client();
        $fileinfo = array(
            'name' => $name,
            'clientNumber' => "102425",
            'type' => 'file',
        );
        $response = $client->post($url, [
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
                    'name' => 'beneficiary_name',
                    'contents' => $data['beneficiary_name'],
                ], [
                    'name' => 'beneficiary_nic',
                    'contents' => $data['beneficiary_nic'],
                ], [
                    'name' => 'beneficiary_contact',
                    'contents' => $data['beneficiary_contact'],
                ], [
                    'name' => 'beneficiary_email',
                    'contents' => $data['beneficiary_email'],
                ],
                [
                    'name' => 'beneficiary_relationship',
                    'contents' => $data['beneficiary_relationship'],
                ], [
                    'name' => 'beneficiary_dob',
                    'contents' => $data['beneficiary_dob'],
                ], [
                    'name' => 'beneficiary_relationship',
                    'contents' => $data['beneficiary_relationship'],
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
                    'contents' => $merchant_id,
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
