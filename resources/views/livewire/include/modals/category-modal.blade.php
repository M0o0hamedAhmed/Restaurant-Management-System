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
                        @include('livewire/include/inputs/input-name')


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
    $wire.on('category-created', () => {
        $('#modal-open').modal('hide');

        Toast.fire({
            icon: 'success',
            title: 'The category has been added successfully.'
        })
    });
</script>
@endscript
