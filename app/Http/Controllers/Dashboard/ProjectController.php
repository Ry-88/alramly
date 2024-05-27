<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageUploder;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('image')->get();
        return view('dashboard.project.index', compact('projects'));
    }


    public function create()
    {
        return view('dashboard.project.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'target_group' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'image' => 'required|image',
            'name_en' => 'required|string|max:255',
            'description_en' => 'required',
            'target_group_en' => 'required|string|max:255',
            'place_en' => 'required|string|max:255',
            'document' => 'required'

        ], [
            'name.required' => 'يجب ادخال اسم المشروع',
            'description.required' => 'يجب ادخال وصف المشروع',
            'target_group.required' => 'يجب ادخال الفئة المستهدفه',
            'place.required' => 'يجب ادخال المكان',
            'image.required' => 'يجب ادخال صورة للمشروع',
            'name_en.required' => 'يجب ادخال اسم المشروع بالانجليزي',
            'description_en.required' => 'يجب ادخال وصف المشروع بالانجليزي',
            'target_group_en.required' => 'يجب ادخال الفئة المستهدفه بالانجليزي',
            'place_en.required' => 'يجب ادخال المكان بالانجليزي',
            'document.required' => 'يجب ادخال ملف المشروع'
        ]);
        $extension = $request->document->getClientOriginalExtension();
        $documentFile = $request->document->move('projects', Str::slug($request->name) . '-' . time() . '-' . rand(10, 10000) . '.' . $extension);


        $project = Project::create([
            'name' => [
                'ar' => $request->name,
                'en' => $request->name_en,
            ],
            'description' => [
                'ar' => $request->description,
                'en' => $request->description_en,
            ],
            'target_group' => [
                'ar' => $request->target_group,
                'en' => $request->target_group_en,
            ],
            'place' => [
                'ar' => $request->place,
                'en' => $request->place_en,
            ],
            'slug' => Str::slug($request->name),
            'document' => $documentFile,
        ]);

        $image = ImageUploder::uploadOneImage($request, 'projects');

        $project->image()->create([
            'path' => $image,
            'imageable_id' => $project->id,
            'imageable_type' => get_class($project)
        ]);

        alert()->success('المشاريع', 'تم اضافة المشروع بنجاح');

        return redirect()->route('projects.index');
    }



    public function edit(Project $project)
    {

        return view('dashboard.project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'target_group' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_en' => 'required',
            'target_group_en' => 'required|string|max:255',
            'place_en' => 'required|string|max:255',


        ], [
            'name.required' => 'يجب ادخال اسم المشروع',
            'description.required' => 'يجب ادخال وصف المشروع',
            'target_group.required' => 'يجب ادخال الفئة المستهدفه',
            'place.required' => 'يجب ادخال المكان',
            'name_en.required' => 'يجب ادخال اسم المشروع بالانجليزي',
            'description_en.required' => 'يجب ادخال وصف المشروع بالانجليزي',
            'target_group_en.required' => 'يجب ادخال الفئة المستهدفه بالانجليزي',
            'place_en.required' => 'يجب ادخال المكان بالانجليزي',

        ]);

        if ($request->hasFile('document')) {
            $extension = $request->document->getClientOriginalExtension();
            $documentFile = $request->document->move('projects', Str::slug($request->name) . '-' . time() . '-' . rand(10, 10000) . '.' . $extension);
            // $project->document = $documentFile;
        }

        $project->update([
            'name' => [
                'ar' => $request->name,
                'en' => $request->name_en,
            ],
            'description' => [
                'ar' => $request->description,
                'en' => $request->description_en,

            ],
            'target_group' => [
                'ar' => $request->target_group,
                'en' => $request->target_group_en,

            ],
            'place' => [
                'ar' => $request->place,
                'en' => $request->place_en,
            ],
            'slug' => Str::slug($request->name),
            'document' => $documentFile ?? $project->document,
        ]);

        if ($request->hasFile('image')) {

            $image = ImageUploder::uploadOneImage($request, 'projects');
            $project->image()->update([
                'path' => $image,
                'imageable_id' => $project->id,
                'imageable_type' => get_class($project)
            ]);
        }

        alert()->success('المشاريع', 'تم تعديل المشروع بنجاح');

        return redirect()->route('projects.index');
    }


    public function delete(Project $project)
    {
        $project->image()->delete();
        $project->delete();
        alert()->success('المشاريع', 'تم حذف المشروع بنجاح');
        return redirect()->route('projects.index');
    }
}
