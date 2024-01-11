<!DOCTYPE html>
<html lang='en' dir="{{ Route::currentRouteName() == 'rtl' ? 'rtl' : '' }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png">
  <title>
    NPL
  </title>

  <!-- Metas -->
  @if (env('IS_DEMO'))
    <meta name="keywords" content="creative tim, updivision, html dashboard, laravel, livewire, alpine.js, html css dashboard laravel, livewire material dashboard laravel, laravel material dashboard laravel pro, livewire material dashboard, laravel material dashboard pro, material admin, livewire dashboard, laravel dashboard pro, laravel admin, web dashboard, bootstrap 5 dashboard laravel, bootstrap 5, css3 dashboard, bootstrap 5 admin laravel, material dashboard bootstrap 5 laravel, frontend, responsive bootstrap 5 dashboard, material dashboard, material laravel bootstrap 5 dashboard" />
    <meta name="description" content="Fullstack tool for building Laravel apps with Livewire and hundreds of UI components" />
    <meta itemprop="name" content="Material Dashboard 2 PRO Laravel Livewire by Creative Tim & UPDIVISION" />
    <meta itemprop="description" content="Fullstack tool for building Laravel apps with Livewire and hundreds of UI components" />
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/601/original/material-dashboard-pro-laravel-livewire.jpg" />
    <meta name="twitter:card" content="product" />
    <meta name="twitter:site" content="@creativetim" />
    <meta name="twitter:title" content="Material Dashboard 2 PRO Laravel Livewire by Creative Tim & UPDIVISION" />
    <meta name="twitter:description" content="Fullstack tool for building Laravel apps with Livewire and hundreds of UI components" />
    <meta name="twitter:creator" content="@creativetim" />
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/601/original/material-dashboard-pro-laravel-livewire.jpg" />
    <meta property="fb:app_id" content="655968634437471" />
    <meta property="og:title" content="Material Dashboard 2 PRO Laravel Livewire by Creative Tim & UPDIVISION" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.creative-tim.com/live/material-dashboard-pro-laravel-livewire" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/601/original/material-dashboard-pro-laravel-livewire.jpg" />
    <meta property="og:description" content="Fullstack tool for building Laravel apps with Livewire and hundreds of UI components" />
    <meta property="og:site_name" content="Creative Tim" />
  @endif

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets') }}/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/css/nucleo-svg.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets') }}/css/material-dashboard.css?v=3.0.1" rel="stylesheet" />
  <!-- Quill -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <!-- Alpine -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

  @livewireStyles

  <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    hr{
        border-radius: 1px solid black;
    }

    /* Add additional styles as needed */
</style>
</head>
<body class="g-sidenav-show bg-gray-200 {{ Route::currentRouteName() == 'rtl' ? 'rtl' : '' }}">



<div class="container-fluid py-4 bg-gray-200">

    <div class="row">
        <p style="color:black">REPORT TO SHOW SUBSCRIPTION PER REGION</p>
   <hr>
   <form method="post" action="get-region-report" >
   @csrf
   @method('POST')

        <hr>
        <div class="row">
            <div class="col-md-3">
              <div class="input-group input-group-outline my-3">

                <select name="region" class="form-control multiste" required>
                    <option value="">Select Region</option>
                                                    <option value="Northern">Northern</option>
                                                    <option value="Central">Center</option>
                                                    <option value="Southern">Southern</option>
                </select>
              </div>
            </div>
                
             
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-info btn-show-report">Show Report</button>
           </div>


    </form>
    <hr>

<div>
    
@if (isset($subscriptionData))

        <!-- Navbar -->
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">

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


                         {{-- <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="{{ route('region-pdf') }}"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Download PDF
                                </a>
                        </div> --}}
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



@endif
</div>





</div>
    <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>

<!-- For PDF export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <!-- Kanban scripts -->
    <script src="{{ asset('assets') }}/js/plugins/dragula/dragula.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/jkanban/jkanban.js"></script>
    @stack('js')
    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>

    <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/choices.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/quill.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/flatpickr.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/dropzone.min.js"></script>
    <script>
        if (document.getElementById('editor')) {
            var quill = new Quill('#editor', {
                theme: 'snow' // Specify theme in configuration
            });
        }

        if (document.getElementById('choices-multiple-remove-button')) {
            var element = document.getElementById('choices-multiple-remove-button');
            const example = new Choices(element, {
                removeItemButton: true
            });

            example.setChoices(
                [{
                        value: 'One',
                        label: 'Label One',
                        disabled: true
                    },
                    {
                        value: 'Two',
                        label: 'Label Two',
                        selected: true
                    },
                    {
                        value: 'Three',
                        label: 'Label Three'
                    },
                ],
                'value',
                'label',
                false,
            );
        }

        if (document.querySelector('.datetimepicker')) {
            flatpickr('.datetimepicker', {
                allowInput: true
            }); // flatpickr
        }

        Dropzone.autoDiscover = false;
        var drop = document.getElementById('dropzone')
        var myDropzone = new Dropzone(drop, {
            url: "/file/post",
            addRemoveLinks: true

        });



    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets') }}/js/material-dashboard.min.js?v=3.0.1"></script>

    @livewireScripts
    </body>
    </html>
