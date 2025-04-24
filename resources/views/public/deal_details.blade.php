<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $Startup->name }} - Deal Details | SparkBox</title>
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
        /* General styles - Professional design */
        body {
            background-color: #FAFAFA;
            color: #333333;
            font-family: 'Inter', sans-serif;
        }

        /* Container for centered content */
        .container-centered {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Hero image with professional styling */
        .hero-container {
            margin-top: 1.5rem;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .hero-image {
            position: relative;
            height: 360px;
            background-size: cover;
            background-position: center;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Hero overlay adjustments - position content properly */
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75));
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Changed from center to space-between */
            padding: 2.5rem;
            color: white;
        }

        /* Hero content sections */
        .hero-content-top {
            margin-top: 3rem;
            /* Add margin at top to push content down slightly */
        }

        .hero-content-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .hero-tags {
            display: flex;
            gap: 0.75rem;
        }

        /* Tag styling for hero section */
        .hero-tag {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 0.8rem;
            padding: 0.3rem 0.8rem;
            border-radius: 3px;
            display: inline-flex;
            align-items: center;
        }

        /* Clean company logo styling - no white background */
        .company-logo {
            position: absolute;
            top: 1.5rem;
            left: 2.7rem;
            /* Changed from left to right */
            width: 60px;
            /* Reduced from 80px */
            height: 60px;
            /* Reduced from 80px */
            background: transparent;
            border-radius: 2px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            overflow: hidden;
        }

        .company-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Unified content styling */
        .content-panel {
            background: white;
            border-radius: 4px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .panel-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .panel-body {
            padding: 1.5rem;
        }

        /* Stats sidebar */
        .stats-sidebar {
            position: sticky;
            top: 100px;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
        }

        /* Table styles - clean and readable */
        .details-table {
            width: 100%;
            border-collapse: collapse;
        }

        .details-table td {
            padding: 0.85rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .details-table tr:last-child td {
            border-bottom: none;
        }

        .details-table td:first-child {
            color: #555;
            font-weight: 500;
        }

        .details-table td:last-child {
            text-align: right;
            font-weight: 600;
            color: #333;
        }

        /* Minimal tag design */
        .tag {
            display: inline-block;
            background-color: #f0f2f5;
            color: #444;
            font-size: 0.75rem;
            padding: 0.3rem 0.6rem;
            border-radius: 3px;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            font-weight: 500;
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

        /* Progress bar styling */
        .progress-container {
            width: 100%;
            height: 6px;
            background-color: #eee;
            border-radius: 3px;
            overflow: hidden;
            margin: 0.75rem 0;
        }

        .progress-bar {
            height: 100%;
            background: #222;
            border-radius: 0;
        }

        /* Section heading styling */
        .section-heading {
            font-weight: 600;
            font-size: 1.1rem;
            color: #222;
            margin-bottom: 1rem;
        }

        /* Hero CTA button styling */
        .hero-cta {
            position: absolute;
            right: 2rem;
            bottom: 2rem;
            z-index: 10;
        }

        .hero-button {
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 3px;
            border: none;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        /* Entrepreneur profile styling */
        .entrepreneur-section {
            display: flex;
            align-items: center;
        }

        .profile-image {
            width: 48px;
            height: 48px;
            border-radius: 4px;
            object-fit: cover;
            margin-right: 1rem;
        }

        .profile-info p:first-child {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.2rem;
        }

        .profile-info p:nth-child(2) {
            font-size: 0.8rem;
            color: #666;
            margin-bottom: 0.5rem;
        }

        .contact-link {
            display: inline-flex;
            align-items: center;
            color: #222;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .contact-link i {
            margin-right: 0.35rem;
        }

        /* Modal styling */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 50;
            opacity: 0;
            pointer-events: none;
        }

        .modal.show {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-content {
            background-color: white;
            border-radius: 4px;
            max-width: 500px;
            width: 90%;
            padding: 1.75rem;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
        }

        /* Form styling */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #333;
        }

        .form-input {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 3px;
            font-size: 1rem;
            background-color: #fff;
        }

        .form-input:focus {
            outline: none;
            border-color: #222;
        }

        .btn-group {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-cancel {
            padding: 0.75rem 1.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 3px;
            background-color: white;
            color: #4b5563;
            font-weight: 500;
        }

        .btn-submit {
            padding: 0.75rem 1.5rem;
            border-radius: 3px;
            background-color: #222222;
            color: white;
            font-weight: 500;
            border: none;
        }

        /* Metric and financial data display */
        .financial-metrics {
            display: flex;
            flex-direction: column;
        }

        .metrics-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .metrics-row:last-child {
            border-bottom: none;
        }

        .metric-label {
            color: #555;
            font-weight: 500;
        }

        .metric-value {
            font-weight: 600;
            color: #333;
        }
    </style>
</head>

<body class="font-inter text-sm antialiased">

    <x-header />

    <section class="pt-20">
        <div class="container-centered">
            <div class="hero-container">
                <div class="hero-image"
                    style="background-image: url('{{ $Startup->cover }}')">
                    <div class="hero-overlay">
                        <!-- Top section with title and description -->
                        <div class="hero-content-top">
                            <h1 class="text-4xl md:text-5xl font-bold mb-3 text-white">{{ $Startup->name }}</h1>
                            <p class="text-lg text-white mt-2 max-w-2xl">{{ $Startup->description }}</p>
                        </div>

                        <!-- Bottom section with category and website -->
                        <div class="hero-content-bottom">
                            <div class="hero-tags">
                                <span class="hero-tag">{{ $Startup->category }}</span>
                                @if($Startup->website)
                                <a href="{{ $Startup->website }}" target="_blank" class="hero-tag">
                                    <i data-feather="external-link" class="h-3 w-3 mr-1.5"></i>
                                    Website
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Create offer button -->
                    <div class="hero-cta">
                        <button id="create-offer-btn" class="hero-button">
                            <i data-feather="plus-circle" class="h-4 w-4 mr-2 inline-block"></i> Create offer
                        </button>
                    </div>
                </div>

                <div class="company-logo">
                    <img src="{{ $Startup->logo }}"
                        alt="{{ $Startup->name }} logo" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <div class="container-centered">
        <div class="two-column">
            <!-- Main content -->
            <div>
                <!-- About the startup - removing category and website -->
                <div class="content-panel">
                    <div class="panel-header">
                        <h3 class="section-heading">About {{ $Startup->name }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="prose max-w-none text-gray-700 leading-relaxed">
                            <p>{{$Startup->details}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar with consolidated startup data -->
            <div class="stats-sidebar">
                <!-- Combined financial details in one panel -->
                <div class="content-panel">
                    <div class="panel-header">
                        <h3 class="section-heading">Company Information</h3>
                    </div>
                    <div class="panel-body">
                        <!-- Funding Goal -->
                        @if($Startup->funding_goal)
                        <div class="mb-4 pb-4 border-b border-gray-100">
                            <div class="flex justify-between mb-1">
                                <div class="text-sm font-medium">Funding Progress</div>
                                <div class="text-sm font-medium">70%</div>
                            </div>
                            <div class="progress-container">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <div class="flex justify-between mt-1">
                                <span class="text-xs text-gray-500">$8,450,000 raised</span>
                                <span class="text-xs text-gray-500">Target: ${{ number_format($Startup->funding_goal) }}</span>
                            </div>
                        </div>
                        @endif

                        <!-- Consolidated Key Metrics -->
                        <div class="financial-metrics">
                            @if($Startup->valuation)
                            <div class="metrics-row">
                                <span class="metric-label">Valuation</span>
                                <span class="metric-value">${{ number_format($Startup->valuation) }}</span>
                            </div>
                            @endif
                            @if($Startup->monthly_revenue)
                            <div class="metrics-row">
                                <span class="metric-label">Monthly Revenue</span>
                                <span class="metric-value">${{ number_format($Startup->monthly_revenue) }}</span>
                            </div>
                            @endif
                            @if($Startup->gross_margin)
                            <div class="metrics-row">
                                <span class="metric-label">Gross Margin</span>
                                <span class="metric-value">{{ $Startup->gross_margin }}%</span>
                            </div>
                            @endif
                            @if($Startup->burn_rate)
                            <div class="metrics-row">
                                <span class="metric-label">Burn Rate</span>
                                <span class="metric-value">${{ number_format($Startup->burn_rate) }}/mo</span>
                            </div>
                            @endif
                            @if($Startup->runway)
                            <div class="metrics-row">
                                <span class="metric-label">Runway</span>
                                <span class="metric-value">{{ $Startup->runway }} months</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Entrepreneur info -->
                @if($Startup->user)
                <div class="content-panel">
                    <div class="panel-header">
                        <h3 class="section-heading">Entrepreneur</h3>
                    </div>
                    <div class="panel-body">
                        <div class="entrepreneur-section">
                            @if($Startup->user->profile_picture_url)
                            <img src="{{ $Startup->user->profile_picture_url }}" alt="{{ $Startup->user->name }}" class="profile-image">
                            @else
                            <div class="profile-image bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500 font-medium">{{ substr($Startup->user->name, 0, 1) }}</span>
                            </div>
                            @endif

                            <div class="profile-info">
                                <p>{{ $Startup->user->name }}</p>
                                <p>Founder & CEO</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Create Offer Modal - removed equity field -->
    <div id="offer-modal" class="modal">
        <div class="modal-content">
            <h2 class="text-xl font-bold mb-4">Create an Offer for {{ $Startup->name }}</h2>

            <form id="offer-form" action="{{route('add.offer',['id' => $Startup->id])}}" method="POST">
                @csrf
                <input type="hidden" name="startup_id" value="{{ $Startup->id }}">
                <input type="hidden" name="EquityOffered" value="0">

                <div class="form-group">
                    <label for="amount" class="form-label">Investment Amount ($)</label>
                    <input type="number" id="amount" name="amount" class="form-input" placeholder="Enter investment amount" min="500" step="1" required>
                    <p class="text-xs text-gray-500 mt-1">Minimum investment: $500</p>
                </div>

                <div class="form-group">
                    <p class="text-sm text-gray-600">
                        By submitting this offer, you agree to enter into negotiations with {{ $Startup->name }}. Your offer will be visible to the founder and can be accepted or declined.
                    </p>
                </div>

                <div class="btn-group">
                    <button type="button" id="cancel-offer-btn" class="btn-cancel">Cancel</button>
                    <button type="submit" class="btn-submit">Submit Offer</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="bg-gray-100 py-6 mt-8">
        <div class="container-centered text-center">
            <p class="text-gray-600 text-sm">© 2023 SparkBox. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Feather icons
            feather.replace();

            // Modal functionality
            const modal = document.getElementById('offer-modal');
            const createOfferBtn = document.getElementById('create-offer-btn');
            const cancelOfferBtn = document.getElementById('cancel-offer-btn');

            // Show modal when create offer button is clicked
            createOfferBtn.addEventListener('click', function() {
                modal.classList.add('show');
            });

            // Hide modal when cancel button is clicked
            cancelOfferBtn.addEventListener('click', function() {
                modal.classList.remove('show');
            });

            // Hide modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('show');
                }
            });

            // Form validation
            const offerForm = document.getElementById('offer-form');
            offerForm.addEventListener('submit', function(e) {
                const amount = document.getElementById('amount').value;

                if (amount < 500) {
                    e.preventDefault();
                    alert('Minimum investment amount is $500');
                    return;
                }
            });
        });
    </script>
</body>

</html>