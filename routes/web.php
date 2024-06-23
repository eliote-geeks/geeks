<?php



use App\Mail\TestMail;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Category;
use Illuminate\Support\Str as st;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Notifications\MailNotification;
use App\Http\Controllers\BlogController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SchooController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\AdministratorController;

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
// Auth::routes(['verify' => true]);

Route::get('mail-test',function(){
    Mail::to('pauleliote97@gmail.com')->send(new TestMail('hey busy','okau'));
    die('super');
});
Route::get('/public#',function(){
    return redirect()->back();
});

Route::post('token-verify/{id}',[TokenController::class,'tokenVerify'])->name('token-verify');

Route::get('/', function() {
    if(auth()->user() != null)
        return view('welcome');
    else
        return view('landing-course');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function(){    
    Route::get('courses/verify/{id}',[CourseController::class,'courseVerify'])->name('courses.verify');
    Route::resource('categories',CategoryController::class)->except('destroy');
    // Route::post('categories/edition/{id}',CategoryController::class,'modif')->name('modif');
    Route::get('cat/delete/{id}',[CategoryController::class,'catDelete'])->name('cat.delete');
    Route::get('categories/delete/{category}',[CategoryController::class,'delete'])->name('categories.delete');
    Route::get('categories/upgrade/{category}',[CategoryController::class,'upgrade'])->name('categories.upgrade');    
    Route::resource('courses',CourseController::class)->except(['destroy']);
    Route::get('admin-settings/geeks',[AdministratorController::class,'settings'])->name('admin.settings');
    Route::post('admin-settings/geeks',[AdministratorController::class,'saveSettings'])->name('admin.saveSettings');
    Route::get('course-register/{id}',[CourseController::class,'register'])->name('courses.register');
    Route::get('schools/admin/list',[AdministratorController::class,'adminlistschool'])->name('schools.adminlistschool');

    Route::get('browse/schools',[SchooController::class,'browseSchool'])->name('browseSchool');
    Route::get('course/active/{id}',[CourseController::class,'activeCourse'])->name('activeCourse');
    // Route::get('courses/show/{category}',[CategoryController::class,'show'])->name('Coursecategories.show');
    Route::get('admin/students',[StudentController::class,'students'])->name('students.students');
    Route::get('admin/instructors',[AdministratorController::class,'instructors'])->name('instructors.instructors');
    Route::get('admin/schools-instructor',[AdministratorController::class,'adminSchools'])->name('adminSchools');
    Route::get('instructor/quiz',[InstructorController::class,'instructorsQuiz'])->name('instructorsQuiz');
    Route::get('instructor/quiz/detail/{id}',[InstructorController::class,'quizDetail'])->name('quizDetail');
    Route::get('paul',[AdministratorController::class,'index'])->name('dashboard.index');
    Route::get('marked/{id}/',[CourseController::class,'enroll'])->name('courses.enroll');
    Route::get('admin/invoices',[AdministratorController::class,'orders'])->name('dashboard.orders');
    Route::get('payments/status/{id}',[AdministratorController::class,'status'])->name('payments.status');
    Route::get('payments/delete/{id}',[AdministratorController::class,'delete'])->name('payments.delete');
    Route::get('/plan/month/{id}',[SubscriptionController::class,'monthly'])->name('month');
    Route::get('/checkout',[SubscriptionController::class,'checkout'])->name('courses.checkout');
    Route::get('/status-sub',[SubscriptionController::class,'paymentStatus']);
    Route::get('dashboard/plans',[AdministratorController::class,'plans'])->name('dashboard.plans');
    Route::get('best/instructors',[AdministratorController::class,'customers'])->name('customers');
    Route::get('/payouts/{id}',[AdministratorController::class,'payouts'])->name('payouts');
    Route::post('/payout-form/{id}',[SubscriptionController::class,'form_payout'])->name('form.payouts');
    Route::get('invitations/friends',[StudentController::class,'invitation'])->name('friends.invitations');
    Route::get('/myFriends',[StudentController::class,'friends'])->name('students.friends');
    Route::get('/social/home',[StudentController::class,'socialMedia'])->name('social');
    Route::get('/send/email/{id}',[AdministratorController::class,'sendEmail'])->name('sendEmail');
    Route::post('/send/email/{id}',[AdministratorController::class,'sendEmailPost'])->name('sendEmailPost');
    Route::get('/mail',[StudentController::class,'mail'])->name('mail');
    Route::get('/send/mail',[StudentController::class,'sendMail'])->name('sendMail');
    Route::post('send/mail',[StudentController::class,'storeEMail'])->name('storeEmail');
    Route::get('mail/detail/{id}',[StudentController::class,'mailDetails'])->name('mailDetails');
    Route::get('mail/read/{id}',[StudentController::class,'readMail'])->name('readMail');
    Route::get('mail/delete/{id}',[StudentController::class,'deleteMail'])->name('deleteMail');
    Route::get('mail/spam/{id}',[StudentController::class,'spamEmail'])->name('spamEmail');
    Route::get('mail/archive/{id}',[StudentController::class,'archiveEmail'])->name('archiveEmail');
    Route::get('mail/star/{id}',[StudentController::class,'starEMail'])->name('starEmail');
    Route::get('mail/spams',[StudentController::class,'listEmailSpam'])->name('listEmailSpam');
    Route::get('mail/archives',[StudentController::class,'listEmailArchive'])->name('listEmailArchive');
    Route::get('mail/stars',[StudentController::class,'listEmailStar'])->name('listEmailStar');
    Route::get('myQuiz',[StudentController::class,'myQuiz'])->name('myQuiz');
    Route::get('quiz/start/{id} ',[StudentController::class,'quizDetailStudent'])->name('quizDetailStudent');
    Route::get('/contact',[StudentController::class,'contact'])->name('contact');
    Route::post('/contact',[StudentController::class,'form'])->name('form');
});
Route::get('subscription',[SubscriptionController::class,'subscription'])->name('courses.subscription');

// Auth Socialist Github
Route::get('auth/github', [LoginController::class, 'redirectToGithub']);
Route::get('auth/github/callback', [LoginController::class, 'handleGithubCallback']);

//  Route::get('notice',function(){
//     // dd('d');
//  })->name('verification.notice');

// Auth socialist google
Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);



