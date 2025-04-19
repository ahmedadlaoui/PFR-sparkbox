<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings - SparkBox</title>
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

        /* Main content area styling */
        .main-content {
            padding-top: 80px;
            min-height: 100vh;
            margin-left: 260px;
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

        /* Settings-specific styling */
        .settings-card {
            background-color: white;
            border-radius: 12px;
            border: 1px solid #F0F0F0;
            overflow: hidden;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #1A1A1A;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            outline: none;
            background-color: #F9FAFB;
        }

        .form-input:focus {
            border-color: #0049FF;
            box-shadow: 0 0 0 3px rgba(0, 73, 255, 0.05);
            background-color: white;
        }

        .avatar-upload {
            position: relative;
            width: 120px;
            height: 120px;
            margin-bottom: 1.5rem;
        }

        .avatar-edit {
            position: absolute;
            right: 5px;
            bottom: 5px;
            width: 32px;
            height: 32px;
            background: #0049FF;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            border: 2px solid white;
            color: white;
        }

        .avatar-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #F0F0F0;
            position: relative;
        }

        .avatar-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .save-button {
            background-color: #0049FF;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .save-button:hover {
            background-color: #003CD9;
        }

        .cancel-button {
            background-color: white;
            color: #4B5563;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-right: 1rem;
        }

        .cancel-button:hover {
            background-color: #F9FAFB;
            border-color: #D1D5DB;
        }

        .settings-section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1A1A1A;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>

    <x-header />
    <x-asidebar />

    
    <!-- Main Content Area - Settings -->
    <div class="main-content bg-[#FAFBFC]">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 py-10">
            <!-- Settings Header -->
            <div class="mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-black font-['Inter',_sans-serif] mb-2">Account Settings
                </h1>
                <p class="text-gray-600 font-['Inter',_sans-serif]">Manage your personal information and account
                    preferences</p>
            </div>

            <!-- Profile Settings Section -->
            <div class="settings-section">
                <!-- Profile Picture -->
                <div class="settings-card">
                    <h3 class="settings-section-title">Profile Picture</h3>
                    <div class="flex flex-col md:flex-row items-start md:items-center">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <label for="profile-picture-upload">
                                    <i data-feather="edit-2" class="h-4 w-4"></i>
                                </label>
                                <input type="file" id="profile-picture-upload" style="display: none;">
                            </div>
                            <div class="avatar-preview">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Current Profile Picture">
                            </div>
                        </div>

                        <div class="ml-0 md:ml-6 mt-4 md:mt-0">
                            <p class="text-gray-700 mb-2">Upload a new profile picture or paste an image URL</p>
                            <div class="flex gap-3 mb-3">
                                <button type="button" id="btn-upload"
                                    class="text-sm font-medium text-blue-600 py-1 px-3 bg-blue-50 rounded-md">Upload</button>
                                <button type="button" id="btn-url"
                                    class="text-sm font-medium text-gray-600 py-1 px-3 bg-gray-50 rounded-md">Image
                                    URL</button>
                            </div>
                            <div id="url-input-container" class="hidden">
                                <input type="text" id="image-url" class="form-input mb-2"
                                    placeholder="Paste image URL here">
                                <button type="button" id="apply-url"
                                    class="text-sm font-medium text-white bg-blue-600 py-1 px-3 rounded-md">Apply</button>
                            </div>
                            <p class="text-gray-500 text-xs">Recommended: Square image, at least 400x400 pixels.</p>
                        </div>
                    </div>
                </div>

                <!-- Personal Information -->
                <div class="settings-card">
                    <h3 class="settings-section-title">Personal Information</h3>
                    <form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label class="form-label" for="first-name">First Name</label>
                                <input type="text" id="first-name" class="form-input"
                                    placeholder="Enter your first name" value="Alex">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="last-name">Last Name</label>
                                <input type="text" id="last-name" class="form-input" placeholder="Enter your last name"
                                    value="Morgan">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email Address</label>
                                <input type="email" id="email" class="form-input" placeholder="Enter your email address"
                                    value="alex.morgan@example.com">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="tel" id="phone" class="form-input" placeholder="Enter your phone number"
                                    value="+1 (555) 123-4567">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="bio">Bio</label>
                            <textarea id="bio" class="form-input" rows="4"
                                placeholder="Tell us about yourself">Angel investor with 10+ years of experience in technology startups. Focus areas include fintech, cleantech, and AI solutions.</textarea>
                        </div>

                        <div class="flex justify-end mt-8">
                            <button type="button" class="cancel-button">Cancel</button>
                            <button type="submit" class="save-button">Save Changes</button>
                        </div>
                    </form>
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

            // Profile picture functionality
            const uploadInput = document.getElementById('profile-picture-upload');
            const previewImg = document.querySelector('.avatar-preview img');
            const btnUpload = document.getElementById('btn-upload');
            const btnUrl = document.getElementById('btn-url');
            const urlInputContainer = document.getElementById('url-input-container');
            const imageUrlInput = document.getElementById('image-url');
            const applyUrlBtn = document.getElementById('apply-url');

            // Toggle between upload and URL input
            btnUpload.addEventListener('click', function () {
                btnUpload.classList.replace('text-gray-600', 'text-blue-600');
                btnUpload.classList.replace('bg-gray-50', 'bg-blue-50');
                btnUrl.classList.replace('text-blue-600', 'text-gray-600');
                btnUrl.classList.replace('bg-blue-50', 'bg-gray-50');
                urlInputContainer.classList.add('hidden');
                uploadInput.click();
            });

            btnUrl.addEventListener('click', function () {
                btnUrl.classList.replace('text-gray-600', 'text-blue-600');
                btnUrl.classList.replace('bg-gray-50', 'bg-blue-50');
                btnUpload.classList.replace('text-blue-600', 'text-gray-600');
                btnUpload.classList.replace('bg-blue-50', 'bg-gray-50');
                urlInputContainer.classList.remove('hidden');
            });

            // Handle file upload
            uploadInput?.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImg.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Handle image URL
            applyUrlBtn?.addEventListener('click', function () {
                const imageUrl = imageUrlInput.value.trim();
                if (imageUrl) {
                    previewImg.src = imageUrl;
                }
            });
        });
    </script>
</body>

</html>