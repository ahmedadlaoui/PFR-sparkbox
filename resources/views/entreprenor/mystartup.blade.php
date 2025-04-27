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


        .main-content {
            padding-top: 30px;
            min-height: 100vh;
            margin-left: 0;
            display: flex;
            flex-direction: column;
            background-color: white;
            width: 100%;
        }


        .content-container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0;
        }


        .inner-content {
            padding: 0 24px;
            width: 100%;
        }


        .startup-banner-wrapper {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            max-width: 1280px;
        }


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

                    @if(!empty($myStartup))
                    <div class="startup-banner-wrapper">
                        <div class="startup-banner">
                            <img src="{{$myStartup->cover}}" alt="startup cover" class="cover-image">
                            <div class="banner-overlay"></div>
                            <div class="startup-logo" style="scale:0.7;border-radius:4px;">
                                <img src="{{$myStartup->logo}}" alt="startup Logo">
                            </div>

                            <div class="absolute top-5 right-5">
                                <div class="relative">
                                    <button id="menu-button" class="flex items-center justify-center w-10 h-10 bg-black bg-opacity-40 hover:bg-opacity-60 text-white rounded-md transition-all duration-200 backdrop-blur-sm">
                                        <i data-feather="more-vertical" class="h-5 w-5 stroke-2"></i>
                                    </button>
                                    <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-40 bg-black bg-opacity-40 backdrop-blur-sm rounded-md shadow-lg py-1 z-10">
                                        <button id="edit-startup-btn" class="w-full flex items-center px-4 py-2.5 text-sm text-white hover:bg-black hover:bg-opacity-20">
                                            <i data-feather="edit-2" class="h-4 w-4 mr-2 stroke-2"></i>
                                            <span>Edit Startup</span>
                                        </button>
                                        <button id="delete-startup-btn" class="w-full flex items-center px-4 py-2.5 text-sm text-white hover:bg-black hover:bg-opacity-20">
                                            <i data-feather="trash-2" class="h-4 w-4 mr-2 stroke-2"></i>
                                            <span>Delete Startup</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="startup-info">
                                <h1 class="text-2xl md:text-3xl font-extrabold mb-2 text-white">{{$myStartup->name}}</h1>
                                <p class="text-lg mb-4 max-w-3xl opacity-90">
                                    {{$myStartup->description}}
                                </p>

                                <div class="mb-4">
                                    <span class="tag">{{ $myStartup->category }}</span>
                                    <span class="tag">{{$myStartup->valuation}} $</span>
                                </div>

                                <div class="flex items-center text-sm opacity-80">

                                    <span class="mr-4"><i data-feather="calendar" class="h-4 w-4 inline mr-1"></i>
                                        {{$myStartup->created_at->format('F d, Y')}}</span>
                                    <span><i data-feather="globe" class="h-4 w-4 inline mr-1"></i> {{$myStartup->website}}</span>
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
                                    <p class="stat-number">{{$myStartup->funding_goal}} $</p>
                                    <p class="stat-label">funding goal</p>
                                </div>

                                <div class="w-1/5 stat-item">
                                    <p class="stat-number">{{$myStartup->monthly_revenue}} $</p>
                                    <p class="stat-label">monthly revenue</p>
                                </div>
                                <div class="w-1/5 stat-item">
                                    <p class="stat-number">{{$myStartup->gross_margin}} %</p>
                                    <p class="stat-label">Gross margin</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="bg-white py-8">
                        <div class="container mx-auto px-6">
                            <div class="flex justify-between items-center mb-8">
                                <h2 class="text-xl md:text-2xl font-bold text-gray-900">Investors Interested in Your Startup</h2>
                                <a href="{{route('entreprenor.investors')}}"
                                    class="text-gray-700 hover:text-gray-900 text-sm font-medium flex items-center group">
                                    View All <i data-feather="chevron-right" class="h-4 w-4 ml-1"></i>
                                </a>
                            </div>


                            @if(isset($myStartup->offers) && count($myStartup->offers) > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($myStartup->offers->sortByDesc('amount')->take(3) as $offer)
                                <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                                    <div class="flex items-center mb-5">
                                        <img src="{{$offer->user->profile_picture_url}}" alt="{{$offer->user->name}}"
                                            class="w-16 h-16 rounded-full object-cover mr-4 border-2 border-white shadow-sm">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800">{{$offer->user->name}}</h3>
                                            <p class="text-gray-500 text-xs uppercase tracking-wider mt-1">{{$offer->user->bio}}</p>
                                        </div>
                                    </div>



                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-800 flex items-center">

                                            <span>Ready to invest : </span>
                                            <span class="font-bold ml-1">{{$offer->amount}} $</span>
                                        </p>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="flex flex-col items-center justify-center py-16 px-4">
                                <div class="bg-gray-100 p-6 rounded-full mb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">No Investors Yet</h3>
                                <p class="text-gray-600 text-center max-w-md mb-8">Your startup hasn't received any investment interest yet. Complete your profile and share your startup to attract potential investors.</p>
                            </div>
                            @endif
                        </div>
                    </section>

                    <div id="delete-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-8">
                            <div class="text-center mb-6">
                                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-gray-100 mb-4">
                                    <i data-feather="alert-triangle" class="h-8 w-8 text-gray-600"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Delete Startup</h3>
                                <p class="text-gray-600 mb-6">
                                    Are you sure you want to delete "{{$myStartup->name}}"? This action cannot be undone.
                                </p>
                            </div>

                            <div class="flex flex-col items-center space-y-3">
                                <form action="{{ route('entreprenor.deletestartup') }}" method="POST" class="w-full flex justify-center">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="startup_id" value="{{$myStartup->id}}">
                                    <button type="submit" class="w-40 px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md text-sm transition-colors">
                                        Delete
                                    </button>
                                </form>
                                <button id="cancel-delete-btn" class="w-40 px-6 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium rounded-md text-sm transition-colors">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="edit-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                            <div class="px-8 py-5 border-b flex justify-between items-center sticky top-0 bg-white z-10">
                                <h3 class="text-xl font-bold text-gray-800">Edit Your Startup</h3>
                                <button id="close-edit-modal-btn" class="text-gray-400 hover:text-gray-600 transition-colors">
                                    <i data-feather="x" class="h-5 w-5"></i>
                                </button>
                            </div>

                            <div class="p-8">
                                <form id="edit-startup-form" action="{{ route('entreprenor.updatestartup') }}" method="POST" class="space-y-6">
                                    @csrf
                                    <input type="hidden" name="startup_id" value="{{$myStartup->id}}">

                                    <div class="relative mb-12">
                                        <div class="w-full h-1 bg-gray-200 absolute top-4 left-0 z-0"></div>
                                        <div id="edit-progress-bar" class="h-1 bg-blue-500 absolute top-4 left-0 z-0 transition-all duration-300" style="width: 25%"></div>

                                        <div class="flex justify-between relative z-10">
                                            <div class="edit-step-indicator active flex flex-col items-center" data-step="1">
                                                <div class="w-8 h-8 rounded-full border-2 border-blue-500 bg-blue-500 text-white flex items-center justify-center font-semibold shadow-md transition-all duration-300">
                                                    <i data-feather="info" class="h-4 w-4"></i>
                                                </div>
                                                <p class="text-xs font-medium mt-2 text-blue-500">Basic Info</p>
                                            </div>
                                            <div class="edit-step-indicator flex flex-col items-center" data-step="2">
                                                <div class="w-8 h-8 rounded-full border-2 border-gray-300 text-gray-400 flex items-center justify-center font-semibold bg-white shadow-sm transition-all duration-300">
                                                    <i data-feather="file-text" class="h-4 w-4"></i>
                                                </div>
                                                <p class="text-xs font-medium mt-2 text-gray-400">Details</p>
                                            </div>
                                            <div class="edit-step-indicator flex flex-col items-center" data-step="3">
                                                <div class="w-8 h-8 rounded-full border-2 border-gray-300 text-gray-400 flex items-center justify-center font-semibold bg-white shadow-sm transition-all duration-300">
                                                    <i data-feather="dollar-sign" class="h-4 w-4"></i>
                                                </div>
                                                <p class="text-xs font-medium mt-2 text-gray-400">Financials</p>
                                            </div>
                                            <div class="edit-step-indicator flex flex-col items-center" data-step="4">
                                                <div class="w-8 h-8 rounded-full border-2 border-gray-300 text-gray-400 flex items-center justify-center font-semibold bg-white shadow-sm transition-all duration-300">
                                                    <i data-feather="image" class="h-4 w-4"></i>
                                                </div>
                                                <p class="text-xs font-medium mt-2 text-gray-400">Media</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="edit-step-content" id="edit-step-1">
                                        <div class="space-y-6">
                                            <div class="form-group">
                                                <label for="edit-startup-name" class="block text-sm font-medium text-gray-700 mb-2">Startup Name</label>
                                                <input type="text" id="edit-startup-name" name="name" value="{{$myStartup->name}}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                            </div>

                                            <div class="form-group">
                                                <label for="edit-startup-description" class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                                                <textarea id="edit-startup-description" name="description" rows="2" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none" maxlength="255">{{$myStartup->description}}</textarea>
                                                <p class="text-xs text-gray-500 mt-2">Brief tagline or elevator pitch (max 255 characters)</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="edit-startup-category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                                <div class="relative">
                                                    <select id="edit-startup-category" name="category" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none transition-all">
                                                        <option value="Technology & Innovation" {{ $myStartup->category == 'Technology & Innovation' ? 'selected' : '' }}>Technology & Innovation</option>
                                                        <option value="Health & Wellness" {{ $myStartup->category == 'Health & Wellness' ? 'selected' : '' }}>Health & Wellness</option>
                                                        <option value="Sustainability & GreenTech" {{ $myStartup->category == 'Sustainability & GreenTech' ? 'selected' : '' }}>Sustainability & GreenTech</option>
                                                        <option value="Education & Learning" {{ $myStartup->category == 'Education & Learning' ? 'selected' : '' }}>Education & Learning</option>
                                                        <option value="Finance & Fintech" {{ $myStartup->category == 'Finance & Fintech' ? 'selected' : '' }}>Finance & Fintech</option>
                                                        <option value="Lifestyle & Consumer Goods" {{ $myStartup->category == 'Lifestyle & Consumer Goods' ? 'selected' : '' }}>Lifestyle & Consumer Goods</option>
                                                    </select>
                                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none">
                                                        <i data-feather="chevron-down" class="h-4 w-4 text-gray-500"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="edit-startup-website" class="block text-sm font-medium text-gray-700 mb-2">Website</label>
                                                <div class="relative">
                                                    <input type="url" id="edit-startup-website" name="website" value="{{$myStartup->website}}" required placeholder="https://" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <i data-feather="globe" class="h-4 w-4 text-gray-500"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-8 flex justify-end">
                                            <button type="button" class="edit-next-step px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 font-medium flex items-center shadow-md transition-all duration-300">
                                                Continue <i data-feather="arrow-right" class="h-4 w-4 ml-2"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="edit-step-content hidden" id="edit-step-2">
                                        <div class="space-y-6">
                                            <div class="form-group">
                                                <label for="edit-startup-details" class="block text-sm font-medium text-gray-700 mb-2">Detailed Description</label>
                                                <textarea id="edit-startup-details" name="details" rows="5" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none">{{$myStartup->details}}</textarea>
                                                <p class="text-xs text-gray-500 mt-2">Provide a comprehensive description of your startup's mission, value proposition, and unique selling points.</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="edit-funding-goal" class="block text-sm font-medium text-gray-700 mb-2">Funding Goal (USD)</label>
                                                <div class="relative">
                                                    <input type="number" id="edit-funding-goal" name="funding_goal" min="0" value="{{$myStartup->funding_goal}}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <span class="text-gray-500">$</span>
                                                    </div>
                                                </div>
                                                <p class="text-xs text-gray-500 mt-2">Amount of funding you're seeking to raise.</p>
                                            </div>
                                        </div>

                                        <div class="mt-8 flex justify-between">
                                            <button type="button" class="edit-prev-step px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium flex items-center transition-all duration-300">
                                                <i data-feather="arrow-left" class="h-4 w-4 mr-2"></i> Back
                                            </button>
                                            <button type="button" class="edit-next-step px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 font-medium flex items-center shadow-md transition-all duration-300">
                                                Continue <i data-feather="arrow-right" class="h-4 w-4 ml-2"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="edit-step-content hidden" id="edit-step-3">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="form-group md:col-span-2">
                                                <label for="edit-startup-valuation" class="block text-sm font-medium text-gray-700 mb-2">Current Valuation (USD)</label>
                                                <div class="relative">
                                                    <input type="number" id="edit-startup-valuation" name="valuation" min="0" step="0.01" value="{{$myStartup->valuation}}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <span class="text-gray-500">$</span>
                                                    </div>
                                                </div>
                                                <p class="text-xs text-gray-500 mt-2">Estimated current valuation of your startup.</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="edit-monthly-revenue" class="block text-sm font-medium text-gray-700 mb-2">Monthly Revenue (USD)</label>
                                                <div class="relative">
                                                    <input type="number" id="edit-monthly-revenue" name="monthly_revenue" min="0" step="0.01" value="{{$myStartup->monthly_revenue}}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <span class="text-gray-500">$</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="edit-gross-margin" class="block text-sm font-medium text-gray-700 mb-2">Gross Margin (%)</label>
                                                <div class="relative">
                                                    <input type="number" id="edit-gross-margin" name="gross_margin" min="0" max="100" value="{{$myStartup->gross_margin}}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pr-10 transition-all">
                                                    <div class="absolute right-0 top-0 h-full flex items-center pr-4">
                                                        <span class="text-gray-500">%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="edit-burn-rate" class="block text-sm font-medium text-gray-700 mb-2">Monthly Burn Rate (USD)</label>
                                                <div class="relative">
                                                    <input type="number" id="edit-burn-rate" name="burn_rate" min="0" value="{{$myStartup->burn_rate}}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <span class="text-gray-500">$</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="edit-runway" class="block text-sm font-medium text-gray-700 mb-2">Runway (months)</label>
                                                <div class="relative">
                                                    <input type="number" id="edit-runway" name="runway" min="0" value="{{$myStartup->runway}}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <i data-feather="calendar" class="h-4 w-4 text-gray-500"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-8 flex justify-between">
                                            <button type="button" class="edit-prev-step px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium flex items-center transition-all duration-300">
                                                <i data-feather="arrow-left" class="h-4 w-4 mr-2"></i> Back
                                            </button>
                                            <button type="button" class="edit-next-step px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 font-medium flex items-center shadow-md transition-all duration-300">
                                                Continue <i data-feather="arrow-right" class="h-4 w-4 ml-2"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="edit-step-content hidden" id="edit-step-4">
                                        <div class="space-y-8">
                                            <div class="form-group">
                                                <label for="edit-startup-logo" class="block text-sm font-medium text-gray-700 mb-2">Logo URL</label>
                                                <div class="relative">
                                                    <input type="url" id="edit-startup-logo" name="logo" value="{{$myStartup->logo}}" required placeholder="https://example.com/logo.png" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <i data-feather="image" class="h-4 w-4 text-gray-500"></i>
                                                    </div>
                                                </div>
                                                <p class="text-xs text-gray-500 mt-2">Link to your startup logo (square format recommended, minimum 400x400px)</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="edit-cover-image" class="block text-sm font-medium text-gray-700 mb-2">Cover Image URL</label>
                                                <div class="relative">
                                                    <input type="url" id="edit-cover-image" name="cover" value="{{$myStartup->cover}}" required placeholder="https://example.com/cover.jpg" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <i data-feather="image" class="h-4 w-4 text-gray-500"></i>
                                                    </div>
                                                </div>
                                                <p class="text-xs text-gray-500 mt-2">Link to a banner image for your startup profile (recommended size: 1400x400px)</p>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                                                <div class="border rounded-lg p-4">
                                                    <p class="text-sm font-medium text-gray-700 mb-2">Current Logo</p>
                                                    <div class="w-32 h-32 bg-gray-100 rounded-md flex items-center justify-center mx-auto mb-2">
                                                        <img src="{{$myStartup->logo}}" alt="Current logo" class="max-w-full max-h-full object-contain rounded-md">
                                                    </div>
                                                </div>
                                                <div class="border rounded-lg p-4">
                                                    <p class="text-sm font-medium text-gray-700 mb-2">Current Cover</p>
                                                    <div class="w-full h-32 bg-gray-100 rounded-md flex items-center justify-center mb-2">
                                                        <img src="{{$myStartup->cover}}" alt="Current cover" class="max-w-full max-h-full object-contain rounded-md">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-8 flex justify-between">
                                            <button type="button" class="edit-prev-step px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium flex items-center transition-all duration-300">
                                                <i data-feather="arrow-left" class="h-4 w-4 mr-2"></i> Back
                                            </button>
                                            <button type="submit" class="px-8 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 font-medium shadow-md transition-all duration-300">
                                                Update Startup
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

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
                        <button id="create-startup-btn" class="px-6 py-3 bg-[#0049FF] text-white text-[18px] font-bold rounded-lg shadow-sm hover:shadow-md transition-all flex items-center justify-center font-['Inter',_sans-serif]" hover:bg-[#003CD9] transition-colors">
                            <i data-feather="plus" class="h-4 w-4 inline-block mr-2"></i>
                            Add Your Startup
                        </button>
                    </div>

                    <div id="startup-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                            <div class="px-8 py-5 border-b flex justify-between items-center sticky top-0 bg-white z-10">
                                <h3 class="text-xl font-bold text-gray-800">Create Your Startup</h3>
                                <button id="close-modal-btn" class="text-gray-400 hover:text-gray-600 transition-colors">
                                    <i data-feather="x" class="h-5 w-5"></i>
                                </button>
                            </div>

                            <div class="p-8">
                                <form id="create-startup-form" action="{{ route('entreprenor.registerstartup')}}" method="POST" class="space-y-6">
                                    @csrf

                                    <div class="relative mb-12">
                                        <div class="w-full h-1 bg-gray-200 absolute top-4 left-0 z-0"></div>
                                        <div id="progress-bar" class="h-1 bg-blue-500 absolute top-4 left-0 z-0 transition-all duration-300" style="width: 25%"></div>

                                        <div class="flex justify-between relative z-10">
                                            <div class="step-indicator active flex flex-col items-center" data-step="1">
                                                <div class="w-8 h-8 rounded-full border-2 border-blue-500 bg-blue-500 text-white flex items-center justify-center font-semibold shadow-md transition-all duration-300">
                                                    <i data-feather="info" class="h-4 w-4"></i>
                                                </div>
                                                <p class="text-xs font-medium mt-2 text-blue-500">Basic Info</p>
                                            </div>
                                            <div class="step-indicator flex flex-col items-center" data-step="2">
                                                <div class="w-8 h-8 rounded-full border-2 border-gray-300 text-gray-400 flex items-center justify-center font-semibold bg-white shadow-sm transition-all duration-300">
                                                    <i data-feather="file-text" class="h-4 w-4"></i>
                                                </div>
                                                <p class="text-xs font-medium mt-2 text-gray-400">Details</p>
                                            </div>
                                            <div class="step-indicator flex flex-col items-center" data-step="3">
                                                <div class="w-8 h-8 rounded-full border-2 border-gray-300 text-gray-400 flex items-center justify-center font-semibold bg-white shadow-sm transition-all duration-300">
                                                    <i data-feather="dollar-sign" class="h-4 w-4"></i>
                                                </div>
                                                <p class="text-xs font-medium mt-2 text-gray-400">Financials</p>
                                            </div>
                                            <div class="step-indicator flex flex-col items-center" data-step="4">
                                                <div class="w-8 h-8 rounded-full border-2 border-gray-300 text-gray-400 flex items-center justify-center font-semibold bg-white shadow-sm transition-all duration-300">
                                                    <i data-feather="image" class="h-4 w-4"></i>
                                                </div>
                                                <p class="text-xs font-medium mt-2 text-gray-400">Media</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="step-content" id="step-1">
                                        <div class="space-y-6">
                                            <div class="form-group">
                                                <label for="startup-name" class="block text-sm font-medium text-gray-700 mb-2">Startup Name</label>
                                                <input type="text" id="startup-name" name="name" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                            </div>

                                            <div class="form-group">
                                                <label for="startup-description" class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                                                <textarea id="startup-description" name="description" rows="2" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none" maxlength="255"></textarea>
                                                <p class="text-xs text-gray-500 mt-2">Brief tagline or elevator pitch (max 255 characters)</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="startup-category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                                <div class="relative">
                                                    <select id="startup-category" name="category" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none transition-all">
                                                        <option value="" disabled selected>Select a category</option>
                                                        <option value="Technology & Innovation">Technology & Innovation</option>
                                                        <option value="Health & Wellness">Health & Wellness</option>
                                                        <option value="Sustainability & GreenTech">Sustainability & GreenTech</option>
                                                        <option value="Education & Learning">Education & Learning</option>
                                                        <option value="Finance & Fintech">Finance & Fintech</option>
                                                        <option value="Lifestyle & Consumer Goods">Lifestyle & Consumer Goods</option>
                                                    </select>
                                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none">
                                                        <i data-feather="chevron-down" class="h-4 w-4 text-gray-500"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="startup-website" class="block text-sm font-medium text-gray-700 mb-2">Website</label>
                                                <div class="relative">
                                                    <input type="url" id="startup-website" name="website" required placeholder="https://" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <i data-feather="globe" class="h-4 w-4 text-gray-500"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-8 flex justify-end">
                                            <button type="button" class="next-step px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 font-medium flex items-center shadow-md transition-all duration-300">
                                                Continue <i data-feather="arrow-right" class="h-4 w-4 ml-2"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="step-content hidden" id="step-2">
                                        <div class="space-y-6">
                                            <div class="form-group">
                                                <label for="startup-details" class="block text-sm font-medium text-gray-700 mb-2">Detailed Description</label>
                                                <textarea id="startup-details" name="details" rows="5" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"></textarea>
                                                <p class="text-xs text-gray-500 mt-2">Provide a comprehensive description of your startup's mission, value proposition, and unique selling points.</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="funding-goal" class="block text-sm font-medium text-gray-700 mb-2">Funding Goal (USD)</label>
                                                <div class="relative">
                                                    <input type="number" id="funding-goal" name="funding_goal" min="0" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <span class="text-gray-500">$</span>
                                                    </div>
                                                </div>
                                                <p class="text-xs text-gray-500 mt-2">Amount of funding you're seeking to raise.</p>
                                            </div>
                                        </div>

                                        <div class="mt-8 flex justify-between">
                                            <button type="button" class="prev-step px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium flex items-center transition-all duration-300">
                                                <i data-feather="arrow-left" class="h-4 w-4 mr-2"></i> Back
                                            </button>
                                            <button type="button" class="next-step px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 font-medium flex items-center shadow-md transition-all duration-300">
                                                Continue <i data-feather="arrow-right" class="h-4 w-4 ml-2"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="step-content hidden" id="step-3">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="form-group md:col-span-2">
                                                <label for="startup-valuation" class="block text-sm font-medium text-gray-700 mb-2">Current Valuation (USD)</label>
                                                <div class="relative">
                                                    <input type="number" id="startup-valuation" name="valuation" min="0" step="0.01" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <span class="text-gray-500">$</span>
                                                    </div>
                                                </div>
                                                <p class="text-xs text-gray-500 mt-2">Estimated current valuation of your startup.</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="monthly-revenue" class="block text-sm font-medium text-gray-700 mb-2">Monthly Revenue (USD)</label>
                                                <div class="relative">
                                                    <input type="number" id="monthly-revenue" name="monthly_revenue" min="0" step="0.01" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <span class="text-gray-500">$</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="gross-margin" class="block text-sm font-medium text-gray-700 mb-2">Gross Margin (%)</label>
                                                <div class="relative">
                                                    <input type="number" id="gross-margin" name="gross_margin" min="0" max="100" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pr-10 transition-all">
                                                    <div class="absolute right-0 top-0 h-full flex items-center pr-4">
                                                        <span class="text-gray-500">%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="burn-rate" class="block text-sm font-medium text-gray-700 mb-2">Monthly Burn Rate (USD)</label>
                                                <div class="relative">
                                                    <input type="number" id="burn-rate" name="burn_rate" min="0" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <span class="text-gray-500">$</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="runway" class="block text-sm font-medium text-gray-700 mb-2">Runway (months)</label>
                                                <div class="relative">
                                                    <input type="number" id="runway" name="runway" min="0" required class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <i data-feather="calendar" class="h-4 w-4 text-gray-500"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-8 flex justify-between">
                                            <button type="button" class="prev-step px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium flex items-center transition-all duration-300">
                                                <i data-feather="arrow-left" class="h-4 w-4 mr-2"></i> Back
                                            </button>
                                            <button type="button" class="next-step px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 font-medium flex items-center shadow-md transition-all duration-300">
                                                Continue <i data-feather="arrow-right" class="h-4 w-4 ml-2"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="step-content hidden" id="step-4">
                                        <div class="space-y-8">
                                            <div class="form-group">
                                                <label for="startup-logo" class="block text-sm font-medium text-gray-700 mb-2">Logo URL</label>
                                                <div class="relative">
                                                    <input type="url" id="startup-logo" name="logo" required placeholder="https://example.com/logo.png" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <i data-feather="image" class="h-4 w-4 text-gray-500"></i>
                                                    </div>
                                                </div>
                                                <p class="text-xs text-gray-500 mt-2">Link to your startup logo (square format recommended, minimum 400x400px)</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="cover-image" class="block text-sm font-medium text-gray-700 mb-2">Cover Image URL</label>
                                                <div class="relative">
                                                    <input type="url" id="cover-image" name="cover" required placeholder="https://example.com/cover.jpg" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent pl-10 transition-all">
                                                    <div class="absolute left-0 top-0 h-full flex items-center pl-4">
                                                        <i data-feather="image" class="h-4 w-4 text-gray-500"></i>
                                                    </div>
                                                </div>
                                                <p class="text-xs text-gray-500 mt-2">Link to a banner image for your startup profile (recommended size: 1400x400px)</p>
                                            </div>
                                        </div>

                                        <div class="mt-8 flex justify-between">
                                            <button type="button" class="prev-step px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium flex items-center transition-all duration-300">
                                                <i data-feather="arrow-left" class="h-4 w-4 mr-2"></i> Back
                                            </button>
                                            <button type="submit" class="px-8 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 font-medium shadow-md transition-all duration-300">
                                                Create Startup
                                            </button>
                                        </div>
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
            
            feather.replace();

            
            const menuButton = document.getElementById('menu-button');
            const dropdownMenu = document.getElementById('dropdown-menu');
            if (menuButton && dropdownMenu) {
                menuButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdownMenu.classList.toggle('hidden');
                });

                
                document.addEventListener('click', function() {
                    dropdownMenu.classList.add('hidden');
                });
            }

            
            const createStartupBtn = document.getElementById('create-startup-btn');
            const startupModal = document.getElementById('startup-modal');
            const closeModalBtn = document.getElementById('close-modal-btn');

            if (createStartupBtn) {
                createStartupBtn.addEventListener('click', function() {
                    startupModal.classList.remove('hidden');
                });
            }

            if (closeModalBtn) {
                closeModalBtn.addEventListener('click', function() {
                    startupModal.classList.add('hidden');
                    resetForm('step-', '.step-content', '.step-indicator');
                });
            }

            
            const deleteStartupBtn = document.getElementById('delete-startup-btn');
            const deleteModal = document.getElementById('delete-modal');
            const cancelDeleteBtn = document.getElementById('cancel-delete-btn');

            if (deleteStartupBtn) {
                deleteStartupBtn.addEventListener('click', function() {
                    deleteModal.classList.remove('hidden');
                });
            }

            if (cancelDeleteBtn) {
                cancelDeleteBtn.addEventListener('click', function() {
                    deleteModal.classList.add('hidden');
                });
            }

            
            const editStartupBtn = document.getElementById('edit-startup-btn');
            const editModal = document.getElementById('edit-modal');
            const closeEditModalBtn = document.getElementById('close-edit-modal-btn');

            if (editStartupBtn) {
                editStartupBtn.addEventListener('click', function() {
                    editModal.classList.remove('hidden');
                    if (dropdownMenu) dropdownMenu.classList.add('hidden');
                });
            }

            if (closeEditModalBtn) {
                closeEditModalBtn.addEventListener('click', function() {
                    editModal.classList.add('hidden');
                    resetForm('edit-step-', '.edit-step-content', '.edit-step-indicator');
                });
            }

            
            document.addEventListener('click', function(e) {
                if (e.target === startupModal) startupModal.classList.add('hidden');
                if (e.target === deleteModal) deleteModal.classList.add('hidden');
                if (e.target === editModal) editModal.classList.add('hidden');
            });

            
            setupFormNavigation('.next-step', '.prev-step', 'step-', 'progress-bar', '.step-indicator');
            setupFormNavigation('.edit-next-step', '.edit-prev-step', 'edit-step-', 'edit-progress-bar', '.edit-step-indicator');

            
            function resetForm(stepPrefix, contentSelector, indicatorSelector) {
                const steps = document.querySelectorAll(contentSelector);

                steps.forEach((step, index) => {
                    if (index === 0) {
                        step.classList.remove('hidden');
                    } else {
                        step.classList.add('hidden');
                    }
                });

                const progressBar = document.getElementById(stepPrefix === 'step-' ? 'progress-bar' : 'edit-progress-bar');
                if (progressBar) progressBar.style.width = '25%';

                updateIndicators(1, indicatorSelector);
            }

            
            function setupFormNavigation(nextSelector, prevSelector, stepPrefix, progressBarId, indicatorSelector) {
                
                document.querySelectorAll(nextSelector).forEach(button => {
                    button.addEventListener('click', function() {
                        const currentStep = this.closest(stepPrefix === 'step-' ? '.step-content' : '.edit-step-content');
                        const currentStepNumber = parseInt(currentStep.id.split('-').pop());
                        const nextStepNumber = currentStepNumber + 1;
                        const nextStepId = stepPrefix + nextStepNumber;

                        
                        const requiredFields = currentStep.querySelectorAll('[required]');
                        let isValid = true;

                        requiredFields.forEach(field => {
                            if (!field.value.trim()) {
                                field.classList.add('border-red-500');
                                isValid = false;
                            } else {
                                field.classList.remove('border-red-500');
                            }
                        });

                        if (!isValid) return;

                        
                        currentStep.classList.add('hidden');
                        document.getElementById(nextStepId).classList.remove('hidden');

                        
                        document.getElementById(progressBarId).style.width = (nextStepNumber * 25) + '%';
                        updateIndicators(nextStepNumber, indicatorSelector);
                    });
                });

                
                document.querySelectorAll(prevSelector).forEach(button => {
                    button.addEventListener('click', function() {
                        const currentStep = this.closest(stepPrefix === 'step-' ? '.step-content' : '.edit-step-content');
                        const currentStepNumber = parseInt(currentStep.id.split('-').pop());
                        const prevStepNumber = currentStepNumber - 1;
                        const prevStepId = stepPrefix + prevStepNumber;

                        
                        currentStep.classList.add('hidden');
                        document.getElementById(prevStepId).classList.remove('hidden');

                        
                        document.getElementById(progressBarId).style.width = (prevStepNumber * 25) + '%';
                        updateIndicators(prevStepNumber, indicatorSelector);
                    });
                });
            }

            
            function updateIndicators(activeStep, selector) {
                document.querySelectorAll(selector).forEach((indicator, index) => {
                    const stepNumber = index + 1;
                    const circle = indicator.querySelector('div');
                    const text = indicator.querySelector('p');

                    if (stepNumber <= activeStep) {
                        
                        circle.classList.add('border-blue-500', 'bg-blue-500', 'text-white');
                        circle.classList.remove('border-gray-300', 'text-gray-400', 'bg-white');
                        text.classList.add('text-blue-500');
                        text.classList.remove('text-gray-400');
                    } else {
                        
                        circle.classList.remove('border-blue-500', 'bg-blue-500', 'text-white');
                        circle.classList.add('border-gray-300', 'text-gray-400', 'bg-white');
                        text.classList.remove('text-blue-500');
                        text.classList.add('text-gray-400');
                    }
                });
            }
        });
    </script>
</body>

</html>