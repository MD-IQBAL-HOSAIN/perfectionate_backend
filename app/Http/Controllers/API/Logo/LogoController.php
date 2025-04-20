<?php

namespace App\Http\Controllers\API\Logo;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function logo()
    {
        try {
            $logo = SystemSetting::first()->logo;
            
            return Helper::jsonResponse(true, 'Logo Retrieved Successfully', 200, ['logo' => $logo ?? null]);
        } catch (\Exception $e) {
            return Helper::jsonErrorResponse('An error occurred while retrieving the logo', 500);
        }
    }
    public function coppyrightText(){
        try {
            $copyright_text = SystemSetting::first()->copyright_text;
            
            return Helper::jsonResponse(true, 'Copyright Text Retrieved Successfully', 200, ['copyright_text' => $copyright_text ?? null]);
        } catch (\Exception $e) {
            return Helper::jsonErrorResponse('An error occurred while retrieving the logo', 500);
        }

    }
    public function abouteSystem(){
        try {
            $abouteSystem = SystemSetting::first()->description;
            
            return Helper::jsonResponse(true, 'Aboute System Text Retrieved Successfully', 200, ['abouteSystem' => $abouteSystem ?? null]);
        } catch (\Exception $e) {
            return Helper::jsonErrorResponse('An error occurred while retrieving the logo', 500);
        }

    }



}
