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

        $data = [];
        $data['title'] = $request->title;
        $data['fname'] = $request->fname;
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
        $data = session('Gedara');
//        dd($data);

        $file = $request->file('nicf');

        $name = time() . '_' . $file->getClientOriginalName();
        $path = base_path() . '/public/images/';
        $file->move(public_path('/images'), $name);

        $front =  Psr7\Utils::tryFopen( $path.$name,'r');
        $back  =  Psr7\Utils::tryFopen( $path.$name,'r');

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
        $response = $client->post("https://marketplace-test.paymediasolutions.com/api/createGedaraPolicyToThirdPartyCompanyCustomer", [
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
                    'contents' => '5000',
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
                ]
            ]
        ]);
        if (file_exists($path.$name)) {

            @unlink($path.$name);

        }
        $content = $response->getBody();
        $array = json_decode($content, true);

        return Redirect::to($array['paymentLink']);


        return view('Frontend.Apply.Property.step3');



    }

}
