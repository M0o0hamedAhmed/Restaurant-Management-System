<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input wire:model.live="name" type="text"
           class="form-control {{$errors->get('name') ?  'border-danger ': ''}}"
           id="name" placeholder="Enter Name"
           value="{{old('name',"")}}">
    @error('name')
    <div class="error">{{$message}}</div>@enderror

</div>
