<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Models\MainMenu;
use App\Models\SubMenu;

use Illuminate\Http\Request;

class SubMeunController extends Controller
{
    public function create(MainMenu $mainMenu){  
       
        return view('dashboard.setting.subMeun.create',compact('mainMenu'));
    }

    public function store(Request $request,MainMenu $mainMenu){
     
         $request->validate([
             'name' => 'required',
            
         ],
         [
             'name.required' => 'يجب ادخال اسم الأبن',
             'endpoint.required' => 'يجب ادخال الرابط',
            ]);
    
           $mainMenu->subMeuns()->create($request->only([
               'name',
               'endpoint',
               'route_name'
            ]));

            alert()->success('القائمة الرئيسية','تم أضافة أبن لعنصر في القائمة بنجاح');
           
            return redirect()->route('meuns.showSubmeuns',$mainMenu->id);
    }

    
    public function edit(SubMenu $subMenu){
        return view('dashboard.setting.subMeun.edit',compact('subMenu'));
    }

    public function update(Request $request,SubMenu $subMenu){
     
        $request->validate([
            'name' => 'required',
            'endpoint' => 'required',
        ],
        [
            'name.required' => 'يجب ادخال اسم الأبن',   
            'endpoint.required' => 'يجب ادخال الرابط',
           ]);
        $subMenu->update($request->only([
            'name',
            'endpoint',
            'route_name'
        ]));
        alert()->success('القائمة الرئيسية','تم تعديل أبن لعنصر في القائمة بنجاح');
        return redirect()->route('meuns.showSubmeuns',$subMenu->main_meun_id);
    }

    public function delete(SubMenu $subMenu){
        $mainMenu_id = $subMenu->main_meun_id;
        $subMenu->delete();
        alert()->success('القائمة الرئيسية','تم حذف أبن لعنصر في القائمة بنجاح');
        return redirect()->route('meuns.showSubmeuns',$mainMenu_id);
    }

    public function updateStatusEnabled(SubMenu $subMenu){
        $subMenu->update(['status'=>'enabled']);
        alert()->success('القائمة الرئيسية','تم تفعيل أبن لعنصر في القائمة بنجاح');
        return redirect()->route('meuns.showSubmeuns',$subMenu->main_meun_id);
    }
  
    public function updateStatusDisabled(SubMenu $subMenu){
        $subMenu->update(['status'=>'disabled']);
        alert()->success('القائمة الرئيسية','تم تعطيل أبن لعنصر في القائمة بنجاح');
        return redirect()->route('meuns.showSubmeuns',$subMenu->main_meun_id);
    }

}
