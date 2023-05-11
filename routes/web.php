<?php

use App\Models\PlayerAttribute;
use App\Http\Controllers\Followers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\privacyController;
use App\Http\Controllers\PlayerCvController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MarketApplyController;
use App\Http\Controllers\PostShareInSocialMedia;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\VerificationsController;
use App\Http\Controllers\VerifyAccountController;
use App\Http\Controllers\admin\LanguageController;
use App\Http\Controllers\MailPreferenceController;
use App\Http\Controllers\SharePostCountController;
use App\Http\Controllers\Network\MyNetworkController;
use App\Http\Controllers\backend\agent\AgentController;
use App\Http\Controllers\backend\player\PlayerController;
use Symfony\Contracts\Service\Attribute\SubscribedService;
use App\Http\Controllers\backend\agent\club\ClubController;
use App\Http\Controllers\frontend\PlayerFrontendController;
use App\Http\Controllers\backend\player\FavouriteController;
use App\Http\Controllers\backend\agent\coach\CoachController;
use App\Http\Controllers\backend\agent\scout\ScoutController;
use App\Http\Controllers\backend\player\PlayerInfoController;
use App\Http\Controllers\backend\agent\academy\AcademyController;
use App\Http\Controllers\backend\agent\TransferHistoryController;
use App\Http\Controllers\backend\agent\AgentAchievementController;
use App\Http\Controllers\backend\agent\PlayersPortfolioController;
use App\Http\Controllers\backend\player\PlayerAttributeController;
use App\Http\Controllers\backend\player\PlayerNextMatchController;
use App\Http\Controllers\backend\agent\market\MarkcometClubController;
use App\Http\Controllers\backend\agent\market\MarketTrialController;
use App\Http\Controllers\backend\agent\market\MarketCampusController;
use App\Http\Controllers\backend\player\PlayerAchievementsController;
use App\Http\Controllers\backend\agent\market\MarketAcademyController;
use App\Http\Controllers\backend\player\PlayerCareerMatchDataController;
use App\Http\Controllers\backend\player\PlayerTransferHistoryController;
use App\Http\Controllers\backend\agent\intermediary\IntermediaryController;
use App\Http\Controllers\backend\agent\market\MarketRequestPlayerController;
use App\Http\Controllers\LanguageController as ControllersLanguageController;
use App\Http\Controllers\backend\agent\market\MarketRecommendPlayerController;
use App\Http\Controllers\backend\agent\market\MarketPartnershipRequestController;
use App\Http\Controllers\backend\player\ActivityController;

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


// Route::post('privacy-setting/{id}',[HomeController::class,'security'])->name('security');
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/verify/{token}', [MyNetworkController::class, 'verify'])->name('verifiddmail');

Route::get('/{invite?}/invite', function () {
    return view('welcome');
})->name('invitehome');

Route::controller(HomeController::class)->group(function () {
    Route::get('/about',  'aboutUs')->name('about-us');
    Route::get('/terms',  'terms')->name('terms');
    Route::get('/help', 'help')->name('help');
    Route::get('/privacy-policy', 'privacyPolicy')->name('privacy-policy');
    Route::get('/feedback',  'feedback')->name('feedback');
    Route::get('/press', 'press')->name('press');
    Route::get('/faqs',  'faqs')->name('faqs');
    Route::get('/pricing',  'pricing')->name('pricing');
    Route::get('/contact-us', 'contactUs')->name('contact-us');
    Route::post('/contact-us',  'contactUsPost')->name('contact-us-post');
    Route::get('/agents', 'agents')->name('agents');
    Route::get('/agent/{type}/{id}/profile',  "viewProfile")->name("agent.view-profile");
    Route::get('/market',  'market')->name('market');
    Route::get('/market/{slug}/detail/{id}',  'marketDetail')->name('view-market-detail');
    Route::get('/blog',  'blog')->name('blog');
    Route::get('/blog-detail/view/{id}',  'blogDetails')->name('blog-detail');
    Route::get('/agents/profile', 'agentsProfile');
    Route::get('/players/profile', 'playersProfile');
    Route::get('invites/create',  'invite')->name('invite');
    Route::post('invite/friend/{id}',  'invited')->name('invitation_code_send');
    Route::get('/guardian-approval/{id}',  "guardianApproval")->name("guardian-approval");
    Route::post('/guardian.approve',  "guardianApprove")->name("guardian.approve");
    Route::post('/mailpref',  'mailpref')->name('mailpref');
});

                                            
Route::post("/register", [RegisterController::class, 'register'])->name('register');
Route::post("/favData", [FavouriteController::class, 'favData'])->name('favData');
Route::get("/unfavourite/{id}", [FavouriteController::class, 'RemoveFromFavourite'])->name('unfavourite')->middleware('auth');
Route::get("/removefollow/{id}", [FavouriteController::class, 'RemoveFromFollower'])->name('removefollower')->middleware('auth');
Route::get('/favorite', [FavouriteController::class, 'favorite'])->name('favorite')->middleware('auth');


