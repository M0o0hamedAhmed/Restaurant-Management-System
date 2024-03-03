<div class="card ">
    <!-- form start -->
    <form>
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <span x-text="$wire.name.toUpperCase()"></span>
                <input wire:model="name" type="text"
                       class="form-control  {{$errors->get('name') ?  'border-danger ': ''}}" id="name"
                       placeholder="Enter Name" name="name"  required>
                <small>Characters are: <span x-text="$wire.name.length"></span>, and words are <span x-text="$wire.name.split(' ').length - 1"></span></small>
                @if($errors->has('name'))
                    @foreach($errors->get('name') as $error)
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer ">
            <button wire:click.prevent="store" type="submit"
                    class="btn btn-primary d-flex justify-content-end bg-blue">Submit
            </button>
            <span class="right badge badge-primary">{{session('success')}}</span>
        </div>
    </form>
</div>
