<?php

namespace App\Livewire;

use App\Models\ClassInstructor;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Invitation extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function approved($id)
    {
        $app = ClassInstructor::where('class_id',$id)->where('user_id',auth()->user()->id)->first();
        if($app->status == 1)
        {
            $app->status = 0;
            $app->save();
            session()->flash('message','Saved');
        }
        else{
            $app->status = 1;
            $app->save();
            session()->flash('message','saved');
        }
    }
    public function render()
    {
        return view('livewire.invitation',[
            'classes' => DB::table('class_instructors')
            ->leftJoin('class_schools','class_instructors.class_id','=','class_schools.id')
            ->selectRaw('class_schools.*, class_instructors.status as stat')
            ->where('class_instructors.user_id','=',auth()->user()->id)
            ->orderByDesc('class_instructors.id')
            ->paginate(2)
        ]);
    }
}
