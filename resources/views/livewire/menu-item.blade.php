<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a type="button" href="" class="btn btn-info">Create Menu Item</a>

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
