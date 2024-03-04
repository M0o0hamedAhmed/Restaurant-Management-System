<!-- Search Box -->
<section class="content mb-5">
    <div class="container-fluid">
{{--        <h2 class="text-center display-4">Search</h2>--}}
        <div class="row">
            <div class="col-md-8 offset-md-2">
                    <div class="input-group">
                        <input wire:model.live.debounce.500ms="search" type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
