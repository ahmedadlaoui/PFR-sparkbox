<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SparkBox - Professional Investment Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                }
            }
        }
    </script>
    <style>
        

        
        .content-container {
            width: 100%;
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        @media (min-width: 640px) {
            .content-container {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }

        @media (min-width: 1024px) {
            .content-container {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }

        
        @media (max-width: 1280px) {
            .industry-cards {
                display: none !important;
            }

            #domain-content {
                width: 100% !important;
                max-width: 600px !important;
                margin-left: auto !important;
                margin-right: auto !important;
                text-align: center !important;
            }

            .hero-text-container h2,
            .hero-text-container p {
                text-align: center !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            #domain-content .hero-button {
                margin-left: auto !important;
                margin-right: auto !important;
            }

            .content-container .flex.items-center.justify-between {
                justify-content: center !important;
            }
        }

        @media (max-width: 768px) {
            .hero-text-container h2 {
                font-size: 36px !important;
                line-height: 1.2 !important;
            }

            .hero-text-container p {
                font-size: 16px !important;
            }
        }

        @media (max-width: 400px) {
            .hero-text-container h2 {
                font-size: 28px !important;
            }

            .hero-text-container p {
                font-size: 14px !important;
            }

            .stat-block {
                width: 100% !important;
                padding-right: 0 !important;
                border-right: none !important;
                margin-bottom: 16px !important;
                text-align: center !important;
            }

            .hero-button {
                width: 100% !important;
            }
        }

        @media (min-width: 401px) and (max-width: 639px) {
            .stat-block {
                width: 50% !important;
                margin-bottom: 20px !important;
            }
        }

        
        .startups-scroll-container {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            gap: 44px;
            padding-bottom: 1rem;
            -ms-overflow-style: none;
            scrollbar-width: none;
            margin-left: auto;
            margin-right: auto;
        }

        .startups-scroll-container::-webkit-scrollbar {
            display: none;
        }

        
        .startup-card {
            width: 350px;
            flex-shrink: 0;
        }
    </style>
</head>

<body class="font-inter bg-white text-sm antialiased">

    <x-header />

        <section class="pt-14 bg-[#F2F2F2] relative w-full" style="height: 550px;">
        <div class="h-full w-full relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 h-full">
                <div class="flex items-center justify-between h-full relative" style="max-width: 1184px; margin: 0 auto;">
                    <div id="domain-content" class="w-full md:w-1/2 xl:w-[570px] z-10 hero-text-container">
                        <h2 class="text-4xl sm:text-[48px] font-bold leading-tight text-[#1A1A1A] mb-4 font-['Inter',_sans-serif]">
                            Where Ideas Meet Investment
                        </h2>
                        <p class="text-[#666666] text-base sm:text-[18px] mb-7 max-w-lg font-['Inter',_sans-serif] font-normal">
                            SparkBox connects bold founders across tech, health, media, and more — all in one dynamic
                            platform.
                        </p>
                        <div class="mb-6">
                            <a href="#"
                                class="hero-button inline-block px-6 py-3 sm:w-[178px] sm:h-[48px] bg-[#0049FF] hover:bg-blue-700 text-white text-base sm:text-[18px] font-bold rounded-lg shadow-sm hover:shadow-md transition-all flex items-center justify-center font-['Inter',_sans-serif]">
                                Start investing
                            </a>
                        </div>
                    </div>

                                        <div class="hidden xl:flex md:flex-row md:gap-2 z-10 industry-cards" style="width: 414px;">
                        <div class="w-[197px] flex flex-col gap-2">
                            <div class="rounded-[20px] shadow-md hover:shadow-lg relative overflow-hidden domain-card">
                                <img src="https://in-focusindia.com/wp-content/uploads/2023/12/shutterstock_2263545623.jpg"
                                    class="w-full rounded-[20px]" alt="AI Industry">
                            </div>
                            <div class="rounded-[20px] shadow-md hover:shadow-lg relative overflow-hidden domain-card">
                                <img src="images/realestate.png" class="w-full rounded-[20px]" alt="Real Estate Industry">
                            </div>
                            <div class="rounded-[20px] shadow-md hover:shadow-lg relative overflow-hidden domain-card">
                                <img src="images/conent.png" class="w-full rounded-[20px]" alt="Content Industry">
                            </div>
                        </div>
                        <div class="w-[197px] flex flex-col gap-2 h-full">
                            <div class="rounded-[20px] shadow-md hover:shadow-lg relative overflow-hidden domain-card">
                                <img src="images/finance.png" class="w-full rounded-[20px]" alt="Finance Industry">
                            </div>
                            <div class="rounded-[20px] shadow-md hover:shadow-lg flex-grow relative overflow-hidden domain-card">
                                <img src="https://www.ibef.org/assets/images/Renewable-Energy-3.jpg"
                                    class="w-full h-[270px] rounded-[20px] object-cover" alt="Renewable Energy Industry">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section class="bg-white py-12 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between pr-8 ml-0 md:ml-12 lg:ml-16">
                <div class="flex flex-wrap w-full md:w-full mb-8 md:mb-0">
                    <div class="stat-block w-1/2 sm:w-1/5 text-left sm:border-r sm:border-gray-200 pr-2 mb-6 sm:mb-0">
                        <p class="text-xl sm:text-2xl md:text-3xl font-bold text-[#1A1A1A] font-['Inter',_sans-serif] mb-1">12k+</p>
                        <p class="text-[#666666] text-xs sm:text-sm font-normal font-['Inter',_sans-serif]">Global investor community</p>
                    </div>
                    <div class="stat-block w-1/2 sm:w-1/5 text-left sm:border-r sm:border-gray-200 px-2 mb-6 sm:mb-0">
                        <p class="text-xl sm:text-2xl md:text-3xl font-bold text-[#1A1A1A] font-['Inter',_sans-serif] mb-1">200+</p>
                        <p class="text-[#666666] text-xs sm:text-sm font-normal font-['Inter',_sans-serif]">Ventures supported</p>
                    </div>
                    <div class="stat-block w-1/2 sm:w-1/5 text-left sm:border-r sm:border-gray-200 px-2">
                        <p class="text-xl sm:text-2xl md:text-3xl font-bold text-[#1A1A1A] font-['Inter',_sans-serif] mb-1">31</p>
                        <p class="text-[#666666] text-xs sm:text-sm font-normal font-['Inter',_sans-serif]">Unicorns in portfolio</p>
                    </div>
                    <div class="stat-block w-1/2 sm:w-1/5 text-left sm:border-r sm:border-gray-200 px-2">
                        <p class="text-xl sm:text-2xl md:text-3xl font-bold text-[#1A1A1A] font-['Inter',_sans-serif] mb-1">$23M+</p>
                        <p class="text-[#666666] text-xs sm:text-sm font-normal font-['Inter',_sans-serif]">Capital raised</p>
                    </div>
                    <div class="stat-block w-full sm:w-1/5 text-center sm:text-left pl-0 sm:pl-2 mt-4 sm:mt-0">
                        <p class="text-xl sm:text-2xl md:text-3xl font-bold text-[#1A1A1A] font-['Inter',_sans-serif] mb-1">Powered by</p>
                        <div class="flex items-center justify-center sm:justify-start">
                            <p class="text-[#666666] text-xs sm:text-sm font-normal font-['Inter',_sans-serif] mr-2">Gemini</p>
                            <img src="https://brandlogos.net/wp-content/uploads/2025/03/gemini_icon-logo_brandlogos.net_bqzeu-300x300.png" alt="Gemini Logo"
                                class="h-8 sm:h-10 w-auto object-contain">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section class="bg-white py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="mb-12 pr-8 ml-0 md:ml-12 lg:ml-16">
                <h2 class="text-[32px] font-bold text-[#1A1A1A] mb-2 font-['Inter',_sans-serif]">Most traction</h2>
                <p class="text-[#666666] text-[18px] font-normal font-['Inter',_sans-serif]">The deals attracting the most interest</p>
            </div>

            <div class="flex flex-nowrap overflow-x-auto pr-8 ml-0 md:ml-12 lg:ml-16 gap-[44px] pb-4">
                @foreach($MosttractionStartups as $startup)
                <div class="w-[350px] flex-shrink-0 h-[500px] bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="relative h-[255px]">
                        <img src="{{$startup->cover}}"
                            alt="startup cover" class="w-full h-full object-cover">
                        <div class="absolute -bottom-6 left-6 w-14 h-14 bg-white rounded-md shadow-md overflow-hidden border border-gray-100">
                            <img src="{{$startup->logo}}"
                                alt="Startup logo" class="w-full h-full object-cover rounded-[4px]">
                        </div>
                    </div>
                    <div class="pt-12 px-6 pb-6">
                        <h3 class="text-[24px] font-extrabold text-[#1A202C] mb-2 font-['Inter',_sans-serif] line-clamp-2">{{$startup->name}}</h3>
                        <p class="text-[#555555] text-[15px] font-normal mb-3 font-['Inter',_sans-serif] line-clamp-2">
                            {{$startup->description}}
                        </p>
                        <p class="text-[#999999] text-[16px] font-normal mb-4 font-['Inter',_sans-serif]">Presented by {{$startup->user->name}}</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full line-clamp-1">{{$startup->category}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="flex justify-center mt-10 ml-0">
                <a href="{{route('deals')}}"
                    class="w-[350px] py-3 bg-white text-gray-800 text-base font-medium rounded-lg transition-all border-2 border-gray-200 flex items-center justify-center font-['Inter',_sans-serif]">
                    View all
                </a>
            </div>
        </div>
    </section>

        <section class="bg-white py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="mb-12 pr-8 ml-0 md:ml-12 lg:ml-16">
                <h2 class="text-[32px] font-bold text-[#1A1A1A] mb-2 font-['Inter',_sans-serif]">Just launched</h2>
                <p class="text-[#666666] text-[18px] font-normal font-['Inter',_sans-serif]">Exciting new startups fresh on the platform</p>
            </div>

            <div class="flex flex-nowrap overflow-x-auto pr-8 ml-0 md:ml-12 lg:ml-16 gap-[44px] pb-4">
                @foreach($JustLunchedStartups as $startup)
                <div class="w-[350px] flex-shrink-0 h-[500px] bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="relative h-[255px]">
                        <img src="{{$startup->cover}}"
                            alt="startup cover" class="w-full h-full object-cover">
                        <div class="absolute -bottom-6 left-6 w-14 h-14 bg-white rounded-md shadow-md overflow-hidden border border-gray-100">
                            <img src="{{$startup->logo}}"
                                alt="Startup logo" class="w-full h-full object-cover rounded-[4px]">
                        </div>
                    </div>
                    <div class="pt-12 px-6 pb-6">
                        <h3 class="text-[24px] font-extrabold text-[#1A202C] mb-2 font-['Inter',_sans-serif] line-clamp-2">{{$startup->name}}</h3>
                        <p class="text-[#555555] text-[15px] font-normal mb-3 font-['Inter',_sans-serif] line-clamp-2">
                            {{$startup->description}}
                        </p>
                        <p class="text-[#999999] text-[16px] font-normal mb-4 font-['Inter',_sans-serif]">Presented by {{$startup->user->name}}</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full line-clamp-1">{{$startup->category}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="flex justify-center mt-10 ml-0">
                <a href="{{route('deals')}}"
                    class="w-[350px] py-3 bg-white text-gray-800 text-base font-medium rounded-lg transition-all border-2 border-gray-200 flex items-center justify-center font-['Inter',_sans-serif]">
                    View all
                </a>
            </div>
        </div>
    </section>

    <x-footer />
</body>

</html>