<div class="d-flex align-items-center mb-4 mb-lg-0" wire:poll>
    <div>
        <img src="@if ($profile_photo_path == null) {{ auth()->user()->profile_photo_url }} @else {{ $profile_photo_path->temporaryUrl() }} @endif"
            id="img-uploaded" class="avatar-xl rounded-circle" alt="" />
        <div class="ms-3">
            <h4 class="mb-0">Your avatar</h4>
            @error('profile_photo_path')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <p class="mb-0">
                PNG or JPG no bigger than 800px wide and tall.
            </p>
        </div>
    </div>

    <div>
        <input hidden type="file" id="input" value="Update" wire:model='profile_photo_path'>
        @if ($profile_photo_path == null)
            <label class="btn btn-outline-white btn-sm" for="input" wire:loading.attr='disabled'>Update</label>
        @else
            <a href="javascript:void(0)" wire:click='photoUpdate' class="btn btn-outline-success btn-sm"
                wire:loading.attr='disabled'>save</a>
        @endif

        <a wire:loading.attr='disabled' wire:click="deleteProfilePhoto" href="javascript:void(0)"
            class="btn btn-outline-danger btn-sm">Delete</a>
    </div>
</div>
{{-- </div> --}}
