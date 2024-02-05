<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles

    <script>
        // Function to reveal the features section with scrolling animation
        function revealFeaturesSection() {
            // Get the features section element
            var featuresSection = document.getElementById('features-section');

            // Add a class to change opacity and trigger CSS transition
            featuresSection.classList.add('opacity-100');

            // Scroll to the features section with smooth animation
            featuresSection.scrollIntoView({ behavior: 'smooth' });
        }
    </script>

    <!-- Include Swiper CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Other head content... -->

    <script>
        // Initialize Swiper
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('.swiper-container', {
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
    <style>
        .swiper-container {
            width: 100%;
            height: 550px;
            /* Set the desired height for your slides */
            overflow: hidden;
            /* Hide the overflow content */
        }

        .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border: 1px solid #ccc;
            /* Add a border for styling */
            box-sizing: border-box;
        }
    </style>

</head>

<body>

    <div class="bg-green-900 antialiased ">
        <!-- Add a blue background to the navigation bar -->
        <nav class="flex flex-row p-6 mt-0 mb-6 mx-8 text-white" aria-label="Global">
            <div class="flex-grow">
                <a href="#" class="text-3xl font-bold hover:text-blue-500 px-4 py-2 pr-6">GIGS.LK</a>
            </div>
            <div class="flex-shrink flex items-center space-x-2">
                <!-- Links aligned to the right -->
                <a href="#" class="text-md font-semibold hover:text-blue-500 px-8 py-2">Product</a>
                <a href="#" class="text-md font-semibold hover:text-blue-500 px-8 py-2">Features</a>
                <a href="#" class="text-md font-semibold hover:text-blue-500 px-8 py-2">Find Jobs</a>
                <a href="#" class="text-md font-semibold hover:text-blue-500 px-8 py-2">About us</a>

                <!-- Two buttons with background color after "About us" -->
                <a href="{{ route('login') }}" class="text-md hover:text-blue-500 text-white px-8 py-2">Login</a>
                <a href="{{ route('register') }}"
                    class="text-md bg-green-500  text-white px-8 py-2 rounded-lg">Register</a>
            </div>
        </nav>

        <div class="mx-auto max-w-4xl py-20 sm:py-38 lg:py-46 text-white flex items-center justify-center">
            <div class="max-w-lg p-6">
                <h2 class="text-4xl font-bold mb-4">Redefine Your Freelance Game</h2>
                <p class="text-lg text-gray-300 mb-6">Gigs.lk is not just a freelancing platform, it's a community that
                    thrives on local talent. Discover job opportunities right here in Sri Lanka and let your skills
                    shine on
                    a global stage. Connect with clients who understand the value of local expertise.</p>
                <a href="#"
                    class="text-lg bg-green-500 text-white px-8 py-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Hire a Freelancer
                </a>
            </div>
            <div class="max-w-md p-6">
                <img src="images/landing-page-01.png" alt="Your Image" class="w-85 h-85 rounded-lg">

            </div>
        </div>

    </div>


    <div class="mx-auto max-w-4xl py-20 sm:py-38 lg:py-46 text-white flex items-center justify-center">
        <!-- First Section -->
        <div class="max-w-md pl-6 pr-6 text-center">
            <img src="images/landing-page-02.png" alt="Image 1" class="mx-auto w-85 h-85 rounded-lg mb-4">
            <h2 class="text-2xl font-bold mb-2 text-black">Create Account</h2>
            <p class="text-gray-600 pl-10 pr-10">First you have to create a account here</p>
        </div>

        <!-- Second Section -->
        <div class="max-w-md pl-6 pr-6 text-center">
            <img src="images/landing-page-03.png" alt="Image 2" class="mx-auto w-85 h-85 rounded-lg mb-4">
            <h2 class="text-2xl font-bold mb-2 text-black">Search work </h2>
            <p class="text-gray-600 pl-10 pr-10">Search the best freelance work here</p>
        </div>

        <!-- Third Section -->
        <div class="max-w-md pl-6 pr-6 text-center">
            <img src="images/landing-page-04.png" alt="Image 2" class="mx-auto w-85 h-85 rounded-lg mb-4">
            <h2 class="text-2xl font-bold mb-2 text-black">Save and apply</h2>
            <p class="text-gray-600 pl-10 pr-10">Apply or save and start your work</p>
        </div>
    </div>

    <div class="mx-auto max-w-4xl py-20 sm:py-38 lg:py-46 text-white flex items-center justify-center">
        <div class="max-w-3x1 pl-6 pr-6 text-center">
            <img src="images/landing-page-05.png" alt="Your Image" class="float-left w-1/2 h-auto rounded-lg mb-4">
            <div class="text-right">
                <h2 class="text-4xl font-bold mb-2 text-black mb-10">
                    Find The Best <span class="text-green-500">Freelancers</span> Here
                </h2>

                <p class="text-gray-600">Discover top-tier freelancers with the expertise you need at our platform. Our
                    curated marketplace connects you with skilled professionals from various industries, ensuring you
                    find the best talent for your projects. Whether you're seeking web developers, graphic designers,
                    writers, or experts in other fields, our platform offers a diverse pool of freelancers ready to
                    deliver high-quality work. Save time and effort by accessing a community of freelancers committed to
                    excellence. Find the best freelancers here and elevate your projects to new heights.</p>
            </div>
        </div>
    </div>

    <!-- pitch feature -->

    <div class="mx-auto max-w-3xl py-20 sm:py-38 lg:py-46 text-white flex items-center justify-center">
        <div class="max-w-3x1  text-center">
            <img src="images/landing-page-pitchfeature.png" alt="Your Image"
                class="float-left w-1/3 h-auto rounded-lg mb-6 mr-10">
            <div class="text-right">
                <h2 class="text-4xl font-bold mb-2 text-black mb-10">
                    Seamless <span class="text-green-500">Pitch Feature</span>
                </h2>
                <p class="text-gray-600">
                    Our unique pitch feature sets us apart. With a simple click on client profiles, developers can
                    initiate the pitch process, presenting their skills and ideas directly to potential clients. It's
                    your chance to stand out and showcase what makes you exceptional.</p>
            </div>
        </div>
    </div>

    <!-- Escrow feature -->

    <div class="mx-auto max-w-3xl py-20 sm:py-38 lg:py-46 text-white flex items-center justify-center">
        <div class="max-w-3x1  text-center">
            <img src="images/landing-page-escrowfeature.png" alt="Your Image"
                class="float-left w-1/3 h-auto rounded-lg mb-6 mr-10">
            <div class="text-right">
                <h2 class="text-4xl font-bold mb-2 text-black mb-10">
                    Secure Payments with <span class="text-green-500">Escrow</span>
                </h2>

                <p class="text-gray-600">
                    At Gigs.lk, we prioritize fairness. Our built-in escrow system
                    ensures that you get paid for your hard work. No more worries about payment delays or disputes –
                    focus on delivering quality work, and we'll take care of the rest.</p>
            </div>
        </div>
    </div>

    <!-- immersive content -->

    <div class="mx-auto max-w-3xl py-20 sm:py-38 lg:py-46 text-white flex items-center justify-center">
        <div class="max-w-3x1  text-center">
            <img src="images/landing-page-imersivecontent.png" alt="Your Image"
                class="float-left w-1/3 h-auto rounded-lg mb-6 mr-10">
            <div class="text-right">
                <h2 class="text-4xl font-bold mb-2 text-black mb-10">
                    <span class="text-green-500">Immersive Content</span> for Branding
                </h2>
                <p class="text-gray-600">
                    We believe in boosting the profiles of our local freelance developers. Gigs.lk provides a platform
                    for immersive content creation, allowing you to showcase your projects, skills, and unique
                    personality. Elevate your personal brand and attract clients from around the world.</p>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="bg-green-100 mt-20">
        <div class="mx-auto max-w-4xl py-20 sm:py-38 lg:py-46 text-white flex items-center justify-center">
            <div class="max-w-4x1 text-center">
                <h1 class="text-4xl font-bold text-black mb-4">Newsletter Subscriptions</h1>
                <p class="text-gray-500 mb-6 text-2xl">Subscribe to our newsletter to get new freelance work and
                    projects</p>
                <!-- Newsletter Form -->
                <form action="#" method="POST" class="flex flex-col items-center">
                    <input type="email" name="email" placeholder="Enter your email address"
                        class="text-center border border-gray-300 p-2 rounded-md mb-2 focus:outline-none focus:ring focus:border-blue-300 w-2/3">
                    <button type="submit"
                        class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 mt-10 w-1/3">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </div>


    <!-- Footer Section -->

    <div class="container max-w-screen-xl mx-auto px-4 mt-20 mb-20">
        <div class="flex flex-col lg:flex-row lg:justify-between">
            <div class="space-y-7 mb-10 lg:mb-0">
                <h2 class="text-4xl font-bold text-black flex justify-center lg:justify-start">
                    GIGS.LK
                </h2>

                <p class="font-light text-gray-400 text-md md:text-lg text-center lg:text-left">
                    Powerful Freelance Marketplace System <br>
                    with ability to change the Users (Freelancers & Clients)
                </p>

                <div class="flex items-center justify-center lg:justify-start space-x-5">
                    <a href="#"
                        class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-info hover:text-white transition ease-in-out duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-facebook">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>

                    <a href="#"
                        class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-info hover:text-white transition ease-in-out duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-twitter">
                            <path
                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                            </path>
                        </svg>
                    </a>

                    <a href="#"
                        class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-info hover:text-white transition ease-in-out duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-linkedin">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                            </path>
                            <rect x="2" y="9" width="4" height="12"></rect>
                            <circle cx="4" cy="4" r="2"></circle>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="text-center lg:text-left space-y-7 mb-10 lg:mb-0">
                <h4 class="font-semibold text-gray-900 text-lg md:text-2xl">
                    For Employers
                </h4>

                <a href="#"
                    class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">
                    Find Freelancers</a>

                <a href="#"
                    class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Post Project</a>

                <a href="#"
                    class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Escrow System</a>

                <a href="#"
                    class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Privacy Policy</a>
            </div>

            <div class="text-center lg:text-left space-y-7 mb-10 lg:mb-0">
                <h4 class="font-semibold text-gray-900 text-lg md:text-2xl">
                    For Freelancers
                </h4>

                <a href="#"
                    class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Find Work</a>

                <a href="#"
                    class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Create Account</a>
            </div>

            <div class="text-center lg:text-left space-y-7 mb-10 lg:mb-0">
                <h4 class="font-semibold text-gray-900 text-lg md:text-2xl">
                    Legal
                </h4>

                <a href="#"
                    class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">FAQ</a>

                <a href="#"
                    class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Terms
                    &amp; Conditions</a>
            </div>
        </div>
    </div>
    <!-- container.// -->





    @livewireStyles
</body>

</html>