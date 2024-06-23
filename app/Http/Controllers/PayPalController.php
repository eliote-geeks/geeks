<?php

//use Exception;
namespace App\Http\Controllers;

use App\Models\ClassCourse;
use App\Models\ClassSchool;
use App\Models\User;
use App\Models\Order;
use App\Models\Course;
//use PayPal\Rest\ApiContext;

use App\Models\YahooMail;
use App\Models\Subscription;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use Illuminate\Support\Facades\URL;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Input;
    use PayPal\Api\Amount;
    use PayPal\Api\Details;
    use PayPal\Api\Item;

    /** All Paypal Details class **/
    use PayPal\Api\ItemList;
    use PayPal\Api\Payer;
    use PayPal\Api\Payment;
    use PayPal\Api\PaymentExecution;
//    use PayPal\Api\RedirectUrls;
    use PayPal\Api\Transaction;
  //  use PayPal\Auth\OAuthTokenCredential;
    use PayPal\Rest\ApiContext;
  //  use Redirect;
    //use Session;
    //use URL;
    //use Notification;


    class PayPalController extends Controller
{
    public $course= '' ;
    public $category = 1;
    public $id = 1;
    public $somme = 1;

    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }
    public function index()
    {
        return view('paywithpaypal');
    }
    public function payWithpaypal(Request $request,$id)
    {
        try{
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName($request->title) /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')) /** unit price **/
            ->setTax($request->get('amount'));  /** Tax */
            

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('You want to pay: '.$request->title);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        } catch(Exception $e)
        {
           $request->session()->put('error', $e);
        }
         
        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                $request->session()->put('error', 'Connection timeout');
                return Redirect::to('/');

            } else {

                $request->session()->put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        
        $request->session()->put('paypal_payment_id',$payment->getId());
        $request->session()->put('course_id',$request->course_id);
        $request->session()->put('amount_pay',$request->get('amount'));        
        $request->session()->put('category_id',Course::find($request->course_id)->category->id);                
        

        // $pay = new Order();        
        // $pay->user_id = auth()->user()->id;
        // $pay->category_id = Course::find($request->course_id)->category->id;
        // $pay->amount = $request->get('amount');
        // $pay->course_id = $request->course_id;
        // $pay->status = 'LOAD..';
        // $pay->mode_of_payment = 'PAYPAL';
        // $pay->payment_id = '#'.$request->course_id.uniqid();
        // $pay->payment_processor = 'USD';        
        // $pay->save();

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }
        Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');

    }

    public function getPaymentStatus()
    {
        
        $request=request();//try get from method        

        /** Get the payment ID before session clear **/
        // Session::put('course_id',$request->course_id);
        // Session::put('course',$request->title);
        // Session::put('category_id',Course::find($request->course_id)->category->id);
        $payment_id = Session::get('paypal_payment_id');
        $course_id = Session::get('course_id');
        $course = Session::get('course');
        $amount_pay = Session::get('amount_pay');
        $category = Session::get('category_id');


        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        Session::forget('course_id');
        Session::forget('course');
        Session::forget('amount_pay');
        Session::forget('category_id');

        
        //if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            if (empty($request->PayerID) || empty($request->token)) {
                
        $pay = new Order();                        
        $pay->user_id = auth()->user()->id;
        $pay->category_id = $category;
        $pay->amount = $amount_pay ;
        $pay->course_id = $course_id;
        $pay->status = 'FAILED..';
        $pay->mode_of_payment = 'PAYPAL';
        $pay->payment_id = '#failed'.$payment_id;
        $pay->payment_processor = 'USD';
        $pay->save();
        $mail = new YahooMail();
        $mail->author_id = User::where('email','mashashie@yahoo.com')->first()->id;
        $mail->email_to = auth()->user()->id;
        $mail->subject = 'Notifications';
        $mail->body = 'Hello Dear <b>'.auth()->user()->pseudo.'</b> You have a failed payment for course <b>'.Course::find($course_id)->title.'</b> <b> rwite mashashie@yahoo.com for any problems </b>';
        $mail->save();
        $request->session()->put('error', 'Payment failed');
            return Redirect::to('/');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        //$execution->setPayerId(Input::get('PayerID'));
        $execution->setPayerId($request->PayerID);

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            $pay = new Order();                        
            $pay->user_id = auth()->user()->id;
            $pay->category_id = $category;
            $pay->amount = $amount_pay;
            $pay->course_id = $course_id;
            $pay->status = 'SUCCESS..';
            $pay->mode_of_payment = 'PAYPAL';
            $pay->payment_id = '#'.$payment_id;
            $pay->payment_processor = 'USD';
            $pay->save();
            
            $mail = new YahooMail();
            $mail->author_id = User::where('email','mashashie@yahoo.com')->first()->id;
            $mail->email_to = auth()->user()->id;
            $mail->subject = 'Notifications';
            $mail->body = 'Hello Dear <b>'.auth()->user()->pseudo.'</b> You have a successfull payment for course <b>'.Course::find($course_id)->title.'</b> <b> contact mashashie@yahoo.com for any problems </b>';
            $mail->save();

            $subscription = new Subscription();
            $subscription->user_id = auth()->user()->id;
            $subscription->course_id = $course_id;
            $subscription->type = 'buy';
            $subscription->save();
            $mail = new YahooMail();
            $mail->author_id = User::where('email','mashashie@yahoo.com')->first()->id;
            $mail->email_to = Course::find($course_id)->user->id;
            $mail->subject = 'Notifications';
            $mail->body = 'Hello Dear <b>'.Course::findOrFail($course_id)->title.'</b> has been successfully buy by  <b>'.auth()->user()->pseudo.'</b> <b> Please consult your paypal Account Or contact mashashie@yahoo.com for any problems</b>';
            $mail->save();
            SubscriptionController::instructorPayout($course_id,$amount_pay);

            if(ClassCourse::where('course_id',$course_id)->count() > 0)
            {
                $class = ClassCourse::where('course_id',$course_id)->first();
                $user_class = ClassSchool::find($class->class_id);
                SubscriptionController::adminPayout($course_id,$amount_pay,$user_class->user_id);
            }
                
            //add update record for cart
            return redirect()->route('courses.resume',[
                'id' => $subscription->course_id
            ])->with('message', 'Payment success congratulations you are access life for this course!!');  //back to product   page

        }

        $request->session()->put('message', 'Payment failed');
        return Redirect::to('/'); 

    }



}