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
                    'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                },
                animation: {
                    'float': 'float 3s ease-in-out infinite',
                    'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                },
                keyframes: {
                    float: {
                        '0%, 100%': { transform: 'translateY(0)' },
                        '50%': { transform: 'translateY(-10px)' },
                    }
                }
            }
        }

    </script>
    <style>
        .gradient-text {
            background: linear-gradient(90deg, #F59E0B 0%, #FBBF24 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }

        .hover-lift {
            transition: transform 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
        }

        .shine {
            position: relative;
            overflow: hidden;
        }

        .shine::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(to right,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.3) 50%,
                    rgba(255, 255, 255, 0) 100%);
            transform: rotate(30deg);
            animation: shine 6s infinite;
        }

        @keyframes shine {
            0% {
                left: -100%;
                opacity: 0;
            }

            10% {
                left: -100%;
                opacity: 0.5;
            }

            20% {
                left: 100%;
                opacity: 0;
            }

            100% {
                left: 100%;
                opacity: 0;
            }
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-5px);
            box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.1);
        }

        .stat-icon {
            background: linear-gradient(135deg, #F59E0B 0%, #FBBF24 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }

        .hero-section {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .stats-wrapper {
            margin-top: auto;
        }

        #featured-content,
        #featured-image {
            transition: opacity 0.3s ease-in-out;
        }

        .aspect-w-16 {
            position: relative;
            padding-bottom: 56.25%;
        }

        .aspect-w-16>img {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            object-fit: cover;
            object-position: center;
        }

        /* Taller thumbnails */
        .aspect-w-16.aspect-h-10 {
            padding-bottom: 62.5%;
        }

        /* Hide gradient and text initially, show on hover */
        .domain-card .domain-overlay {
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
            z-index: 10;
        }

        .domain-card:hover .domain-overlay {
            opacity: 1;
            transform: translateY(0);
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            height: 40%;
        }


        .stat-content {
            display: none;
        }

        .domain-card .domain-name {
            opacity: 0;
            transition: opacity 0.3s ease-out, transform 0.3s ease-out;
        }

        .domain-card:hover .domain-name {
            opacity: 1;
            transform: translateY(-5px);
        }
    </style>
</head>

<body class="font-inter bg-whitetext-gray-800 text-sm antialiased">
    
<x-header />


    
    <section class="pt-14 bg-[#F2F2F2] relative" style="height: 550px;">
        <div id="domain-display" class="h-full w-full relative overflow-hidden">
            
            <div class="flex w-full h-full items-center">
                
                <div id="domain-content"
                    class="w-full md:w-1/2 xl:w-5.5/12 pl-8 sm:pl-12 md:pl-16 lg:pl-28 pr-8 z-10 ml-0 md:ml-12 lg:ml-16">
                    <h2 class="text-[48px] font-bold leading-tight text-[#1A1A1A] mb-4 font-['Inter',_sans-serif]">
                        Where Ideas Meet Investment
                    </h2>
                    <p class="text-[#666666] text-[18px] mb-7 max-w-lg font-['Inter',_sans-serif] font-normal">
                        SparkBox connects bold founders across tech, health, media, and more — all in one dynamic
                        platform.
                    </p>
                    <div class="mb-6">
                        <a href="#"
                            class="w-[178px] h-[48px] bg-[#0049FF] hover:bg-blue-700 text-white text-[18px] font-bold rounded-lg shadow-sm hover:shadow-md transition-all flex items-center justify-center font-['Inter',_sans-serif]">
                            Start investing

                        </a>
                    </div>
                </div>

                
                <div
                    class="hidden md:flex md:flex-row md:gap-2 absolute right-28 lg:right-44 top-1/2 transform -translate-y-1/2 z-10">
                    
                    <div class="w-[197px] flex flex-col gap-2">
                        
                        <div
                            class="rounded-[20px] shadow-md hover:shadow-lg transition-all duration-300 relative overflow-hidden domain-card">
                            <img src="https://in-focusindia.com/wp-content/uploads/2023/12/shutterstock_2263545623.jpg"
                                class="w-full rounded-[20px]" alt="AI Industry">

                        </div>

                        
                        <div
                            class="rounded-[20px] shadow-md hover:shadow-lg transition-all duration-300 relative overflow-hidden domain-card">
                            <img src="images/realestate.png" class="w-full rounded-[20px]" alt="Real Estate Industry">

                        </div>

                        
                        <div
                            class="rounded-[20px] shadow-md hover:shadow-lg transition-all duration-300 relative overflow-hidden domain-card">
                            <img src="images/conent.png" class="w-full rounded-[20px]" alt="Content Industry">
                            
                        </div>
                    </div>

                    
                    <div class="w-[197px] flex flex-col gap-2 h-full">
                        
                        <div
                            class="rounded-[20px] shadow-md hover:shadow-lg transition-all duration-300 relative overflow-hidden domain-card">
                            <img src="images/finance.png" class="w-full rounded-[20px]" alt="Finance Industry">
                            

                        </div>

                        
                        <div
                            class="rounded-[20px] shadow-md hover:shadow-lg transition-all duration-300 flex-grow relative overflow-hidden domain-card">
                            <img src="https://www.ibef.org/assets/images/Renewable-Energy-3.jpg"
                                class="w-full h-[270px] rounded-[20px] object-cover" alt="Renewable Energy Industry">

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
                    
                    <div class="w-1/5 text-left md:border-r md:border-gray-200 pr-2">
                        <p class="text-[#1A1A1A] text-2xl md:text-3xl font-bold font-['Inter',_sans-serif] mb-1">3M+</p>
                        <p class="text-[#666666] text-sm font-normal font-['Inter',_sans-serif]">Global investor
                            community</p>
                    </div>
                    
                    
                    <div class="w-1/5 text-left md:border-r md:border-gray-200 px-2">
                        <p class="text-[#1A1A1A] text-2xl md:text-3xl font-bold font-['Inter',_sans-serif] mb-1">2,500+
                        </p>
                        <p class="text-[#666666] text-sm font-normal font-['Inter',_sans-serif]">Ventures supported</p>
                    </div>

                    
                    <div class="w-1/5 text-left md:border-r md:border-gray-200 px-2">
                        <p class="text-[#1A1A1A] text-2xl md:text-3xl font-bold font-['Inter',_sans-serif] mb-1">31</p>
                        <p class="text-[#666666] text-sm font-normal font-['Inter',_sans-serif]">Unicorns in portfolio
                        </p>
                    </div>

                    
                    <div class="w-1/5 text-left md:border-r md:border-gray-200 px-2">
                        <p class="text-[#1A1A1A] text-2xl md:text-3xl font-bold font-['Inter',_sans-serif] mb-1">$2.6B+
                        </p>
                        <p class="text-[#666666] text-sm font-normal font-['Inter',_sans-serif]">Capital raised</p>
                    </div>

                    
                    <div class="w-1/5 text-left pl-2">
                        <p class="text-[#1A1A1A] text-2xl md:text-3xl font-bold font-['Inter',_sans-serif] mb-1">Powered
                            by</p>
                        <div class="flex items-center">
                            <p class="text-[#666666] text-sm font-normal font-['Inter',_sans-serif] mr-2">OpenAI</p>
                            <img src="images/openai-new-blossom1658.logowik.com.webp" alt="OpenAI Logo"
                                class="h-10 w-auto object-contain">
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
                <p class="text-[#666666] text-[18px] font-normal font-['Inter',_sans-serif]">The deals attracting the
                    most interest</p>
            </div>

            
            <div class="flex flex-nowrap overflow-x-auto pr-8 ml-0 md:ml-12 lg:ml-16 gap-[44px] pb-4">
                
                <div
                    class="w-[350px] flex-shrink-0 h-[500px] bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="relative h-[255px]">
                        <img src="https://images.unsplash.com/photo-1543286386-713bdd548da4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                            alt="EcoFlow energy storage" class="w-full h-full object-cover">
                        <div
                            class="absolute -bottom-6 left-6 w-14 h-14 bg-white rounded-md shadow-md overflow-hidden border border-gray-100">
                            <img src="https://marketplace.canva.com/EAF0Hq4UHjM/1/0/1600w/canva-orange-phoenix-animal-gaming-logo-WIPEOAyYPIs.jpg"
                                alt="EcoFlow logo" class="w-full h-full object-cover rounded-[4px]">
                        </div>
                    </div>
                    <div class="pt-12 px-6 pb-6">
                        <h3 class="text-[24px] font-extrabold text-[#1A202C] mb-2 font-['Inter',_sans-serif]">EcoFlow
                        </h3>
                        <p class="text-[#555555] text-[15px] font-normal mb-3 font-['Inter',_sans-serif] line-clamp-2">
                            Sustainable energy storage solutions for homes and businesses with innovative battery
                            technology.
                        </p>
                        <p class="text-[#999999] text-[16px] font-normal mb-4 font-['Inter',_sans-serif]">San Francisco,
                            CA</p>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">CleanTech</span>
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">Energy</span>
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">Hardware</span>
                        </div>
                    </div>
                </div>

                
                <div
                    class="w-[350px] flex-shrink-0 h-[500px] bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="relative h-[255px]">
                        <img src="https://images.unsplash.com/photo-1543286386-713bdd548da4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                            alt="EcoFlow energy storage" class="w-full h-full object-cover">
                        <div
                            class="absolute -bottom-6 left-6 w-14 h-14 bg-white rounded-md shadow-md overflow-hidden border border-gray-100">
                            <img src="https://marketplace.canva.com/EAF0Hq4UHjM/1/0/1600w/canva-orange-phoenix-animal-gaming-logo-WIPEOAyYPIs.jpg"
                                alt="EcoFlow logo" class="w-full h-full object-cover rounded-[4px]">
                        </div>
                    </div>
                    <div class="pt-12 px-6 pb-6">
                        <h3 class="text-[24px] font-extrabold text-[#1A202C] mb-2 font-['Inter',_sans-serif]">EcoFlow
                        </h3>
                        <p class="text-[#555555] text-[15px] font-normal mb-3 font-['Inter',_sans-serif] line-clamp-2">
                            Sustainable energy storage solutions for homes and businesses with innovative battery
                            technology.
                        </p>
                        <p class="text-[#999999] text-[16px] font-normal mb-4 font-['Inter',_sans-serif]">San Francisco,
                            CA</p>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">CleanTech</span>
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">Energy</span>
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">Hardware</span>
                        </div>
                    </div>
                </div>

                
                <div
                    class="w-[350px] flex-shrink-0 h-[500px] bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="relative h-[255px]">
                        <img src="https://images.unsplash.com/photo-1543286386-713bdd548da4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                            alt="EcoFlow energy storage" class="w-full h-full object-cover">
                        <div
                            class="absolute -bottom-6 left-6 w-14 h-14 bg-white rounded-md shadow-md overflow-hidden border border-gray-100">
                            <img src="https://marketplace.canva.com/EAF0Hq4UHjM/1/0/1600w/canva-orange-phoenix-animal-gaming-logo-WIPEOAyYPIs.jpg"
                                alt="EcoFlow logo" class="w-full h-full object-cover rounded-[4px]">
                        </div>
                    </div>
                    <div class="pt-12 px-6 pb-6">
                        <h3 class="text-[24px] font-extrabold text-[#1A202C] mb-2 font-['Inter',_sans-serif]">EcoFlow
                        </h3>
                        <p class="text-[#555555] text-[15px] font-normal mb-3 font-['Inter',_sans-serif] line-clamp-2">
                            Sustainable energy storage solutions for homes and businesses with innovative battery
                            technology.
                        </p>
                        <p class="text-[#999999] text-[16px] font-normal mb-4 font-['Inter',_sans-serif]">San Francisco,
                            CA</p>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">CleanTech</span>
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">Energy</span>
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">Hardware</span>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="flex justify-center mt-10 ml-0  ">
                <a href="#"
                    class="w-[350px] py-3 bg-white text-gray-800 text-base font-medium rounded-lg   transition-all border-2 border-gray-200  flex items-center justify-center font-['Inter',_sans-serif]">
                    View all
                </a>
            </div>
        </div>
    </section>

    
    <section class="bg-white py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="mb-12 pr-8 ml-0 md:ml-12 lg:ml-16">
                <h2 class="text-[32px] font-bold text-[#1A1A1A] mb-2 font-['Inter',_sans-serif]">Just launched</h2>
                <p class="text-[#666666] text-[18px] font-normal font-['Inter',_sans-serif]">Exciting new startups fresh
                    on the platform</p>
            </div>

            
            <div class="flex flex-nowrap overflow-x-auto pr-8 ml-0 md:ml-12 lg:ml-16 gap-[44px] pb-4">
                
                <div
                    class="w-[350px] flex-shrink-0 h-[500px] bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="relative h-[255px]">
                        <img src="https://images.unsplash.com/photo-1498049794561-7780e7231661?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                            alt="NutriTech food analytics" class="w-full h-full object-cover">
                        <div
                            class="absolute -bottom-6 left-6 w-14 h-14 bg-white rounded-md shadow-md overflow-hidden border border-gray-100">
                            <img src="https://static.vecteezy.com/system/resources/previews/008/214/517/original/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg"
                                alt="NutriTech logo" class="w-full h-full object-cover rounded-[4px]">
                        </div>
                    </div>
                    <div class="pt-12 px-6 pb-6">
                        <h3 class="text-[24px] font-extrabold text-[#1A202C] mb-2 font-['Inter',_sans-serif]">NutriTech
                        </h3>
                        <p class="text-[#555555] text-[15px] font-normal mb-3 font-['Inter',_sans-serif] line-clamp-2">
                            AI-powered food analytics platform helping consumers make healthier choices with
                            personalized nutrition insights.
                        </p>
                        <p class="text-[#999999] text-[16px] font-normal mb-4 font-['Inter',_sans-serif]">Boston, MA</p>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">FoodTech</span>
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">AI</span>
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">Health</span>
                        </div>
                    </div>
                </div>

                
                <div
                    class="w-[350px] flex-shrink-0 h-[500px] bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="relative h-[255px]">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                            alt="MobileMed telemedicine" class="w-full h-full object-cover">
                        <div
                            class="absolute -bottom-6 left-6 w-14 h-14 bg-white rounded-md shadow-md overflow-hidden border border-gray-100">
                            <img src="https://img.freepik.com/free-vector/abstract-logo-with-colorful-shapes_1017-30230.jpg"
                                alt="MobileMed logo" class="w-full h-full object-cover rounded-[4px]">
                        </div>
                    </div>
                    <div class="pt-12 px-6 pb-6">
                        <h3 class="text-[24px] font-extrabold text-[#1A202C] mb-2 font-['Inter',_sans-serif]">MobileMed
                        </h3>
                        <p class="text-[#555555] text-[15px] font-normal mb-3 font-['Inter',_sans-serif] line-clamp-2">
                            Transforming healthcare access in rural communities through affordable mobile telemedicine
                            solutions.
                        </p>
                        <p class="text-[#999999] text-[16px] font-normal mb-4 font-['Inter',_sans-serif]">Chicago, IL
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">HealthTech</span>
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">Mobile</span>
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">SaaS</span>
                        </div>
                    </div>
                </div>

                
                <div
                    class="w-[350px] flex-shrink-0 h-[500px] bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="relative h-[255px]">
                        <img src="https://images.unsplash.com/photo-1473186578172-c141e6798cf4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                            alt="EcoCharge solar" class="w-full h-full object-cover">
                        <div
                            class="absolute -bottom-6 left-6 w-14 h-14 bg-white rounded-md shadow-md overflow-hidden border border-gray-100">
                            <img src="https://img.freepik.com/premium-vector/leaf-energy-logo_23987-171.jpg"
                                alt="EcoCharge logo" class="w-full h-full object-cover rounded-[4px]">
                        </div>
                    </div>
                    <div class="pt-12 px-6 pb-6">
                        <h3 class="text-[24px] font-extrabold text-[#1A202C] mb-2 font-['Inter',_sans-serif]">EcoCharge
                        </h3>
                        <p class="text-[#555555] text-[15px] font-normal mb-3 font-['Inter',_sans-serif] line-clamp-2">
                            Portable solar charging solutions with breakthrough efficiency for outdoor enthusiasts and
                            emergency preparedness.
                        </p>
                        <p class="text-[#999999] text-[16px] font-normal mb-4 font-['Inter',_sans-serif]">Austin, TX</p>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">CleanTech</span>
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">Solar</span>
                            <span
                                class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">Hardware</span>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="flex justify-center mt-10 ml-0  ">
                <a href="#"
                    class="w-[350px] py-3 bg-white text-gray-800 text-base font-medium rounded-lg   transition-all border-2 border-gray-200  flex items-center justify-center font-['Inter',_sans-serif]">
                    View all
                </a>
            </div>
        </div>
    </section>


    <section class="bg-[#F8F9FA] py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row ml-0 md:ml-12 lg:ml-16">
               
                <div class="w-full lg:w-1/2 pr-0 lg:pr-16 mb-12 lg:mb-0">
                    <div class="relative mb-8">
                        <h2 class="text-[36px] font-bold text-[#1A1A1A] mb-2 font-['Inter',_sans-serif] leading-tight">
                            About <span class="text-[#0049FF]">SparkBox</span></h2>
                        <div class="w-16 h-1 bg-[#0049FF] rounded-full"></div>
                    </div>
                    <p class="text-[#1A1A1A] text-[18px] font-medium mb-6 font-['Inter',_sans-serif] leading-relaxed">
                        Connecting visionary founders with strategic capital since 2018.
                    </p>
                    <p class="text-[#666666] text-base font-normal font-['Inter',_sans-serif] leading-relaxed">
                        Our AI-powered platform creates perfect partnerships between ambitious startups and value-adding
                        investors across 23 countries, with 31 unicorns and $2.6B raised.
                    </p>
                </div>

                
                <div class="w-full lg:w-1/2">
                    <h3 class="text-lg font-semibold text-[#1A1A1A] mb-5 font-['Inter',_sans-serif]">Success Stories
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        
                        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                            <div class="flex items-center mb-3">
                                <img src="https://randomuser.me/api/portraits/women/42.jpg" alt="Founder"
                                    class="w-12 h-12 rounded-full object-cover mr-3">
                                <div>
                                    <p class="text-[#1A1A1A] font-medium text-sm font-['Inter',_sans-serif]">Emma
                                        Rodriguez</p>
                                    <p class="text-[#0049FF] text-xs font-['Inter',_sans-serif]">MedTech Startup</p>
                                </div>
                            </div>
                            <p class="text-[#666666] text-sm font-normal font-['Inter',_sans-serif]">
                                "Raised $4.2M seed round in just 3 weeks through SparkBox."
                            </p>
                        </div>

                        
                        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                            <div class="flex items-center mb-3">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Founder"
                                    class="w-12 h-12 rounded-full object-cover mr-3">
                                <div>
                                    <p class="text-[#1A1A1A] font-medium text-sm font-['Inter',_sans-serif]">David Kim
                                    </p>
                                    <p class="text-[#0049FF] text-xs font-['Inter',_sans-serif]">Fintech Solution</p>
                                </div>
                            </div>
                            <p class="text-[#666666] text-sm font-normal font-['Inter',_sans-serif]">
                                "Connected with key investors who helped scale globally."
                            </p>
                        </div>

                        
                        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                            <div class="flex items-center mb-3">
                                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Founder"
                                    class="w-12 h-12 rounded-full object-cover mr-3">
                                <div>
                                    <p class="text-[#1A1A1A] font-medium text-sm font-['Inter',_sans-serif]">Aisha
                                        Johnson</p>
                                    <p class="text-[#0049FF] text-xs font-['Inter',_sans-serif]">EdTech Platform</p>
                                </div>
                            </div>
                            <p class="text-[#666666] text-sm font-normal font-['Inter',_sans-serif]">
                                "Reached 1M users in 6 months with SparkBox's support."
                            </p>
                        </div>

                        
                        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                            <div class="flex flex-col justify-between h-full">
                                <div class="flex items-center mb-2">
                                    <div
                                        class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#0049FF]"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <p class="text-[#1A1A1A] font-medium text-sm font-['Inter',_sans-serif]">SparkBox
                                        Metrics</p>
                                </div>
                                <div class="grid grid-cols-2 gap-2 mt-2">
                                    <div>
                                        <p class="text-lg font-bold text-[#0049FF] font-['Inter',_sans-serif]">2,500+
                                        </p>
                                        <p class="text-[#666666] text-xs font-medium font-['Inter',_sans-serif]">
                                            Startups</p>
                                    </div>
                                    <div>
                                        <p class="text-lg font-bold text-[#0049FF] font-['Inter',_sans-serif]">$2.6B</p>
                                        <p class="text-[#666666] text-xs font-medium font-['Inter',_sans-serif]">Capital
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
<x-footer />

    
    <div
        class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 py-3 px-6 flex justify-around items-center md:hidden z-50">
        <a href="#" class="flex flex-col items-center text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="text-xs mt-1">Home</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            <span class="text-xs mt-1">Startups</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-xs mt-1">Investors</span>
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

    <style>
        /* Responsive fixes */
        @media (max-width: 768px) {
            body {
                padding-bottom: 70px;
                /* Space for mobile menu */
            }

            .w-1\/5 {
                width: 50%;
                /* Two stats per row on mobile */
                margin-bottom: 20px;
            }

            /* Make the hero text more readable on mobile */
            #domain-content h2 {
                font-size: 36px;
                line-height: 1.2;
            }

            #domain-content p {
                font-size: 16px;
            }

            /* Cards should take full width on mobile */
            .flex-nowrap.overflow-x-auto {
                padding-left: 20px;
                padding-right: 20px;
                gap: 20px;
            }

            .w-\[350px\].flex-shrink-0 {
                width: 90vw;
                max-width: 350px;
            }
        }
    </style>
</body>

</html>