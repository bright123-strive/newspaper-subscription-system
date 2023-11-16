
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h5 class="mb-0">Edit Publication</h5>

                </div>
                {{-- <div class="col-12 text-end">
                    <a class="btn bg-gradient-dark mb-0 me-4" href="{{ route('category-management') }}">Back to list</a>
                </div> --}}
                <div class="card-body">
                    <form wire:submit.prevent="update" class='d-flex flex-column align-items-center'>

                        <div class="form-group col-12 col-md-6">
                            <label for="exampleInputname">Publication Name</label>
                            <input wire:model.lazy="publication.name" type="name" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Enter name">
                            @error('publication.name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="exampleInputname">Publication price</label>
                            <input wire:model.lazy="publication.price" type="name" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Enter name">
                            @error('publication.price')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-dark mt-3">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>

@endpush

