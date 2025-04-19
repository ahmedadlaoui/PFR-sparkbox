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
    
    <header class="bg-white backdrop-blur-sm shadow-soft fixed w-full z-50">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between h-20 items-center px-6">
                
                <div class="pl-8 sm:pl-12 md:pl-16  pr-8">
                    <span class="text-xl font-bold text-dark">SparkBox</span>
                </div>

                
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-dark text-base font-medium font-['Inter',_sans-serif]">Home</a>
                    <a href="#"
                        class="text-gray-600 text-base hover:text-blue-600 transition-colors font-['Inter',_sans-serif]">Startups</a>
                    <a href="#"
                        class="text-gray-600 text-base hover:text-blue-600 transition-colors font-['Inter',_sans-serif]">Investors</a>
                    <a href="#"
                        class="text-gray-600 text-base hover:text-blue-600 transition-colors font-['Inter',_sans-serif]">About</a>
                    <a href="#"
                        class="text-gray-600 text-base hover:text-blue-600 transition-colors font-['Inter',_sans-serif]">Blog</a>
                </nav>

                
                <div>
                    <a href="#"
                        class="px-6 py-2.5 bg-white text-gray-800 text-base font-medium rounded-lg shadow-sm hover:shadow-md transition-all border-2 border-gray-800 hover:bg-gray-100 font-['Inter',_sans-serif]">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </header>

    
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
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
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
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">Documentation</a>
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
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">Partners</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">Press</a>
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
                        <li><a href="#"
                                class="text-gray-400 hover:text-white text-sm transition-colors font-['Inter',_sans-serif]">Our
                                Team</a></li>
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
                    <a href="#"
                        class="text-gray-500 hover:text-gray-400 text-xs transition-colors font-['Inter',_sans-serif]">Cookie
                        Policy</a>
                </div>
            </div>
        </div>
    </footer>

    
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