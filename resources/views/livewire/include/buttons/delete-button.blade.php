<button wire:confirm.prompt="Are you sure you want to delete ?  \n Type user name ({{$item->name}}) to confirm |{{$item->name}}"
        class="btn btn-info bg-blue" type="button"
        wire:click="delete({{$item->id}})">Delete
</button>
