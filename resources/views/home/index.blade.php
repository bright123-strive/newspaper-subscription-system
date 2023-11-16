<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Other head elements -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <!-- Add this to your Blade view or CSS file -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

</head>

<body>

    <div class="flex flex-col min-h-screen  dark:bg-gray-800">
        <header class="flex flex-col lg:flex-row items-center bg-sky-700 justify-between text-blue-600 px-8 py-4 border-b bg-sky-500 dark:border-gray-700">
            <div class="flex items-center space-x-2">
              <!-- Logo placeholder -->
              <img src="{{ asset('images/npl-logo.jpg') }}" alt="Logo"  class="h-12 w-12">

              <h1 class="text-2xl font-bold text-gray-900 text-white dark:text-gray-100">The nation</h1>
            </div>

            <nav class="mt-4 lg:mt-0 lg:ml-4 space-x-4 flex-grow lg:flex lg:justify-center">
              <a class="text-white dark:text-gray-100 hover:underline" href="#" rel="ugc">Features</a>
              <a class="text-white dark:text-gray-100 hover:underline" href="#" rel="ugc">Pricing</a>
              <a class="text-white dark:text-gray-100 hover:underline" href="#" rel="ugc">Testimonials</a>
              <a class="text-white dark:text-gray-100 hover:underline" href="{{ route('login') }}" rel="ugc">Login</a>
            </nav>

            <a href="{{ route('login', ['from_subscribe' => true]) }}" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 text-white bg-blue-500 hover:bg-blue-600">
                Subscribe Now
            </a>


          </header>
        <main class="flex-grow">
            {{-- <section class="flex flex-col bg-gradient-to-r from-rose-300 via-rose-200 to-rose-100 items-center justify-center space-y-4 px-8 py-20 bg-cover">
                <h2 class="text-4xl font-bold text-center text-gray-900 dark:text-gray-100">Stay Informed, Subscribe Now!</h2>
                <p class="max-w-xl text-xl text-center text-gray-600 dark:text-gray-400">
                    Get the latest news delivered right to your doorstep. Subscribe to Newsly today!
                </p>
                <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 text-white bg-blue-500 hover:bg-blue-600">
                    Get Started
                </button>
            </section> --}}
            <section class="flex bg-gradient-to-r from-rose-300 via-rose-200 to-rose-100 items-center justify-center space-x-8 px-8 py-20 bg-cover">
                <!-- Content on the left -->
                <div class="flex-grow text-center">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100">Stay Informed, Subscribe Now!</h2>
                    <p class="max-w-xl text-xl text-center text-gray-600 dark:text-gray-400 mx-auto">
                        Get the latest news delivered right to your doorstep. Subscribe to Newsly today!
                    </p>
                    <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 text-white bg-blue-500 hover:bg-blue-600">
                        Get Started
                    </button>
                </div>

                <!-- Image on the right with added margin -->
                <div class="flex-shrink-0" style="margin-right: 1rem;">
                    <img src="{{ asset('images/img1.png') }}" alt="Your Image" class="w-52 h-64 object-cover">
                </div>
            </section>
          <section id="features" class="flex flex-col space-y-4 px-8 py-16">
            <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100">Why Newsly?</h2>
            <div class="grid gap-8 md:grid-cols-3">
              <div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Latest News</h3>
                <p class="text-gray-600 dark:text-gray-400">Stay updated with the latest news from around the world.</p>
              </div>
              <div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">In-depth Analysis</h3>
                <p class="text-gray-600 dark:text-gray-400">Get in-depth analysis of current events from experts.</p>
              </div>
              <div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Delivered to Your Doorstep</h3>
                <p class="text-gray-600 dark:text-gray-400">
                  Get your newspaper delivered to your doorstep every morning.
                </p>
              </div>
            </div>
          </section>
          <section id="pricing" class="flex flex-col space-y-4 px-8 py-16 bg-gray-100 dark:bg-gray-900">
            <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100">Subscription Plans</h2>
            <div class="grid gap-8 md:grid-cols-3">
              <div class="flex flex-col items-center space-y-4 p-8 border rounded-md">
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Monthly</h3>
                <p class="text-4xl font-bold text-gray-900 dark:text-gray-100">$10</p>
                <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 text-white bg-blue-500 hover:bg-blue-600">
                  Subscribe Now
                </button>
              </div>
              <div class="flex flex-col items-center space-y-4 p-8 border-2 border-blue-500 rounded-md">
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Quarterly</h3>
                <p class="text-4xl font-bold text-gray-900 dark:text-gray-100">$25</p>
                <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 text-white bg-blue-500 hover:bg-blue-600">
                  Subscribe Now
                </button>
              </div>
              <div class="flex flex-col items-center space-y-4 p-8 border rounded-md">
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Yearly</h3>
                <p class="text-4xl font-bold text-gray-900 dark:text-gray-100">$90</p>
                <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 text-white bg-blue-500 hover:bg-blue-600">
                  Subscribe Now
                </button>
              </div>
            </div>
          </section>
          <section id="testimonials" class="flex flex-col space-y-4 px-8 py-16">
            <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100">What Our Readers Say</h2>
            <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
              <div class="flex flex-col items-center space-y-2 p-4 border rounded-md">
                <p class="text-gray-600 dark:text-gray-400">
                  "Newsly is my go-to source for news. It's reliable and timely."
                </p>
                <h4 class="text-lg font-bold text-gray-900 dark:text-gray-100">- Jane Doe</h4>
              </div>
              <div class="flex flex-col items-center space-y-2 p-4 border rounded-md">
                <p class="text-gray-600 dark:text-gray-400">"I love the in-depth analysis in Newsly."</p>
                <h4 class="text-lg font-bold text-gray-900 dark:text-gray-100">- John Smith</h4>
              </div>
              <div class="flex flex-col items-center space-y-2 p-4 border rounded-md">
                <p class="text-gray-600 dark:text-gray-400">
                  "Getting the newspaper at my doorstep every morning is very convenient."
                </p>
                <h4 class="text-lg font-bold text-gray-900 dark:text-gray-100">- Mary Johnson</h4>
              </div>
            </div>
          </section>
          <section id="how-it-works" class="flex flex-col space-y-4 px-8 py-16 bg-gray-100 dark:bg-gray-900">
            <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100">How It Works</h2>
            <div class="grid gap-8 md:grid-cols-3">
              <div class="flex flex-col items-center space-y-4">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class=" h-8 w-8 text-blue-500"
                >
                  <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <line x1="19" x2="19" y1="8" y2="14"></line>
                  <line x1="22" x2="16" y1="11" y2="11"></line>
                </svg>
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Sign Up</h3>
                <p class="text-center text-gray-600 dark:text-gray-400">Create an account with us.</p>
              </div>
              <div class="flex flex-col items-center space-y-4">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class=" h-8 w-8 text-blue-500"
                >
                  <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                  <line x1="2" x2="22" y1="10" y2="10"></line>
                </svg>
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Choose a Plan</h3>
                <p class="text-center text-gray-600 dark:text-gray-400">
                  Choose a subscription plan that suits your needs.
                </p>
              </div>
              <div class="flex flex-col items-center space-y-4">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class=" h-8 w-8 text-blue-500"
                >
                  <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"></path>
                  <path d="M18 14h-8"></path>
                  <path d="M15 18h-5"></path>
                  <path d="M10 6h8v4h-8V6Z"></path>
                </svg>
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Receive Your Newspaper</h3>
                <p class="text-center text-gray-600 dark:text-gray-400">Get your newspaper delivered to your doorstep.</p>
              </div>
            </div>
          </section>
        </main>
        <footer class="flex items-center justify-between px-8 py-4 border-t dark:border-gray-700">
          <div class="flex items-center space-x-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class=" h-8 w-8 text-gray-900 dark:text-gray-100"
            >
              <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"></path>
              <path d="M18 14h-8"></path>
              <path d="M15 18h-5"></path>
              <path d="M10 6h8v4h-8V6Z"></path>
            </svg>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Newsly</h1>
          </div>
          <div class="flex items-center space-x-4">
            <a class="text-gray-900 dark:text-gray-100 hover:underline" href="#" rel="ugc">
              Contact Us
            </a>
            <a class="text-gray-900 dark:text-gray-100 hover:underline" href="#" rel="ugc">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class=" h-5 w-5"
              >
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
              </svg>
              <span class="sr-only">Facebook</span>
            </a>
            <a class="text-gray-900 dark:text-gray-100 hover:underline" href="#" rel="ugc">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class=" h-5 w-5"
              >
                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
              </svg>
              <span class="sr-only">Twitter</span>
            </a>
            <a class="text-gray-900 dark:text-gray-100 hover:underline" href="#" rel="ugc">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class=" h-5 w-5"
              >
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
              </svg>
              <span class="sr-only">Instagram</span>
            </a>
          </div>
          <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 text-white bg-blue-500 hover:bg-blue-600">
            Subscribe Now
          </button>
        </footer>
      </div>

   <!-- Your content goes here -->
   <script src="{{ mix('js/app.js') }}"></script>
   <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>


</html>
