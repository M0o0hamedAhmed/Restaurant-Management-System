<button wire:confirm="Are you sure you want to delete ?"
        class="btn btn-info bg-blue" type="button"
        wire:click="delete({{$item->id}})">Delete
</button>
