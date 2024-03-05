
<div>
    @include('livewire.include.modals.menu_item-modal')
    @include('livewire.include.search-box.debounce-search-box')
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
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menu_items as $menu_item)
                            <tr>
                                <td>{{$menu_item->id}}</td>
                                <td>{{$menu_item->name}}</td>
                                <td>{{$menu_item->description}}</td>
                                <td>{{$menu_item->price}}</td>
                                <td>{{$menu_item->category->name}}</td>
                                <td>   @include('livewire/include/buttons/edit-delete-action',$item = $menu_item) </td>

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
