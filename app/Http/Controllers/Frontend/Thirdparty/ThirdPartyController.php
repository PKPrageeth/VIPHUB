<?php

namespace App\Http\Controllers\Frontend\Thirdparty;

use App\Http\Controllers\Controller;
use Guzzle\Http\Exception\ClientErrorResponseException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ThirdPartyController extends Controller
{
    function basic_details(Request $request)
    {
        $request->validate([
            'title' => 'required',
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
                },],
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
            'Permanent_Address_Line1' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z0-9][a-zA-Z0-9 ]+$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
            'Permanent_Address_Line2' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z0-9][a-zA-Z0-9 ]+$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
            'Permanent_Address_Line3' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z0-9][a-zA-Z0-9 ]+$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
            'dob' => 'required',
        ]);


        $data = [];
        $data['title'] = $request->title;
        $data['Full_Name'] = $request->Full_Name;
        $data['email'] = $request->email;
        $data['Contact_Number'] = $request->Contact_Number;
        $data['nic'] = $request->nic;
        $data['premium'] = $request->premium;
        $data['Permanent_Address_Line1'] = $request->Permanent_Address_Line1;
        $data['Permanent_Address_Line2'] = $request->Permanent_Address_Line2;
        $data['Permanent_Address_Line3'] = $request->Permanent_Address_Line3;
        $data['dob'] = $request->dob;
        $data['plan'] = $request->plan;

        session(['third' => $data]);
        return redirect('/thirdparty/step2');
    }

    public function step1(Request $request)
    {
        if (session('third')) {

            return view('Frontend.Apply.3rdparty.step1');
        } else {
            return redirect('/basic_details/ceylinco-gedara');
        }


    }

    function Finlstep(Request $request)
    {
        $request->validate([
            'Registration_Number' => 'required',
            'model' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z0-9]+$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },],
            'Engine_Number' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z0-9]+$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },],
            'Chassis_Number' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z0-9]+$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },],
            'Horse_Power' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z0-9]+$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },],
            'color' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z][a-zA-Z ]{1,127}$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
            'Carrying_Capacity' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z0-9][a-zA-Z0-9 ]+$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },],
            'seating_capacity' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z0-9]+$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },],
            'fuel' => 'required',
            'Vehicle_Type' => 'required',
            'market_Value' => ['required', 'max:15',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[0-9]+$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },],
            'yom' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[0-9]{4}$/', $value)) {
                        return true;
                    } else {
                        $fail('Year of make is invalid.');
                    }
                },
            ],

            'usage' => 'required',
            'Beneficiary_Name' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z][a-zA-Z ]{1,127}$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },],
            'Beneficiary_NIC' => ['required',
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
            'Beneficiary_Relationship' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z][a-zA-Z ]{1,127}$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
            'language' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z][a-zA-Z ]{1,127}$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],

            'nicf' => 'required',
            'nicb' => 'required',
            'vehiC' => 'required',
            'policy' => 'required',
            'terms' => 'required',
        ]);


        $data = session('third');
//        dd($request['policy']);
        $file = $request->file('nicf');

        $name = time() . '_A' . $file->getClientOriginalName();
        $path = base_path() . '/public/images/';
        $file->move(public_path('/images'), $name);

        $file1 = $request->file('nicb');

        $name1 = time() . 'Z_' . $file1->getClientOriginalName();
        $path1 = base_path() . '/public/images/';
        $file1->move(public_path('/images'), $name1);

        $file2 = $request->file('vehiC');

        $name2 = time() . 'X_' . $file2->getClientOriginalName();
        $path2 = base_path() . '/public/images/';
        $file2->move(public_path('/images'), $name2);

        $front = Psr7\Utils::tryFopen($path . $name, 'r');
        $back = Psr7\Utils::tryFopen($path1 . $name1, 'r');
        $vehiC = Psr7\Utils::tryFopen($path2 . $name2, 'r');

        $token = env("TOKEN");
        $url = env("CEYLINCO_THIRDPARTY_COVER_URL");
        $merchant_id = env("MERCHANT_ID");

        $client = new Client([
            'headers' => ['Content-Type' => 'multipart/form-data'],
            'verify' => false
        ]);
        $client = new Client();
        $fileinfo = array(
            'name' => $name,
            'clientNumber' => "102425",
            'type' => 'file',
        );
        try {
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
                        'name' => 'permenent_addr1',
                        'contents' => $data['Permanent_Address_Line1'],
                    ],
                    [
                        'name' => 'permenent_addr2',
                        'contents' => $data['Permanent_Address_Line2'],
                    ],
                    [
                        'name' => 'permenent_addr3',
                        'contents' => $data['Permanent_Address_Line3'],
                    ],

                    [
                        'name' => 'date_of_birth',
                        'contents' => $data['dob'],
                    ],
                    [
                        'name' => 'customer_nic',
                        'contents' => $data['nic'],
                    ],
                    [
                        'name' => 'email',
                        'contents' => $data['email'],
                    ],

                    [
                        'name' => 'contact_no',
                        'contents' => $data['Contact_Number'],
                    ],