/*******************  Player Frontend***************************************/
Route::controller(PlayerFrontendController::class)->group(function () {
    Route::get('/players', 'index')->name('players');
    Route::get('/players/{id}/profile',  'show')->name('player-profile-detail');
    Route::post('/imageUpload/{id}', 'imageUpload')->name('imageUpload');
});


/*******************   Guest controller route ***************************************/
Route::middleware('auth')->group(function () {
    Route::controller(GuestController::class)->group(function () {
        Route::get('download-cv/{id}', "downloadCv")->name("download-cv");
        Route::get('report/{id}', "report")->name("report");
        Route::post('submit-report', "submitReport")->name("submit-report");
        Route::get('block/{id}', "block")->name("block");
        Route::get('unblock/{id}', "unblock")->name("unblock");
        Route::get('blockMsg/{id}', "blockMsg")->name("blockMsg");
        Route::get('unblockMsg/{id}', "unblockMsg")->name("unblockMsg");
        Route::get('follow/{id}', "follow")->name("follow");
        Route::get('unfollow/{id}', "unfollow")->name("unfollow");
        Route::get('newsletter-notification',function()
        {
           return redirect()->back()->with('success', 'Thank you for subscribing! You will receive updates and news about our blogs .');
        })->name('newsletter');
    });
});


/*******************  Blog  Routes ***************************************/
Route::group(
    ['middleware' => ['type:admin,player,scout,club,coach,intermediary,academy', 'auth', 'PreventBackHistory']],
    function () {
        Route::controller(BlogController::class)->group(function () {
            Route::get('{type}/all-blogs', 'index')->name('all-blogs');
            Route::get('{type}/create-blog', 'create')->name('create-blog');
            Route::post('{type}/store-blog', 'store')->name('store-blog');
            Route::get('{type}/edit-blog/{id}', 'edit')->name('edit-blog');
            Route::post('update-blog', 'update')->name('update-blog');
            Route::get('delete-blog/{id}', 'destroy')->name('delete-blog');
        });
        Route::get('activity', [ActivityController::class, 'activity'])->name('activity');
        Route::get('cancel-subscription/{name}', [SubscriptionController::class, 'cancelSubscription'])
            ->name('cancel-subscription');
        Route::get('paywithpaypal/{plan_id?}', [PaypalController::class, 'payWithPaypal'])->name('paywithpaypal');
    }
);

