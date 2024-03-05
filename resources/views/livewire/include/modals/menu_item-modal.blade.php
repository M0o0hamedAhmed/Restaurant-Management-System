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
                <form wire:submit.prevent="store">
                    <div class="card-body">
                        @include('livewire.include.inputs.input-name')
                        @include('livewire.include.inputs.description-name')



                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input wire:model.live="price"  type="number" class="form-control  {{$errors->get('price') ?  'border-danger ': ''}}" id="name" placeholder="Enter Price" name="price"
                                 >
                            @if($errors->has('price'))
                                @foreach($errors->get('price') as $error)
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-dot-circle text-danger">{{$error}}</i>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <div wire:ignore class="form-group">
                            <label>Categories</label>
                            <select wire:model.live="category_id"   class="form-control select2bs4" style="width: 100%;"  >
                                <option></option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->


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
    $wire.on('menu-item-created', () => {
        $('#modal-open').modal('hide');

        Toast.fire({
            icon: 'success',
            title: 'The Menu Item has been added successfully.'
        })
    });
</script>
@endscript
