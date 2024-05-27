<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\AdvertisementProjectController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\DocumentController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\MembershipController;
use App\Http\Controllers\Dashboard\NewsController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\Dashboard\PhotoController;
use App\Http\Controllers\Dashboard\PlaceController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\Setting\ControlController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Setting\MeunController;
use App\Http\Controllers\Dashboard\Setting\SliderController;
use App\Http\Controllers\Dashboard\SliderController as SliderDashboardController;
use App\Http\Controllers\Dashboard\Setting\SubMeunController;
use App\Http\Controllers\Dashboard\Setting\TextController;
use App\Http\Controllers\Dashboard\Setting\VisionController;
use App\Http\Controllers\Dashboard\SocialMediaController;
use App\Http\Controllers\Dashboard\SponsoreProjectController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\VideoController;
use App\Http\Controllers\Dashboard\VisionController as DashboardVisionController;
use App\Models\Control;
use App\Models\Membership;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return to_route('login.showLoginForm');
});

Route::get('/setDarkTheme', function () {
    if (session()->get('theme') == 'dark') {
        session()->put('theme', 'light');
    } else {
        session()->put('theme', 'dark');
    }
    return redirect()->back();
})->name('setDarkTheme');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.showLoginForm');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('settings')->group(function () {
        Route::get('/meuns/create', [MeunController::class, 'createMainMeun'])->name('meuns.createMainMeun');
        Route::post('/meuns', [MeunController::class, 'store'])->name('meuns.store');
        Route::get('/meuns', [MeunController::class, 'index'])->name('meuns.index');
        Route::get('/meuns/{id}/edit', [MeunController::class, 'edit'])->name('meuns.edit');
        Route::put('/meuns/{id}', [MeunController::class, 'update'])->name('meuns.update');
        Route::delete('/meuns/{id}', [MeunController::class, 'delete'])->name('meuns.delete');
        Route::get('/meuns/{mainMenu}/submeuns', [MeunController::class, 'showSubmeuns'])->name('meuns.showSubmeuns');
        Route::get('/meuns/{mainMenu}/updateStatusEnabled', [MeunController::class, 'updateStatusEnabled'])->name('meuns.updateStatusEnabled');
        Route::get('/meuns/{mainMenu}/updateStatusDisabled', [MeunController::class, 'updateStatusDisabled'])->name('meuns.updateStatusDisabled');


        Route::get('/submeuns/create/{mainMenu}', [SubMeunController::class, 'create'])->name('submeuns.create');
        Route::post('/submeuns/{mainMenu}', [SubMeunController::class, 'store'])->name('submeuns.store');
        Route::get('/submeuns/{mainMenu}', [SubMeunController::class, 'index'])->name('submeuns.index');
        Route::get('/submeuns/{subMenu}/edit', [SubMeunController::class, 'edit'])->name('submeuns.edit');
        Route::put('/submeuns/{subMenu}', [SubMeunController::class, 'update'])->name('submeuns.update');
        Route::delete('/submeuns/{subMenu}', [SubMeunController::class, 'delete'])->name('submeuns.delete');
        Route::get('/submeuns/{subMenu}/updateStatusEnabled', [SubMeunController::class, 'updateStatusEnabled'])->name('submeuns.updateStatusEnabled');
        Route::get('/submeuns/{subMenu}/updateStatusDisabled', [SubMeunController::class, 'updateStatusDisabled'])->name('submeuns.updateStatusDisabled');

        Route::get('/sliders', [SliderController::class, 'index'])->name('settings.sliders.index');
        Route::get('/sliders/{id}/updateStatusEnabled', [SliderController::class, 'updateStatusEnabled'])->name('sliders.updateStatusEnabled');
        Route::get('/sliders/{id}/updateStatusDisabled', [SliderController::class, 'updateStatusDisabled'])->name('sliders.updateStatusDisabled');

        Route::get('/visions/create', [VisionController::class, 'create'])->name('setting.visions.create');
        Route::post('/visions', [VisionController::class, 'store'])->name('setting.visions.store');
        Route::get('/visions', [VisionController::class, 'index'])->name('setting.visions.index');
        Route::get('/visions/{vision}/edit', [VisionController::class, 'edit'])->name('setting.visions.edit');
        Route::put('/visions/{vision}', [VisionController::class, 'update'])->name('setting.visions.update');
        Route::delete('/visions/{vision}', [VisionController::class, 'delete'])->name('setting.visions.delete');
        Route::get('/visions/{id}/updateStatusEnabled', [VisionController::class, 'updateStatusEnabled'])->name('setting.visions.updateStatusEnabled');
        Route::get('/visions/{id}/updateStatusDisabled', [VisionController::class, 'updateStatusDisabled'])->name('setting.visions.updateStatusDisabled');


        Route::get('/controls', [ControlController::class, 'index'])->name('controls.index');
        Route::get('/controls/create', [ControlController::class, 'create'])->name('controls.create');
        Route::post('/controls', [ControlController::class, 'store'])->name('controls.store');
        Route::get('/controls/{control}/edit', [ControlController::class, 'edit'])->name('controls.edit');
        Route::put('/controls/{control}', [ControlController::class, 'update'])->name('controls.update');
        Route::delete('/controls/{control}', [ControlController::class, 'delete'])->name('controls.delete');

        Route::get('/controls/{id}/updateStatusEnabled', [ControlController::class, 'updateStatusEnabled'])->name('controls.updateStatusEnabled');
        Route::get('/controls/{id}/updateStatusDisabled', [ControlController::class, 'updateStatusDisabled'])->name('controls.updateStatusDisabled');


        Route::get('/texts/create', [TextController::class, 'create'])->name('texts.create');
        Route::post('/texts', [TextController::class, 'store'])->name('texts.store');
        Route::get('/texts', [TextController::class, 'index'])->name('texts.index');
        Route::get('/texts/{text}/edit', [TextController::class, 'edit'])->name('texts.edit');
        Route::put('/texts/{text}', [TextController::class, 'update'])->name('texts.update');
        Route::delete('/texts/{text}', [TextController::class, 'delete'])->name('texts.delete');
        Route::get('/texts/{text}/updateStatusEnabled', [TextController::class, 'updateStatusEnabled'])->name('texts.updateStatusEnabled');
        Route::get('/texts/{text}/updateStatusDisabled', [TextController::class, 'updateStatusDisabled'])->name('texts.updateStatusDisabled');
    });

    Route::get('/visions/create', [DashboardVisionController::class, 'create'])->name('visions.create');
    Route::post('/visions/post', [DashboardVisionController::class, 'store'])->name('visions.store');
    Route::get('/visions/dash', [DashboardVisionController::class, 'index'])->name('visions.index');
    Route::get('/visions/{vision}/edit', [DashboardVisionController::class, 'edit'])->name('visions.edit');
    Route::put('/visions/{vision}', [DashboardVisionController::class, 'update'])->name('visions.update');
    Route::delete('/visions/{vision}', [DashboardVisionController::class, 'delete'])->name('visions.delete');
    Route::get('/visions/{id}/updateStatusEnabled', [DashboardVisionController::class, 'updateStatusEnabled'])->name('visions.updateStatusEnabled');
    Route::get('/visions/{id}/updateStatusDisabled', [DashboardVisionController::class, 'updateStatusDisabled'])->name('visions.updateStatusDisabled');


    Route::get('/sliders/create', [SliderDashboardController::class, 'create'])->name('sliders.create');
    Route::get('/sliders/index', [SliderDashboardController::class, 'index'])->name('sliders.index');
    Route::post('/sliders/store', [SliderDashboardController::class, 'store'])->name('sliders.store');
    Route::get('/sliders/{id}/edit', [SliderDashboardController::class, 'edit'])->name('sliders.edit');
    Route::put('/sliders/{id}/update', [SliderDashboardController::class, 'update'])->name('sliders.dashboard.update');
    Route::delete('/sliders/{id}/delete', [SliderDashboardController::class, 'delete'])->name('sliders.dashboard.delete');


    Route::get('/events/index', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}/update', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}/delete', [EventController::class, 'delete'])->name('events.delete');

    Route::get('/news/index', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}/update', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}/delete', [NewsController::class, 'delete'])->name('news.delete');

    Route::get('/partners/index', [PartnerController::class, 'index'])->name('partners.index');
    Route::get('/partners/create', [PartnerController::class, 'create'])->name('partners.create');
    Route::post('/partners/store', [PartnerController::class, 'store'])->name('partners.store');
    Route::get('/partners/{id}/edit', [PartnerController::class, 'edit'])->name('partners.edit');
    Route::put('/partners/{id}/update', [PartnerController::class, 'update'])->name('partners.update');
    Route::delete('/partners/{id}/delete', [PartnerController::class, 'delete'])->name('partners.delete');

    Route::get('/places/index', [PlaceController::class, 'index'])->name('places.index');
    Route::get('/places/create', [PlaceController::class, 'create'])->name('places.create');
    Route::post('/places/store', [PlaceController::class, 'store'])->name('places.store');
    Route::get('/places/{id}/edit', [PlaceController::class, 'edit'])->name('places.edit');
    Route::put('/places/{id}/update', [PlaceController::class, 'update'])->name('places.update');
    Route::delete('/places/{id}/delete', [PlaceController::class, 'delete'])->name('places.delete');

    Route::get('/abouts/index', [AboutController::class, 'index'])->name('abouts.index');
    Route::get('/abouts/create', [AboutController::class, 'create'])->name('abouts.create');
    Route::post('/abouts/store', [AboutController::class, 'store'])->name('abouts.store');
    Route::get('/abouts/{id}/edit', [AboutController::class, 'edit'])->name('abouts.edit');
    Route::put('/abouts/{id}/update', [AboutController::class, 'update'])->name('abouts.update');
    Route::delete('/abouts/{id}/delete', [AboutController::class, 'delete'])->name('abouts.delete');

    Route::get('/contacts/index', [ContactController::class, 'index'])->name('contacts.index');

    Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}/delete', [UserController::class, 'delete'])->name('users.delete');





    Route::get('/projects/index', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}/update', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}/delete', [ProjectController::class, 'delete'])->name('projects.delete');

    Route::get('/articles/index', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{project}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{project}/update', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{project}/delete', [ArticleController::class, 'delete'])->name('articles.delete');

    Route::get('/projects/{project}/sponsores-requests', [SponsoreProjectController::class, 'getSponsoreProjectRequests'])->name('projects.sponsores.requests');
    Route::get('/projects/{project}/advertisements', [AdvertisementProjectController::class, 'getAdvertisementsProject'])->name('projects.advertisements');

    Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('/documents/store', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('/documents/{document}/update', [DocumentController::class, 'update'])->name('documents.update');
    Route::delete('/documents/{document}/delete', [DocumentController::class, 'delete'])->name('documents.delete');

    Route::get('/documents/meetings', [DocumentController::class, 'getDocumentMeetings'])->name('documents.meetings');
    Route::get('/documents/departments', [DocumentController::class, 'getDocumentDepartments'])->name('documents.departments');
    Route::get('/documents/governance', [DocumentController::class, 'getDocumentGovernance'])->name('documents.governance');
    Route::get('/documents/reports', [DocumentController::class, 'getDocumentReports'])->name('documents.reports');

    Route::get('/document/ministerial/decision', [DocumentController::class, 'getDocumentMinisterialDecision'])->name('documents.ministerial.decision');

    // قرار تشكيل مجلس الإدارة
    Route::get('/documents/decision/board/directors', [DocumentController::class, 'getDecisionBoardDirectors'])->name('documents.decision.board.directors');

    Route::get('/documents/association/license', [DocumentController::class, 'getAssociationLicense'])->name('documents.association.license');

    Route::get('/documents/basic/regulation', [DocumentController::class, 'getBasicRegulation'])->name('documents.basic.regulation');

    Route::get('/documents/regulations/policies', [DocumentController::class, 'getRegulationsPolicies'])->name('documents.regulations.policies');

    Route::get('/documents/governance/result', [DocumentController::class, 'getGovernanceResult'])->name('documents.governance.result');
    // محاضر اجتماعات مجلس الإدارة
    Route::get('/documents/board/meeting/minutes', [DocumentController::class, 'getBoardMeetingMinutes'])->name('documents.board.meeting.minutes');


    Route::get('/documents/general/association/meetings', [DocumentController::class, 'getGeneralAssociationMeetings'])->name('documents.general.association.meetings');

    Route::get('/documents/organizational/chart', [DocumentController::class, 'getOrganizationalChart'])->name('documents.organizational.chart');

    Route::get('/documents/minutes/normal/meetings', [DocumentController::class, 'getMinutesNormalMeetings'])->name('documents.getMinutesNormalMeetings');
    Route::get('/documents/minutes/un-normal/meetings', [DocumentController::class, 'getMinutesUnNormalMeetings'])->name('documents.getMinutesUnNormalMeetings');



    Route::group(['prefix' => 'galleries'], function () {
        Route::get('/photos/index', [PhotoController::class, 'index'])->name('galleries.photo.index');
        Route::get('/photos/create', [PhotoController::class, 'create'])->name('galleries.photo.create');
        Route::post('/photos/store', [PhotoController::class, 'store'])->name('galleries.photo.store');
        Route::get('/photos/{id}/edit', [PhotoController::class, 'edit'])->name('galleries.photo.edit');
        Route::put('/photos/{id}/update', [PhotoController::class, 'update'])->name('galleries.photo.update');
        Route::delete('/photos/{id}/delete', [PhotoController::class, 'delete'])->name('galleries.photo.delete');

        Route::get('/videos/index', [VideoController::class, 'index'])->name('galleries.video.index');
        Route::get('/videos/create', [VideoController::class, 'create'])->name('galleries.video.create');
        Route::post('/videos/store', [VideoController::class, 'store'])->name('galleries.video.store');
        Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('galleries.video.edit');
        Route::put('/videos/{id}/update', [VideoController::class, 'update'])->name('galleries.video.update');
        Route::delete('/videos/{id}/delete', [VideoController::class, 'delete'])->name('galleries.video.delete');
    });

    Route::get('/social-media/index', [SocialMediaController::class, 'index'])->name('social-media.index');
    Route::get('/social-media/create', [SocialMediaController::class, 'create'])->name('social-media.create');
    Route::post('/social-media/store', [SocialMediaController::class, 'store'])->name('social-media.store');
    Route::get('/social-media/{id}/edit', [SocialMediaController::class, 'edit'])->name('social-media.edit');
    Route::put('/social-media/{id}/update', [SocialMediaController::class, 'update'])->name('social-media.update');
    Route::delete('/social-media/{id}/delete', [SocialMediaController::class, 'delete'])->name('social-media.delete');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/memberships/index', [MembershipController::class, 'index'])->name('memberships.index');
    Route::get('/memberships/pending', [MembershipController::class, 'getPendingMembershipRequests'])->name('memberships.pending');
    Route::get('/memberships/accepted', [MembershipController::class, 'getAcceptedMembershipRequests'])->name('memberships.accepted');
    Route::get('/memberships/rejected', [MembershipController::class, 'getRejectedMembershipRequests'])->name('memberships.rejected');
    Route::get('/memberships/accpet/{membership}', [MembershipController::class, 'accpetMembership'])->name('memberships.accpet');
    Route::get('/memberships/reject/{membership}', [MembershipController::class, 'rejectMembership'])->name('memberships.reject');
    Route::get('/memberships/reply/{membership}', [MembershipController::class, 'replyMembership'])->name('memberships.reply');
    Route::post('/memberships/reply/{membership}', [MembershipController::class, 'sendrReplyMembership'])->name('membership.send.reply');
    Route::get('/memberships/send-membership-card/{membership}', [MembershipController::class, 'sendMembershipCard'])->name('memberships.send.membership_card');
    Route::get('/memberships/subscriptionRenewal/{membership}', [MembershipController::class, 'subscriptionRenewal'])->name('memberships.subscriptionRenewal');
    Route::get('/memberships/{membership}/edit', [MembershipController::class, 'edit'])->name('memberships.edit');
    Route::put('/memberships/{membership}/update', [MembershipController::class, 'update'])->name('memberships.update');
    Route::post('/memberships/export', [MembershipController::class, 'exportAcceptedMembership'])->name('memberships.export');


    Route::get('/memberships/{membership}/show-card', [MembershipController::class, 'showMembershipCard'])->name('memberships.show-membership-card');
});




Route::get('/lang', function () {
    if (app()->getLocale() == 'ar') {
        app()->setLocale('en');
    } else {
        app()->setLocale('ar');
    }
    return redirect()->back();
})->name('lang');


Route::get('/test', function () {
    app()->setLocale('ar');
    dd(app()->getLocale());
});



// Route::get('/reset-membership', function () {
//     $memberships = Membership::all();
//     $memberships->each(function ($membership) {
//         $membership->status = 'في الانتظار';
//         $membership->membership_no = null;
//         $membership->save();
//     });
// });