/*******************  scout,club,coach,intermediary,academy' Routes***************************************/
Route::group(
    ['prefix' => 'agent', 'middleware' => ['type:scout,club,coach,intermediary,academy', 'auth', 'PreventBackHistory']],
    function () {
        Route::post('privacy-setting/{id}',[HomeController::class,'security'])->name('agent-privacy-set');
        Route::post('password-change', [HomeController::class,'changepas'])->name('agent.password.change');
        Route::controller(AgentController::class)->group(function () {
            Route::get('agent-setting','agentsetting')->name('agent.setting');
            Route::get('my-network',  'myNetwork')->name('agent.my-network');
            Route::get('notifications',  'notifications')->name('agent.notifications');
            Route::get('market-posts',  'marketPosts')->name('agent.market-posts');
            Route::get('my-connections',  'myConnections')->name('agent.my-connections');
            Route::get('activity',  'activity')->name('agent.activity');
            // Edit-profile
            Route::post('/personal-info-save',  "personalInfoSave")->name('agent.personal-info-save');
            Route::post('/basic-info-save',  "basicInfoSave")->name('agent.basic-info-save');
            Route::post('/contact-info-save',  "contactInfoSave")->name('agent.contact-info-save');
            Route::post('/profile-img-save',  "profileImgSave")->name('agent.profile-img-save');
            Route::post('/cover-img-save',  "coverImgSave")->name('agent.cover-img-save');
            Route::get('my-network',  'myNetwork')->name('agent.my-network');
            Route::get('notifications',  'notifications')->name('agent.notifications');
            Route::get('market-posts',  'marketPosts')->name('agent.market-posts');
            Route::get('my-connections',  'myConnections')->name('agent.my-connections');
            Route::get('activity',  'activity')->name('agent.activity');
            // Edit-profile
            Route::post('/personal-info-save',  "personalInfoSave")->name('agent.personal-info-save');
            Route::post('/basic-info-save',  "basicInfoSave")->name('agent.basic-info-save');
            Route::post('/contact-info-save',  "contactInfoSave")->name('agent.contact-info-save');
            Route::post('/profile-img-save',  "profileImgSave")->name('agent.profile-img-save');
            Route::post('/cover-img-save',  "coverImgSave")->name('agent.cover-img-save');
        });


        Route::controller(AgentAchievementController::class)->group(function () {
            Route::get('/achievement/create', 'create')->name('agent.achievement-create');
            Route::post('/achievement/store', 'store')->name('agent.achievement-store');
            Route::get('/achievement/{id}/edit', 'edit')->name('agent.achievement-edit');
            Route::post('/achievement/update', 'update')->name('agent.achievement-update');
            Route::delete('/achievement/{id}/delete', 'destroy')->name('agent.achievement-delete');
        });

        // Market Post Campus
        Route::controller(MarketCampusController::class)->group(function () {
            Route::get('camps/all-market-posts', 'index')->name('campus.market-post-campus');
            Route::get('camps/market-post-create', 'create')->name('campus.market-post-create');
            Route::post('camps/market-post-store', 'store')->name('campus.market-post-store');
            Route::get('camps/market-post-edit/{id}', 'edit')->name('campus.market-post-edit');
            Route::post('camps/market-post-update', 'update')->name('campus.market-post-update');
            Route::get('camps/market-post-delete/{id}', 'destroy')->name('campus.market-post-delete');
        });

        // Market Post Partnership Request
        Route::controller(MarketCampusController::class)->group(function () {
            Route::get('partnership-request/all-market-posts', 'index')->name('partnership-request.market-post-partnership-request');
            Route::get('partnership-request/market-post-create', 'create')->name('partnership-request.market-post-create');
            Route::post('partnership-request/market-post-store', 'store')->name('partnership-request.market-post-store');
            Route::get('partnership-request/market-post-edit/{id}', 'edit')->name('partnership-request.market-post-edit');
            Route::post('partnership-request/market-post-update', 'update')->name('partnership-request.market-post-update');
            Route::get('partnership-request/market-post-delete/{id}', 'destroy')->name('partnership-request.market-post-delete');
        });

        // Market Post Recomment Player
        Route::controller(MarketRecommendPlayerController::class)->group(function () {
            Route::get('recommend-player/all-market-posts', 'index')->name('recommend-player.market-post-recommend-player');
            Route::get('recommend-player/market-post-create', 'create')->name('recommend-player.market-post-create');
            Route::post('recommend-player/market-post-store', 'store')->name('recommend-player.market-post-store');
            Route::get('recommend-player/market-post-edit/{id}', 'edit')->name('recommend-player.market-post-edit');
            Route::post('recommend-player/market-post-update', 'update')->name('recommend-player.market-post-update');
            Route::get('recommend-player/market-post-delete/{id}', 'destroy')->name('recommend-player.market-post-delete');
        });

        // Market Post Request Playerf
        Route::controller(MarketRequestPlayerController::class)->group(function () {
            Route::get('request-player/all-market-posts', 'index')->name('request-player.market-post-request-player');
            Route::get('request-player/market-post-create', 'create')->name('request-player.market-post-create');
            Route::post('request-player/market-post-store', 'store')->name('request-player.market-post-store');
            Route::get('request-player/market-post-edit/{id}', 'edit')->name('request-player.market-post-edit');
            Route::post('request-player/market-post-update', 'update')->name('request-player.market-post-update');
            Route::get('request-player/market-post-delete/{id}', 'destroy')->name('request-player.market-post-delete');
        });

        // Market Post Trial
        Route::controller(MarketTrialController::class)->group(function () {
            Route::get('trial/all-market-posts',  'index')->name('trial.market-post-trial');
            Route::get('trial/market-post-create',  'create')->name('trial.market-post-create');
            Route::post('trial/market-post-store',  'store')->name('trial.market-post-store');
            Route::get('trial/market-post-edit/{id}',  'edit')->name('trial.market-post-edit');
            Route::post('trial/market-post-update',  'update')->name('trial.market-post-update');
            Route::get('trial/market-post-delete/{id}',  'destroy')->name('trial.market-post-delete');
        });


        // Players Portfolio
        Route::controller(PlayersPortfolioController::class)->group(function () {
            Route::get('players-portfolio/create', 'create')->name('players-portfolio.create');
            Route::post('players-portfolio/store', 'store')->name('players-portfolio.store');
            Route::get('players-portfolio/edit/{id}', 'edit')->name('players-portfolio.edit');
            Route::post('players-portfolio/update', 'update')->name('players-portfolio.update');
            Route::get('players-portfolio/delete/{id}', 'destroy')->name('players-portfolio.delete');
        });

        // Transfer History
        Route::controller(TransferHistoryController::class)->group(function () {
            Route::get('agent-transfer-history/create', 'create')->name('agent-transfer-history.create');
            Route::post('agent-transfer-history/store', 'store')->name('agent-transfer-history.store');
            Route::get('agent-transfer-history/edit/{id}', 'edit')->name('agent-transfer-history.edit');
            Route::post('agent-transfer-history/update', 'update')->name('agent-transfer-history.update');
            Route::get('agent-transfer-history/delete/{id}', 'destroy')->name('agent-transfer-history.delete');
        });
    }
);


