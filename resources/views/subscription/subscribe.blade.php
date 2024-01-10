{{--
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Other head elements -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <!-- Add this to your Blade view or CSS file -->


</head>

<body>

    <section class="w-full p-4 md:py-12 lg:py-24 xl:py-32">
        <div class="container px-2 md:px-4 lg:px-6">
          <form action="/subscribing" method="post" class="space-y-4 border-2 border-gray-300 rounded-lg p-2 md:p-4 lg:p-8">
            @csrf
            @method('POST')
            <div class="space-y-2">
              <h2 class="text-xl md:text-2xl font-bold tracking-tighter bg-blue-500 border-2 border-blue-700 p-2 rounded-md">
                Details
              </h2>
              <div class="space-y-1">
                <label
                  class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                  for="location"
                >
                  Location
                </label>
                <input
                  class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  id="location"
                  name="location"
                  value={{ $location }}

                />
              </div>

              <div class="space-y-1">
                <label
                  class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                  for="Region"
                >
                  Region
                </label>
                <input
                  class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  id="region"
                  name="region"
                  value={{ $region }}

                />
              </div>
              <div class="flex flex-col mb-4">
                <label for="subscription_duration" class="inline-flex mb-2 text-sm text-gray-800">
                    Choose Subscription Duration
                </label>
                <select name="subscription_duration" id="subscription_duration"
                        class="w-full px-3 py-2 text-gray-800 border rounded outline-none bg-gray-50 focus:ring ring-indigo-300">
                    <option value="1">1 Month</option>
                    <option value="3">3 Months</option>
                    <option value="6">6 Months</option>
                    <option value="12">12 Months</option>
                </select>
            </div>
            </div>
            <div class="space-y-2">
              <h2 class="text-xl md:text-2xl font-bold tracking-tighter bg-blue-500 border-2 border-blue-700 p-2 rounded-md">
                Publications
              </h2>

              <div class="flex flex-col mb-4">
                <label for="publications" class="text-sm font-semibold text-gray-800 mb-2">
                    Choose Publications
                </label>
                @if($publications)
                <div class="grid gap-4">
                    @foreach($publications as $publication)
                        <div class="flex items-center">
                            <input
                                type="checkbox"
                                name="publication[]"
                                value="{{ $publication->id }}"
                                data-price="{{ $publication->price }}"
                                class="mr-2 text-indigo-500 publication-checkbox"
                            />
                            <span class="text-gray-800">{{ $publication->name }}</span>
                            <input
                                type="number"
                                name="copies[]"
                                class="ml-4 w-16 px-2 py-1 text-gray-800 border rounded copy-input"
                                placeholder="Copies"
                                oninput="updateAmount()"
                            />
                        </div>
                    @endforeach
                </div>
            @endif

            </div>
  <br>
              </div>
            </div>
            <button type="submit" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 text-white bg-blue-500 hover:bg-blue-600">
                subscribe
            </button>
          </form>
        </div>
      </section>



   <!-- Your content goes here -->
   <script src="{{ mix('js/app.js') }}"></script>

</body>
<script>
    function updateAmount() {
        let totalAmount = 0;
        const copyInputs = document.querySelectorAll('.copy-input');
        const publicationCheckboxes = document.querySelectorAll('.publication-checkbox');

        copyInputs.forEach((input, index) => {
            const copies = parseInt(input.value) || 0;
            const price = parseFloat(publicationCheckboxes[index].getAttribute('data-price')) || 0;
            totalAmount += copies * price;
        });

        document.getElementById('total-amount').innerText = totalAmount;
    }
</script>

</html>


 --}}

 <!DOCTYPE html>
<html lang='en' dir="{{ Route::currentRouteName() == 'rtl' ? 'rtl' : '' }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png">
  <title>
    The Nation
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
<body class="g-sidenav-show bg-light {{ Route::currentRouteName() == 'rtl' ? 'rtl' : '' }}">