//                `````````````````````````````````````````````````````````
                    [
                        'name' => 'registration_no',
                        'contents' => $request['Registration_Number'],
                    ],
                    [
                        'name' => 'engine_no',
                        'contents' => $request['Engine_Number'],
                    ],
                    [
                        'name' => 'chasis_no',
                        'contents' => $request['Chassis_Number'],
                    ],
                    [
                        'name' => 'color',
                        'contents' => $request['color'],
                    ], [
                        'name' => 'model',
                        'contents' => $request['model'],
                    ],
                    [
                        'name' => 'engine_capacity',
                        'contents' => $request['Horse_Power'],
                    ],
                    [
                        'name' => 'market_value',
                        'contents' => $request['market_Value'],
                    ],
                    [
                        'name' => 'year_of_make',
                        'contents' => $request['yom'],
                    ],
                    [
                        'name' => 'seating_capacity',
                        'contents' => $request['seating_capacity'],
                    ],
                    [
                        'name' => 'carrying_capacity',
                        'contents' => $request['Carrying_Capacity'],
                    ],
                    [
                        'name' => 'damages',
                        'contents' => $request['damages'] ? 'Y' : 'N',
                    ],
                    [
                        'name' => 'usage',
                        'contents' => json_encode($request->usage),
                    ],
                    [
                        'name' => 'policyCertificate',
                        'contents' => $request['policy'],
                    ],
                    [
                        'name' => 'fuelType',
                        'contents' => $request['fuel'],
                    ],
                    [
                        'name' => 'vehicleType',
                        'contents' => $request['Vehicle_Type'],
                    ],
                    [
                        'name' => 'beneficiary_name',
                        'contents' => $request['Beneficiary_Name'],
                    ],
                    [
                        'name' => 'beneficiary_nic',
                        'contents' => $request['Beneficiary_NIC'],
                    ],
                    [
                        'name' => 'beneficiary_relationshipType',
                        'contents' => $request['Beneficiary_Relationship'],
                    ],
                    [
                        'name' => 'endorsementLanguage',
                        'contents' => $request['language'],
                    ],
                    [
                        'name' => 'declaration',
                        'contents' => $request['declaration'] ? 'Y' : 'N',
                    ],
                    [
                        'name' => 'premium',
                        'contents' => $data['premium'],
                    ],
                    [
                        'name' => 'vehicle_reg_certificate',
                        'contents' => $vehiC,
                    ],


                    [
                        'name' => 'merchant_id',
                        'contents' => $merchant_id,
                    ],
                    [
                        'name' => 'token',
                        'contents' => $token,
                    ],
                    [
                        'name' => 'payment_done',
                        'contents' => 'No',
                    ],
                    [
                        'name' => 'need_payment_link',
                        'contents' => 'Yes',
                    ],
                    [
                        'name' => 'return_url',
                        'contents' => url('/responseURL'),
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
                @unlink($path1 . $name1);
                @unlink($path2 . $name2);

            }

            $content = $response->getBody();
            $array = json_decode($content, true);
            if ($array['success']) {
                return Redirect::to($array['paymentLink']);
            } else {
                return back()->withInput($request->input())->with('error', $array['message']);
            }


        } catch (\Exception  $e) {

            dd($e);
        }


    }
}