/*******************  Player Dashboard Backend***************************************/
//
Route::group(['prefix' => 'player', 'middleware' => ['type:player', 'auth', 'PreventBackHistory', 'agelimit']], function () {
    Route::controller(PlayerController::class)->group(function () {
        Route::get('dashboard', 'index')->name('player.dashboard');
        Route::post('/upload-documents', 'ageLimit')->name('backend.underage');
        Route::get('profile', 'profile')->name('player.profile');
        Route::get('my-network', 'myNetwork')->name('player.my-network');
        Route::get('notifications', 'notifications')->name('player.notifications');
        Route::get('activity', 'activity')->name('player.activity');
        Route::post('notification', 'mailnotificationsetting');
    });

    Route::controller(HomeController::class)->group(function () {
        Route::post('changePassword', 'changepas')->name('changepas');
        Route::get('playersetting', 'playerset')->name('playersetting');
        Route::post('security/{id}', 'security')->name('security');
        // Route::get('reports',  "reports")->name("player.reports");
    });

    Route::controller(PlayerInfoController::class)->group(function () {
        Route::post('/personal-info/save', "personalInfoSave");
        Route::post('/basic-info/save', "basicInfoSave");
        Route::post('/career-info/save', "careerInfoSave");
        Route::post('/cover-img/save', "coverImgSave");
        Route::post('/profile-img/save', "profileImgSave");
        Route::post('/media-videos/save', "mediaVideosSave");
        Route::post('/media-images/save', "mediaImagesSave");
    });

    Route::controller(PlayerAchievementsController::class)->group(function () {
        Route::get('/achievement/create', 'create')->name('player.achievement-create');
        Route::post('/achievement/store', 'store')->name('player.achievement-store');
        Route::get('/achievement/{id}/edit', 'edit')->name('player.achievement-edit');
        Route::post('/achievement/update', 'update')->name('player.achievement-update');
        Route::get('/achievement/{id}/delete', 'destroy')->name('player.achievement-delete');
    });

    Route::resource('/career-match-data', PlayerCareerMatchDataController::class);
    Route::resource('/transfer-history', PlayerTransferHistoryController::class);
    Route::resource('/next-match-schedule', PlayerNextMatchController::class);
    Route::post('/attributes/save', [PlayerAttributeController::class, "attributesSave"]);
    Route::post('market-apply', [MarketApplyController::class, 'store'])->name('player.market-apply');
    Route::get('/subscriptions', [SubscriptionController::class, 'subscriptionDetails'])->name('player.subscriptions');
    Route::post('/savecard-details', [SubscriptionController::class, 'saveDetails'])->name('usercard');
});


