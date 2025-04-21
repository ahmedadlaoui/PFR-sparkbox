<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - SparkBox</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        /* Smaller stat card styling */
        .stat-card {
            position: relative;
            background-color: white;
            border-radius: 10px;
            border: 1px solid #F0F0F0;
            padding: 1.25rem;
        }

        /* Chart card styling */
        .chart-card {
            background-color: white;
            border-radius: 12px;
            border: 1px solid #F0F0F0;
            overflow: hidden;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        /* Chart container */
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }
    </style>
</head>

<body>

    <x-header />

    <div class="main-content bg-white">
        <div class="content-container">
            <div class="ml-0 md:ml-12 lg:ml-16">
                <div class="max-w-7xl mx-auto px-6 py-10">

                    <div class="mb-10">
                        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">Portfolio Overview</h2>
                        <p class="text-gray-600 font-['Inter',_sans-serif]">Track your investments and performance metrics</p>
                    </div>


                    <div class="mb-10">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                            <div class="stat-card">
                                <p
                                    class="text-[#666666] text-xs font-medium tracking-wide uppercase font-['Inter',_sans-serif] mb-1">
                                    Total Invested</p>
                                <p class="text-2xl font-bold text-[#1A1A1A] font-['Inter',_sans-serif]">$842,500</p>
                            </div>

                            <div class="stat-card">
                                <p
                                    class="text-[#666666] text-xs font-medium tracking-wide uppercase font-['Inter',_sans-serif] mb-1">
                                    Portfolio Value</p>
                                <p class="text-2xl font-bold text-[#1A1A1A] font-['Inter',_sans-serif]">$1,124,600</p>
                            </div>

                            <div class="stat-card">
                                <p
                                    class="text-[#666666] text-xs font-medium tracking-wide uppercase font-['Inter',_sans-serif] mb-1">
                                    ROI</p>
                                <p class="text-2xl font-bold text-green-600 font-['Inter',_sans-serif]">+33.5%</p>
                            </div>

                            <div class="stat-card">
                                <p
                                    class="text-[#666666] text-xs font-medium tracking-wide uppercase font-['Inter',_sans-serif] mb-1">
                                    Active Investments</p>
                                <p class="text-2xl font-bold text-[#1A1A1A] font-['Inter',_sans-serif]">14</p>
                            </div>
                        </div>
                    </div>


                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">

                        <div class="chart-card">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-lg font-bold text-[#1A1A1A]">Investment & Revenue</h3>
                                <div class="flex space-x-2">
                                    <button
                                        class="px-3 py-1 text-xs font-medium bg-white border border-gray-200 rounded-md">1Y</button>
                                    <button class="px-3 py-1 text-xs font-medium bg-[#0049FF] text-white rounded-md">2Y</button>
                                    <button
                                        class="px-3 py-1 text-xs font-medium bg-white border border-gray-200 rounded-md">5Y</button>
                                </div>
                            </div>
                            <div class="chart-container">
                                <canvas id="investmentChart"></canvas>
                            </div>
                        </div>


                        <div class="chart-card">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-lg font-bold text-[#1A1A1A]">Investment Categories</h3>
                                <div>
                                    <button
                                        class="px-3 py-1 text-xs font-medium bg-white border border-gray-200 rounded-md flex items-center">
                                        <i data-feather="filter" class="h-3 w-3 mr-1"></i> Filter
                                    </button>
                                </div>
                            </div>
                            <div class="chart-container">
                                <canvas id="categoryChart"></canvas>
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
            // Initialize Feather icons
            feather.replace({
                stroke: 1.5
            });

            // Mobile aside toggle
            const mobileAsideToggle = document.querySelector('.mobile-aside-toggle');
            const asideBar = document.querySelector('.aside-bar');

            mobileAsideToggle?.addEventListener('click', function() {
                asideBar.classList.toggle('show');
            });

            // Create gray gradients
            const ctxInvestment = document.getElementById('investmentChart').getContext('2d');
            const gradientInvestment = ctxInvestment.createLinearGradient(0, 0, 0, 400);
            gradientInvestment.addColorStop(0, 'rgba(75, 85, 99, 0.6)');
            gradientInvestment.addColorStop(1, 'rgba(75, 85, 99, 0.1)');

            const gradientRevenue = ctxInvestment.createLinearGradient(0, 0, 0, 400);
            gradientRevenue.addColorStop(0, 'rgba(156, 163, 175, 0.6)');
            gradientRevenue.addColorStop(1, 'rgba(156, 163, 175, 0.1)');

            // Investment & Revenue Chart with gray gradients
            const investmentChart = new Chart(ctxInvestment, {
                type: 'line',
                data: {
                    labels: [
                        'Jan 2021', 'Mar 2021', 'May 2021', 'Jul 2021', 'Sep 2021', 'Nov 2021',
                        'Jan 2022', 'Mar 2022', 'May 2022', 'Jul 2022', 'Sep 2022', 'Nov 2022',
                        'Jan 2023', 'Mar 2023', 'May 2023', 'Jul 2023', 'Sep 2023', 'Nov 2023'
                    ],
                    datasets: [{
                            label: 'Investments',
                            data: [200000, 200000, 350000, 350000, 350000, 500000, 500000, 650000, 650000, 750000, 750000, 750000, 842500, 842500, 842500, 842500, 842500, 842500],
                            borderColor: '#4B5563',
                            backgroundColor: gradientInvestment,
                            borderWidth: 2,
                            tension: 0.4,
                            fill: true
                        },
                        {
                            label: 'Portfolio Value',
                            data: [200000, 215000, 365000, 395000, 410000, 570000, 600000, 760000, 790000, 920000, 950000, 980000, 1050000, 1070000, 1090000, 1105000, 1115000, 1124600],
                            borderColor: '#9CA3AF',
                            backgroundColor: gradientRevenue,
                            borderWidth: 2,
                            tension: 0.4,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                boxWidth: 6
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += '$' + context.parsed.y.toLocaleString();
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            // Create gradient colors for bar chart
            const ctxCategory = document.getElementById('categoryChart').getContext('2d');
            const grayGradients = [
                createGradient(ctxCategory, '75, 85, 99'), // Dark gray
                createGradient(ctxCategory, '107, 114, 128'), // Medium-dark gray
                createGradient(ctxCategory, '156, 163, 175'), // Medium gray
                createGradient(ctxCategory, '209, 213, 219'), // Light gray
                createGradient(ctxCategory, '229, 231, 235') // Very light gray
            ];

            function createGradient(context, colorValues) {
                const gradient = context.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, `rgba(${colorValues}, 0.9)`);
                gradient.addColorStop(1, `rgba(${colorValues}, 0.6)`);
                return gradient;
            }

            // Category Chart - converted from pie to bar
            const categoryChart = new Chart(ctxCategory, {
                type: 'bar',
                data: {
                    labels: ['CleanTech', 'AI & ML', 'HealthTech', 'FinTech', 'Other'],
                    datasets: [{
                        label: 'Investment Percentage',
                        data: [42, 20, 15, 18, 5],
                        backgroundColor: grayGradients,
                        borderColor: [
                            '#4B5563',
                            '#6B7280',
                            '#9CA3AF',
                            '#D1D5DB',
                            '#E5E7EB'
                        ],
                        borderWidth: 1,
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.label}: ${context.raw}%`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>