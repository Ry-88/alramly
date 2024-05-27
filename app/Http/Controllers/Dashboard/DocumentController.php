<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function create()
    {
        return view('dashboard.document.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_en' => 'required',
            'document' => 'required',
            'document_type' => 'required',

        ], [
            'name.required' => 'يجب ادخال اسم المستند',
            'name_en.required' => 'يجب ادخال اسم المستند بالانجليزي',
            'path.required' => 'يجب ادخال  المستند',
            'document_type.required' => 'يجب ادخال نوع المستند',
        ]);

        $extension = $request->document->getClientOriginalExtension();
        $documentFile = $request->document->move('documents', Str::slug($request->name) . '-' . time() . '-' . rand(10, 10000) . '.' . $extension);

        $document = Document::create([
            'name' => [
                'ar' => $request->name,
                'en' => $request->name_en,
            ],
            'path' => $documentFile,
            'document_type' => $request->document_type,
        ]);

        alert()->success('المستندات', 'تم اضافة المستند بنجاح');
        return back();
    }

    public function edit(Document $document)
    {
        return view('dashboard.document.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {

        $request->validate([
            'name' => 'required',
            'name_en' => 'required',
            'document_type' => 'required',
        ], [
            'name.required' => 'يجب ادخال اسم المستند',
            'name_en.required' => 'يجب ادخال اسم المستند بالانجليزي',
            'document_type.required' => 'يجب ادخال نوع المستند',
        ]);

        if ($request->hasFile('document')) {
            $extension = $request->document->getClientOriginalExtension();
            $documentFile = $request->document->move('documents', Str::slug($request->name) . '-' . time() . '-' . rand(10, 10000) . '.' . $extension);
        }
        $document->update([
            'name' => [
                'ar' => $request->name,
                'en' => $request->name_en,

            ],
            'path' => $documentFile ?? $document->path,
            'document_type' => $request->document_type,
        ]);

        alert()->success('المستندات', 'تم تعديل المستند بنجاح');
        return back();
    }

    public function index()
    {
        $documents = Document::all();
        return view('dashboard.document.index', compact('documents'));
    }

    public function delete(Document $document)
    {
        $document->delete();
        alert()->success('المستندات', 'تم حذف المستند بنجاح');
        return back();
    }


    public function getDocumentMeetings()
    {
        $documents = Document::where('document_type', 'الاجتماعات')->get();
        return view('dashboard.document.meetings', compact('documents'));
    }

    public function getDocumentReports()
    {
        $documents = Document::where('document_type', 'التقارير')->get();
        return view('dashboard.document.reports', compact('documents'));
    }

    public function getDocumentGovernance()
    {
        $documents = Document::where('document_type', 'الحوكمه')->get();
        return view('dashboard.document.governance', compact('documents'));
    }

    public function getDocumentDepartments()
    {
        $documents = Document::where('document_type', 'الادارات')->get();
        return view('dashboard.document.departments', compact('documents'));
    }

    public function getDocumentMinisterialDecision()
    {
        $documents = Document::where('document_type', 'القرار الوزاري')->get();
        return view('dashboard.document.ministerial-decisions', compact('documents'));
    }

    public function getDecisionBoardDirectors()
    {
        $documents = Document::where('document_type', 'قرار تشكيل مجلس الإدارة')->get();
        return view('dashboard.document.decision-board-directors', compact('documents'));
    }

    public function getAssociationLicense()
    {
        $documents = Document::where('document_type', 'ترخيص الجمعية')->get();
        return view('dashboard.document.association-license', compact('documents'));
    }

    public function getBasicRegulation()
    {
        $documents = Document::where('document_type', 'اللائحة الأساسية')->get();
        return view('dashboard.document.basic-regulation', compact('documents'));
    }

    public function getRegulationsPolicies()
    {
        $documents = Document::where('document_type', 'اللوائح والسياسات')->get();
        return view('dashboard.document.regulations-policies', compact('documents'));
    }
    public function getGovernanceResult()
    {
        $documents = Document::where('document_type', 'نتيجة الحوكمة')->get();
        return view('dashboard.document.governance-result', compact('documents'));
    }

    public function getBoardMeetingMinutes()
    {
        $documents = Document::where('document_type', 'محاضر اجتماعات مجلس الإدارة')->get();
        return view('dashboard.document.board-meeting-minutes', compact('documents'));
    }

    public function getGeneralAssociationMeetings()
    {
        $documents = Document::where('document_type', 'محاضر اجتماعات الجمعية العمومية')->get();
        return view('dashboard.document.general-association-meetings', compact('documents'));
    }

    public function getOrganizationalChart()
    {
        $documents = Document::where('document_type', 'الهيكل التنظيمي')->get();
        return view('dashboard.document.organizational-chart', compact('documents'));
    }


    // public function getMinutesOfTheExtraordinaryGeneralAssemblyMeetings()
    // محاضر اجتماعات الجمعية العمومية العادية
    public function getMinutesNormalMeetings()
    {
        // dd("test");
        $documents = Document::where('document_type', 'محاضر اجتماعات الجمعية العمومية العادية')->get();

        return view('dashboard.document.minutes-of-the-extraordinary-general-assembly-meetings', compact('documents'));
    }


    public function getMinutesUnNormalMeetings()
    {

        $documents = Document::where('document_type', 'محاضر اجتماعات الجمعية العمومية الغير عادية')->get();

        return view('dashboard.document.minutes-of-the-unNormal-general-assembly-meetings', compact('documents'));
    }
}