/*******************  Scout Dashboard Backend ***************************************/
Route::group(['prefix' => 'agent/scout', 'middleware' => ['type:scout', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [AgentController::class, 'index'])->name('scout.dashboard');
    Route::get('messages',[AgentController::class, 'messages'])->name('scout.messages');
    Route::get('profile', [ScoutController::class, 'profile'])->name('scout.profile');
    Route::get('/subscriptions', [SubscriptionController::class, 'subscriptionDetails'])
        ->name('scout.subscriptions');
});


/*******************  Club Dashboard Backend ***************************************/
Route::group(['prefix' => 'agent/club', 'middleware' => ['type:club', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [AgentController::class, 'index'])->name('club.dashboard');
    Route::get('messages',[AgentController::class, 'messages'])->name('club.messages');
    Route::get('profile', [ClubController::class, 'profile'])->name('club.profile');

    Route::controller(MarketClubController::class)->group(function () {
        Route::get('all-market-posts', 'index')->name('club.market-post-club');
        Route::get('market-post-create', 'create')->name('club.market-post-create');
        Route::post('market-post-store', 'store')->name('club.market-post-store');
        Route::get('market-post-edit/{id}', 'edit')->name('club.market-post-edit');
        Route::post('market-post-update', 'update')->name('club.market-post-update');
        Route::get('market-post-delete/{id}', 'destroy')->name('club.market-post-delete');
    });

    Route::get('/subscriptions', [SubscriptionController::class, 'subscriptionDetails'])
        ->name('club.subscriptions');
});


/*******************  Coach Dashboard Backend ***************************************/
Route::group(['prefix' => 'agent/coach', 'middleware' => ['type:coach', 'auth', 'PreventBackHistory']], function () {

    Route::get('dashboard', [AgentController::class, 'index'])->name('coach.dashboard');
    Route::get('messages',[AgentController::class, 'messages'])->name('coach.messages');
    Route::get('profile', [CoachController::class, 'profile'])->name('coach.profile');
    Route::get('/subscriptions', [SubscriptionController::class, 'subscriptionDetails'])
        ->name('coach.subscriptions');
});

/*******************  Intermediary Dashboard Backend ***************************************/
Route::group(['prefix' => 'agent/intermediary', 'middleware' => ['type:intermediary', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [AgentController::class, 'index'])->name('intermediary.dashboard');
    Route::get('messages',[AgentController::class, 'messages'])->name('intermediary.messages');
    Route::get('profile', [IntermediaryController::class, 'profile'])->name('intermediary.profile');
    Route::get('/subscriptions', [SubscriptionController::class, 'subscriptionDetails'])
        ->name('intermediary.subscriptions');
});


/*******************  Academy Dashboard Backend ***************************************/
Route::group(['prefix' => 'agent/academy', 'middleware' => ['type:academy', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [AgentController::class, 'index'])->name('academy.dashboard');
    Route::get('messages',[AgentController::class, 'messages'])->name('academy.messages');
    Route::get('profile', [AcademyController::class, 'profile'])->name('academy.profile');

    Route::controller(MarketAcademyController::class)->group(function () {
        Route::get('all-market-posts', 'index')->name('academy.market-post-academy');
        Route::get('market-post-create', 'create')->name('academy.market-post-create');
        Route::post('market-post-store', 'store')->name('academy.market-post-store');
        Route::get('market-post-edit/{id}', 'edit')->name('academy.market-post-edit');
        Route::post('market-post-update', 'update')->name('academy.market-post-update');
        Route::get('market-post-delete/{id}', 'destroy')->name('academy.market-post-delete');
    });

    Route::get('/subscriptions', [SubscriptionController::class, 'subscriptionDetails'])
        ->name('academy.subscriptions');
});



