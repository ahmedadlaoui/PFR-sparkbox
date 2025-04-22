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

        /* Empty state styling */
        .empty-state-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 4rem 2rem;
            text-align: center;
            background-color: white;
            border-radius: 12px;
            border: 1px dashed #E5E7EB;
            margin: 2rem auto;
            max-width: 800px;
        }

        .empty-state-icon {
            width: 120px;
            height: 120px;
            background-color: #F3F4F6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .empty-state-icon svg {
            width: 60px;
            height: 60px;
            color: #9CA3AF;
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

                    <?php
                    $myStartup = []; // Empty array to simulate no startup
                    ?>

                    @if(!empty($myStartup))
                    <div class="startup-banner-wrapper">
                        <div class="startup-banner">

                            <img src="https://images.unsplash.com/photo-1618044733300-9472054094ee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80"
                                alt="EcoFlow Energy" class="cover-image">

                            <div class="banner-overlay"></div>

                            <div class="startup-logo" style="scale:0.7;border-radius:4px;">
                                <img src="https://marketplace.canva.com/EAF0Hq4UHjM/1/0/1600w/canva-orange-phoenix-animal-gaming-logo-WIPEOAyYPIs.jpg"
                                    alt="EcoFlow Logo">
                            </div>

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

                    @else
                    <div class="empty-state-container">
                        <div class="empty-state-icon">
                            <i data-feather="briefcase" class="h-16 w-16 text-gray-400"></i>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-4">Register Your First Startup</h2>
                        <p class="text-gray-600 max-w-lg mb-8">
                            You haven't registered a startup yet. Create your startup profile to connect with potential investors
                            and showcase your business to the SparkBox community.
                        </p>
                        <button id="create-startup-btn" class="px-6 py-3 bg-[#0049FF] text-white font-semibold rounded-lg shadow-sm hover:bg-[#003CD9] transition-colors">
                            <i data-feather="plus" class="h-4 w-4 inline-block mr-2"></i>
                            Create Your Startup
                        </button>
                    </div>

                    <!-- Startup Creation Modal - Hidden by default -->
                    <div id="startup-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center sticky top-0 bg-white z-10">
                                <h3 class="text-xl font-bold text-gray-900">Create Your Startup</h3>
                                <button id="close-modal-btn" class="text-gray-400 hover:text-gray-600">
                                    <i data-feather="x" class="h-5 w-5"></i>
                                </button>
                            </div>

                            <div class="p-6">
                                <form id="create-startup-form" action="/create-startup" method="POST" class="space-y-6">
                                    @csrf

                                    <div class="space-y-4">
                                        <div>
                                            <label for="startup-name" class="block text-sm font-medium text-gray-700 mb-1">Startup Name</label>
                                            <input type="text" id="startup-name" name="name" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div>
                                            <label for="startup-description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                            <textarea id="startup-description" name="description" rows="4" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                            <p class="text-xs text-gray-500 mt-1">Describe your startup's mission, products/services, and unique value proposition.</p>
                                        </div>

                                        <div>
                                            <label for="startup-category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                            <select id="startup-category" name="category" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                                <option value="" disabled selected>Select a category</option>
                                                <option value="Technology & Innovation">Technology & Innovation</option>
                                                <option value="Health & Wellness">Health & Wellness</option>
                                                <option value="Sustainability & GreenTech">Sustainability & GreenTech</option>
                                                <option value="Education & Learning">Education & Learning</option>
                                                <option value="Finance & Fintech">Finance & Fintech</option>
                                                <option value="Lifestyle & Consumer Goods">Lifestyle & Consumer Goods</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="startup-valuation" class="block text-sm font-medium text-gray-700 mb-1">Valuation (USD)</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <span class="text-gray-500">$</span>
                                                </div>
                                                <input type="number" id="startup-valuation" name="valuation" min="0" step="0.01" required class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            </div>
                                            <p class="text-xs text-gray-500 mt-1">Estimated current valuation of your startup.</p>
                                        </div>

                                        <div>
                                            <label for="startup-website" class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                                            <input type="url" id="startup-website" name="website" required placeholder="https://" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div>
                                            <label for="funding-goal" class="block text-sm font-medium text-gray-700 mb-1">Funding Goal (USD)</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <span class="text-gray-500">$</span>
                                                </div>
                                                <input type="number" id="funding-goal" name="funding_goal" min="0" required class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            </div>
                                            <p class="text-xs text-gray-500 mt-1">Amount of funding you're seeking to raise.</p>
                                        </div>

                                        <div>
                                            <label for="startup-logo" class="block text-sm font-medium text-gray-700 mb-1">Logo URL</label>
                                            <input type="url" id="startup-logo" name="logo_url" placeholder="https://example.com/logo.png" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <p class="text-xs text-gray-500 mt-1">Link to your startup logo (square format recommended).</p>
                                        </div>

                                        <div>
                                            <label for="cover-image" class="block text-sm font-medium text-gray-700 mb-1">Cover Image URL</label>
                                            <input type="url" id="cover-image" name="cover_image_url" placeholder="https://example.com/cover.jpg" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <p class="text-xs text-gray-500 mt-1">Link to a banner image for your startup profile (1400x400 recommended).</p>
                                        </div>
                                    </div>

                                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                                        <button type="button" id="cancel-btn" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 font-medium">
                                            Cancel
                                        </button>
                                        <button type="submit" class="px-4 py-2 bg-[#0049FF] text-white rounded-md hover:bg-[#003CD9] font-medium">
                                            Create Startup
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 max-w-4xl mx-auto">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Tips for Creating a Compelling Startup Profile</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm">
                                <div class="flex items-start mb-4">
                                    <div class="bg-blue-50 p-2 rounded-lg mr-4">
                                        <i data-feather="file-text" class="h-6 w-6 text-blue-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-2">Clear Value Proposition</h4>
                                        <p class="text-gray-600 text-sm">Clearly articulate what your startup does, the problem it solves, and why your solution is unique.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm">
                                <div class="flex items-start mb-4">
                                    <div class="bg-blue-50 p-2 rounded-lg mr-4">
                                        <i data-feather="users" class="h-6 w-6 text-blue-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-2">Highlight Your Team</h4>
                                        <p class="text-gray-600 text-sm">Showcase the expertise and experience of key team members that make your startup credible.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm">
                                <div class="flex items-start mb-4">
                                    <div class="bg-blue-50 p-2 rounded-lg mr-4">
                                        <i data-feather="trending-up" class="h-6 w-6 text-blue-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-2">Traction & Metrics</h4>
                                        <p class="text-gray-600 text-sm">Include key performance indicators, milestones achieved, and evidence of market validation.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm">
                                <div class="flex items-start mb-4">
                                    <div class="bg-blue-50 p-2 rounded-lg mr-4">
                                        <i data-feather="pie-chart" class="h-6 w-6 text-blue-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 mb-2">Market Opportunity</h4>
                                        <p class="text-gray-600 text-sm">Define your target market size, competitive landscape, and your growth strategy.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
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

            if (mobileMenuToggle && sideNav) {
                mobileMenuToggle.addEventListener('click', function() {
                    sideNav.classList.toggle('open');
                });
            }

            // Startup modal functionality
            const createStartupBtn = document.getElementById('create-startup-btn');
            const startupModal = document.getElementById('startup-modal');
            const closeModalBtn = document.getElementById('close-modal-btn');
            const cancelBtn = document.getElementById('cancel-btn');

            // Open modal function
            function openModal() {
                if (startupModal) {
                    startupModal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden'; // Prevent scrolling behind modal
                }
            }

            // Close modal function
            function closeModal() {
                if (startupModal) {
                    startupModal.classList.add('hidden');
                    document.body.style.overflow = ''; // Re-enable scrolling
                }
            }

            // Event listeners for modal buttons
            if (createStartupBtn) {
                createStartupBtn.addEventListener('click', openModal);
            }

            if (closeModalBtn) {
                closeModalBtn.addEventListener('click', closeModal);
            }

            if (cancelBtn) {
                cancelBtn.addEventListener('click', closeModal);
            }

            // Close modal when clicking outside the modal content
            if (startupModal) {
                startupModal.addEventListener('click', function(e) {
                    // Only close if the click is on the overlay (the modal itself), not on its contents
                    if (e.target === startupModal) {
                        closeModal();
                    }
                });
            }
        });
    </script>
</body>

</html>