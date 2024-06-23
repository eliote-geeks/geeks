<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Course;
use Livewire\Component;
use App\Models\Response;
use App\Models\YahooMail;
use App\Models\LikeReview;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\CommentBlogUser;
use Illuminate\Support\Facades\DB;
use App\Models\BlogUser as ModelsBlogUser;


class BlogUser extends Component
{
    use WithFileUploads;
    public $description;
    public $title;    
    public $photo;
    public $body;
    public $limit;
    public $response;
    public $perPages = 4;
    public $lm = 4;
    protected $listeners = [
        'refreshField' => '$refresh',
        'load-more' => 'loadMore'
    ];


    public function loadMore()
    {
        $this->perPages += 5;
    }
    public function saveDescription()
    {
        $this->validate([            
            'description' => 'required'
        ]);
        $post = new \App\Models\BlogUser();
        $post->description = $this->description;
        $post->user_id = auth()->user()->id;
        if($this->photo != null){
            $this->validate([
                'photo' => 'required|mimes:jpg,png,jpeg'
            ]);
            $post->photo =  'storage/'.$this->photo->store('blogs','public');            

        }
            
        $post->save();        

        foreach(\App\Models\User::all() as $user)
        {
            if((\App\Models\FriendInvitation::where('user_id',auth()->user()->id)->where('invite_id',$post->user_id)->where('status',1)->count() > 0) || (\App\Models\FriendInvitation::where('user_id',$post->user_id)->where('invite_id',auth()->user()->id)->where('status',1)->count() > 0) || auth()->user()->id == $post->user_id)
            {
                $mail = new YahooMail();
                $mail->author_id = auth()->user()->id;
                $mail->email_to = $user->user_id;
                $mail->subject = 'Social Network';
                $mail->body = '<b>'.\App\Models\User::find($post->user_id)->name.'</b> just added a new post '.$post->created_at->diffForHumans().'<a href="'.route('social').'#'.$post->id.'"> <b>click here </b> </a>';
                $mail->save();
            }
        }
        $this->reset();
    }

    public function like($id)
    {
        $post = \App\Models\BlogUser::findOrFail($id);        
        if(LikeReview::where('user_id',auth()->user()->id)->where('review_type','App\Models\BlogUser')->where('review_id',$post->id)->where('status',1)->count() == 0){
            $like = new LikeReview();
            $like->user_id = auth()->user()->id;
            $like->review_type = 'App\Models\BlogUser';
            $like->review_id = $post->id;
            $like->status = 1;
            $like->save();
            if($post->user_id != auth()->user()->id){
                $mail = new YahooMail();
                $mail->author_id = auth()->user()->id;
                $mail->email_to = $post->user_id;
                $mail->subject = 'Social Network';
                $mail->body = 'You have one more like of '.\App\Models\User::find(auth()->user()->id)->name.' on your publication <a href="'.route('social').'#'.$post->id.'"> <b>'.$post->description.' </b> </a>';
                $mail->save();
            }
        }
        else{            
            $like = LikeReview::where('user_id',auth()->user()->id)->where('review_type','App\Models\BlogUser')->where('review_id',$post->id)->first();
            $like->delete();
            YahooMail::where([
                'author_id' => auth()->user()->id,
                'email_to' => $post->user_id,
                'subject' => 'Social Network',
                'body' => 'You have one more like of '.\App\Models\User::find(auth()->user()->id)->name.' on your publication <a href="'.route('social').'#'.$post->id.'"> <b>'.Str::limit($post->description,25).' click here</b> </a>'
                ])
                ->firstOrFail()->delete();
        }
        $this->dispatch('refreshField');
    }

    public function savePhoto()
    {
        $this->validate([
            
            'title' => 'required|max:255'
        ]);
        $post = new \App\Models\BlogUser();
        $post->title = $this->title;
        $post->user_id = auth()->user()->id;
        $post->save();        

        foreach(\App\Models\User::all() as $user)
        {
            if((\App\Models\FriendInvitation::where('user_id',auth()->user()->id)->where('invite_id',$post->user_id)->where('status',1)->count() > 0) || (\App\Models\FriendInvitation::where('user_id',$post->user_id)->where('invite_id',auth()->user()->id)->where('status',1)->count() > 0) || auth()->user()->id == $post->user_id)
            {
                $mail = new YahooMail();
                $mail->author_id = auth()->user()->id;
                $mail->email_to = $user->user_id;
                $mail->subject = 'Social Network';
                $mail->body = '<b>'.\App\Models\User::find($post->user_id)->name.'</b> just added a new post '.$post->created_at->diffForHumans().'<a href="'.route('social').'#'.$post->id.'"> <b>click here </b> </a>';
                $mail->save();
            }
        }
        $this->dispatch('refreshField');
    }

    public function remove($id)
    {
        ModelsBlogUser::findOrFail($id)->delete();
        $this->dispatch('refreshField');
    }
    // public function comments($id)
    // {
    //     $this->validate([
    //         'body' => 'required'
    //     ]);
    //     $comment = new CommentBlogUser();
    //     $comment->user_id = auth()->user()->id;
    //     $comment->blog_user_id = $id;
    //     $comment->body = $this->body;
    //     $comment->save();
        
    //     $post = \App\Models\BlogUser::findOrFail($id);
         