/*******************  Admin ***************************************/
Route::group(['prefix' => 'admin', 'middleware' => ['type:admin', 'auth', 'PreventBackHistory']], function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard',  'index')->name('admin.dashboard');
        Route::get('profile',  'profile')->name('admin.profile');
        Route::get('accept-blog/{id}',  "acceptBlog")->name("admin.accept-blog");
        Route::get('reject-blog/{id}',  "rejectBlog")->name("admin.reject-blog");
        Route::get('reports',  "reports")->name("admin.reports");
        Route::get('accept-report/{id}',  "acceptReport")->name("admin.accept-report");
        Route::get('reject-report/{id}',  "rejectReport")->name("admin.reject-report");
        Route::get('feature',  "add_feature")->name("admin.feature");
        Route::post('feature/{id}',  "update_feature");

        Route::get('/helpquestion', 'viewhelpquestion');
        Route::post('helpquestion/store/{id?}', 'helpqes');
        Route::delete('helpquestion/delete/{id}', 'helpquestiondelete')->name('HelpDelete');
        
    });


    Route::controller(VerifyAccountController::class)->group(function () {
        Route::get('verifications', 'show')->name('admin.verifications');
        Route::get('verify', 'show')->name('admin.verified');
        Route::get('underage', 'underage')->name('admin.underage');
        Route::post('save-accverification', 'verificationText');
        Route::get('delete-verification/{id}', 'delete');
    });
    Route::get('adminsetting', [HomeController::class, 'adminset'])->name('adminsetting');
    Route::post('changeadminPassword', [HomeController::class, 'adminpas'])->name('adminpas');
    Route::post('adminsecurity/{id}', [HomeController::class, 'adminsecurity']);


    Route::controller(FaqController::class)->group(function () {
        Route::get('showfaqs', 'showfaqs')->name('admin.showfaqs');
        Route::get('faqform', 'faqform')->name('admin.faqform');
        Route::post('addfaqs', 'addfaqs')->name('admin.addfaqs');
        Route::get('editfaqs/{id}', 'editfaqs')->name('admin.editfaqs');
        Route::post('updatefaqs/{id}', 'updatefaqs');
        Route::get('deletefaqs/{id}', 'deletefaqs')->name('admin.deletefaqs');
    });


    Route::controller(PricingController::class)->group(function () {
        Route::get('/showpricing', 'showpricing')->name('admin.showpricing');
        Route::get('/pricingform', 'pricingform')->name('admin.pricingform');
        Route::post('/addpricing', 'addpricing')->name('admin.addpricing');
        Route::get('/editpricing/{id}', 'editpricing')->name('admin.editpricing');
        Route::post('/updatepricing/{id}', 'updatepricing');
        Route::get('/deletepricing/{id}', 'deletepricing')->name('admin.deletepricing');
    });

    Route::controller(privacyController::class)->group(function () {
        Route::get('privacy', 'editPrivacy')->name('editPrivacy');
        Route::post('edit/privacy', 'updatePrivacy')->name('updatePrivacy');
        Route::get('conditions', 'editTerms')->name('editTerms');
        Route::post('edit/terms', 'updateTerms')->name('updateTerms');
        Route::get('aboutus', 'editAbout')->name('editAbout');
        Route::post('edit/about', 'updateAbout')->name('updateAbout');
    });


    Route::controller(CountryController::class)->group(function () {
        Route::get('/countries',  "index")->name("countries.index");
        Route::post('/countries',  "store")->name("countries.store");
        Route::get('/countries/{id}/edit',  "edit")->name("countries.edit");
        Route::post('/countries/{id}',  "update")->name("countries.update");
        Route::get('/countries/{id}/delete',  "destroy")->name("countries.destroy");
    });

    Route::controller(CityController::class)->group(function () {
        Route::get('/cities', "index")->name("cities.index");
        Route::post('/cities', "store")->name("cities.store");
        Route::get('/cities/{id}/edit', "edit")->name("cities.edit");
        Route::post('/cities/{id}', "update")->name("cities.update");
        Route::get('/cities/{id}/delete', "destroy")->name("cities.destroy");
        Route::get('/cities/ajax/{id}', "ajaxGetCities")->name("cities.ajax");
    });

    Route::controller(LanguageController::class)->group(function () {
        Route::get('/languages', "index")->name("languages.index");
        Route::post('/languages', "store")->name("languages.store");
        Route::get('/languages/{id}/edit', "edit")->name("languages.edit");
        Route::post('/languages/{id}', "update")->name("languages.update");
        Route::get('/languages/{id}/delete', "destroy")->name("languages.destroy");
    });
});


