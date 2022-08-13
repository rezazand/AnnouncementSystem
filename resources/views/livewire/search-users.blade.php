<div class="form-group">
    <input list="search" type="text" wire:model="query" name="to" class="form-control" placeholder="ارسال به :" autocomplete="off">
    @error('to')
    <p class="text-danger mt-2">{{$message}}</p>
    @enderror
    <datalist id="search" >
        @foreach($contacts as $contact)
            <option value="{{$contact['name']}}">{{$contact->role->label}}</option>
        @endforeach
    </datalist>
</div>
