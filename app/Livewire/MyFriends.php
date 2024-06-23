<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FriendInvitation;
use Livewire\WithPagination;

class MyFriends extends Component
{    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $pending = 0;
    public function render()
    {        
        if($this->pending == 0){
            return view('livewire.my-friends',[
                'invitations' => FriendInvitation::where('invite_id',auth()->user()->id)->where('status','=',0)->orderByDesc('status')->paginate(4)
            ]);
        }
        else{
            return view('livewire.my-friends',[
                'users' => FriendInvitation::where('invite_id',auth()->user()->id)->orWhere('user_id',auth()->user()->id)->where('status',1)->orderByDesc('status')->paginate(4)
            ]);
        }
    }

    public function approved($id)
    {
        $app = FriendInvitation::find($id);
        $app->status = 1;
        $app->updated_at = now();
        $app->save();
    }
    public function pending()
    {
        if($this->pending == 1)
        {
            $this->pending = 0;
        }
        else
            $this->pending = 1;
        
    }

    public function remove($id)
    {
        FriendInvitation::find($id)->delete();
    }
}