//Auth socialist facebook
Route::get('auth/facebook', [LoginController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [LoginController::class, 'handleFacebookCallback']);
 


//Auth socialist twitter
Route::get('auth/twitter', [LoginController::class, 'redirectToTwitter']);
Route::get('auth/facebook/callback', [LoginController::class, 'handleTwitterCallback']);

//Botman
// Route::match(['get', 'post'], '/botman',[ BotManController::class,'handle']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::user()->user_type=='App\Models\Instructor')
            return view('instructor.dashboard');
        return view('dashboard');
    })->name('dashboard');
    Route::resource('students',StudentController::class)->except(['destroy','update']);
    Route::post('profile/update',[StudentController::class,'update'])->name('students.update');
    // Route::get('profile/edit',[StudentController::class,'edit'])->name('students.edit');
    Route::get('notifications',[StudentController::class,'notifications'])->name('notifications');
    Route::get('notifications/delete/{id}',[StudentController::class,'deletNotif'])->name('deletNotif');
    Route::get('notifications/deleted/all',[StudentController::class,'deleteAllNotif'])->name('deleteAllNotif');
    Route::get('profile/security',[StudentController::class,'security'])->name('students.security');
    Route::get('profile/Deleting',[StudentController::class,'deleted'])->name('students.deleted');
    Route::get('profile/social-profile',[StudentController::class,'social'])->name('students.social');
    // Route::get('profile-edit',[StudentController::class,'update'])->name('profile-edit');
    Route::get('courses/subscribe/{id}',[CourseController::class,'subscribe'])->name('courses.subscribe');
    Route::post('/courses/subscribe/{id}', [PayPalController::class, 'payWithpaypal'])->name('paypal');
    Route::get('profile/invoice',[StudentController::class,'invoice'])->name('students.invoice');
    Route::get('profile/payment-method',[StudentController::class,'payment'])->name('students.payment');
    Route::get('profile/my-subscription',[StudentController::class,'subscription'])->name('students.subscription');        
    Route::get('profile/linked-account',[StudentController::class,'linked'])->name('students.linked');    
    Route::get('profile/instructor/{id}',[InstructorController::class,'profile'])->name('instructor.profile');
    Route::get('profile/student/{id}',[StudentController::class,'profile'])->name('student.profile');
    Route::get('instructor/orders',[InstructorController::class,'orders'])->name('instructors.orders');
    // route for check status of the payment
    Route::get('/status', [PayPalController::class, 'getPaymentStatus'])->name('status');
    Route::get('/lesson/{id}',[CourseController::class,'lecture'])->name('lessons.lecture');
    Route::get('course/preview/{id}',[CourseController::class,'preview'])->name('courses.preview');
    Route::get('course-category/{id}',[CourseController::class,'categoryCourse'])->name('courses.category');
    Route::get('instructor/courses',[InstructorController::class,'courses'])->name('instructors.courses');
    Route::get('delete/course/{id}',[CourseController::class,'destroy'])->name('courses.destroy');
    Route::get('instructor-reviews',[InstructorController::class,'reviews'])->name('instructors.reviews');
    Route::get('instructor/students',[InstructorController::class,'students'])->name('instructors.students');
    Route::get('course-resume/{id}',[CourseController::class,'resume'])->name('courses.resume');
    Route::get('quiz-result/{id}',[InstructorController::class,'resultQuiz'])->name('resultQuiz');    
    Route::get('courses-students/{id}',[InstructorController::class,'studentsCourses'])->name('studentsCourses');
    Route::get('invitations',[InstructorController::class,'invitation'])->name('instructors.invitation');
    Route::get('/frequently/questions',[AdministratorController::class,'freqQuestions'])->name('admin.freqQuestions');
    Route::post('/frequently/questions',[AdministratorController::class,'freqQuestionsStore'])->name('admin.freqQuestionsStore');
    Route::get('/frequently/questions/delete/{id}',[AdministratorController::class,'frequentlyQuestionDelete'])->name('frequentlyQuestion.delete');
    Route::get('trash',[AdministratorController::class,'trash'])->name('trash');
    Route::get('quiz-attemp-result',[StudentController::class,'quizResult'])->name('quizResult');
    Route::get('quiz/restart/{id}',[StudentController::class,'restartQuiz'])->name('restartQuiz');
});
Route::post('instructor-learn',[InstructorController::class,'store'])->name('instructor.store');
Route::get('instructor-register',[InstructorController::class,'register'])->name('instructor.register');
Route::get('course-filter-list',[CourseController::class,'filter'])->name('courses.filter');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function(){
    Route::get('create/school',[SchooController::class,'create'])->name('school.create');
    Route::get('school-show/{id}',[SchooController::class,'show'])->name('schools.show');
    Route::get('school/reviews/{id}',[SchooController::class,'reviews'])->name('schools.reviews');
    Route::post('school/reviews/{id}',[SchooController::class,'comments'])->name('reviews.create');
    Route::get('school/reviews/delete/{id}',[SchooController::class,'deleteComment'])->name('deleteComment');
    Route::get('/school/office/{id}',[SchooController::class,'photo'])->name('schools.photo');
    Route::post('photo/store/{id}',[SchooController::class,'photo_store'])->name('photo.store');
    Route::get('create/class/{id}',[SchooController::class,'create_class'])->name('class.create');
    Route::get('class/show/{id}',[SchooController::class,'class_show'])->name('class.show');
    Route::get('class/list/{id}',[SchooController::class,'list_class'])->name('class.list');
    Route::get('/courses/pending/{id}',[SchooController::class,'pending'])->name('class.pending');
    Route::get('/invite/instructor/{id}',[SchooController::class,'inviteToClass'])->name('inviteToClass');
    Route::get('class/destroy/{id}',[SchooController::class,'destroyClass'])->name('class.destroyClass');
    Route::get('delete/photo/{id}',[SchooController::class,'deletePhoto'])->name('deletePhoto');
    Route::get('school/instructor/{id}',[SchooController::class,'instructors'])->name('schools.instructors');
    Route::get('camtesia',[InstructorController::class,'camtesia'])->name('camtesia');
    Route::get('search',[StudentController::class,'search'])->name('every');
    Route::get('social/groups',[StudentController::class,'social_group'])->name('social.groups');
    // admin

    Route::get('admin-schools',[SchooController::class,'adminShowSchools'])->name('admin.schools');
    Route::get('admin-orders',[SchooController::class,'adminOrdersSchool'])->name('adminOrdersSchool');
    Route::get('admin-instructors',[SchooController::class,'adminInstructors'])->name('adminInstructors');
    Route::get('admin-students',[SchooController::class,'adminStudents'])->name('adminStudents');



    //POST

    Route::get('blog',[BlogController::class,'index'])->name('blog');
Route::get('new/post',[BlogController::class,'newPost'])->name('newPost');
});
Route::get('pay',[SubscriptionController::class,'instructorPayout'])->name('pay');
// PAYPAL
// Route::get('/paypal',function(){
//    // return view('courses.course-paypal');
//    return view('myOrder');
// });

// route for processing payment


//blog

