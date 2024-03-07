{{--<button wire:click.prevent="store" type="button" class="btn bg-teal">Save </button>--}}
{{--<button wire:click.prevent="store" type="submit" class="btn bg-teal">Save </button>--}}
<button   type="submit"
        class="btn btn-primary d-flex justify-content-end bg-blue" @disabled($errors->isNotEmpty())>Submit
</button>
