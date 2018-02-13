<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    public function change(Request $request)
    {
        $data = [];
        $data['status'] = false;
        
        if ($request->has('id') && $request->has('value')) {
            $id = intval( $request->get('id') );
            $value = $request->get('value');
            $setting = Setting::find($id);
            if ($setting) {
                $setting->value = $value;
                $setting->save();
                $data['status'] = true;
            }
        }
        return $data;
    }
}
