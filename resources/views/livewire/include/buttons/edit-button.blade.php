{{--<a class="btn bg-teal" wire:click="edit({{$item->id}})" data-toggle="modal" data-target="#modal-open">--}}
{{--    <i class="fas fa-edit" ></i> Edit--}}
{{--</a>--}}


<button type="button" class="btn bg-teal" @click="$dispatch('edit-mode', { user: {{$item->id}} })" data-toggle="modal" data-target="#modal-open">
    <i class="fas fa-edit" ></i> Edit
</button>
{{--<button @click="$dispatch('post-created', { title: 'Post Title' })">...</button>--}}
