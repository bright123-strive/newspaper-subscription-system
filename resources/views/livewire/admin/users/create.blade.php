
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h5 class="mb-0">Add User</h5>
                    <p>Create new user</p>
                </div>
                <div class="col-12 text-end">
                    <a class="btn bg-gradient-dark mb-0 me-4" href="{{ route('user-management') }}">Back to list</a>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store" class='d-flex flex-column align-items-center' enctype="multipart/form-data">
                        <div class="form-group col-12 col-md-6">

                            <label for="name">Name</label>
                            <input wire:model.lazy="name" type="name" class="form-control border border-2 p-2" id="exampleInputname" placeholder="Enter name"  value='{{ old('name') }}'>
                            @error('name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6 mt-3">

                            <label for="exampleInputemail">Email</label>
                            <input wire:model.lazy="email" type="email" class="form-control border border-2 p-2" id="exampleInputemail" placeholder="Enter name" value='{{ old('email') }}'>
                            @error('email')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6 mt-3">

                            <label for='role_id'>Roles</label>
                            <select wire:model.lazy="role_id" class="form-select border border-2 p-2"
                                data-style="select-with-transition" title="" data-size="100" id="role">
                                @foreach ($roles as $role)
                                        <option value="">select role</option>
                                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : ''}}>{{ $role->name }}
                                        </option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-6 mt-3">

                            <label for="examplePassword">Password</label>
                            <input wire:model.lazy="password" type="password" class="form-control border border-2 p-2" id="examplePassword" placeholder="Enter password">
                            @error('password')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6 mt-3">
                            <label for="examplePassword2">Confirm Password</label>
                            <input wire:model.lazy="passwordConfirmation" type="password" name='passwordConfirmation' class="form-control border border-2 p-2" id="examplePassword2" placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-dark mt-3">Add user</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>
@endpush
