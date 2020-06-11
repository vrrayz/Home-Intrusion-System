<?php

namespace App\Http\Controllers;

use App\SecurityKeyCode;
use Illuminate\Http\Request;

class SecurityKeyCodeController extends Controller
{
    //
    public function viewSecurityKeyGenerator()
    {
        $securityKeyCode = SecurityKeyCode::all();
        return view('admin.securityKeyGenerator')->with(['keyCodes' => $securityKeyCode]);
    }
    public function generateSecurityKey(Request $request)
    {
        $rand_num = random_int(10000, 50000);
        $securityKeyCode = new SecurityKeyCode();
        $getSecurityKeyCodes = $securityKeyCode->where([['key_code',$rand_num]])->get();
        do {
            # code... If the generated keycode doesn't exist in the database insert it
            #otherwise generate another keycode and run this check again
            if(count($getSecurityKeyCodes) == 0){

            }else{
                $rand_num = random_int(1000, 5000);
                $getSecurityKeyCodes = $securityKeyCode->where([['key_code', $rand_num]])->get();
            }
        } while (count($getSecurityKeyCodes) > 0);
        $securityKeyCode->create(['key_code'=>$rand_num]);
        return redirect('/admin/generate_security_key')->with(['success'=>'Key Code Generated Successfully']);
    }
}
