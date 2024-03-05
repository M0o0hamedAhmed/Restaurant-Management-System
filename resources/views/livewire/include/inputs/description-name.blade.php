<div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input wire:model.live="description" type="text" class="form-control  {{$errors->get('description') ?  'border-danger ': ''}}"  placeholder="Enter Description"
           name="description"
          required>
    @if($errors->has('description'))
        @foreach($errors->get('description') as $error)
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
            </a>
        @endforeach
    @endif
</div>
