<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoFlow Energy Storage - Deal Details | SparkBox</title>
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
                        primary: '#0049FF',
                        secondary: '#F8F9FA',
                        dark: '#1A1A1A',
                        'text-secondary': '#666666',
                    },
                    boxShadow: {
                        'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                    }
                }
            }
        }
    </script>
    <style>
        /* General styles - Simplified modern design */
        body {
            background-color: #FFFFFF;
            color: #1A1A1A;
            font-family: 'Inter', sans-serif;
        }

        /* Container for centered content */
        .container-centered {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Reduced width hero image with simpler styling */
        .hero-container {
            margin-top: 2rem;
            margin-bottom: 2rem;
            position: relative;
        }

        .hero-image {
            position: relative;
            height: 360px;
            background-size: cover;
            background-position: center;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8));
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2.5rem;
            color: white;
        }

        /* Modern company logo styling - reduced padding */
        .company-logo {
            position: absolute;
            bottom: -32px;
            left: 2.5rem;
            width: 72px;
            height: 72px;
            background: white;
            border-radius: 4px;
            padding: 0.4rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid #f5f5f5;
            z-index: 10;
        }

        /* Content section styling */
        .content-section {
            margin-top: 2.5rem;
            margin-bottom: 2.5rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.25rem;
            color: #111111;
            font-family: 'Inter', sans-serif;
        }

        /* Card styling - more minimal */
        .content-card {
            background: white;
            border-radius: 4px;
            border: 1px solid #F0F0F0;
            padding: 1.75rem;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.02);
            margin-bottom: 1.5rem;
        }

        /* Stats card - simplified */
        .stat-card {
            background: white;
            border-radius: 4px;
            border: 1px solid #F0F0F0;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            height: auto;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.02);
            margin-bottom: 1.5rem;
        }

        /* Fixed statistics sidebar */
        .stats-sidebar {
            position: sticky;
            top: 100px;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
        }

        /* Hide scrollbar for clean look */
        .stats-sidebar::-webkit-scrollbar {
            width: 0px;
            background: transparent;
        }

        /* Image gallery - simplified */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1rem;
        }

        .gallery-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        /* Table styles - cleaner */
        .details-table {
            width: 100%;
            font-family: 'Inter', sans-serif;
        }

        .details-table td {
            padding: 0.75rem 0;
            border-bottom: 1px solid #F0F0F0;
        }

        .details-table tr:last-child td {
            border-bottom: none;
        }

        /* Redesigned team layout */
        .team-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
        }

        .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 240px;
        }

        .team-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1.25rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .team-name {
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }

        .team-role {
            color: #666666;
            font-size: 0.9rem;
            margin-bottom: 0.75rem;
        }

        .team-bio {
            font-size: 0.85rem;
            color: #555;
            line-height: 1.5;
        }

        /* Tags for categories - simpler */
        .tag {
            display: inline-block;
            background-color: #F8F9FA;
            color: #333;
            font-size: 0.7rem;
            padding: 0.25rem 0.65rem;
            border-radius: 4px;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
        }

        /* Two-column layout */
        .two-column {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        @media (max-width: 768px) {
            .two-column {
                grid-template-columns: 1fr;
            }

            .stats-sidebar {
                position: static;
            }
        }

        /* Simple statistics design with dark text */
        .stat-block {
            margin-bottom: 1.75rem;
            padding: 1.25rem;
            border-radius: 4px;
            border: 1px solid #f0f0f0;
            background-color: white;
        }

        .stat-number {
            font-size: 1.75rem;
            font-weight: 700;
            color: #111;
            margin-bottom: 0.25rem;
            line-height: 1;
            font-family: 'Inter', sans-serif;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #555;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
        }

        /* Progress bar - simpler */
        .progress-container {
            width: 100%;
            background-color: #F5F5F5;
            border-radius: 4px;
            height: 6px;
            margin: 0.75rem 0;
        }

        .progress-bar {
            height: 6px;
            border-radius: 4px;
            background-color: #333;
        }

        /* Key metrics grid */
        .metrics-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }

        .metric-item {
            padding: 1rem;
            background-color: #FAFAFA;
            border-radius: 4px;
        }

        /* Enhanced headings - darker, simpler */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #111;
            font-family: 'Inter', sans-serif;
        }

        h1 {
            font-weight: 800;
        }

        h2 {
            font-weight: 700;
        }

        h3 {
            font-weight: 700;
        }

        h4 {
            font-weight: 600;
        }

        /* Transparent buttons with no border */
        .transparent-btn {
            background-color: transparent;
            border: none;
            color: #666;
            font-weight: 500;
            display: flex;
            align-items: center;
            padding: 0.5rem;
            cursor: pointer;
        }

        .transparent-btn:hover {
            color: #111;
        }

        .transparent-btn i {
            margin-right: 0.5rem;
        }
    </style>
