<div class="form-group row" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="col-10 pt-4">
        <input list="search" type="text" wire:model="query" name="to" class="form-control" placeholder="ارسال به :"
               autocomplete="off">
    </div>
    <div class="col-2 form-control">
        <input wire:model="target" value="admins" type="radio"> <span>نمایش مدیران</span>
        <input wire:model="target" value="all" type="radio"> <span>نمایش همه</span><br>

    </div>
    @error('to')
    <p class="text-danger mt-2">{{$message}}</p>
    @enderror
    <datalist id="search">
        @if($target == 'admins')
            @foreach($contacts as $contact)
                @if($contact->isAdmin())
                    <option value="{{$contact['name']}}">{{$contact->department->label}}
                        : {{$contact->role->label}}</option>
                @endif
            @endforeach
        @else
            @foreach($contacts as $contact)
                <option value="{{$contact['name']}}">{{$contact->department->label}}
                    : {{$contact->role->label}}</option>
            @endforeach
        @endif
    </datalist>
</div>
