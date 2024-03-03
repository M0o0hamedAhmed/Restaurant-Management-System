<div>
    @include('livewire/include/create')
    @include('livewire/include/search-box')

    <div class="row">
        <div class="col-12">
            <div class="card">
                {{--            <div class="card-header d-flex justify-content-end">--}}
                {{--                <a type="button" href="" class="btn btn-info">Add Permission</a>--}}
                {{--            </div>--}}
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
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{$permission->id}}</td>
                                <td>
                                    @if($editingPermissionId == $permission->id)
                                        <input wire:model="editingPermissionName">
                                        @error('editingPermissionName')
                                        <div class="text-red">{{$message}}</div>
                                        @enderror
                                        <div class="m-3">
                                            @include('livewire/include/buttons/group-cancel-update-button',$item = $permission)
                                        </div>

                                        <span class="right badge badge-primary">{{session('success_update')}}</span>

                                    @else
                                        {{$permission->name}}
                                    @endif

                                </td>
                                <td>
                                    @include('livewire/include/buttons/edit-delete-action',$item = $permission)

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="  my-2">
                        {{ $permissions->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>
