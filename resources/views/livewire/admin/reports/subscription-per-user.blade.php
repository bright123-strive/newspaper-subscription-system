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
        margin-left: 5px;
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
   <hr>
   <p style="color:black">REPORT TO SHOW ALL SUBSCRIPTION PER CLIENT/SUBSCRIBER</p>
   <form method="post" action="get-subscription-per-user" >
   @csrf
   @method('POST')

        <hr>
        <div class="row">
            <div class="col-md-3">
              <div class="input-group input-group-outline my-3">
                 <?php
                          $users = \App\Models\User::where('role_id','3')->get();
                    ?>
                <select name="user_id" class="form-control multiste" required>
                    <option value="">Select User</option>
                    <option value="all">all Subscribers</option>
                    @foreach ($users as $user)
                    <option value={{ $user->id }}>{{ $user->name }}</option>

                    @endforeach

                </select>
              </div>
            </div>

              <div class="col-md-2">
                <button type="submit" class="btn btn-info btn-show-report">Show Report</button>
              </div>
            </div>


    </form>
    <hr>

<div>
    <button  class="btn btn-primary btn-lg" onclick="printTable();">Print</button>
    @if(isset($subscriptionPeriodsGrouped))
      <div id="toPrint">


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-body px-0 pb-2">
                        @foreach ($subscriptionPeriodsGrouped as $userId => $userData)
                            <h4>{{ $userData['user_name'] }}</h4>
                            <br>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>

                                            <th>Subscription ID</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Subscription Period</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userData['subscription_periods'] as $subscription)
                                            <tr>

                                                <td>{{ $subscription['subscription_id'] }}</td>
                                                <td>{{ $subscription['start_date'] }}</td>
                                                <td>{{ $subscription['end_date'] }}</td>
                                                <td>{{ $subscription['subscription_period'] }} Months</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr> <!-- Optional: Add a horizontal line between user tables -->
                        @endforeach
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
   function printTable() {
    var el = document.getElementById("toPrint");
    el.setAttribute('border', '1');
    el.setAttribute('cellpadding', '5');

    // Adding styles to the table
    el.style.borderCollapse = 'collapse';
    el.style.width = '100%';

    // Adding styles to table cells
    var cells = el.getElementsByTagName('td');
    for (var i = 0; i < cells.length; i++) {
        cells[i].style.border = '1px solid #dddddd';
        cells[i].style.padding = '8px';
        cells[i].style.textAlign = 'left';
    }

    newPrint = window.open("");
    newPrint.document.write(el.outerHTML);
    newPrint.print();
    newPrint.close();
}


    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets') }}/js/material-dashboard.min.js?v=3.0.1"></script>

    @livewireScripts
    </body>
    </html>
