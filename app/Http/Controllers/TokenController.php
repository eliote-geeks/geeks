<?php

namespace App\Http\Controllers;


use App\Models\Token;
use App\Mail\TokenMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TokenController extends Controller
{
    public function tokenRecord($action,$record)
    {

        if($action == 'SendChefcabinettoUniteNotification')
            {
                if(auth()->user()->user_type == 'App\Models\CabinetDirector'){
                    $record = \App\Models\Record::findOrFail($record);
                    $subject = 'Code de validation pour envoyer un document du chef de cabinet au chef d\'unite';
                    $mailToken = new Token();
                    $mailToken->user_id == auth()->user()->id;
                    $mailToken->token = Str::limit(rand(time()),7);
                    $mailToken->save();            
                    $id = $record->id;
                    $type = 'CreateDocNotification';
                    Mail::to(auth()->user()->email)->send(new TokenMail($subject,$mailToken->token));                        
                    return view('token.verify-token',compact('id','type'));                
                 }
                 else{
                    return redirect()->back()->with('failed','Oups something wrong');
                 }
            }
            
            elseif($action == 'SendCheftoMemberNotification')
            {
                if(auth()->user()->user_type == 'App\Models\UnitAdmin'){
                    $record = \App\Models\Record::findOrFail($record);
                    $subject = 'Code de validation pour envoyer un document du chef d\'unite au menbre';
                    $mailToken = new Token();
                    $mailToken->user_id == auth()->user()->id;
                    $mailToken->token = rand(0,5000);
                    $mailToken->save();            
                    $id = $record->id;
                    $type = 'CreateDocNotification';
                    Mail::to(auth()->user()->email)->send(new TokenMail($subject,$mailToken->token));                        
                    return view('token.verify-token',compact('id','type'));                
                 }
                 else{
                    return redirect()->back()->with('failed','Oups something wrong');
                 }
            }
            
            elseif($action == 'SendMembertoMemberNotification')
            {
                if(auth()->user()->user_type == 'App\Models\UnitMember'){
                    $record = \App\Models\Record::findOrFail($record);
                    $subject = 'Code de validation pour envoyer un document du membre a menbre';
                    $mailToken = new Token();
                    $mailToken->user_id == auth()->user()->id;
                    $mailToken->token = rand(0,5000);
                    $mailToken->save();            
                    $id = $record->id;
                    $type = 'CreateDocNotification';
                    Mail::to(auth()->user()->email)->send(new TokenMail($subject,$mailToken->token));                        
                    return view('token.verify-token',compact('id','type'));                
                 }
                 else{
                    return redirect()->back()->with('failed','Oups something wrong');
                 }
            }
            else{
                die('une erreur est survenue !!');
            }
    }

    

    public function tokenCreateDocNotification($action,$document)
    {
        $document = \App\Models\Document::findOrFail($document);
        
        if($action == 'CreateDocNotification')
        {
            $subject = 'Code de validation pour creer un nouveau document';
            $mailToken = new Token();
            $mailToken->user_id == auth()->user()->id;
            $mailToken->token = rand(0,5000);
            $mailToken->action = $document->id;
            $mailToken->type = 'CreateDocNotification';
            $mailToken->save();            
            $id = $document->id;
            $type = 'CreateDocNotification';
            Mail::to(auth()->user()->email)->send(new TokenMail($subject,$mailToken->token));                        
            return view('token.verify-token',compact('id','type'));
        }
        
        elseif($action == 'updateDocNotification')
        {
            $subject = 'Code de validation pour modification du document';
            $mailToken = new Token();
            $mailToken->user_id == auth()->user()->id;
            $mailToken->token = rand(0,5000);
            $mailToken->action = $document->id;
            $mailToken->type = 'CreateDocNotification';
            $mailToken->save();            
            $id = $document->id;
            $type = 'CreateDocNotification';
            Mail::to(auth()->user()->email)->send(new TokenMail($subject,$mailToken->token));                        
            return view('token.verify-token',compact('id','type'));
        }
        
        elseif($action == 'deleteDocNotification')
        {
            $subject = 'Code de validation pour suppression du document';
            $mailToken = new Token();
            $mailToken->user_id == auth()->user()->id;
            $mailToken->token = rand(0,5000);
            $mailToken->action = $document->id;
            $mailToken->type = 'CreateDocNotification';
            $mailToken->save();            
            $id = $document->id;
            $type = 'CreateDocNotification';
            Mail::to(auth()->user()->email)->send(new TokenMail($subject,$mailToken->token));                        
            return view('token.verify-token',compact('id','type'));
        }
    }



        public function token_verify(Request $request,$id)
        {
            $request->validate([
                'token' => 'required|integer',
                'type' => 'required'
            ]);

            if($request->type == 'CreateDocNotification')
            {
                $token = \App\Models\Token::where([
                    'token' => $request->token,
                    'type' => $request->type,
                    'action' => $id
                    ])->count();

                if($token > 0)
                {
                    $t = \App\Models\Token::where([
                        'token' => $request->token,
                        'type' => $request->type,
                        'action' => $id
                        ])->first()->delete();

                        $document = \App\Models\Document::findOrFail($id)->valid = 1;
                        $document->save();
                    return 'la page des documents!';
                }
            }
            
            elseif($request->type == 'updateDocNotification')
            {
                $token = \App\Models\Token::where([
                    'token' => $request->token,
                    'type' => $request->type,
                    'action' => $id
                    ])->count();

                if($token > 0)
                {
                    $t = \App\Models\Token::where([
                        'token' => $request->token,
                        'type' => $request->type,
                        'action' => $id
                        ])->first()->delete();

                        $document = \App\Models\Document::findOrFail($id)->valid = 1;
                        $document->save();
                    return 'la page des documents!';
                }
            }
            
            elseif($request->type == 'deleteDocNotification')
            {
                $token = \App\Models\Token::where([
                    'token' => $request->token,
                    'type' => $request->type,
                    'action' => $id
                    ])->count();

                if($token > 0)
                {
                    $t = \App\Models\Token::where([
                        'token' => $request->token,
                        'type' => $request->type,
                        'action' => $id
                        ])->first()->delete();

                        $document = \App\Models\Document::findOrFail($id)->delete();
                    return 'la page des documents!';
                }
            }
            
            elseif($request->type == 'SendChefcabinettoUniteNotification')
            {
                $token = \App\Models\Token::where([
                    'token' => $request->token,
                    'type' => $request->type,
                    'action' => $id
                    ])->count();

                if($token > 0)
                {
                    $t = \App\Models\Token::where([
                        'token' => $request->token,
                        'type' => $request->type,
                        'action' => $id
                        ])->first()->delete();

                        $record = \App\Models\Record::findOrFail($id)->valid = 1;
                        $record->save();
                    return 'la page des documents!';
                }
            }
            
            elseif($request->type == 'SendMembertoMemberNotification')
            {
                $token = \App\Models\Token::where([
                    'token' => $request->token,
                    'type' => $request->type,
                    'action' => $id
                    ])->count();

                if($token > 0)
                {
                    $t = \App\Models\Token::where([
                        'token' => $request->token,
                        'type' => $request->type,
                        'action' => $id
                        ])->first()->delete();

                        $record = \App\Models\Record::findOrFail($id)->valid = 1;
                        $record->save();
                    return 'la page des documents!';
                }
            }
            
        }

    }

    // 'mailtrap' => [
    //     'transport' => 'mailtrap'
    // ],


    // MAIL_MAILER=smtp
    // MAIL_HOST=sandbox.smtp.mailtrap.io
    // MAIL_PORT=2525
    // MAIL_USERNAME=2332ba38c70886
    // MAIL_PASSWORD=e4bafa6259750a
    // MAIL_ENCRYPTION=tls
    


