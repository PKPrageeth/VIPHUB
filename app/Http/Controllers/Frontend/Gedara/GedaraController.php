<?php

namespace App\Http\Controllers\Frontend\Gedara;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GedaraController extends Controller
{
    function basic_details(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'fname' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z][a-zA-Z ]{1,127}$/', $value)) {
                        return true;
                    } else {
                        $fail('Full Name is invalid.');
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
            'mobile' => [
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[0-9]{10}$/', $value)) {
                        return true;
                    } else {
                        $fail('Contact Number is invalid.');
                    }
                }, 'required', 'max:10', 'min:10',


            ],
            'nic' => ['required',
                function ($attribute, $value, $fail) {
                    if (is_int($value) && strlen($value) == 12 && preg_match('/^([0-9]{12})$/', $value)) {
                        return true;
                    } else if (strlen($value) == 10 && preg_match('/^([0-9]{9}[vVxX]{1})$/', $value)) {
                        return true;
                    } else {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
            'address' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z0-9][a-zA-Z0-9 ]+$/', $value)) {
                        return true;
                    } else {
                        $fail('Permanent Address is invalid.');
                    }
                },
            ],
            'mortgagee' => ['required',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z][a-zA-Z ]{1,127}$/', $value)) {
                        return true;
                    } else {
                        $fail('Permanent Address is invalid.');
                    }
                },
            ],
            'dob' => 'required',
        ]);
        $data = [];
        $data['title'] = $request->title;
        $data['fname'] = $request->fname;
        $data['premium'] = $request->premium;
        $data['email'] = $request->email;
        $data['mobile'] = $request->mobile;
        $data['nic'] = $request->nic;
        $data['address'] = $request->address;
        $data['dob'] = $request->dob;
        $data['mortgagee'] = $request->mortgagee;

        session(['Gedara' => $data]);
        return redirect('gedara/step2');

    }
    public function Gedara_step1()
    {
        if (session('Gedara')) {
            return view('Frontend.Apply.Property.step2');
        }else{

            return redirect('/basic_details/ceylinco-gedara');
        }

    }
    public function step2(Request $request)
    {
        $customMessages = [
            'required_with' => 'This field is required.'
        ];
        $request->validate([
            'value.*' => ['required_with:item.*',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[0-9]+$/', $value)) {
                        return true;
                    } else {
                        $fail('Value is invalid.');
                    }
                },'max:15',


            ],
            'make.*' => ['required_with:item.*',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z0-9][a-zA-Z0-9 ]+$/', $value)) {
                        return true;
                    } else {
                        $fail('Make is invalid.');
                    }
                },'max:15',


            ], 'model.*' => ['required_with:item.*',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^[a-zA-Z0-9][a-zA-Z0-9 ]+$/', $value)) {
                        return true;
                    } else {
                        $fail('Model is invalid.');
                    }
                },'max:15',


            ],
            'wall'=>'required',
            'roof'=>'required',
            'ceiling'=>'required',
            'lit'=>'required',
        ],$customMessages);

        $item=$request->item;
        $make=$request->make;
        $model=$request->model;
        $value=$request->value;
        $tick=$request->tick;
        $itemList=[];
        for ($i=0;$i<count($item);$i++){
            $itemList[]=[
                'itemtype'=>$item[$i],
                'make'=>$make[$i],
                'model'=>$model[$i],
                'value'=>$value[$i],
                'burglarycover'=>$tick[$i],

            ];

        }

        $data = session('Gedara');
        $data['wall'] = $request->wall;
        $data['roof'] = $request->roof;
        $data['ceiling'] = $request->ceiling;
        $data['lit'] = $request->lit;
        $data['itemlist'] = json_encode($itemList);

        session(['Gedara' => $data]);

    return redirect('gedara/step3');


    }
    public function step3(Request $request)
    {
        if (session('Gedara')) {
            return view('Frontend.Apply.Property.step3');
        }else{
            return redirect('/basic_details/ceylinco-gedara');
        }


    }
    function Finlstep(Request $request){

        $request->validate([

            'nicf' => 'required',
            'nicb' => 'required',
            'policy' => 'required',
            'nature_of_illness' => ['required_with:seriousillness'],
            'typeofsurgerie' => ['required_with:majorsurgeries'],
        ]);

        $token = env("TOKEN");
        $url = env("CEYLINCO_GEDARA_URL");
        $merchant_id= env("MERCHANT_ID");


        $data = session('Gedara');
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
        $response = $client->post($url, [
            'multipart' => [
                [
                    'name' => 'title',
                    'contents' => $data['title'],
                ],
                [
                    'name' => 'full_name',
                    'contents' =>  $data['fname'],
                ],
                [
                    'name' => 'permenent_addr',
                    'contents' =>  $data['address'],
                ],[
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
                    'name' => 'mortgagee_name',
                    'contents' =>  $data['mortgagee'],
                ],
                [
                    'name' => 'contact_no',
                    'contents' => $data['mobile'],
                ],
                [
                    'name' => 'walls',
                    'contents' =>$data['wall'],
                ],
                [
                    'name' => 'roof',
                    'contents' => $data['roof'],
                ],
                [
                    'name' => 'ceiling',
                    'contents' => $data['ceiling'],
                ],
                [
                    'name' => 'litby',
                    'contents' => $data['lit'],
                ],
                [
                    'name' => 'itemList',
                    'contents' => $data['itemlist'],
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
                    'contents' => $merchant_id,
                ], [
                    'name' => 'token',
                    'contents' => $token ,
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


        return view('Frontend.Apply.Property.step3');



    }

}
