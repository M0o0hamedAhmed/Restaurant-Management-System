<div wire:ignore.self class=" modal fade" id="modal-user">
    <div class="modal-dialog modal-xl"> {{--modal-xl  modal-lg modal-sm--}}
        <div class="modal-content"> {{--bg-success  bg-danger bg-warning bg-info bg-secondary bg-primary--}}
            {{--            <div class="overlay" wire:loading wire:target="image">--}}
            {{--                <i class="fas fa-2x fa-sync fa-spin"></i>--}}
            {{--            </div>--}}
            <div class="modal-header">
                <h4 class="modal-title">Create User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input wire:model.live="name" type="text"
                                   class="form-control {{$errors->get('name') ?  'border-danger ': ''}}"
                                   id="name" placeholder="Enter Name"
                                   value="{{old('name',"")}}">
                            @error('name')
                            <div class="error">{{$message}}</div>@enderror

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input wire:model.blur="email" type="email"
                                   class="form-control  {{$errors->get('email') ?  'border-danger ': ''}}"
                                   id="exampleInputEmail1"
                                   placeholder="Enter email"
                            >
                            @error('email')
                            <div class="error">{{$message}}</div>@enderror

                        </div>
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>phone</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input wire:model.blur="phone_number" type="number"
                                       class="form-control  {{ $errors->get('phone_number') ?  'border-danger ': ''}}"
                                       placeholder="Enter mobile number "
                                       value="{{old('phone_number')}}">

                            </div>
                            @error('phone_number')
                            <div class="error">{{$message}}</div>@enderror
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <div wire:ignore class="col-md-6">
                            <div class="form-group select2-blue">
                                <label>Roles Name</label>
                                <select wire:model.blur="role" class="  select2" multiple="multiple"
                                        data-placeholder="Select a State"
                                        style="width: 100%;" multiple>
                                    @foreach($roles as $role)
                                        <option>{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="error">{{$message}}</div>@enderror


                            </div>
                            <!-- /.form-group -->
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input wire:model.blur="password" type="password"
                                   class="form-control  {{$errors->get('password') ?  'border-danger ': ''}}"
                                   placeholder="Password">
                            @error('password')
                            <div class="error">{{$message}}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password Confirmation</label>
                            <input wire:model.blur="password_confirmation" type="password"
                                   class="form-control  {{$errors->get('password_confirmation') ?  'border-danger ': ''}}"
                                   id="exampleInputPassword1"
                                   placeholder="password confirmation" name="password_confirmation">
                            @error('password_confirmation')
                            <div class="error">{{$message}}</div>@enderror

                        </div>

                        <div class="form-group">
                            {{--                            <label for="exampleInputPassword1">Add Your Image</label>--}}
                            {{--                            <input wire:model="image" type="file" accept="image/png, image/jpeg">--}}

                            <div>
                                <label for="formFileLg" class="form-label">Large file input example</label>
                                <input wire:model.blur="image" accept="image/png, image/jpeg"
                                       class="form-control form-control-lg" id="formFileLg" type="file">
                            </div>
                            @error('image')
                            <div class="error">{{$message}}</div>@enderror



                            @if($image)
                                <img class="rounded w-10 h-10 mt-5 block" src="{{$image->temporaryURL()}}">
                            @endif
                            @include('livewire/include/overlay-loading/overlay')
                        </div>


                        <button type="submit"
                                class="btn btn-primary d-flex justify-content-end bg-blue">Submit from user model
                        </button>

                    </div>
                </form>

            </div>

            <div class="modal-footer justify-content-between">
                {{--                @include('livewire/include/buttons/save-close-modal-button')--}}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@script
<script>

    $wire.on('user-created', () => {
        $('#modal-user').modal('hide');

        Toast.fire({
            icon: 'success',
            title: 'The user has been added successfully.'
        })
    });
</script>
@endscript
