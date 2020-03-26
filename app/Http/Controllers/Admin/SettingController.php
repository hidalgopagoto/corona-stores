<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index')->with(['settings' => $settings]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $values = $request->input('settings');
        foreach ($values as $id => $value) {
            $setting = Setting::find($id);
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        return redirect('admin/settings')->with('status', 'Configurações atualizadas com sucesso');
    }
}
