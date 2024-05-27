<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function getDocumentReports()
    {
        $documents = Document::where('document_type', 'التقارير')->paginate(12);
        return view('site.document.reports', compact('documents'));
    }

    public function getDocumentGovernance()
    {
        $documents = Document::where('document_type', 'الحوكمه')->paginate(12);
        return view('site.document.governance', compact('documents'));
    }

    public function getDocumentDepartments()
    {
        $documents = Document::where('document_type', 'الادارات')->paginate(12);
        return view('site.document.departments', compact('documents'));
    }

    public function getDocumentMeetings()
    {
        $documents = Document::where('document_type', 'الاجتماعات')->paginate(12);
        return view('site.document.meetings', compact('documents'));
    }
    

    public function pdfStream(Document $document)
    {
        return response()->file(public_path($document->path));
    }


    public function getDocumentMinisterialDecision()
    {
        $documents = Document::where('document_type', 'القرار الوزاري')->paginate(12);
        return view('site.document.ministerial-decisions', compact('documents'));
    }

    public function getDecisionBoardDirectors()
    {
        $documents = Document::where('document_type', 'قرار تشكيل مجلس الإدارة')->paginate(12);
        return view('site.document.decision-board-directors', compact('documents'));
    }

    public function getAssociationLicense()
    {
        $documents = Document::where('document_type', 'ترخيص الجمعية')->paginate(12);
        return view('site.document.association-license', compact('documents'));
    }

    public function getBasicRegulation()
    {
        $documents = Document::where('document_type', 'اللائحة الأساسية')->paginate(12);
        return view('site.document.basic-regulation', compact('documents'));
    }

    public function getRegulationsPolicies()
    {
        $documents = Document::where('document_type', 'اللوائح والسياسات')->paginate(12);
        return view('site.document.regulations-policies', compact('documents'));
    }
    public function getGovernanceResult()
    {
        $documents = Document::where('document_type', 'نتيجة الحوكمة')->paginate(12);
        return view('site.document.governance-result', compact('documents'));
    }

    public function getBoardMeetingMinutes()
    {
        $documents = Document::where('document_type', 'محاضر اجتماعات مجلس الإدارة')->paginate(12);
        return view('site.document.board-meeting-minutes', compact('documents'));
    }

    public function getGeneralAssociationMeetings()
    {
        $documents = Document::where('document_type', 'محاضر اجتماعات الجمعية العمومية')->paginate(12);
        return view('site.document.general-association-meetings', compact('documents'));
    }

    public function getOrganizationalChart()
    {
        $documents = Document::where('document_type', 'الهيكل التنظيمي')->paginate(12);
        return view('site.document.organizational-chart', compact('documents'));
    }


    // محاضر اجتماعات الجمعية العمومية العادية
    public function getMinutesNormalMeetings()
    {
        // dd("test");
        $documents = Document::where('document_type', 'محاضر اجتماعات الجمعية العمومية العادية')->paginate(12);

        return view('site.document.minutes-of-the-extraordinary-general-assembly-meetings', compact('documents'));
    }


    public function getMinutesUnNormalMeetings()
    {

        $documents = Document::where('document_type', 'محاضر اجتماعات الجمعية العمومية الغير عادية')->paginate(12);

        return view('site.document.minutes-of-the-unNormal-general-assembly-meetings', compact('documents'));
    }
}
