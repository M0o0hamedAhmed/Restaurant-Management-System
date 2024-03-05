<div>
    @include('livewire.include.search-box.debounce-search-box')
    @include('livewire.include.modals.user-modal')

    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        @include('livewire/include/buttons/add-button')
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
                                    <td class="col-2">{{$user->email}}</td>
                                    <td class="col-1">{{$user->phone_number}}</td>
                                    <td class="col-3">
                                        @foreach($user->getRoleNames() as $role)
                                            <span class="right badge badge-primary">{{$role}}</span>
                                        @endforeach
                                    </td>
                                    <td class="d-flex justify-content-around">
                                        @include('livewire/include/buttons/edit-delete-action',$item = $user)
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        <div class="my-2">
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
</div>
