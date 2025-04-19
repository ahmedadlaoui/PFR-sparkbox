<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investor Dashboard - SparkBox</title>
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
        /* Modern minimal aside bar styling */
        .aside-bar {
            width: 260px;
            background-color: white;
            height: calc(100vh - 80px);
            position: fixed;
            top: 80px;
            left: 0;
            border-right: 1px solid #F0F0F0;
            z-index: 30;
            overflow-y: auto;
        }

        .aside-link {
            display: flex;
            align-items: center;
            padding: 0.85rem 1.5rem;
            color: #666666;
            font-weight: 500;
        }

        .aside-link:hover {
            background-color: #F9FAFB;
            color: #1A1A1A;
        }

        .aside-link.active {
            color: #0049FF;
            background-color: #F0F4FF;
            font-weight: 600;
        }

        .aside-icon {
            margin-right: 12px;
            stroke-width: 1.8px;
        }

        /* Smaller stat card styling */
        .stat-card {
            position: relative;
            background-color: white;
            border-radius: 10px;
            border: 1px solid #F0F0F0;
            padding: 1.25rem;
        }

        /* Main content area styling */
        .main-content {
            padding-top: 80px;
            min-height: 100vh;
            margin-left: 260px;
        }

        /* Card design improvements */
        .opportunity-card {
            background-color: white;
            border-radius: 12px;
            border: 1px solid #F0F0F0;
            overflow: hidden;
        }

        /* Mobile styling */
        @media (max-width: 1024px) {
            .aside-bar {
                transform: translateX(-100%);
                transition: transform 0.25s ease;
            }

            .aside-bar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-aside-toggle {
                display: block;
            }
        }

        @media (min-width: 1025px) {
            .mobile-aside-toggle {
                display: none;
            }
        }

        /* Filter styling */
        .filter-btn {
            transition: all 0.1s;
            cursor: pointer;
        }

        .filter-btn.active {
            background-color: #0049FF;
            color: white;
            border-color: #0049FF;
        }

        .filter-btn:hover:not(.active) {
            border-color: #0049FF;
            background-color: rgba(0, 73, 255, 0.05);
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

        /* Investment card styling - streamlined */
        .investment-card {
            background-color: white;
            border-radius: 12px;
            border: 1px solid #F0F0F0;
            overflow: hidden;
            height: 460px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        /* Investment amount as normal text */
        .investment-amount-text {
            color: #4B5563;
            font-size: 13px;
            margin-top: 12px;
            text-align: left;
            font-weight: 400;
            display: block;
            padding-left: 4px;
        }

        /* Clean button styling */
        .action-button {
            background-color: white;
            color: #0049FF;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .action-button:hover {
            background-color: #F0F4FF;
            border-color: #0049FF;
        }

        .action-button svg {
            margin-right: 6px;
        }

        /* Offer card styling - improved layout */
        .offer-card {
            background-color: white;
            border-radius: 12px;
            border: 1px solid #F0F0F0;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            width: 100%;
            max-width: 800px;
            margin: 0;
            height: 180px;
            position: relative;
        }

        @media (min-width: 768px) {
            .offer-card {
                display: grid;
                grid-template-columns: 200px 1fr;
            }
        }

        .offer-image {
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .offer-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Clean top corner button styling */
        .card-actions {
            position: absolute;
            top: 12px;
            right: 12px;
            display: flex;
            gap: 8px;
            z-index: 20;
        }

        .card-btn {
            background-color: white;
            border-radius: 6px;
            height: 32px;
            width: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #E5E7EB;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            cursor: pointer;
        }

        .card-btn:hover {
            background-color: #F9FAFB;
        }

        .card-btn svg {
            width: 16px;
            height: 16px;
            color: #4B5563;
        }

        .card-btn.chat-icon:hover svg {
            color: #0049FF;
        }

        /* Company logo - improved positioning */
        .company-logo {
            position: absolute;
            bottom: -16px;
            left: 16px;
            width: 42px;
            height: 42px;
            background-color: white;
            border-radius: 10px;
            padding: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            z-index: 10;
            border: 1px solid #F5F5F5;
        }

        .company-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 6px;
        }

        /* Offer content - improved spacing */
        .offer-content {
            padding: 20px 24px;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        /* Owner display - cleaner design */
        .offer-owner {
            display: flex;
            align-items: center;
            background-color: #F8F9FA;
            padding: 6px 10px;
            border-radius: 20px;
            margin-top: 4px;
            width: fit-content;
        }

        .owner-avatar {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .owner-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .owner-name {
            font-size: 11px;
            color: #4B5563;
            margin-left: 6px;
            font-weight: 500;
        }

        /* Header layout */
        .offer-header {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .offer-info h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 4px;
            color: #1A1A1A;
            line-height: 1.3;
        }

        /* Category tags */
        .tags-container {
            display: flex;
            gap: 6px;
            margin-bottom: 12px;
        }

        .category-tag {
            background-color: #F5F7FA;
            color: #4B5563;
            font-size: 11px;
            font-weight: 500;
            padding: 4px 10px;
            border-radius: 6px;
        }

        /* Description text styling */
        .offer-description {
            color: #4B5563;
            font-size: 13px;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex-grow: 1;
            margin-bottom: 20px;
        }

        /* Action buttons at bottom */
        .action-buttons {
            display: flex;
            gap: 12px;
            margin-top: auto;
        }

        .view-btn,
        .chat-btn {
            padding: 8px 16px;
            font-size: 13px;
            font-weight: 500;
            border-radius: 8px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .view-btn {
            background-color: #F5F7FA;
            color: #374151;
            border: 1px solid #E5E7EB;
        }

        .view-btn:hover {
            background-color: #EBEEF2;
        }

        .chat-btn {
            background-color: #0049FF;
            color: white;
            border: none;
        }

        .chat-btn:hover {
            background-color: #003CD9;
        }

        .chat-btn svg,
        .view-btn svg {
            width: 15px;
            height: 15px;
            margin-right: 8px;
        }

        /* Tooltip styling */
        .tooltip {
            position: relative;
        }

        .tooltip:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            bottom: -30px;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 8px;
            border-radius: 4px;
            font-size: 11px;
            white-space: nowrap;
            z-index: 30;
        }
    </style>
</head>
<body>

    <x-header />
    <x-asidebar />
<!-- Main Content Area -->
<div class="main-content bg-[#FAFBFC]">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 py-10">
          

            <!-- Current Offers Section with horizontal cards -->
            <div class="mb-16">
                <!-- Section header -->
                <div class="flex justify-between items-end mb-6">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-black font-['Inter',_sans-serif] mb-2">Current
                            Offers</h2>
                        <p class="text-gray-600 font-['Inter',_sans-serif]">
                            Exclusive investment opportunities available for your consideration
                        </p>
                    </div>
                </div>

                <!-- Search and Filter Bar -->
                <div class="mb-8 border-b border-gray-200 pb-5">
                    <div class="flex flex-wrap items-center gap-3">
                        <!-- Search with icon -->
                        <div class="flex items-center bg-gray-50 rounded-lg px-4 py-2.5 shadow-sm flex-grow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-3" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" placeholder="Search investment opportunities"
                                class="clean-search w-full font-['Inter',_sans-serif] text-gray-700 bg-transparent text-base">
                        </div>

                        <!-- Updated Filters for offers -->
                        <div class="flex items-center gap-2 overflow-x-auto pb-1 flex-nowrap">
                            <button
                                class="filter-btn active whitespace-nowrap px-4 py-2 border rounded-lg text-sm font-medium border-gray-200 text-gray-700">
                                All Offers
                            </button>
                            <button
                                class="filter-btn whitespace-nowrap px-4 py-2 border rounded-lg text-sm font-medium border-gray-200 text-gray-700">
                                Exclusive
                            </button>
                            <button
                                class="filter-btn whitespace-nowrap px-4 py-2 border rounded-lg text-sm font-medium border-gray-200 text-gray-700">
                                Featured
                            </button>
                            <button
                                class="filter-btn whitespace-nowrap px-4 py-2 border rounded-lg text-sm font-medium border-gray-200 text-gray-700">
                                Trending
                            </button>
                            <button
                                class="filter-btn whitespace-nowrap px-4 py-2 border rounded-lg text-sm font-medium border-gray-200 text-gray-700">
                                Ending Soon
                            </button>
                        </div>
                    </div>
                </div>



                <!-- Horizontal Offer Cards with improved layout -->
                <div class="grid grid-cols-1 gap-5 mb-8">
                    <!-- Offer Card 1 -->
                    <div class="offer-card">
                        <!-- Top right action buttons -->
                        <div class="card-actions">
                            <button class="card-btn chat-icon tooltip" data-tooltip="Chat with owner">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                            </button>
                            <button class="card-btn tooltip" data-tooltip="View details">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>

                        <div class="offer-image">
                            <img src="https://images.unsplash.com/photo-1618044733300-9472054094ee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80"
                                alt="Sustainable energy storage solutions">
                            <div class="company-logo">
                                <img src="https://marketplace.canva.com/EAF0Hq4UHjM/1/0/1600w/canva-orange-phoenix-animal-gaming-logo-WIPEOAyYPIs.jpg"
                                    alt="EcoFlow logo">
                            </div>
                        </div>

                        <div class="offer-content">
                            <div class="offer-header">
                                <div class="offer-info">
                                    <h3>EcoFlow Energy Storage</h3>
                                    <div class="tags-container">
                                        <span class="category-tag">CleanTech</span>
                                        <span class="category-tag">Series B</span>
                                    </div>
                                </div>
                                <div class="offer-owner">
                                    <div class="owner-avatar">
                                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Sarah Chen">
                                    </div>
                                    <span class="owner-name">Presented by Sarah Chen</span>
                                </div>
                            </div>

                            <p class="offer-description">Sustainable energy storage solutions with proprietary battery
                                technology and AI-powered management systems for residential and commercial
                                applications.</p>

                            <div class="action-buttons">
                                <button class="chat-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    Contact Owner
                                </button>
                                <button class="view-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    View Details
                                </button>
                            </div>
                            <p class="investment-amount-text">Invested Amount: $500,000</p>
                        </div>
                    </div>

                    <!-- Offer Card 2 -->
                    <div class="offer-card">
                        <!-- Top right action buttons -->
                        <div class="card-actions">
                            <button class="card-btn chat-icon tooltip" data-tooltip="Chat with owner">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                            </button>
                            <button class="card-btn tooltip" data-tooltip="View details">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>

                        <div class="offer-image">
                            <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1528&q=80"
                                alt="AI-powered food analytics platform">
                            <div class="company-logo">
                                <img src="https://static.vecteezy.com/system/resources/previews/008/214/517/original/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg"
                                    alt="NutriTech logo">
                            </div>
                        </div>

                        <div class="offer-content">
                            <div class="offer-header">
                                <div class="offer-info">
                                    <h3>NutriTech AI Analytics</h3>
                                    <div class="tags-container">
                                        <span class="category-tag">FoodTech</span>
                                        <span class="category-tag">Series A</span>
                                    </div>
                                </div>
                                <div class="offer-owner">
                                    <div class="owner-avatar">
                                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="David Park">
                                    </div>
                                    <span class="owner-name">Presented by David Park</span>
                                </div>
                            </div>

                            <p class="offer-description">AI-powered food analytics platform offering personalized
                                nutrition insights and dietary recommendations based on machine learning algorithms.</p>

                            <div class="action-buttons">
                                <button class="chat-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    Contact Owner
                                </button>
                                <button class="view-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    View Details
                                </button>
                            </div>
                            <p class="investment-amount-text">Invested Amount: $250,000</p>
                        </div>
                    </div>

                    <!-- Offer Card 3 -->
                    <div class="offer-card">
                        <!-- Top right action buttons -->
                        <div class="card-actions">
                            <button class="card-btn chat-icon tooltip" data-tooltip="Chat with owner">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                            </button>
                            <button class="card-btn tooltip" data-tooltip="View details">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>

                        <div class="offer-image">
                            <img src="https://images.unsplash.com/photo-1631815588090-d4bfec5b1ccb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1557&q=80"
                                alt="Telemedicine platform">
                            <div class="company-logo">
                                <img src="https://img.freepik.com/free-vector/abstract-logo-with-colorful-shapes_1017-30230.jpg"
                                    alt="MobileMed logo">
                            </div>
                        </div>

                        <div class="offer-content">
                            <div class="offer-header">
                                <div class="offer-info">
                                    <h3>MobileMed Telemedicine</h3>
                                    <div class="tags-container">
                                        <span class="category-tag">HealthTech</span>
                                        <span class="category-tag">Seed</span>
                                    </div>
                                </div>
                                <div class="offer-owner">
                                    <div class="owner-avatar">
                                        <img src="https://randomuser.me/api/portraits/women/68.jpg"
                                            alt="Maria Rodriguez">
                                    </div>
                                    <span class="owner-name">Presented by Maria Rodriguez</span>
                                </div>
                            </div>

                            <p class="offer-description">Telemedicine platform focused on rural healthcare access with
                                proprietary diagnostic tools and seamless patient-doctor communications.</p>

                            <div class="action-buttons">
                                <button class="chat-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    Contact Owner
                                </button>
                                <button class="view-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    View Details
                                </button>
                            </div>
                            <p class="investment-amount-text">Invested Amount: $100,000</p>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-10">
                    <div class="flex items-center space-x-1">
                        <button class="px-3 py-2 rounded-md text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Feather icons
            feather.replace({ stroke: 1.5 });

            // Mobile aside toggle
            const mobileAsideToggle = document.querySelector('.mobile-aside-toggle');
            const asideBar = document.querySelector('.aside-bar');

            mobileAsideToggle?.addEventListener('click', function () {
                asideBar.classList.toggle('show');
            });

            // Filter buttons
            const filterBtns = document.querySelectorAll('.filter-btn');
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>

</html>