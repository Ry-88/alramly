<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageUploder;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('images')->get();
        return view('dashboard.event.index', compact('events'));
    }

    public function create()
    {
        return view('dashboard.event.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description' => 'required|string',
            'description_en' => 'required|string',
            'date' => 'required|date',
            'images' => 'required',
            'time' => 'required'
        ], [
            'title.required' => 'يجب ادخال عنوان الفعالية',
            'title.string' => 'يجب ادخال عنوان الفعالية بشكل صحيح',
            'title.max' => 'يجب ان لا يتعدي 255 حرف',
            'title_en.required' => 'يجب ادخال عنوان الفعالية بالانجليزية',
            'title_en.string' => 'يجب ادخال عنوان الفعالية بالانجليزية بشكل صحيح',
            'title_en.max' => 'يجب ان لا يتعدي 255 حرف',
            'description.required' => 'يجب ادخال وصف الفعالية',
            'description.string' => 'يجب ادخال وصف الفعالية بشكل صحيح',
            'description_en.required' => 'يجب ادخال وصف الفعالية بالانجليزية',
            'description_en.string' => 'يجب ادخال وصف الفعالية بالانجليزية بشكل صحيح',
            'date.required' => 'يجب ادخال تاريخ الفعالية',
            'date.date' => 'يجب ادخال تاريخ الفعالية بشكل صحيح',
            'images.required' => 'يجب أرفاق صور للفعالية',
            'time.required' => 'يجب ادخال وقت الفعالية'
        ]);

        $event = Event::create([
            'title' => [
                'ar' => $request->title,
                'en' => $request->title_en
            ],
            'slug' => Str::slug($request->title),
            'description' => [
                'ar' => $request->description,
                'en' => $request->description_en
            ],
            'date' => $request->date,
            'time' => $request->time
        ]);


        $images = ImageUploder::uploadMultipleImages($request, 'events');

        collect($images)->each(function ($image) use ($event) {
            Image::create([
                'path' => $image->getFilename(),
                'imageable_id' => $event->id,
                'imageable_type' => get_class($event),
            ]);
        });
        alert()->success('الفعاليات', 'تم اضافة الفعالية بنجاح');
        return redirect()->route('events.index');
    }


    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('dashboard.event.edit', compact('event'));
    }


    public function update(Request $request, $id)
    {


        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description' => 'required|string',
            'description_en' => 'required|string',
            'date' => 'required|date',
            'time' => 'required'
        ], [
            'title.required' => 'يجب ادخال عنوان الفعالية',
            'title.string' => 'يجب ادخال عنوان الفعالية بشكل صحيح',
            'title.max' => 'يجب ان لا يتعدي 255 حرف',
            'title_en.required' => 'يجب ادخال عنوان الفعالية بالانجليزية',
            'title_en.string' => 'يجب ادخال عنوان الفعالية بالانجليزية بشكل صحيح',
            'title_en.max' => 'يجب ان لا يتعدي 255 حرف',
            'description.required' => 'يجب ادخال وصف الفعالية',
            'description.string' => 'يجب ادخال وصف الفعالية بشكل صحيح',
            'description_en.required' => 'يجب ادخال وصف الفعالية بالانجليزية',
            'description_en.string' => 'يجب ادخال وصف الفعالية بالانجليزية بشكل صحيح',
            'date.required' => 'يجب ادخال تاريخ الفعالية',
            'date.date' => 'يجب ادخال تاريخ الفعالية بشكل صحيح',
            'time.required' => 'يجب ادخال وقت الفعالية'
        ]);

        $event->update([
            'title' => [
                'ar' => $request->title,
                'en' => $request->title_en
            ],
            'slug' => Str::slug($request->title),
            'description' => [
                'ar' => $request->description,
                'en' => $request->description_en
            ],
            'date' => $request->date,
            'time' => $request->time
        ]);

        if ($request->has('images')) {
            $images = ImageUploder::uploadMultipleImages($request, 'events');
            $event->images()->delete();
            collect($images)->each(function ($image) use ($event) {
                Image::create([
                    'path' => $image->getFilename(),
                    'imageable_id' => $event->id,
                    'imageable_type' => get_class($event),
                ]);
            });
        }

        alert()->success('الفعاليات', 'تم تعديل الفعالية بنجاح');
        return redirect()->route('events.index');
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        alert()->success('الفعاليات', 'تم حذف الفعالية بنجاح');
        return redirect()->route('events.index');
    }
}
