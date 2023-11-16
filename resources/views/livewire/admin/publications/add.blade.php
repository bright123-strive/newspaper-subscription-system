<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                    <div class="card-body">
                    <form wire:submit.prevent="store" class='d-flex flex-column align-items-center'>



                        <div class="form-group col-12 col-md-6">
                            <label for="exampleInputname">name</label>
                            <input wire:model.lazy='name' type="text" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Enter name">
                            @error('name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="exampleInputname">price</label>
                            <input wire:model.lazy='price' type="number" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Enter name">
                            @error('name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-dark mt-3">Add Publication</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>

@endpush



