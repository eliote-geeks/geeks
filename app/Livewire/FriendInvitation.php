<?php

namespace App\Livewire;

use App\Models\friendInvitation as ModelsFriendInvitation;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class FriendInvitation extends Component
{
    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    public $search = '';
    public $perPages = 4;
    protected $listeners = [
        'refreshField' => '$refresh',
        'load-more' => 'loadMore'
    ];


    public function loadMore()
    {
        $this->perPages += 5;
    }

    public function addFriend($id)
    {
        if(ModelsFriendInvitation::where('user_id',auth()->user()->id)->where('invite_id',$id)->count() == 0){
            $invitation = new ModelsFriendInvitation();
            $invitation->user_id = auth()->user()->id;
            $invitation->invite_id = $id;
            $invitation->save();
        }
        else{
            ModelsFriendInvitation::where('invite_id',$id)->first()->delete();        }
    }

    public function render()
    {
        $users = User::where('name','like','%'.$this->search.'%')->where('id','!=',auth()->user()->id)->paginate($this->perPages);
        $this->dispatch('userStore');
        return view('livewire.friend-invitation',[
            'users' => $users,
        ]);
    }

}
