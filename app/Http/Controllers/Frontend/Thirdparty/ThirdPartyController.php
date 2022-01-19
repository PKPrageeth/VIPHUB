<?php

namespace App\Http\Controllers\Frontend\Thirdparty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThirdPartyController extends Controller
{
    function basic_details(Request $request){
        $data = [];
        $data['title'] = $request->title;
        $data['fname'] = $request->fname;
        $data['email'] = $request->email;
        $data['mobile'] = $request->mobile;
        $data['nic'] = $request->nic;
        $data['address1'] = $request->address1;
        $data['address2'] = $request->address2;
        $data['address3'] = $request->address3;
        $data['dob'] = $request->dob;
        $data['mortgagee'] = $request->mortgagee;

        session(['third' => $data]);
        return redirect('/thirdparty/step2');
    }
    public function step1(Request $request)
    {
        if (session('third')) {
            return view('Frontend.Apply.3rdparty.step1');
        }else{
            return redirect('/basic_details/ceylinco-gedara');
        }


    }
}
