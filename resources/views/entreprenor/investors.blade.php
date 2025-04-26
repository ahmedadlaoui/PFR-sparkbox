<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investors - SparkBox</title>
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

        /* Amount filter dropdown styling */
        .amount-filter {
            position: relative;
        }

        .amount-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            margin-top: 5px;
            background: white;
            border: 1px solid #F0F0F0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            min-width: 200px;
            z-index: 40;
            display: none;
        }

        .amount-dropdown.open {
            display: block;
        }

        .amount-option {
            padding: 10px 16px;
            cursor: pointer;
            transition: background 0.1s;
        }

        .amount-option:hover {
            background-color: #F9FAFB;
        }

        /* Mobile responsive adjustments */
        @media (max-width: 1024px) {
            .side-nav {
                transform: translateX(-100%);
                transition: transform 0.25s ease;
            }

            .side-nav.show {
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
    </style>
</head>

<body class="font-inter bg-white text-[#1A1A1A] text-sm antialiased">
    <x-header />

    <main class="main-content">
        <div class="content-container">
            <div class="ml-0 md:ml-12 lg:ml-16">
                <div class="w-full px-6 py-10">
                    <div class="container mx-auto px-6">
                        <div class="flex justify-between items-center mb-6 mt-8">
                            <div>
                                <div class="relative">
                                    <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900">
                                        People interested in your startup</h1>
                                </div>
                                <p class="text-gray-600 mt-2">5 investors · $1.2M total possible investment</p>
                            </div>
                        </div>
                    </div>

                    <div class="container mx-auto px-6 py-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                            @foreach($Investors as $investor)

                            <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm relative flex flex-col items-start gap-4">
                                <!-- Top section: Image + Name + Status -->
                                <div class="w-full flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <img src="{{$investor->user->profile_picture_url}}" alt="Profile Picture"
                                            class="w-12 h-12 rounded-full object-cover border border-gray-200">
                                        <h3 class="text-base font-semibold text-gray-800">{{$investor->user->name}}</h3>
                                    </div>
                                    <form action="{{ route('UpdateStatus')}}" method="POST" class="flex items-center" id="editstatus-form-{{ $investor->id }}">
                                        @method('patch')
                                        @csrf
                                        <input type="hidden" name="offer_toupdate" value="{{ $investor->id }}">
                                        <select name="status"
                                            class="text-xs border border-gray-300 rounded-md py-1.5 pl-3 pr-7 bg-white text-gray-700 focus:ring-1 focus:ring-blue-500 focus:outline-none appearance-none status-select"
                                            style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'%23666\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\'%3e%3cpolyline points=\'6 9 12 15 18 9\'/%3e%3c/svg%3e'); background-repeat: no-repeat; background-position: right 0.75rem center; background-size: 1em;">

                                            <option value="in negotiation" {{ $investor->status === 'in negotiation' ? 'selected disabled' : '' }}>In negotiation</option>
                                            <option value="confirmed" {{ $investor->status === 'confirmed' ? 'selected disabled' : '' }}>Confirmed</option>
                                            <option value="declined" {{ $investor->status === 'declined' ? 'selected disabled' : '' }}>Declined</option>

                                        </select>
                                    </form>

                                </div>

                                <!-- Offer Description -->
                                <div class="w-full">
                                    <p class="text-sm text-gray-600">
                                        {{$investor->offer_message}}
                                    </p>
                                </div>

                                <!-- Bottom section: Invest Amount + Chat button -->
                                <div class="w-full flex items-center justify-between">
                                    <p class="text-sm text-gray-700">
                                        Ready to invest: <span class="font-bold">{{$investor->amount}} $</span>
                                    </p>
                                    <form action="{{route('add.conversation')}}" method="POST" class="flex items-center">
                                        @csrf
                                        <input type="hidden" value="{{$investor->user->id}}" name="investor_id">
                                        <button type="submit"
                                            class="flex items-center gap-2 px-4 py-2 border border-gray-300 text-gray-700 text-sm rounded-lg bg-white hover:bg-gray-50">
                                            <i data-feather="message-circle" class="w-4 h-4"></i> Chat
                                        </button>
                                    </form>
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
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Feather Icons
            feather.replace();

            // Mobile menu toggle
            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            const sideNav = document.querySelector('.side-nav');

            mobileMenuToggle.addEventListener('click', function() {
                sideNav.classList.toggle('show');
            });

            // Amount filter dropdown toggle
            const amountFilterBtn = document.getElementById('amount-filter-btn');
            const amountDropdown = document.getElementById('amount-dropdown');

            amountFilterBtn.addEventListener('click', function() {
                amountDropdown.classList.toggle('open');
            });

            // Close dropdown when clicking elsewhere
            document.addEventListener('click', function(e) {
                if (!amountFilterBtn.contains(e.target) && !amountDropdown.contains(e.target)) {
                    amountDropdown.classList.remove('open');
                }
            });

            // Amount filter options
            const amountOptions = document.querySelectorAll('.amount-option');
            amountOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const value = this.getAttribute('data-value');
                    const text = this.textContent;

                    // Update filter button text
                    amountFilterBtn.innerHTML = `
                        <i data-feather="dollar-sign" class="h-4 w-4 mr-2 text-gray-500"></i>
                        ${text}
                        <i data-feather="chevron-down" class="h-4 w-4 ml-2"></i>
                    `;
                    feather.replace();

                    // Close the dropdown
                    amountDropdown.classList.remove('open');

                    // Filter functionality would be implemented here
                    console.log('Filter by amount:', value);
                });
            });


        });
        var statusSelects = document.querySelectorAll('.status-select');
        statusSelects.forEach((selectElement) => {
            selectElement.addEventListener('change', () => {
                selectElement.closest('form').submit();
            });
        });
    </script>
</body>

</html>