</head>

<body class="font-inter text-sm antialiased">
    <!-- Header - Same as other pages -->
    <header class="bg-white backdrop-blur-sm fixed w-full z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between h-20 items-center px-6">
                <!-- Brand Name -->
                <div class="pl-8 sm:pl-12 md:pl-16 pr-8">
                    <span class="text-xl font-bold text-dark">SparkBox</span>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="index.html"
                        class="text-gray-600 text-base hover:text-blue-600 transition-colors font-['Inter',_sans-serif]">Home</a>
                    <a href="deals.html" class="text-dark text-base font-medium font-['Inter',_sans-serif]">Startups</a>
                    <a href="#"
                        class="text-gray-600 text-base hover:text-blue-600 transition-colors font-['Inter',_sans-serif]">Investors</a>
                    <a href="#"
                        class="text-gray-600 text-base hover:text-blue-600 transition-colors font-['Inter',_sans-serif]">About</a>
                    <a href="#"
                        class="text-gray-600 text-base hover:text-blue-600 transition-colors font-['Inter',_sans-serif]">Blog</a>
                </nav>

                <!-- Account Button -->
                <div>
                    <a href="#"
                        class="px-6 py-2.5 bg-white text-gray-800 text-base font-medium rounded-lg shadow-sm hover:shadow-md transition-all border-2 border-gray-800 hover:bg-gray-100 font-['Inter',_sans-serif]">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section with Reduced Width -->
    <section class="pt-20">
        <div class="container-centered">
            <div class="hero-container">
                <div class="hero-image"
                    style="background-image: url('https://images.unsplash.com/photo-1618044733300-9472054094ee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80')">
                    <div class="hero-overlay">
                        <h1 class="text-4xl md:text-5xl font-bold mt-3 text-white">EcoFlow Energy Storage</h1>
                        <p class="text-lg text-white mt-2 max-w-2xl">Sustainable energy storage solutions with
                            proprietary battery technology and AI-powered management systems.</p>
                    </div>
                </div>
                <!-- Company Logo -->
                <div class="company-logo bg-white">
                    <img src="https://marketplace.canva.com/EAF0Hq4UHjM/1/0/1600w/canva-orange-phoenix-animal-gaming-logo-WIPEOAyYPIs.jpg"
                        alt="EcoFlow logo" class="w-full h-full object-contain rounded-[4px]">
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section - Restructured without tabs -->
    <div class="container-centered">
        <div class="two-column">
            <div>
                <!-- Company Information -->
                <div class="content-card">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="tag">CleanTech</span>
                        <span class="tag">Energy</span>
                        <span class="tag">Hardware</span>
                    </div>
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-2xl font-bold mb-2">EcoFlow Energy Storage</h2>
                            <p class="text-gray-600">San Francisco, California • Founded 2018</p>
                        </div>
                        <div class="flex space-x-3">
                            <button class="transparent-btn">
                                <i data-feather="mail" class="h-4 w-4"></i> Contact
                            </button>
                            <button class="transparent-btn">
                                <i data-feather="bookmark" class="h-4 w-4"></i> Save
                            </button>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold mb-4">About EcoFlow</h3>
                    <div class="prose max-w-none text-gray-700">
                        <p class="mb-4">EcoFlow is a cutting-edge clean energy company focused on developing
                            innovative energy storage solutions for residential and commercial applications.
                            Our proprietary battery technology and AI-powered management systems provide
                            reliable, sustainable energy alternatives.</p>

                        <p class="mb-4">Founded in 2018 by a team of former Tesla engineers, EcoFlow has
                            quickly established itself as a leader in the renewable energy market. Our
                            mission is to accelerate the world's transition to sustainable energy through
                            accessible and efficient storage solutions.</p>
                    </div>
                </div>

                <!-- The Problem & Solution Section -->
                <div class="content-section">
                    <h3 class="section-title">The Challenge & Our Solution</h3>
                    <div class="content-card">
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold mb-3">The Problem We're Solving</h4>
                            <p class="text-gray-700 mb-4">The intermittent nature of renewable energy sources like solar
                                and
                                wind creates significant challenges for grid stability and reliable power
                                supply. Traditional energy storage solutions are expensive, have limited
                                capacity, and often utilize environmentally harmful materials.</p>

                            <p class="text-gray-700">Additionally, as extreme weather events increase in frequency and
                                severity, the need for reliable backup power systems becomes more critical for
                                homes and businesses.</p>
                        </div>

                        <div>
                            <h4 class="text-lg font-semibold mb-3">Our Solution</h4>
                            <p class="text-gray-700 mb-4">EcoFlow's energy storage systems utilize our patented
                                lithium-iron
                                phosphate battery technology, which offers superior longevity, safety, and
                                environmental benefits compared to conventional lithium-ion batteries. Our
                                systems integrate seamlessly with existing solar installations and the power
                                grid.</p>

                            <h5 class="font-medium mb-3">Key features:</h5>
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Advanced AI-powered energy management system</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Modular design for easy capacity expansion</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>10-year warranty, longer than industry standards</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Smartphone app for real-time monitoring & control</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Weather prediction integration for outage preparation</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Product Images Section -->
                <div class="content-section">
                    <h3 class="section-title">Product Gallery</h3>
                    <div class="gallery-grid">
                        <img src="https://images.unsplash.com/photo-1618044733300-9472054094ee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80"
                            alt="Product Image" class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1513828583688-c52646db42da?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Product Image" class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1636393705098-21da0219624a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Product Image" class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1623126908029-58cb08a66d86?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            alt="Product Image" class="gallery-image">
                    </div>
                </div>

                <!-- Team Section - Redesigned -->
                <div class="content-section">
                    <h3 class="section-title">Leadership Team</h3>
                    <div class="team-grid">
                        <!-- Team Member 1 -->
                        <div class="team-member">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Chen"
                                class="team-avatar">
                            <h4 class="team-name">Michael Chen</h4>
                            <p class="team-role">CEO & Co-Founder</p>
                            <p class="team-bio">Former Senior Engineer at Tesla Energy. MS in Electrical Engineering
                                from Stanford University.</p>
                        </div>

                        <!-- Team Member 2 -->
                        <div class="team-member">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson"
                                class="team-avatar">
                            <h4 class="team-name">Sarah Johnson</h4>
                            <p class="team-role">CTO & Co-Founder</p>
                            <p class="team-bio">Previously led battery research at MIT Energy Initiative. PhD in
                                Materials Science.</p>
                        </div>

                        <!-- Team Member 3 -->
                        <div class="team-member">
                            <img src="https://randomuser.me/api/portraits/men/68.jpg" alt="David Rodriguez"
                                class="team-avatar">
                            <h4 class="team-name">David Rodriguez</h4>
                            <p class="team-role">COO</p>
                            <p class="team-bio">20+ years in clean energy manufacturing. Former VP of Operations at
                                SunPower.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar with Statistics - Now fixed on scroll -->
            <div class="stats-sidebar">
                <!-- Funding Progress -->
                <div class="stat-block">
                    <h3 class="text-lg font-bold mb-3">Funding Progress</h3>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-semibold">$8,450,000 raised</span>
                        <span class="text-sm font-semibold">70%</span>
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <div class="flex justify-between mt-1 text-xs text-gray-500">
                        <span>Target: $12,000,000</span>
                        <span>Closes Aug 30, 2023</span>
                    </div>
                </div>

                <!-- Key Metrics - Simplified Design -->
                <div class="metrics-grid mb-6">
                    <div class="metric-item">
                        <div class="stat-number">78</div>
                        <div class="stat-label">Team Size</div>
                    </div>
                    <div class="metric-item">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Patents</div>
                    </div>
                    <div class="metric-item">
                        <div class="stat-number">128%</div>
                        <div class="stat-label">YoY Growth</div>
                    </div>
                    <div class="metric-item">
                        <div class="stat-number">$8.5M</div>
                        <div class="stat-label">2022 Revenue</div>
                    </div>
                </div>

                <!-- Additional Statistics - New -->
                <div class="stat-block mb-6">
                    <h3 class="text-lg font-bold mb-3">Key Performance</h3>
                    <table class="details-table">
                        <tr>
                            <td class="text-gray-600">CAC</td>
                            <td class="text-right font-medium">$12,400</td>
                        </tr>
                        <tr>
                            <td class="text-gray-600">LTV</td>
                            <td class="text-right font-medium">$156,000</td>
                        </tr>
                        <tr>
                            <td class="text-gray-600">Gross Margin</td>
                            <td class="text-right font-medium">68%</td>
                        </tr>
                        <tr>
                            <td class="text-gray-600">Burn Rate</td>
                            <td class="text-right font-medium">$420K/mo</td>
                        </tr>
                        <tr>
                            <td class="text-gray-600">Runway</td>
                            <td class="text-right font-medium">16 months</td>
                        </tr>
                    </table>
                </div>

                <!-- Investment Opportunity - Simplified -->
                <div class="stat-block mb-6">
                    <h3 class="text-lg font-bold mb-4">Investment Details</h3>
                    <table class="details-table">
                        <tr>
                            <td class="text-gray-600">Round</td>
                            <td class="text-right font-medium">Series B</td>
                        </tr>
                        <tr>
                            <td class="text-gray-600">Min. Investment</td>
                            <td class="text-right font-medium">$25,000</td>
                        </tr>
                        <tr>
                            <td class="text-gray-600">Pre-Money</td>
                            <td class="text-right font-medium">$85,000,000</td>
                        </tr>
                        <tr>
                            <td class="text-gray-600">Closing Date</td>
                            <td class="text-right font-medium">Aug 30, 2023</td>
                        </tr>
                    </table>
                    <button class="w-full bg-transparent text-gray-700 font-bold py-2.5 border-0 mt-4">Invest
                        Now</button>
                </div>

                <!-- Market Size - New Statistics -->
                <div class="stat-block mb-6">
                    <h3 class="text-lg font-bold mb-3">Market Opportunity</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm font-medium mb-1">Global Energy Storage Market</p>
                            <p class="text-xl font-bold">$123B by 2027</p>
                            <p class="text-xs text-gray-500">CAGR of 32.8% (2022-2027)</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium mb-1">Target Market Share</p>
                            <p class="text-xl font-bold">5.4%</p>
                            <p class="text-xs text-gray-500">$6.6B potential revenue</p>
                        </div>
                    </div>
                </div>

                <!-- Use of Funds - Simplified design -->
                <div class="stat-block">
                    <h3 class="text-lg font-bold mb-4">Use of Funds</h3>
                    <div class="space-y-4 mb-4">
                        <div class="space-y-1">
                            <div class="flex justify-between">
                                <span class="text-sm font-medium">R&D and Product</span>
                                <span class="text-sm font-semibold">45%</span>
                            </div>
                            <div class="progress-container">
                                <div class="progress-bar" style="width: 45%"></div>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex justify-between">
                                <span class="text-sm font-medium">Sales and Marketing</span>
                                <span class="text-sm font-semibold">30%</span>
                            </div>
                            <div class="progress-container">
                                <div class="progress-bar" style="width: 30%"></div>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex justify-between">
                                <span class="text-sm font-medium">Operations</span>
                                <span class="text-sm font-semibold">15%</span>
                            </div>
                            <div class="progress-container">
                                <div class="progress-bar" style="width: 15%"></div>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex justify-between">
                                <span class="text-sm font-medium">Working Capital</span>
                                <span class="text-sm font-semibold">10%</span>
                            </div>
                            <div class="progress-container">
                                <div class="progress-bar" style="width: 10%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section - Simplified -->
    <section class="py-16 px-6 bg-[#FAFAFA]">
        <div class="container-centered">
            <div class="p-8 bg-white border border-gray-100 rounded-md shadow-sm">
                <div class="flex flex-col lg:flex-row items-center justify-between">
                    <div class="mb-8 lg:mb-0 lg:pr-8">
                        <h2 class="text-2xl font-bold mb-4">Ready to invest in the future of energy?</h2>
                        <p class="text-gray-600 max-w-xl">Join other forward-thinking investors backing EcoFlow's
                            mission to revolutionize energy storage.</p>
                    </div>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <button class="px-8 py-3 bg-transparent text-gray-700 font-semibold">
                            Contact Company
                        </button>
                        <button class="px-8 py-3 bg-transparent text-gray-700 font-semibold">
                            Download Pitch Deck
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer - Same as other pages -->
    <footer class="bg-gray-100 py-6">
        <div class="container-centered text-center">
            <p class="text-gray-600 text-sm">© 2023 SparkBox. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript - Only need to initialize Feather icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Feather icons
            feather.replace();
        });
    </script>
</body>

</html>