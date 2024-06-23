<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal-1">
    Set Price
</button>
    @if (\App\Models\UserSchoolClass::where('user_id',auth()->user()->id)->where('entity_id',$school->id)->where('entity_type','\App\Models\School')->count() == 0)
    <button wire:click='follow' wire:loading.attr='disabled'  class="btn btn-outline-primary">Join ({{$students}})</button>
    @else
    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-2" wire:loading.attr='disabled'  class="btn btn-outline-danger">Quit</button>
    @endif
    ({{$students}}) Students &nbsp;
    <b>{{'All courses ('.$school->price.'$)'}}</b>
    <a href="{{route('school.create')}}">My shools ({{\App\Models\School::where('user_id',auth()->user()->id)->count()}})</a>




<!-- Modal -->
<div class="modal fade" id="exampleModal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Set price title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="number" placeholder="0.000$" wire:model.defer='price' class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click='number' data-bs-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>






    <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to confirm this Action All your class will be destroy please confirm this action or return safety!!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click='follow' data-bs-dismiss="modal">Confirm</button>
            </div>
        </div>
    </div>
</div>
</div>
