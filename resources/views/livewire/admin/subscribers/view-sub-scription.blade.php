
        <!-- Navbar -->
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        @if (session('status'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success alert-dismissible text-white mt-3" role="alert">
                            <span class="text-sm">{{ Session::get('status') }}</span>
                            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
                @if (session('error'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-danger alert-dismissible text-white mt-3" role="alert">
                            <span class="text-sm">{{ Session::get('error') }}</span>
                            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            {{-- <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3"><strong> Add, Edit, Delete features are not
                                        functional!</strong> This is a<strong> PRO</strong> feature! Click
                                    <strong><a
                                            href="https://www.creative-tim.com/product/material-dashboard-pro-laravel-livewire"
                                            target="_blank" class="text-white"><u>here</u> </a></strong>to see
                                    the PRO product!</h6>
                            </div> --}}
                        </div>
                        <div class=" me-3 my-3 text-end">
                            {{-- <a class="btn bg-gradient-dark mb-0" href="{{ route('add-publication') }}"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                Publication</a> --}}
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <?php  $id =1 ; ?>
                                    <thead>
                                        <tr>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            #</th>
                                              
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                PUBLICATION</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                COPIES</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                               PRICE
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscriptionData as $subscription)


                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{$id ++}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{$subscription->publication_name}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    {{$subscription->copies  }}
                                                </div>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                {{$subscription->total_price  }}
                                            </td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



