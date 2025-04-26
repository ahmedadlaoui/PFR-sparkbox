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
                            class="category-filter whitespace-nowrap px-4 py-2 border rounded-lg text-sm font-medium border-gray-200 text-gray-700">
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
                <p class="text-gray-600 font-medium font-['Inter',_sans-serif]"><span id="results-found">{{count($AllStartups)}}</span> results found</p>
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


    <x-footer />


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
                        document.getElementById('results-found').textContent = data.length;
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