<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SparkBox - Discover Deals</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#F59E0B',
                        secondary: '#FBBF24',
                        dark: '#111827',
                    },
                    'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                },
                animation: {
                    'float': 'float 3s ease-in-out infinite',
                    'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                },
                keyframes: {
                    float: {
                        '0%, 100%': {
                            transform: 'translateY(0)'
                        },
                        '50%': {
                            transform: 'translateY(-10px)'
                        },
                    }
                }
            }
        }
    </script>
    <style>
        /* Base styling with clean modern look - Changed to white background */
        body {
            background-color: #FFFFFF;
        }

        .hover-lift {
            transition: transform 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
        }

        /* Card-specific animations - match with index.html */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
        }

        /* Enhanced category filter style - Changed active color from orange to blue */
        .category-filter {
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .category-filter.active {
            background-color: #0049FF;
            color: white;
            border-color: #0049FF;
        }

        .category-filter:hover:not(.active) {
            border-color: #0049FF;
        }

        /* Search input clean style */
        .clean-search {
            border: none;
            outline: none;
            background: transparent;
        }

        .clean-search:focus {
            outline: none;
            box-shadow: none;
            border: none;
        }

        /* Better handling of the search and filters responsiveness */
        @media (max-width: 768px) {

            /* Stack search and filters on smaller screens */
            .flex.flex-wrap.items-center.gap-3 {
                flex-direction: column;
                align-items: stretch;
            }

            /* Make filters scroll horizontally on mobile */
            .overflow-x-auto {
                -webkit-overflow-scrolling: touch;
                scroll-snap-type: x mandatory;
                padding-bottom: 8px;
            }

            /* Ensure no scrollbar shown but still scrollable */
            .overflow-x-auto::-webkit-scrollbar {
                display: none;
            }

            /* Snap elements when scrolling */
            .category-filter {
                scroll-snap-align: start;
            }
        }
    </style>
</head>

<body class="font-inter bg-white text-sm antialiased">


    <x-header />
    <main class="pt-32 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-10">
                <h1 class="text-3xl md:text-5xl font-extrabold text-black font-['Inter',_sans-serif]">Investment
                    opportunities</h1>
                <p class="mt-2 text-base text-gray-600 font-['Inter',_sans-serif]">
                    Browse current investment opportunities on Republic. All companies are
                    <a href="#" class="text-blue-600 hover:underline">vetted & pass due diligence</a>.
                </p>
            </div>



            <div class="mb-8 border-b border-gray-200 pb-5">
                <div class="flex flex-wrap items-center gap-3">


                    <div class="flex items-center bg-gray-50 rounded-lg px-4 py-2.5 shadow-sm flex-grow">
                        <i data-feather="search" class="h-5 w-5 text-gray-400 mr-3"></i>
                        <input type="text" id="search-startups" placeholder="Search opportunities"
                            class="clean-search w-full font-['Inter',_sans-serif] text-gray-700 bg-transparent text-base">
                    </div>



                    <div class="flex items-center gap-2 overflow-x-auto pb-1 flex-nowrap">
                        <button
                            class="category-filter active whitespace-nowrap px-4 py-2 border rounded-lg text-sm font-medium border-gray-200 text-gray-700">
                            All
                        </button>
                        <button
                            class="category-filter whitespace-nowrap px-4 py-2 border rounded-lg text-sm font-medium border-gray-200 text-gray-700">
                            Sort by date
                        </button>
                        <button
                            class="category-filter whitespace-nowrap px-4 py-2 border rounded-lg text-sm font-medium border-gray-200 text-gray-700">
                            Sort by Number of offers
                        </button>
                    </div>
                </div>
            </div>



            <div class="flex justify-between items-center mb-6">
                <p class="text-gray-600 font-medium font-['Inter',_sans-serif]">{{count($AllStartups)}} results found</p>
            </div>



            <div id="startup-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($AllStartups as $Startup)

                <a href="{{ route('details', ['id' => $Startup->id]) }}" class="w-full bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden h-[500px]">
                    <div class="relative h-[255px]">
                        <img src="{{$Startup->cover}}"
                            alt="EcoFlow energy storage" class="w-full h-full object-cover">
                        <div
                            class="absolute -bottom-6 left-6 w-14 h-14 bg-white rounded-md shadow-md overflow-hidden border border-gray-100">
                            <img src="{{$Startup->logo}}"
                                alt="EcoFlow logo" class="w-full h-full object-cover rounded-[4px]">
                        </div>
                    </div>
                    <div class="pt-12 px-6 pb-6">
                        <h3 class="text-[24px] font-extrabold text-[#1A202C] mb-2 font-['Inter',_sans-serif]">{{$Startup->name}}
                        </h3>
                        <p class="text-[#555555] text-[15px] font-normal mb-3 font-['Inter',_sans-serif] line-clamp-2">
                            {{$Startup->description}}
                        </p>
                        <p class="text-[#999999] text-[16px] font-normal mb-4 font-['Inter',_sans-serif]">{{$Startup->created_at->format('F d, Y')}}
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">{{$Startup->category}}</span>

                        </div>
                    </div>
                </a>

                @endforeach









            </div>
    </main>


    <footer class="bg-[#1A1A1A] text-white pt-16 pb-8 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-wrap ml-0 md:ml-12 lg:ml-16">


                <div class="w-full md:w-1/3 mb-10 md:mb-0 pr-0 md:pr-10">
                    <div class="flex items-center mb-6">
                        <h3 class="text-xl font-bold font-['Inter',_sans-serif]">SparkBox</h3>
                        <span class="ml-1 opacity-70 text-xs">™</span>
                    </div>
                    <p class="text-gray-400 text-sm mb-6 font-['Inter',_sans-serif] leading-relaxed">
                        Connecting visionary founders with strategic capital and resources from investors who understand
                        the future.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>



                <div class="w-full md:w-1/6 mb-8 md:mb-0">
                    <h4 class="text-sm font-bold uppercase tracking-wider mb-5 font-['Inter',_sans-serif]">Platform</h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">For
                                Startups</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">For
                                Investors</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">Pricing</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">Features</a>
                        </li>
                    </ul>
                </div>



                <div class="w-full md:w-1/6 mb-8 md:mb-0">
                    <h4 class="text-sm font-bold uppercase tracking-wider mb-5 font-['Inter',_sans-serif]">Resources
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">Blog</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">Case
                                Studies</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">Events</a>
                        </li>
                    </ul>
                </div>



                <div class="w-full md:w-1/6 mb-8 md:mb-0">
                    <h4 class="text-sm font-bold uppercase tracking-wider mb-5 font-['Inter',_sans-serif]">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">About</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">Careers</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">Contact</a>
                        </li>
                    </ul>
                </div>



                <div class="w-full md:w-1/6">
                    <h4 class="text-sm font-bold uppercase tracking-wider mb-5 font-['Inter',_sans-serif]">Stay Updated
                    </h4>
                    <p class="text-gray-400 text-sm mb-4 font-['Inter',_sans-serif]">Subscribe to our newsletter</p>
                    <form>
                        <div class="flex flex-col">
                            <input type="email" placeholder="Your email"
                                class="bg-gray-800 text-gray-200 rounded-lg px-4 py-2.5 text-sm mb-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="submit"
                                class="bg-[#0049FF] hover:bg-blue-700 text-white text-sm font-medium py-2.5 px-4 rounded-lg transition-colors">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>



            <div
                class="border-t border-gray-800 mt-16 pt-8 flex flex-col md:flex-row justify-between ml-0 md:ml-12 lg:ml-16">
                <p class="text-gray-500 text-xs mb-4 md:mb-0 font-['Inter',_sans-serif]">
                    © 2023 SparkBox. All rights reserved.
                </p>
                <div class="flex space-x-6">
                    <a href="#"
                        class="text-gray-500 hover:text-gray-400 text-xs transition-colors font-['Inter',_sans-serif]">Privacy
                        Policy</a>
                    <a href="#"
                        class="text-gray-500 hover:text-gray-400 text-xs transition-colors font-['Inter',_sans-serif]">Terms
                        of Service</a>
                </div>
            </div>
        </div>
    </footer>


    <div
        class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 py-3 px-6 flex justify-around items-center md:hidden z-50">
        <a href="index.html" class="flex flex-col items-center text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="text-xs mt-1">Home</span>
        </a>
        <a href="#" class="flex flex-col items-center text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            <span class="text-xs mt-1">Deals</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-xs mt-1">Invest</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span class="text-xs mt-1">Profile</span>
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {


            const categoryFilters = document.querySelectorAll('.category-filter');
            const startupContainer = document.getElementById('startup-container');

            const searchbar = document.getElementById('search-startups');

            searchbar.addEventListener('input', (e) => {
                fetch(`/startups/search/${searchbar.value}`)
                    .then(response => response.json())
                    .then(data => {
                        startupContainer.innerHTML = '';
                        data.forEach(startup => {
                            const card = `
                                <a href="/deal_details/${startup.id}" class="w-full bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden h-[500px]">
                                    <div class="relative h-[255px]">
                                        <img src="${startup.cover}" alt="${startup.name}" class="w-full h-full object-cover">
                                        <div class="absolute -bottom-6 left-6 w-14 h-14 bg-white rounded-md shadow-md overflow-hidden border border-gray-100">
                                            <img src="${startup.logo}" alt="${startup.name} logo" class="w-full h-full object-cover rounded-[4px]">
                                        </div>
                                    </div>
                                    <div class="pt-12 px-6 pb-6">
                                        <h3 class="text-[24px] font-extrabold text-[#1A202C] mb-2 font-['Inter',_sans-serif]">${startup.name}</h3>
                                        <p class="text-[#555555] text-[15px] font-normal mb-3 font-['Inter',_sans-serif] line-clamp-2">
                                            ${startup.description}
                                        </p>
                                        <p class="text-[#999999] text-[16px] font-normal mb-4 font-['Inter',_sans-serif]">
                                            ${new Date(startup.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })}
                                        </p>
                                        <div class="flex flex-wrap gap-2">
                                            <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">${startup.category}</span>
                                        </div>
                                    </div>
                                </a>
                            `;
                            startupContainer.insertAdjacentHTML('beforeend', card);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);


                    });
            })

            categoryFilters.forEach(filter => {
                filter.addEventListener('click', function() {
                    searchbar.value = '';
                    categoryFilters.forEach(f => f.classList.remove('active'));
                    this.classList.add('active');

                    let filterparam;
                    if (this.innerHTML.trim() === 'All') {
                        filterparam = 'All';
                    } else if (this.innerHTML.trim() === 'Sort by date') {
                        filterparam = 'SortByDate';
                    } else {
                        filterparam = 'SortByOffers';
                    }

                    fetch(`/startups/json/${filterparam}`)
                        .then(response => response.json())
                        .then(data => {
                            startupContainer.innerHTML = '';

                            data.forEach(startup => {
                                const card = `
                                <a href="/deal_details/${startup.id}" class="w-full bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden h-[500px]">
                                    <div class="relative h-[255px]">
                                        <img src="${startup.cover}" alt="${startup.name}" class="w-full h-full object-cover">
                                        <div class="absolute -bottom-6 left-6 w-14 h-14 bg-white rounded-md shadow-md overflow-hidden border border-gray-100">
                                            <img src="${startup.logo}" alt="${startup.name} logo" class="w-full h-full object-cover rounded-[4px]">
                                        </div>
                                    </div>
                                    <div class="pt-12 px-6 pb-6">
                                        <h3 class="text-[24px] font-extrabold text-[#1A202C] mb-2 font-['Inter',_sans-serif]">${startup.name}</h3>
                                        <p class="text-[#555555] text-[15px] font-normal mb-3 font-['Inter',_sans-serif] line-clamp-2">
                                            ${startup.description}
                                        </p>
                                        <p class="text-[#999999] text-[16px] font-normal mb-4 font-['Inter',_sans-serif]">
                                            ${new Date(startup.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })}
                                        </p>
                                        <div class="flex flex-wrap gap-2">
                                            <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">${startup.category}</span>
                                        </div>
                                    </div>
                                </a>
                            `;
                                startupContainer.insertAdjacentHTML('beforeend', card);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                });
            });
        });
    </script>

</body>

</html>