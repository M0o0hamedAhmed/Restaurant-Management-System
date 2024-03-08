<div>
    @include('livewire.include.modals.category-modal')
    @include('livewire.include.search-box.debounce-search-box')
    <div>
        @if(session('error'))
            <h1>{{session('error')}}</h1>
        @endif
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
                                <th>Menu Item Count</th>
                                <th>Latest Menu Item</th>
                                <th>Lowest Menu Item</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr :key="$category->id">
                                    <td>{{$category->id}}</td>
                                    <td>

                                        @if($editingCategoryId == $category->id)
                                            <input wire:model="editingCategoryName">
                                            @error('editingCategoryName')
                                            <div class="text-red">{{$message}}</div>
                                            @enderror
                                            <div class="m-3">
                                                @include('livewire/include/buttons/group-cancel-update-button',$item = $category)
                                            </div>

                                            <span
                                                class="right badge badge-primary">{{session('success_update')}}</span>
                                        @else
                                            {{$category->name}}
                                        @endif
                                    </td>
                                    <td>{{$category->menuItem_count}}</td>
                                    <td>{!! $category?->latestMenuItem?->name .' <br> '. $category?->latestMenuItem?->price . ' EGP '!!}</td>
                                    <td>{!! $category?->lowestPriceMenuItem?->name .' <br> '. $category?->lowestPriceMenuItem?->price . ' EGP '!!}</td>
                                    <td>
                                        @include('livewire/include/buttons/edit-delete-action',$item = $category)
                                    </td>

                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        <div class="  my-2">
                            {{ $categories->links() }}
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
