<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Models\Control;
use Illuminate\Http\Request;

class ControlController extends Controller
{

    public function index()
    {
        $controls = Control::all();
        return view('dashboard.setting.control.index', compact('controls'));
    }
    public function create()
    {
        return view('dashboard.setting.control.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_name' => 'required',
        ],[
            'section_name.required' => 'يجب ادخال اسم القسم',
        ]);

        $control = new Control();
        $control->section_name = $request->section_name;
        

        $control->save();

        return redirect()->route('controls.index');

    }

    public function edit($id)
    {
        $control = Control::find($id);
        return view('dashboard.setting.control.edit', compact('control'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'section_name' => 'required',
        ],
        [
            'section_name.required' => 'يجب ادخال اسم القسم',
        ]);

        $control = Control::find($id);
        $control->section_name = $request->section_name;
        $control->save();

        return redirect()->route('controls.index');

    }

    public function updateStatusEnabled($id)
    {
        $control = Control::find($id);
        $control->status = 'enabled';
        $control->save();

        return redirect()->route('controls.index');
    }

    public function updateStatusDisabled($id)
    {
        $control = Control::find($id);
        $control->status = 'disabled';
        $control->save();

        return redirect()->route('controls.index');
    }
    
}
