<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;
use App\Http\Services\Message\Email\EmailService;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class LoginRegisterController extends Controller
{
    public function loginRegisterForm()
    {
        return view('customer.auth.login-register');
    }


    public function loginRegister(LoginRegisterRequest $request)
    {
        $inputs = $request->all();

        if (filter_var($inputs['id'] , FILTER_VALIDATE_EMAIL))
        {
            $type = 1; // 1 => email

            $user = User::where('email', $inputs['id'])->first();
            if(empty($user))
            {
                $newUser['email'] = $inputs['id'];
            }


        }
        elseif(preg_match('/^(\+98|98|0)9\d{9}$/',$inputs['id'])) //check phone number
        {
            $type = 0; // 1 => phone number

            // all mobile numbers are in an format like 9** *** ****
            $inputs['id'] = ltrim($inputs['id'],'0'); //delete left 0 from entered string
            $inputs['id'] = substr($inputs['id'],0 , 2) == '98' ? substr($inputs['id'], 2) : $inputs['id']; //remove 98 from begining of string
            $inputs['id'] = str_replace('+98' , '' ,$inputs['id']); // if entered sting has +98 remove it


            $user = User::where('mobile', $inputs['id'])->first();
            if(empty($user))
            {
                $newUser['mobile'] = $inputs['id'];
            }

        }
        else
        {
            $errorText = 'شناسه ورودی شما نه شماره موبایل است نه پست الکترونیکی';
            return redirect()->route('auth.customer.login-register-form')->with(['id'=> $errorText]);
        }

        if(empty($user))
        {
            $newUser['password'] = '98355154';
            $newUser['activation'] = 1;

            $user = User::create($newUser);
        }

        // create OTP code
        $otpCode = rand(111111,999999);
        $token = Str::random(60);
        $otpInputs = [

            'token'=> $token,
            'user_id'=> $user->id,
            'otp_code'=> $otpCode,
            'login_id'=> $inputs['id'],
            'type'=> $type,
        ];

        $otp = Otp::create($otpInputs);


        // send sms or email
        if($type == 0)
        {
            // send sms
            $smsService = new SmsService();
            $smsService->setFrom(Config('sms.otp_from'));
            $smsService->setTo(['0'.$user->mobile]);
            $smsService->setText("فروشگاه ستاره شمال \n کد تایید : {$otpCode}");
            $smsService->setIsFlash(true);

            $messageService = new MessageService($smsService);

        }
        elseif($type == 1)
        {
            //send email
            $emailService = new EmailService();

            $details = [
                'title' => 'ایمیل فعالسازی برای فروشگاه ستاره شمال',
                'body' => "کد فعالسازی : {$otpCode}",
            ];

            $emailService->setDetails($details);
            $emailService->setFrom('noreply@nsshop.com','example');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($inputs['id']);

            $messageService = new MessageService($emailService);

        }

        $messageService->send();

        return redirect()->route('auth.customer.login-confirm-form',$token);
    }


    public function loginConfirmForm($token)
    {
        $otp = Otp::where('token',$token)->first();

        if(empty($otp))
        {
            return redirect()->route('auth.customer.login-register-form')->withErrors(['id'=>'آدرس وارد شده نا معتبر میباشد']);

        }

        return view('customer.auth.login-confirm-form', compact('token','otp'));

    }


    public function loginConfirm($token, LoginRegisterRequest $request)
    {
        $inputs = $request->all();

        // where token is equal to given token and not used and created at is less that 5 min difference
        $otp = Otp::where('token' , $token)->where('used',0)->where('created_at','>=', Carbon::now()->subMinutes(5)->toDateTimeString())->first();

        if(empty($otp))
        {
            return redirect()->route('auth.customer.login-register-form',$token)->withErrors(['id'=>'آدرس وارد شده نا معتبر میباشد']);
        }

        // if otp not match (entered wrong)
        if($otp->otp_code !== $inputs['otp'])
        {
            return redirect()->route('auth.customer.login-confirm-form',$token)->withErrors(['otp'=>'کد وارد شده صحیح نمی باشد']);
        }

        // if everything was right and fine
        $otp->update(['used' => 1]);

        // confirming mobile or email address for the user that owns otp
        $user = $otp->user()->first();
        if($otp->type == 0 && empty($user->mobile_verified_at))
        {
            $user->update(['mobile_verified_at' => Carbon::now()->toDateTimeString()]);
        }
        elseif ($otp->type == 1 && empty($user->email_verified_at))
        {
            $user->update(['email_verified_at' => Carbon::now()->toDateTimeString()]);
        }


        // login user and redirect to home
        Auth::login($user);
        return redirect()->route('customer.home');

    }

    public function loginResendOtp($token)
    {

        $otp = Otp::where('token' ,$token)->where('created_at' , '<=' , Carbon::now()->subMinutes(5)->toDateTimeString())->first();

        // if old otp not found
        if(empty($otp))
        {
            return redirect()->route('auth.customer.login-register-form',$token)->withErrors(['id'=>'آدرس وارد شده نا معتبر میباشد']);
        }



        // create OTP code
        $otpCode = rand(111111,999999);
        $token = Str::random(60);
        $user = $otp->user()->first();
        $type = $otp->type;
        $otpInputs = [

            'token'=> $token,
            'user_id'=> $user->id,
            'otp_code'=> $otpCode,
            'login_id'=> $otp->login_id,
            'type'=> $type,
        ];

        $otp = Otp::create($otpInputs);


        // send sms or email
        if($type == 0)
        {
            // send sms
            $smsService = new SmsService();
            $smsService->setFrom(Config('sms.otp_from'));
            $smsService->setTo(['0'.$user->mobile]);
            $smsService->setText("فروشگاه ستاره شمال \n کد تایید : {$otpCode}");
            $smsService->setIsFlash(true);

            $messageService = new MessageService($smsService);

        }
        elseif($type == 1)
        {
            //send email
            $emailService = new EmailService();

            $details = [

                'title' => 'ایمیل فعالسازی برای فروشگاه ستاره شمال',
                'body' => "کد فعالسازی : {$otpCode}",
            ];

            $emailService->setDetails($details);
            $emailService->setFrom('noreply@nsshop.com','example');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($otp->login_id);

            $messageService = new MessageService($emailService);

        }

        $messageService->send();

        return redirect()->route('auth.customer.login-confirm-form',$token);


    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('customer.home');
    }








}
