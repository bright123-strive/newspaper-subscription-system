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
                       <div class="row">
                         <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="{{ route('convert-pdf') }}"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Download PDF
                                </a>
                        </div>
                       </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <?php  $id =1 ; ?>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            NAME
                                        </th>
                                        <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                LOCATION
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                REGION
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                TOTAL COPIES</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                TOTAL PRICE</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                               DAYS REMAINING
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                STATUS</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscriptionData as $subscription)
                                        @php
                                        $user = \App\Models\User::find($subscription['user_id']); // Use the correct namespace for your User model
                                    @endphp

                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{$id++ }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{ $user->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    {{$subscription['location']  }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    {{$subscription['region']  }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    {{$subscription['total_copies']  }}
                                                </div>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                {{$subscription['total_price']  }}
                                            </td>
                                            <td class="align-middle text-center">
                                                {{$subscription['remaining_days'] }}
                                            </td>
                                            <td class="align-middle text-center">
                                                {{$subscription['status'] }}
                                            </td>
                                            {{-- <td class="align-middle">
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('view-subscription', $subscription['subscription_id'])}}" data-original-title=""
                                                    title="">
                                                    <i class="fa fa-eye"></i>
                                                    <div class="ripple-container"></div>
                                                </a>

                                                <button type="button" class="btn btn-success btn-lg btn-link" data-original-title="" title=""
                                            onclick="confirm('Are you sure you want to submit this timesheet?') || event.stopImmediatePropagation()"
                                            wire:click="activateSubscription('{{ $subscription['subscription_id'] }}')">
                                        Approve
                                        <div class="ripple-container"></div>
                                    </button>
                                            </td> --}}
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



