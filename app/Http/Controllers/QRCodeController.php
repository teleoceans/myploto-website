<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class QRCodeController extends Controller
{
    public function redirect(){
        
        
        
        
        $userAgent = request()->server('HTTP_USER_AGENT');

if (preg_match('/Android/i', $userAgent)) {
                  return  redirect()->to('https://play.google.com/store/apps/');     

} elseif (preg_match('/iPhone|iPad|iPod/i', $userAgent)) {
                   return  redirect()->to('https://apps.apple.com/eg');

} else {
 return  redirect()->to('/');
    
}
        
        
        
        // $userAgent = request()->header('User-Agent');
        //     dd($userAgent);
        //     if (strpos($userAgent, 'Android') !== false) {
        //       return  redirect()->to('https://play.google.com/store/apps/');     
        //         } elseif (strpos($userAgent, 'iOS') !== false) {
        //         return  redirect()->to('https://apps.apple.com/eg/app');
        //         }else{
        //             return  redirect()->to('/');
        //         }
    }
}