<div class="container-fluid py-4 bg-gray-200">
    <nav class="navbar navbar-main bg-gradient-dark navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm">
                <a class="opacity-3 text-dark" href="javascript:;">
                  <svg width="12px" height="12px" class="mb-1 text-white" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>shop </title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-1716.000000, -439.000000)" fill="#fff" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                          <g transform="translate(0.000000, 148.000000)">
                            <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                            <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                </a>
              </li>
              {{-- <li class="breadcrumb-item text-sm"><a class="opacity-7 text-white" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">New User</li> --}}
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">New Subscription</h6>
          </nav>
          {{-- <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
            <a href="javascript:;" class="nav-link text-body p-0">
              <div class="sidenav-toggler-inner text-white">
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
              </div>
            </a>
          </div> --}}
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            
            <ul class="navbar-nav  justify-content-end">
             
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </a>
              </li>
              
            
                <ul class="dropdown-menu dropdown-menu-end p-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex align-items-center py-1">
                        <div class="my-auto">
                          <span class="material-icons">
                            email
                          </span>
                        </div>
                        <div class="ms-2">
                          <h6 class="text-sm font-weight-normal mb-0">
                            New message from Laur
                          </h6>
                        </div>
                      </div>
                    </a>
                  </li>
                
                  <li>
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex align-items-center py-1">
                        <div class="my-auto">
                          <span class="material-icons">
                            shopping_cart
                          </span>
                        </div>
                        <div class="ms-2">
                          <h6 class="text-sm font-weight-normal mb-0">
                            Payment successfully completed
                          </h6>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  </div>


  <div class="container border bg-white p-4">
    <form action="/subscribing" method="post"  >
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Location</label>
                <div class="input-group input-group-outline my-3">

                    <input type="text"  name="location"  value={{ $location }}  class="form-control" >
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Region</label>
                <div class="input-group input-group-outline my-3">

                    <input type="text"  name="region"  value={{ $region }} class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="input-group input-group-outline  my-3">
                    <select name="subscription_duration" id="subscription_duration" class="form-control pb-4" required>
                        <option value="">select duration</option>
                        <option value="1">1 Month</option>
                    <option value="3">3 Months</option>
                    <option value="6">6 Months</option>
                    <option value="12">12 Months</option>
                    </select>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="input-group input-group-outline my-3">
                    <select class="form-control pb-4" id="exampleFormControlSelect2">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                </div>
            </div> --}}
        </div>

        <hr>
             <p>select one or all publications number of copies per day</p>
        <hr>
        <div id="publication-message" class="mt-3 text-danger"></div>
        @if($publications)
        <div class="row">
            @foreach($publications as $publication)
                <div class="form-check">
                    <input
                        class="form-check-input publication-checkbox"
                        type="checkbox"
                        name="publication[]"
                        value="{{ $publication->id }}"
                        data-price="{{ $publication->price }}"
                      
                    />
                    <label class="custom-control-label">{{ $publication->name }}</label>
                </div>
    
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <input
                            type="number"
                            name="copies[]"
                            class="form-control copy-input"
                            placeholder="Copies"
                            oninput="updateAmount()"
                           
                        />
                    </div>
                </div>
            @endforeach
        </div>
    @endif
        {{-- @if($publications)
        <div class="row">
            @foreach($publications as $publication)
                <div class="form-check">
                    <input
                        class="form-check-input publication-checkbox"
                        type="checkbox"
                        name="publication[]"
                        value="{{ $publication->id }}"
                        data-price="{{ $publication->price }}"
                    required/>
                    <label class="custom-control-label">{{ $publication->name }}</label>
                </div>

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <input
                            type="number"
                            name="copies[]"
                            class="form-control copy-input"
                            placeholder="Copies"
                            oninput="updateAmount()"
                       required />
                    </div>
                </div>
            @endforeach
        </div>
        @endif --}}
        <button type="submit" class="btn bg-gradient-success">Subscribe</button>
    </form>
</div>

</div>





</div>
    <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function () {
          $('form').submit(function (e) {
              // Check if at least one checkbox is checked
              if ($('.publication-checkbox:checked').length === 0) {
                  e.preventDefault(); // Prevent form submission

                  // Display the message above the form
                  $('#publication-message').text('At least one publication must be selected.');
              }
          });
      });
  </script>

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
        document.addEventListener("DOMContentLoaded", function() {
          // Function to validate form fields
          function validateForm() {
            // Get form and required fields
            var form = document.querySelector("form");
            var requiredFields = form.querySelectorAll("[required]");

            // Flag to track form validity
            var isValid = true;

            // Check each required field
            requiredFields.forEach(function(field) {
              if (field.value.trim() === "") {
                isValid = false;
              }
            });

            // Display validation result
            if (!isValid) {
              alert("Please fill in all required fields before submitting.");
            }

            return isValid;
          }

          // Attach the validateForm function to the form submission event
          document.querySelector("form").addEventListener("submit", function(event) {
            if (!validateForm()) {
              // Prevent form submission if validation fails
              event.preventDefault();
            }
          });
        });
      </script>
     

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets') }}/js/material-dashboard.min.js?v=3.0.1"></script>

    @livewireScripts
    </body>
    </html>
