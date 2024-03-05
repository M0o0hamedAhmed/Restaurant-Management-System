<div>
    @include('livewire.include.search-box.debounce-search-box')
    @include('livewire.include.modals.user-modal')
    {{--    <div class="modal-body">--}}
    {{--        <form>--}}
    {{--            <div class="card-body">--}}
    {{--                <div class="form-group">--}}
    {{--                    <label for="exampleInputEmail1">Name</label>--}}
    {{--                    <input wire:model="name" type="text"--}}
    {{--                           class="form-control {{$errors->get('name') ?  'border-danger ': ''}}"--}}
    {{--                           id="name" placeholder="Enter Name"--}}
    {{--                           value="{{old('name',"")}}" required>--}}
    {{--                    @if($errors->has('name'))--}}
    {{--                        @foreach($errors->get('name') as $error)--}}
    {{--                            <a href="#" class="nav-link">--}}
    {{--                                <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>--}}
    {{--                            </a>--}}
    {{--                        @endforeach--}}
    {{--                    @endif--}}
    {{--                </div>--}}
    {{--                <div class="form-group">--}}
    {{--                    <label for="exampleInputEmail1">Email address</label>--}}
    {{--                    <input wire:model="email" type="email"--}}
    {{--                           class="form-control  {{$errors->get('email') ?  'border-danger ': ''}}"--}}
    {{--                           id="exampleInputEmail1"--}}
    {{--                           placeholder="Enter email"--}}
    {{--                           name="email" value="{{old('email','')}}" required>--}}
    {{--                    @if($errors->has('email'))--}}
    {{--                        @foreach($errors->get('email') as $error)--}}
    {{--                            <a href="#" class="nav-link">--}}
    {{--                                <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>--}}
    {{--                            </a>--}}
    {{--                        @endforeach--}}
    {{--                    @endif--}}
    {{--                </div>--}}
    {{--                <!-- phone mask -->--}}
    {{--                <div class="form-group">--}}
    {{--                    <label>phone</label>--}}

    {{--                    <div class="input-group">--}}
    {{--                        <div class="input-group-prepend">--}}
    {{--                            <span class="input-group-text"><i class="fas fa-phone"></i></span>--}}
    {{--                        </div>--}}
    {{--                        <input wire:model="phone_number" type="number"--}}
    {{--                               class="form-control  {{$errors->get('phone_number') ?  'border-danger ': ''}}"--}}
    {{--                               placeholder="Enter mobile number "--}}
    {{--                               value="{{old('phone_number')}}" required>--}}
    {{--                        @if($errors->has('phone_number'))--}}
    {{--                            @foreach($errors->get('phone_number') as $error)--}}
    {{--                                <a href="#" class="nav-link">--}}
    {{--                                    <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>--}}
    {{--                                </a>--}}
    {{--                            @endforeach--}}
    {{--                        @endif--}}
    {{--                    </div>--}}
    {{--                    <!-- /.input group -->--}}
    {{--                </div>--}}
    {{--                <!-- /.form group -->--}}

    {{--                <div class="col-md-6">--}}
    {{--                    <div class="form-group select2-blue">--}}
    {{--                        <label>Roles Name</label>--}}
    {{--                        <select wire:model="role" class="  select2" multiple="multiple"--}}
    {{--                                data-placeholder="Select a State"--}}
    {{--                                style="width: 100%;">--}}
    {{--                            @foreach($roles as $role)--}}
    {{--                                <option>{{$role->name}}</option>--}}
    {{--                            @endforeach--}}
    {{--                        </select>--}}

    {{--                        @if($errors->has('roles'))--}}
    {{--                            @foreach($errors->get('roles') as $error)--}}
    {{--                                <a href="#" class="nav-link">--}}
    {{--                                    <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>--}}
    {{--                                </a>--}}
    {{--                            @endforeach--}}
    {{--                        @endif--}}
    {{--                    </div>--}}
    {{--                    <!-- /.form-group -->--}}
    {{--                </div>--}}


    {{--                <div class="form-group">--}}
    {{--                    <label for="exampleInputPassword1">Password</label>--}}
    {{--                    <input wire:model="password" type="password"--}}
    {{--                           class="form-control  {{$errors->get('password') ?  'border-danger ': ''}}"--}}
    {{--                           placeholder="Password" required>--}}
    {{--                    @if($errors->has('password'))--}}
    {{--                        @foreach($errors->get('password') as $error)--}}
    {{--                            <a href="#" class="nav-link">--}}
    {{--                                <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>--}}
    {{--                            </a>--}}
    {{--                        @endforeach--}}
    {{--                    @endif--}}
    {{--                </div>--}}

    {{--                <div class="form-group">--}}
    {{--                    <label for="exampleInputPassword1">Password Confirmation</label>--}}
    {{--                    <input wire:model="password_confirmation" type="password"--}}
    {{--                           class="form-control  {{$errors->get('password_confirmation') ?  'border-danger ': ''}}"--}}
    {{--                           id="exampleInputPassword1"--}}
    {{--                           placeholder="password confirmation" name="password_confirmation" required>--}}
    {{--                    @if($errors->has('password_confirmation'))--}}
    {{--                        @foreach($errors->get('password_confirmation') as $error)--}}
    {{--                            <a href="#" class="nav-link">--}}
    {{--                                <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>--}}
    {{--                            </a>--}}
    {{--                        @endforeach--}}
    {{--                    @endif--}}
    {{--                </div>--}}

    {{--                <div class="form-group">--}}
    {{--                    <label for="exampleInputPassword1">Add Your Photo</label>--}}
    {{--                    <input wire:model="image" type="file" >--}}

    {{--                    @if($errors->has('image'))--}}
    {{--                        @foreach($errors->get('image') as $error)--}}
    {{--                            <a href="#" class="nav-link">--}}
    {{--                                <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>--}}
    {{--                            </a>--}}
    {{--                        @endforeach--}}
    {{--                    @endif--}}
    {{--                </div>--}}


    {{--                <button wire:click.prevent="store" type="submit"--}}
    {{--                        class="btn btn-primary d-flex justify-content-end bg-blue">Submit--}}
    {{--                </button>--}}

    {{--            </div>--}}
    {{--        </form>--}}

    {{--    </div>--}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    {{--                    <h3 class="card-title">DataTable with minimal features & hover style</h3>--}}
                    <button type="button" class="btn btn-default bg-teal" data-toggle="modal" data-target="#modal-user">
                        Create User
                    </button>


                </div>
                <!-- /.card-header wire:poll -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>phone number</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr :key="$user->id" @class(['bg-gray-300' => $user->trashed()])>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td>
                                    @foreach($user->getRoleNames() as $role)
                                        <span class="right badge badge-primary">{{$role}}</span>
                                    @endforeach
                                </td>
                                <td>

                                    <div class="input-group input-group-lg mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-info bg-blue m-2">Edit</button>
                                            <button wire:confirm="Are you sure you want to delete this category ?"
                                                    wire:click=delete({{$user->id}})" type="button"
                                                    class="btn btn-info bg-blue m-2">Delete
                                            </button>
                                            @unless($user->trashed())
                                                <button wire:confirm="Are you sure you want to archived this category ?"
                                                        type="button"
                                                        wire:click="archive"
                                                        class="btn btn-info bg-blue m-2">Archive
                                                </button>
                                            @endunless

                                        </div>
                                        <!-- /btn-group -->
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <div class="  my-2">
                        {{ $users->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>
