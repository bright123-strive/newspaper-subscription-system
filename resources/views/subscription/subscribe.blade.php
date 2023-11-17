{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Multi step contact us form</title>
    <link
        href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
        rel="stylesheet"
    />
</head>

<body>
    <div class="mt-8">
        <h2
            class="
                mb-4
                text-2xl
                font-bold
                text-center text-gray-800
                lg:text-3xl
                md:mb-6
            "
        >
            Get in touch
        </h2>

        <p class="max-w-screen-md mx-auto text-center text-gray-500 md:text-lg">
            Please fill in the details below so that we can get in contact with you.
        </p>
    </div>
    <div class="text-gray-600">
        <div class="container flex flex-col flex-wrap px-5 py-4 mx-auto">
            <div class="flex flex-wrap mx-auto">
                <a
                    id="step1"
                    class="
                        inline-flex
                        items-center
                        justify-center
                        w-1/2
                        py-3
                        font-medium
                        leading-none
                        tracking-wider
                        text-indigo-500
                        bg-gray-100
                        border-b-2 border-indigo-500
                        rounded-t
                        sm:px-6 sm:w-auto sm:justify-start
                        title-font
                    "
                >
                    STEP 1
                </a>
                <a
                    id="step2"
                    class="
                        inline-flex
                        items-center
                        justify-center
                        w-1/2
                        py-3
                        font-medium
                        leading-none
                        tracking-wider
                        border-b-2 border-gray-200
                        sm:px-6 sm:w-auto sm:justify-start
                        title-font
                        hover:text-gray-900
                    "
                >
                    STEP 2
                </a>
                <a
                    id="step3"
                    class="
                        inline-flex
                        items-center
                        justify-center
                        w-1/2
                        py-3
                        font-medium
                        leading-none
                        tracking-wider
                        border-b-2 border-gray-200
                        sm:px-6 sm:w-auto sm:justify-start
                        title-font
                        hover:text-gray-900
                    "
                >
                    STEP 3
                </a>
            </div>
            <div class="flex flex-col w-full text-center">
                <div class="py-6 bg-white sm:py-8 lg:py-12">
                    <div class="px-4 mx-auto max-w-screen-2xl md:px-8">
                        <!-- form - start -->
                        <form id="multi-step-form" class="max-w-screen-md mx-auto"  method="post" action="/subscribing">
                            @csrf
                           @method('POST')
                            <!-- Step 1 -->
                            <div class="step" id="step-1">
                                <div class="flex flex-col mb-4">
                                    <label
                                        for="name"
                                        class="inline-flex mb-2 text-sm text-gray-800"
                                    >Please enter your address/location</label
                                    >
                                    <input
                                        name="name"
                                        class="
                                            w-full
                                            px-3
                                            py-2
                                            text-gray-800
                                            border
                                            rounded
                                            outline-none
                                            bg-gray-50
                                            focus:ring
                                            ring-indigo-300
                                        "
                                        value={{ $location }}
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
                            <!-- Step 2 -->
                            <div class="step hidden" id="step-2">
                                <div class="flex flex-col mb-4">
                                    <label for="publications" class="text-sm font-semibold text-gray-800 mb-2">
                                        Choose Publications
                                    </label>
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
                                </div>

                                <div class="flex items-center">
                                    <span class="text-gray-800 mr-4">Total Amount:</span>
                                    <span id="total-amount" class="font-semibold text-indigo-500">0</span>
                                </div>
                            </div>

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




                            <!-- Step 3 -->
                            <div class="step hidden" id="step-3">
                                <div class="flex flex-col mb-2">
                                    <label
                                        for="company"
                                        class="inline-flex mb-2 text-sm text-gray-800"
                                    >Please enter your company name (optional)</label
                                    >
                                    <input
                                        name="company"
                                        class="
                                            w-full
                                            px-3
                                            py-2
                                            text-gray-800
                                            border
                                            rounded
                                            outline-none
                                            bg-gray-50
                                            focus:ring
                                            ring-indigo-300
                                        "
                                    />
                                </div>


                                <button
                                type="submit"
                                class="
                                    px-6
                                    py-2
                                    text-sm text-white
                                    bg-indigo-500
                                    rounded-lg
                                    outline-none
                                    hover:bg-indigo-600
                                    ring-indigo-300
                                "
                            >
                                Submit
                            </button>
                            </div>



                            <div class="flex items-center justify-between">
                                <button
                                    class="
                                        inline-flex
                                        items-center
                                        px-6
                                        py-2
                                        text-sm text-gray-800
                                        rounded-lg
                                        shadow
                                        outline-none
                                        gap-x-1
                                        hover:bg-gray-100
                                        back-button
                                    "
                                >
                                    Back
                                </button>
                                <button
                                    id="next-button"
                                    class="
                                        px-6
                                        py-2
                                        text-sm text-white
                                        bg-indigo-500
                                        rounded-lg
                                        outline-none
                                        hover:bg-indigo-600
                                        ring-indigo-300
                                    "
                                >
                                   Next
                                </button>
                            </div>
                        </form>
                        <!-- form - end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>


        // document.addEventListener("DOMContentLoaded", function () {
        //     const form = document.getElementById("multi-step-form");
        //     const backButtons = document.querySelectorAll(".back-button");
        //     const nextButton = document.getElementById("next-button");
        //     const steps = document.querySelectorAll(".step");
        //     let currentStep = 1;

        //     // Function to show the current step
        //     const showStep = (stepNumber) => {
        //         steps.forEach((step) => {
        //             step.classList.add("hidden");
        //         });

        //         const currentStepElement = document.getElementById(`step-${stepNumber}`);
        //         currentStepElement.classList.remove("hidden");
        //     };

        //     // Event listener for the Next button
        //     nextButton.addEventListener("click", function (e) {
        //         e.preventDefault();
        //         currentStep++;
        //         showStep(currentStep);
        //     });

        //     // Event listeners for the Back buttons
        //     backButtons.forEach((button) => {
        //         button.addEventListener("click", function (e) {
        //             e.preventDefault();
        //             currentStep--;
        //             showStep(currentStep);
        //         });
        //     });
        // });
    </script>
     <script>
        document.addEventListener('DOMContentLoaded', function () {
            const nextButtons = document.querySelectorAll('.next-button');
            const submitButton = document.querySelector('.submit-button');

            // Hide the "Next" button and show the "Submit" button on the last step
            nextButtons.forEach(button => {
                button.style.display = 'block';
            });

            submitButton.style.display = 'none';

            const steps = document.querySelectorAll('.step');
            let currentStep = 0;

            // Function to navigate to the next step
            function nextStep() {
                steps[currentStep].classList.add('hidden');
                currentStep++;

                if (currentStep === steps.length - 1) {
                    // Last step, show the "Submit" button
                    submitButton.style.display = 'block';
                    nextButtons.forEach(button => {
                        button.style.display = 'none';
                    });
                } else {
                    // Not the last step, show the "Next" button
                    submitButton.style.display = 'none';
                    nextButtons.forEach(button => {
                        button.style.display = 'block';
                    });
                }

                steps[currentStep].classList.remove('hidden');
            }

            // Add click event listeners to "Next" buttons
            nextButtons.forEach(button => {
                button.addEventListener('click', nextStep);
            });
        });
    </script>
</body>
</html> --}}


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
                  placeholder="Enter your name"
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
  <div class="flex items-center">
    <span class="text-gray-800 mr-4">Total Amount:</span>
    <span id="total-amount" class="font-semibold text-indigo-500">0</span>
</div>
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

 {{-- <div class="space-y-2">
              <h2 class="text-xl md:text-2xl font-bold tracking-tighter bg-blue-500 border-2 border-blue-700 p-2 rounded-md">
                Payment Details
              </h2>
              <div class="space-y-1">
                <label
                  class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                  for="card"
                >
                  Card Number
                </label>
                <input
                  class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  id="card"
                  placeholder="Enter your card number"
                />
              </div>
              <div class="space-y-1">
                <label
                  class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                  for="amount"
                >
                  Payment Amount
                </label>
                <input
                  class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  id="amount"
                  placeholder="Enter your payment amount"
                />
              </div>
            </div> --}}


