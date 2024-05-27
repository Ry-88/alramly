<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageUploder;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function index()
    {
        $partners = Partner::with('image')->get();


        return view('dashboard.partner.index', compact('partners'));
    }

    public function create()
    {
        return view('dashboard.partner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'logo' => 'required|image',

        ], [
            'name.required' => 'يجب ادخال اسم الشريك',
            'name.string' => 'يجب ادخال اسم الشريك بشكل صحيح',
            'name.max' => 'يجب ان لا يتعدي 255 حرف',
            'name_en.required' => 'يجب ادخال اسم الشريك بالانجليزية',
            'name_en.string' => 'يجب ادخال اسم الشريك بالانجليزية بشكل صحيح',
            'name_en.max' => 'يجب ان لا يتعدي 255 حرف',
            'logo.required' => 'يجب أرفاق شعار للشريك',
            'logo.image' => 'يجب أرفاق شعار الشريك بصورة صحيحة',

        ]);

        $partner = new Partner();
        if ($request->has('url')) {
            $partner->url = $request->url;
        } else {
            $partner->url = '#';
        }
        $partner->name  = [
            'ar' => $request->name,
            'en' => $request->name_en,
        ];
        $partner->save();

        $extension = $request->logo->getClientOriginalExtension();
        $image = $request->logo->move('partners', time() . '-' . rand(10, 10000) . '.' . $extension);

        $partner->image()->create([
            'path' => $image,
            'imageable_type' => get_class($partner)
        ]);

        alert()->success('شركاء النجاح', 'تم اضافة شريك نجاح ');

        return redirect()->route('partners.index');
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('dashboard.partner.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'logo' => 'image',
        ], [
            'name.required' => 'يجب ادخال اسم الشريك',
            'name.string' => 'يجب ادخال اسم الشريك بشكل صحيح',
            'name.max' => 'يجب ان لا يتعدي 255 حرف',
            'name_en.required' => 'يجب ادخال اسم الشريك بالانجليزية',
            'name_en.string' => 'يجب ادخال اسم الشريك بالانجليزية بشكل صحيح',
            'name_en.max' => 'يجب ان لا يتعدي 255 حرف',

        ]);

        $partner = Partner::findOrFail($id);
        if ($request->has('url')) {
            $partner->url = $request->url;
        }
        $partner->name = [
            'ar' => $request->name,
            'en' => $request->name_en,
        ];

        $partner->save();

        if ($request->hasFile('logo')) {
            $extension = $request->logo->getClientOriginalExtension();
            $image = $request->logo->move('partners', time() . '-' . rand(10, 10000) . '.' . $extension);

            $partner->image()->update([
                'path' => $image,
                'imageable_type' => get_class($partner)
            ]);
        }

        alert()->success('شركاء النجاح', 'تم تعديل شريك نجاح ');

        return redirect()->route('partners.index');
    }

    public function delete($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->image()->delete();
        $partner->delete();
        alert()->success('شركاء النجاح', 'تم حذف شريك نجاح ');
        return redirect()->route('partners.index');
    }
}
