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

        /* Dropdown menu styling */
        .dropdown-menu {
            position: absolute;
            right: 0;
            top: 100%;
            width: 180px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid #F0F0F0;
            z-index: 50;
            display: none;
            margin-top: 4px;
            overflow: hidden;
        }

        .dropdown-menu.show {
            display: block;
            animation: fadeIn 0.2s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 10px 16px;
            font-size: 14px;
            color: #4B5563;
            transition: background-color 0.15s;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: #F9FAFB;
        }

        .dropdown-item svg {
            width: 16px;
            height: 16px;
            margin-right: 12px;
        }

        .dropdown-item.delete {
            color: #EF4444;
        }

        .dropdown-item.delete:hover {
            background-color: #FEF2F2;
        }

        .dropdown-divider {
            height: 1px;
            background-color: #F3F4F6;
            margin: 0;
        }
    </style>
</head>

<body>
    <x-header />

    <div class="main-content bg-white">
        <div class="content-container">
            <div class="ml-0 md:ml-12 lg:ml-16">
                <div class="max-w-7xl mx-auto px-6 py-10">
                    <div class="max-w-full mx-auto py-10">

                        <div class="mb-16">

                            <div class="flex justify-between items-end mb-6">
                                <div>
                                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">Current Offers</h2>
                                    <p class="text-gray-600 font-['Inter',_sans-serif]">
                                        Exclusive investment opportunities available for your consideration
                                    </p>
                                </div>
                            </div>


                            <div class="mb-8 border-b border-gray-200 pb-5">
                                <div class="flex flex-wrap items-center gap-3">

                                    <div class="flex items-center bg-gray-50 rounded-lg px-4 py-2.5 shadow-sm flex-grow">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-3" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                        <input type="text" placeholder="Search investment opportunities"
                                            class="clean-search w-full font-['Inter',_sans-serif] text-gray-700 bg-transparent text-base">
                                    </div>


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




                            <div class="grid grid-cols-1 gap-5 mb-8">

                                @foreach($MyOffers as $MyOffer)
                                <div class="offer-card">

                                    <div class="card-actions">
                                        <div class="relative">
                                            <button class="card-btn menu-dots-btn" id="card-menu-btn-{{ $MyOffer->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <circle cx="12" cy="5" r="1" />
                                                    <circle cx="12" cy="12" r="1" />
                                                    <circle cx="12" cy="19" r="1" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu" id="dropdown-menu-{{ $MyOffer->id }}">
                                                <a href="{{ route('details', ['id' => $MyOffer->startup->id]) }}" class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                    View Details
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <form action="" method="post">
                                                    @csrf
                                                    <button class="dropdown-item">
                                                        <input type="hidden" value="{{ $MyOffer->user->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path
                                                                d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                                            </path>
                                                        </svg>
                                                        Contact
                                                    </button>
                                                </form>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M3 6h18"></path>
                                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                    </svg>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="offer-image">
                                        <img src="{{$MyOffer->startup->cover}}"
                                            alt="Sustainable energy storage solutions">
                                        <div class="company-logo">
                                            <img src="{{$MyOffer->startup->logo}}"
                                                alt="EcoFlow logo">
                                        </div>
                                    </div>

                                    <div class="offer-content">
                                        <div class="offer-header">
                                            <div class="offer-info">
                                                <h3>{{$MyOffer->startup->name}}</h3>
                                                <div class="tags-container">
                                                    <span class="category-tag">{{$MyOffer->amount}}$ on table</span>

                                                </div>
                                            </div>
                                            <div class="offer-owner">
                                                <div class="owner-avatar">
                                                    <img src="{{$MyOffer->startup->user->profile_picture_url}}" alt="Sarah Chen">
                                                </div>
                                                <span class="owner-name">Presented by {{$MyOffer->startup->user->name}}</span>
                                            </div>
                                        </div>

                                        <p class="offer-description">{{$MyOffer->startup->description}}</p>



                                        <div class="action-buttons">
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

                                    </div>
                                </div>
                                @endforeach





                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-footer />
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            feather.replace({
                stroke: 1.5
            });

            const mobileAsideToggle = document.querySelector('.mobile-aside-toggle');
            const asideBar = document.querySelector('.aside-bar');

            mobileAsideToggle?.addEventListener('click', function() {
                asideBar.classList.toggle('show');
            });

            // Filter buttons
            const filterBtns = document.querySelectorAll('.filter-btn');
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Dropdown menu toggle
            document.querySelectorAll('.menu-dots-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const menuId = this.id.replace('card-menu-btn-', 'dropdown-menu-');
                    const dropdown = document.getElementById(menuId);

                    // Close all other dropdowns first
                    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                        if (menu.id !== menuId) menu.classList.remove('show');
                    });

                    // Toggle this dropdown
                    dropdown.classList.toggle('show');
                });
            });

            // Close dropdowns when clicking elsewhere
            document.addEventListener('click', function() {
                document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                    menu.classList.remove('show');
                });
            });

            // Prevent dropdown from closing when clicking inside it
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });
        });
    </script>
    </script>
</body>

</html>