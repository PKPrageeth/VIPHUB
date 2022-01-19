<?php

namespace App\Http\Controllers\Frontend\Thirdparty;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Guzzle\Http\Exception\ClientErrorResponseException;
class ThirdPartyController extends Controller
{
    function basic_details(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'Full_Name' => 'required',
            'email' => 'required',
            'Contact_Number' => 'required',
            'nic' => 'required',
            'Permanent_Address_Line1' => 'required',
            'Permanent_Address_Line2' => 'required',
            'Permanent_Address_Line3' => 'required',
            'dob' => 'required',
        ]);



        $data = [];
        $data['title'] = $request->title;
        $data['Full_Name'] = $request->Full_Name;
        $data['email'] = $request->email;
        $data['Contact_Number'] = $request->Contact_Number;
        $data['nic'] = $request->nic;
        $data['Permanent_Address_Line1'] = $request->Permanent_Address_Line1;
        $data['Permanent_Address_Line2'] = $request->Permanent_Address_Line2;
        $data['Permanent_Address_Line3'] = $request->Permanent_Address_Line3;
        $data['dob'] = $request->dob;

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
            'model' => 'required',
            'Engine_Number' => 'required',
            'Chassis_Number' => 'required',
            'Horse_Power' => 'required',
            'color' => 'required',
            'Carrying_Capacity' => 'required',
            'seating_capacity' => 'required',
            'fuel' => 'required',
            'Vehicle_Type' => 'required',
            'market_Value' => 'required',
            'yom' => 'required',

            'usage' => 'required',
            'Beneficiary_Name' => 'required',
            'Beneficiary_NIC' => 'required',
            'Beneficiary_Relationship' => 'required',
            'language' => 'required',

            'nicf' => 'required',
            'nicb' => 'required',
            'vehiC' => 'required',
            'policy' => 'required',
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
            $response = $client->post("https://marketplace-test.paymediasolutions.com/api/createThirdPartyPolicyToThirdPartyCompanyCustomer", [
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
                    ],                [
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
                        'contents' => $request['damages']?'Y':'N',
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
                        'contents' => $request['declaration']?'Y':'N',
                    ],
                    [
                        'name' => 'premium',
                        'contents' => '5000',
                    ],
                    [
                        'name' => 'vehicle_reg_certificate',
                        'contents' => $vehiC,
                    ],


                    [
                        'name' => 'merchant_id',
                        'contents' => 'ceylinco123',
                    ],
                    [
                        'name' => 'token',
                        'contents' => '753799f5eb9c413b957c2dca36897a91a47ca4916ac0400d60b9e40d9b351a4eee786de5e11a26421a0f258a657759118c0cb8fd3c2a39c4269a8bdf5c7dacbb',
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
        }catch (\Exception  $e){

            dd($e);
        }

        return Redirect::to($array['paymentLink']);
    }
}
