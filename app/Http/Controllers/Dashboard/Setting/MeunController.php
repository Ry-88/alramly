<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Models\MainMenu;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class MeunController extends Controller
{
    public function createMainMeun(){  
        return view('dashboard.setting.meun.createMainMeun');
    }

    public function store(Request $request){
         $request->validate([
             'name' => 'required',
            
            
         ],
         [
             'name.required' => 'يجب ادخال اسم عنصر القائمه',
     
            ]);
    
         MainMenu::create($request->all());
         alert()->success('القائمة الرئيسية','تم أضافة عنصر للقائمة الرئيسية بنجاح');
            return redirect()->route('meuns.index');
    }

    public function index(){
        $mainMenus = MainMenu::all();
        return view('dashboard.setting.meun.indexMainMeun',compact('mainMenus'));
    }

    public function edit($id){
        $mainMenu = MainMenu::find($id);
        return view('dashboard.setting.meun.editMainMeun',compact('mainMenu'));
    }

    public function update(Request $request,$id){

        $mainMenu = MainMenu::find($id);
        $request->validate([
            'name' => 'required',
            'endpoint' => 'required',
        ],
        [
            'name.required' => 'يجب ادخال اسم عنصر القائمه',
            'endpoint.required' => 'يجب ادخال الرابط',
           ]);
        $mainMenu->update($request->all());
        alert()->success('القائمة الرئيسية','تم تعديل عنصر للقائمة الرئيسية بنجاح');
        return redirect()->route('meuns.index');
    }
    

    public function delete($id){
        $mainMenu = MainMenu::find($id);
        $mainMenu->delete();
        alert()->success('القائمة الرئيسية','تم حذف عنصر للقائمة الرئيسية بنجاح');
        return redirect()->route('meuns.index');
    }

    public function showSubmeuns(MainMenu $mainMenu){
   
       
        $mainMenu = $mainMenu->load('subMeuns');
     
        return view('dashboard.setting.subMeun.index',compact('mainMenu'));
    }


    public function updateStatusEnabled(MainMenu $mainMenu){
        $mainMenu->update(['status'=>'enabled']);
        alert()->success('القائمة الرئيسية','تم تفعيل عنصر للقائمة الرئيسية بنجاح');
        return redirect()->route('meuns.index');
    }

    public function updateStatusDisabled(MainMenu $mainMenu){
        $mainMenu->update(['status'=>'disabled']);
        alert()->success('القائمة الرئيسية','تم تعطيل عنصر للقائمة الرئيسية بنجاح');
        return redirect()->route('meuns.index');
    }
 
 
}
