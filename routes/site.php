<?php


use App\Http\Controllers\Site\AdvertisementController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\DocumentController;
use App\Http\Controllers\Site\EventController;
use App\Http\Controllers\Site\GalleryController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\MembersGroupController;
use App\Http\Controllers\Site\MembershipController;
use App\Http\Controllers\Site\ArticleController;
use App\Http\Controllers\Site\NewsController;
use App\Http\Controllers\Site\PartnerController;
use App\Http\Controllers\Site\ProjectController;
use App\Http\Controllers\Site\SponsorController;
use App\Http\Controllers\Site\VisionController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/site-layoute', function () {
    // dd(url({{ $slider->image->path }}))

    //   dd(Str::slug('مازن الأخبار'));
});


Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::get('/membership/create', [MembershipController::class, 'create'])->name('site.membership.create');
Route::post('/membership/store', [MembershipController::class, 'store'])->name('site.membership.store');


Route::get('/contact', [ContactController::class, 'create'])->name('site.contact.create');
Route::post('/contact/store', [ContactController::class, 'store'])->name('site.contact.store');


Route::get('/last/news', [NewsController::class, 'index'])->name('site.news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('site.news.show');

Route::get('/last/articles', [ArticleController::class, 'index'])->name('site.articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('site.articles.show');

Route::get('/last/events', [EventController::class, 'index'])->name('site.event.index');
Route::get('/events/{slug}', [EventController::class, 'show'])->name('site.event.show');

Route::get('/last/projects', [ProjectController::class, 'index'])->name('site.project.index');
Route::get('/project/{slug}', [ProjectController::class, 'show'])->name('site.project.show');

Route::post('/projects/sponsor', [SponsorController::class, 'store'])->name('site.sponsors.store');
Route::post('/projects/advertisement', [AdvertisementController::class, 'store'])->name('site.advertisements.store');

Route::get('/document/reports', [DocumentController::class, 'getDocumentReports'])->name('site.document.reports');
Route::get('/document/governance', [DocumentController::class, 'getDocumentGovernance'])->name('site.document.governance');
Route::get('/document/departments', [DocumentController::class, 'getDocumentDepartments'])->name('site.document.departments');
Route::get('/document/meetings', [DocumentController::class, 'getDocumentMeetings'])->name('site.document.meetings');
Route::get('/document/reports/{id}', [DocumentController::class, 'getDocumentReport'])->name('site.document.report');
Route::get('/document/governance_transparency', function () {
    return view('site.document.governance_transparency');
})->name('site.document.governance_transparency');
Route::get('/document/meetings-minutes', function () {
    return view('site.document.meetings-minutes');
})->name('site.document.meetings-minutes');

Route::get('/documents/ministerial/decision', [DocumentController::class, 'getDocumentMinisterialDecision'])->name('site.ministerial.decision');

// قرار تشكيل مجلس الإدارة
Route::get('/document/decision/board/directors', [DocumentController::class, 'getDecisionBoardDirectors'])->name('site.decision.board.directors');

Route::get('/document/association/license', [DocumentController::class, 'getAssociationLicense'])->name('site.association.license');

Route::get('/document/basic/regulation', [DocumentController::class, 'getBasicRegulation'])->name('site.basic.regulation');

Route::get('/document/regulations/policies', [DocumentController::class, 'getRegulationsPolicies'])->name('site.regulations.policies');

Route::get('/document/governance/result', [DocumentController::class, 'getGovernanceResult'])->name('site.governance.result');
// محاضر اجتماعات مجلس الإدارة
Route::get('/document/board/meeting/minutes', [DocumentController::class, 'getBoardMeetingMinutes'])->name('site.board.meeting.minutes');


Route::get('/document/general/association/normal/meetings', [DocumentController::class, 'getMinutesNormalMeetings'])->name('site.minutes.normal.meetings');
Route::get('/document/general/association/un-normal/meetings', [DocumentController::class, 'getMinutesUnNormalMeetings'])->name('site.minutes.uNnormal.meetings');

Route::get('/document/general/association/meetings', [DocumentController::class, 'getGeneralAssociationMeetings'])->name('site.general.association.meetings');


Route::get('/documents/organizational/structure', [DocumentController::class, 'getOrganizationalChart'])->name('site.organizational.chart');

Route::get('/document/pdf/{document}', [DocumentController::class, 'pdfStream'])->name('site.document.pdf');

Route::get('/galleries/index', [GalleryController::class, 'index'])->name('site.gallery.index');

Route::get('/about-us', [VisionController::class, 'index'])->name('site.vision.index');
Route::get('/goals', [VisionController::class, 'goals'])->name('site.vision.goals');
Route::get('/message', [VisionController::class, 'message'])->name('site.vision.message');
Route::get('/vision', [VisionController::class, 'vision'])->name('site.vision.vision');

Route::get('/members/group', [MembersGroupController::class, 'membersGroup'])->name('site.membersGroup');
Route::get('/members/founding', [MembersGroupController::class, 'foundingMembers'])->name('site.foundingMembers');
Route::get('/members/generalAssociationMembers', [MembersGroupController::class, 'generalAssociationMembers'])->name('site.generalAssociationMembers');


Route::get('/partners/site', [PartnerController::class, 'index'])->name('site.partner.index');

Route::get('/lang/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    // dd(session()->get('locale'));
    return redirect()->back();
});
