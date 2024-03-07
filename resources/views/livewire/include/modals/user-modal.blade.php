<div wire:ignore.self class=" modal fade" id="modal-open">


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
                <form wire:submit.prevent={{$editMode ? "update" : "store"}}>
                    <div class="card-body">
                        @include('livewire/include/inputs/input-name')
                        <input wire:model.live="user_id">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input wire:model.live="email" type="email"
                                   class="form-control  {{$errors->get('email') ?  'border-danger ': ''}}"
                                   id="exampleInputEmail1"
                                   placeholder="Enter email">
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
                                <input wire:model.live="phone_number" type="text"
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
                                {{--                              [start - blockc]  this block for only test--}}
                                <h1 class="text-red">roles must show here : {{ implode(',', $multiRole) }}</h1>
                                <label>Roles Name. selected Roles
                                    @forelse($multiRole as $role)
                                        {{$role}}
                                    @empty
                                        not
                                    @endforelse  {{implode(',',$multiRole)}}</label>
                                {{--                              [start - blockc]  this block for only test--}}
                                <label>Roles</label>
                                <select class="form-control select2" wire:model.live="multiRole" multiple="multiple"
                                        id="multiRoleSelect"
                                        data-placeholder="Select a State"
                                        style="width: 100%;" multiple>
                                    @foreach($roles as $role)
                                        <option
                                            @selected(in_array($role->name,$multiRole))  value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="error">{{$message}}</div>@enderror
                            </div>
                            <!-- /.form-group -->
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input wire:model.live="password" type="password"
                                   class="form-control  {{$errors->get('password') ?  'border-danger ': ''}}"
                                   placeholder="Password">
                            @error('password')
                            <div class="error">{{$message}}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password Confirmation</label>
                            <input wire:model.live="password_confirmation" type="password"
                                   class="form-control  {{$errors->get('password_confirmation') ?  'border-danger ': ''}}"
                                   id="exampleInputPassword1"
                                   placeholder="password confirmation" name="password_confirmation">
                            @error('password_confirmation')
                            <div class="error">{{$message}}</div>@enderror

                        </div>

                        <div class="form-group">
                            <div>
                                <label for="formFileLg" class="form-label">Large file input example</label>
                                <input wire:model.live="image" accept="image/png, image/jpeg"
                                       class="form-control form-control-lg" id="upload({{$iteration}})" type="file">
                            </div>
                            @error('image')
                            <div class="error">{{$message}}</div>@enderror


                            @if($image && !$editMode)
                                <img class="rounded w-10 h-10 mt-5 block" src="{{$image->temporaryURL()}}">
                            @endif
                            @include('livewire/include/overlay-loading/overlay')
                        </div>
                        <div class="modal-footer justify-content-between">
                            @include('livewire/include/buttons/save-close-modal-button')
                        </div>
                    </div>
                </form>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@script
<script>
    $wire.on('user-created', () => {
        // reset select input after store
        $('#multiRoleSelect').val(null).trigger('change');
        // close model after store
        $('#modal-open').modal('hide');

        //sweet alert after user create
        Toast.fire({
            icon: 'success',
            title: 'The user has been added successfully.'
        })
    });

    $wire.on('user-updated', () => {
        // reset select input after store
        $('#multiRoleSelect').val(null).trigger('change');
        // close model after store
        $('#modal-open').modal('hide');

        //sweet alert after user create
        Toast.fire({
            icon: 'success',
            title: 'The user has been updated successfully.'
        })
    });

    $(document).ready(function () {
        $('#multiRoleSelect').select2();
        // update value for select unput after every change
        $('#multiRoleSelect').on('change', function () {
            let data = $(this).val();
            $wire.set('multiRole', data, false);
        })
    });
</script>
@endscript
