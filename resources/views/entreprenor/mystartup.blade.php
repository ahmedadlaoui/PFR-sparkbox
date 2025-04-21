<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrepreneur Dashboard - SparkBox</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        /* Side navigation styling */
        .side-nav {
            width: 260px;
            height: calc(100vh - 80px);
            position: fixed;
            top: 80px;
            left: 0;
            background-color: white;
            border-right: 1px solid #F0F0F0;
            z-index: 30;
            overflow-y: auto;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.85rem 1.5rem;
            color: #666666;
            font-weight: 500;
        }

        .nav-link:hover {
            background-color: #F9FAFB;
            color: #1A1A1A;
        }

        .nav-link.active {
            color: #0049FF;
            background-color: #F0F4FF;
            font-weight: 600;
        }

        .nav-icon {
            margin-right: 12px;
            stroke-width: 1.8px;
        }

        /* Main content area styling */
        .main-content {
            padding-top: 30px;
            min-height: 100vh;
            margin-left: 0;
            display: flex;
            flex-direction: column;
            background-color: white;
            width: 100%;
        }

        /* Content container for proper width - match with home page */
        .content-container {
            width: 100%;
            max-width: 1280px;
            /* Changed from 1400px to match home page max-w-7xl */
            margin: 0 auto;
            padding: 0;
        }

        /* Responsive padding for inner content */
        .inner-content {
            padding: 0 24px;
            width: 100%;
        }

        /* The startup banner should fit within constraints */
        .startup-banner-wrapper {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            max-width: 1280px;
            /* Match max-width with content container */
        }

        /* Startup banner styling - updated */
        .startup-banner {
            position: relative;
            height: 320px;
            overflow: hidden;
            margin-bottom: 0;
        }

        .startup-banner img.cover-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.7) 100%);
        }

        .startup-logo {
            position: absolute;
            top: 30px;
            left: 30px;
            width: 80px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
        }

        .startup-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .edit-button {
            position: absolute;
            top: 30px;
            right: 30px;
            background-color: white;
            color: #333;
            border-radius: 8px;
            padding: 10px 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .edit-button i {
            margin-right: 8px;
        }

        .startup-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 30px;
            color: white;
        }

        .tag {
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            margin-right: 8px;
            backdrop-filter: blur(4px);
        }

        /* Statistics section styling */
        .stats-section {
            background-color: white;
            padding: 24px 0;
            border-bottom: 1px solid #F0F0F0;
        }

        .stat-item {
            text-align: center;
            padding: 0 10px;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 700;
            color: #1A1A1A;
            margin-bottom: 4px;
        }

        .stat-label {
            color: #666666;
            font-size: 14px;
            font-weight: 400;
        }

        /* Mobile responsive adjustments */
        @media (max-width: 768px) {
            .side-nav {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .side-nav.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .startup-info h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body class="font-inter bg-white text-[#1A1A1A] text-sm antialiased">
    <x-header />

    <main class="main-content">
        <div class="content-container">
            <div class="ml-0 md:ml-12 lg:ml-16">
                <div class="w-full px-6 py-10">
                    <div class="startup-banner-wrapper">
                        <div class="startup-banner">

                            <img src="https://images.unsplash.com/photo-1618044733300-9472054094ee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80"
                                alt="EcoFlow Energy" class="cover-image">


                            <div class="banner-overlay"></div>


                            <div class="startup-logo">
                                <img src="https://marketplace.canva.com/EAF0Hq4UHjM/1/0/1600w/canva-orange-phoenix-animal-gaming-logo-WIPEOAyYPIs.jpg"
                                    alt="EcoFlow Logo">
                            </div>


                            <button class="edit-button">
                                <i data-feather="edit-2"></i>
                                Edit Startup
                            </button>


                            <div class="startup-info">
                                <h1 class="text-2xl md:text-3xl font-extrabold mb-2 text-white">EcoFlow Energy Storage</h1>
                                <p class="text-lg mb-4 max-w-3xl opacity-90">Sustainable energy storage solutions with proprietary
                                    battery technology and AI-powered energy management systems for residential and commercial
                                    applications.</p>

                                <div class="mb-4">
                                    <span class="tag">CleanTech</span>
                                    <span class="tag">Energy</span>
                                    <span class="tag">Series B</span>
                                    <span class="tag">$42M Valuation</span>
                                </div>

                                <div class="flex items-center text-sm opacity-80">
                                    <span class="mr-4"><i data-feather="map-pin" class="h-4 w-4 inline mr-1"></i> San Francisco,
                                        CA</span>
                                    <span class="mr-4"><i data-feather="calendar" class="h-4 w-4 inline mr-1"></i> Founded
                                        2020</span>
                                    <span><i data-feather="globe" class="h-4 w-4 inline mr-1"></i> ecoflowenergy.com</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <section class="stats-section">
                        <div class="container mx-auto px-6">
                            <div class="flex flex-wrap justify-between">

                                <div class="w-1/5 stat-item">
                                    <p class="stat-number">$2.8M</p>
                                    <p class="stat-label">Total Funding</p>
                                </div>


                                <div class="w-1/5 stat-item">
                                    <p class="stat-number">12</p>
                                    <p class="stat-label">Investors</p>
                                </div>


                                <div class="w-1/5 stat-item">
                                    <p class="stat-number">86%</p>
                                    <p class="stat-label">Growth Rate</p>
                                </div>


                                <div class="w-1/5 stat-item">
                                    <p class="stat-number">4,500+</p>
                                    <p class="stat-label">Customers</p>
                                </div>


                                <div class="w-1/5 stat-item">
                                    <p class="stat-number">18mo</p>
                                    <p class="stat-label">Runway</p>
                                </div>
                            </div>
                        </div>
                    </section>


                    <section class="bg-white py-8">
                        <div class="container mx-auto px-6">
                            <div class="flex justify-between items-center mb-8">
                                <h2 class="text-xl md:text-2xl font-bold text-gray-900">Investors Interested in Your Startup</h2>
                                <a href="#"
                                    class="text-gray-700 hover:text-gray-900 text-sm font-medium flex items-center group">
                                    View All <i data-feather="chevron-right" class="h-4 w-4 ml-1"></i>
                                </a>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                                <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                                    <div class="flex items-center mb-5">
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Alex Morgan"
                                            class="w-16 h-16 rounded-full object-cover mr-4 border-2 border-white shadow-sm">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800">Alex Morgan</h3>
                                            <p class="text-gray-500 text-xs uppercase tracking-wider mt-1">Angel Investor</p>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                        <p class="text-gray-600 text-sm">Interested in CleanTech solutions with
                                            proven scalability and market fit.</p>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-800 flex items-center">
                                            <i data-feather="dollar-sign" class="h-4 w-4 mr-1.5 text-gray-500"></i>
                                            <span>Invested: </span>
                                            <span class="font-bold ml-1">$250,000</span>
                                        </p>

                                        <button
                                            class="px-4 py-1.5 border border-gray-200 text-gray-800 text-sm font-medium rounded-lg flex items-center bg-white">
                                            <i data-feather="message-circle" class="h-3.5 w-3.5 mr-1.5"></i>
                                            Chat
                                        </button>
                                    </div>
                                </div>


                                <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                                    <div class="flex items-center mb-5">
                                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Jessica Lee"
                                            class="w-16 h-16 rounded-full object-cover mr-4 border-2 border-white shadow-sm">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800">Jessica Lee</h3>
                                            <p class="text-gray-500 text-xs uppercase tracking-wider mt-1">Venture Capitalist
                                            </p>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                        <p class="text-gray-600 text-sm">Looking for renewable energy startups
                                            with innovative storage solutions.</p>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-800 flex items-center">
                                            <i data-feather="dollar-sign" class="h-4 w-4 mr-1.5 text-gray-500"></i>
                                            <span>Invested: </span>
                                            <span class="font-bold ml-1">$175,000</span>
                                        </p>

                                        <button
                                            class="px-4 py-1.5 border border-gray-200 text-gray-800 text-sm font-medium rounded-lg flex items-center bg-white">
                                            <i data-feather="message-circle" class="h-3.5 w-3.5 mr-1.5"></i>
                                            Chat
                                        </button>
                                    </div>
                                </div>


                                <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                                    <div class="flex items-center mb-5">
                                        <img src="https://randomuser.me/api/portraits/men/76.jpg" alt="Michael Zhang"
                                            class="w-16 h-16 rounded-full object-cover mr-4 border-2 border-white shadow-sm">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800">Michael Zhang</h3>
                                            <p class="text-gray-500 text-xs uppercase tracking-wider mt-1">Business Executive
                                            </p>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                        <p class="text-gray-600 text-sm">Focused on sustainable energy solutions
                                            with international market potential.</p>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-800 flex items-center">
                                            <i data-feather="dollar-sign" class="h-4 w-4 mr-1.5 text-gray-500"></i>
                                            <span>Invested: </span>
                                            <span class="font-bold ml-1">$320,000</span>
                                        </p>

                                        <button
                                            class="px-4 py-1.5 border border-gray-200 text-gray-800 text-sm font-medium rounded-lg flex items-center bg-white">
                                            <i data-feather="message-circle" class="h-3.5 w-3.5 mr-1.5"></i>
                                            Chat
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <div class="container mx-auto px-6 py-8">

                    </div>
                </div>
            </div>
        </div>

        <x-footer />
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Feather Icons
            feather.replace();

            // Mobile menu toggle
            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            const sideNav = document.querySelector('.side-nav');

            mobileMenuToggle.addEventListener('click', function() {
                sideNav.classList.toggle('open');
            });
        });
    </script>
</body>

</html>