Route::get('messages/{rec_id}', [PlayerController::class, 'messages'])->name('player.messages');
Route::get('messages/', [PlayerController::class, 'messagess'])->name('player.messages');

Route::controller(MessageController::class)->group(function () {
    Route::post('sentmessage', 'sent_message');
    Route::get('read_message/{id}', 'read_message');
    Route::get('unread_message/{id}', 'unread_message');
    Route::get('/starred_message/{id}', 'star_message');
    Route::get('/unstarred_message/{id}', 'unstar_message');
    Route::get('/delete_sent/{id}', 'delete_at_sender');
    Route::get('/delete_receive/{id}', 'delete_at_rec');
});


//Verification Route
Route::controller(VerifyAccountController::class)->group(function () {
    Route::get('verify_acc_page', 'index')->name('verify-account');
    Route::post('verify_acc_page', 'store')->name('cnic_image');
    Route::get('verified/{id}', 'verifyImage');
    Route::get('verifyAge/{id}', 'verifyAge');
});

Route::get('player/upload-documents', [\App\Http\Controllers\ageLimitController::class, 'index'])->name('backend.underage');
Route::post('player/upload-documents', [\App\Http\Controllers\ageLimitController::class, 'store'])->name('backend.underage-post');


Route::controller(LoginController::class)->group(function () {
    Route::get('login/google', 'redirectToGoogle')->name('login.google');
    Route::get('login/google/callback', 'handleGoogleCallback');
    Route::get('login/facebook', 'redirectToFaceook')->name('login.facebook');
    Route::get('login/facebook/callback', 'handleFacebookCallback');
    Route::get('login/github', 'redirectToGithub')->name('login.github');
    Route::get('login/github/callback', 'handleGithubCallback');
    Route::get('login/linkedin', 'redirectToLinkedin')->name('login.linkedin');
    Route::get('login/linkedin/callback', 'handleLinkedinCallback');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/logout', 'logout')->name('logout');
});


Route::controller(SubscriptionController::class)->group(function () {
    Route::post('subscribe', 'show');
    Route::get('subscribe', 'notshow');
    Route::Post('sub/store', 'store');
    Route::get('edit/{id}', 'edit');
    Route::put('update/{id}', 'update');
    Route::get('delete/{id}', 'delete');
});

Route::post('mailpreferences', [MailPreferenceController::class, 'index']);
// Route::get('/', [HomeController::class, 'index'])->name('index')->middleware('agelimit');
Route::get('/players-portfolio', [PlayersPortfolioController::class, "fetchDetails"])
    ->name('players-portfolio.fetch');
Route::get('subscription/create/{plan_id?}/{duration_id?}', [SubscriptionController::class, 'index'])
    ->name('subscription.create')->middleware(['auth', 'payingCustomer']);
Route::post('create-subscription/{price?}/{duration?}', [SubscriptionController::class, 'createSubscription'])
    ->name('create-subscription')->middleware(['auth', 'payingCustomer']);
Route::get('change-language/{lang}', [ControllersLanguageController::class, 'changeLanguage'])
    ->name('change-language');

Auth::routes([
    "verify" => true
]);


Route::post('/preference/{id}', [HomeController::class, 'mail_prefrences_notification'])->name('mailpreference');
Route::post('/additionOption/{id}', [HomeController::class, 'additionalPrefrences']);
Route::get("social-media-share/{id}", [PostShareInSocialMedia::class, 'index']);
Route::get("shareCount/{id}/{slug}", [SharePostCountController::class, 'shareonsocialmedia'])->name('SharePost');


Route::get('/firsthome', function () {
    return view('home');
});
Route::get('/mailverify', function () {
    return view('emails.verificationmail');
});
Route::get('/networks', [MyNetworkController::class, 'index']);



Route::get('invit_mail/mail', function () {
    return  view('emails.invitation_mail');
});
