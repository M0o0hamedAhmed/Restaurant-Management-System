<div>
    <form >
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control {{$errors->get('name') ?  'border-danger ': ''}} " id="name" placeholder="Enter Name" name="name"
                       value="{{old('name',"")}}" required>
                @if($errors->has('name'))
                    @foreach($errors->get('name') as $error)
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                        </a>
                    @endforeach
                @endif
            </div>


            <div  class="col-md-6">
                <div class="form-group select2-blue">
                    <label>Permission Name</label>
                    <select name="permissions[]" class="  select2" multiple="multiple"
                            data-placeholder="Select a State"
                            style="width: 100%;">
                        @foreach($permissions as $permission)
                            <option >{{$permission->name}}</option>
                        @endforeach
                    </select>
                    <button class="btn bg-teal mt-2" @click="$dispatch('permission-created')" type="button">
                        <i class="fa-solid fa-spinner fa"> </i>
                        <span>update permission </span>
                    </button>

                    @if($errors->has('permissions'))
                        @foreach($errors->get('permissions') as $error)
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                            </a>
                        @endforeach
                    @endif
                </div>
                <!-- /.form-group -->
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer ">
            <button type="submit" class="btn btn-primary d-flex justify-content-end">Submit</button>
        </div>
    </form>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">

                    @include('livewire/include/buttons/add-button')
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    <div class="input-group input-group-lg mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a class="btn " href="">Edit</a>
                                                </li>
                                                <form method="post" action="">
                                                    @csrf
                                                    @method('delete')
                                                    <li class="dropdown-item">
                                                        <button class="btn" type="submit">Delete</button>
                                                    </li>
                                                </form>
                                            </ul>
                                        </div>
                                        <!-- /btn-group -->
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

</div>