    //     $mail = new YahooMail();
    //     $mail->author_id = auth()->user()->id;
    //     $mail->email_to = $post->user_id;
    //     $mail->subject = 'Social Network';
    //     $mail->body = 'You have one more comment of '.\App\Models\User::find(auth()->user()->id)->name.' on your publication  on your publication <a href="'.route('social').'#'.$post->id.'"> <b>'.Str::limit($post->description,25).' click here</b> </a>';
    //     $mail->save();

    //     $this->dispatch('refreshField');
    //     $this->reset();
    // }

    public function likeComment($id)
    {
        $comment = CommentBlogUser::findOrFail($id);        
        $post = \App\Models\BlogUser::findOrFail($comment->comment_id);
        
        if(LikeReview::where('user_id',auth()->user()->id)->where('review_type','App\Models\Comment')->where('review_id',$comment->id)->where('status',1)->count() == 0){
            $like = new LikeReview();
            $like->user_id = auth()->user()->id;
            $like->review_type = 'App\Models\Comment';
            $like->review_id = $comment->id;
            $like->status = 1;
            $like->save();        
            if(auth()->user()->id != $post->user_id)    
            {
                $mail = new YahooMail();
                $mail->author_id = auth()->user()->id;
                $mail->email_to = $comment->user_id;
                $mail->subject = 'Social Network';
                $mail->body = \App\Models\User::findOrFail(auth()->user()->id)->name."just liked your comment on one of your posts <a href='".route('social')."#".$post->id."'>Click here</a>";
                $mail->save();
            }
        }
        else{            
            $like = LikeReview::where('user_id',auth()->user()->id)->where('review_type','App\Models\Comment')->where('review_id',$comment->id)->firstOrFail();
            $like->delete();
        }        
        $this->dispatch('refreshField');
    }


    public function likeResponse($id)
    {
        $comment = Response::findOrFail($id);        
        if(LikeReview::where('user_id',auth()->user()->id)->where('review_type','App\Models\Response')->where('review_id',$comment->id)->where('status',1)->count() == 0){
            $like = new LikeReview();
            $like->user_id = auth()->user()->id;
            $like->review_type = 'App\Models\Response';
            $like->review_id = $comment->id;
            $like->status = 1;
            $like->save();
            
            // $mail = new YahooMail();
            // $mail->author_id = auth()->user()->id;
            // $mail->email_to = $comment->client_id;
            // $mail->subject = 'Social Network';
            // $mail->body = \App\Models\User::findOrFail(auth()->user()->id)->name."replied to your comment <a href='".route('social')."#".$post->id."'>Click here</a>";
            // $mail->save();

        }
        else{            
            $like = LikeReview::where('user_id',auth()->user()->id)->where('review_type','App\Models\Response')->where('review_id',$comment->id)->firstOrFail();
            $like->delete();
        }        
        $this->dispatch('refreshField');
    }

    public function deleteComment($id)
    {
        $comment = CommentBlogUser::findOrFail($id);
        if($comment->user_id == auth()->user()->id)
        {
            $comment->delete();
        }
        $this->dispatch('refreshField');
    }

    public function deleteResponse($id)
    {
        try{
            $response = Response::find($id);
            if(auth()->user()->id == $response->author_id)
            {
                $response->delete();
            }
            $this->dispatch('refreshField');
        }
        catch(\Exception $e)
        {
            $this->dispatch('refreshField');
        }
    }

    public function response($id)
    {
        $this->validate([
            'response' => 'required|max:300'
        ]);
        $comment = CommentBlogUser::findOrFail($id);
        $post = \App\Models\BlogUser::findOrFail($comment->comment_id);
        $response = new Response();
        $response->author_id = auth()->user()->id;
        $response->client_id = $comment->user->id;
        $response->comment_id = $comment->id;
        $response->content = $this->response;
        $response->course_id = Course::first()->id;
        $response->comment_type = 'App\Models\Comment';
        $response->save();    
        if(auth()->user()->id != $response->client_id)    
        {
            $mail = new YahooMail();
            $mail->author_id = auth()->user()->id;
            $mail->email_to = $comment->user_id;
            $mail->subject = 'Social Network';
            $mail->body = \App\Models\User::findOrFail(auth()->user()->id)->name."replied to your comment <a href='".route('social')."#".$post->id."'>Click here</a>";
            $mail->save();  
        }
        $this->reset('response');
    }

    public function comments($id)
    {
        $this->validate([
            'body' => 'required|string|max:300'
        ]);
        $post = \App\Models\BlogUser::findOrFail($id);
        $comment = new CommentBlogUser();
        $comment->user_id = auth()->user()->id;
        $comment->comment_id = $post->id;
        $comment->comment_type = 'App\Models\Post';
        $comment->content = $this->body;
        $comment->save();
        if($post->user_id != auth()->user()->id)
        {
            $mail = new YahooMail();
            $mail->author_id = auth()->user()->id;
            $mail->email_to = $post->user_id;
            $mail->subject = 'Social Network';
            $mail->body = \App\Models\User::findOrFail(auth()->user()->id)->name."add a comment to your post <a href='".route('social')."#".$post->id."'>Click here</a>";
            $mail->save();
        }
        $this->reset('body');
        $this->dispatch('refreshField');
    }

    public function limit()
    {
        $this->limit += 3;
    }

    public function loadAll($id)
    {
        $this->lm += 2;
    }

    public function maskAll($id)
    {
        $this->lm = 4;
    }
    public function render()
    {
        $posts = \App\Models\BlogUser::orderByDesc('id')->paginate($this->perPages);
        $this->dispatch('userStore');
        return view('livewire.blog-user',[
            'posts' => $posts
        ]);
    }
}
