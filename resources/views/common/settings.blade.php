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

    <div class="main-content bg-white">
        <div class="content-container">
            <div class="ml-0 md:ml-12 lg:ml-16">

                <div class="max-w-7xl mx-auto px-6 py-10">

                    <div class="mb-8 mt-8">
                        <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">Account Informations</h1>
                        <p class="text-gray-600 font-['Inter',_sans-serif]">Manage your account preferences and profile information</p>
                    </div>

                    <div class="settings-section">
                        <form action="{{ route('settings')}}" method="POST">
                            @csrf
                            <div class="settings-card">
                                <h3 class="settings-section-title">Profile Picture</h3>
                                <div class="flex flex-col md:flex-row items-start md:items-center">
                                    <div class="avatar-upload">
                                        <div class="avatar-preview">
                                            <img src="{{Auth()->user()->profile_picture_url ? Auth()->user()->profile_picture_url :'https://i.pinimg.com/474x/07/c4/72/07c4720d19a9e9edad9d0e939eca304a.jpg'}}" id="profile-preview" alt="Current Profile Picture">
                                        </div>
                                    </div>

                                    <div class="ml-0 md:ml-6 mt-4 md:mt-0">
                                        <p class="text-gray-700 mb-2">Enter the URL of your profile picture</p>
                                        <input type="text" id="profile-picture-url" name="new_profile" class="form-input"
                                            placeholder="Enter image URL" value="">
                                        <p class="text-gray-500 text-xs mt-2">Recommended: Square image, at least 400x400 pixels.</p>
                                    </div>
                                </div>
                            </div>


                            <div class="settings-card">
                                <h3 class="settings-section-title">Personal Information</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="form-group">
                                        <label class="form-label" for="first-name">Full Name</label>
                                        <input type="text" id="first-name" name="new_name" class="form-input"
                                            placeholder="Enter your first name" value="{{Auth()->user()->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="email">Email Address</label>
                                        <input type="email" id="email" class="form-input" name="new_email" placeholder="Enter your email address"
                                            value="{{Auth()->user()->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label"  for="phone">Phone Number</label>
                                        <input type="tel" id="phone" name="new_phone" class="form-input" placeholder="Enter your phone number"
                                            value="{{Auth()->user()->phone}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="bio">Bio</label>
                                    <textarea id="bio" name="new_bio" class="form-input" rows="4"
                                        placeholder="Tell us about yourself">{{Auth()->user()->bio}}</textarea>
                                </div>

                                <div class="flex justify-end mt-8">
                                    <button type="button" class="cancel-button">Cancel</button>
                                    <button type="submit" class="save-button">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <x-footer />
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            feather.replace();

            
            if (!document.getElementById('mobile-menu-toggle')) {
                const mobileToggle = document.createElement('button');
                mobileToggle.id = 'mobile-menu-toggle';
                mobileToggle.className = 'md:hidden fixed bottom-6 right-6 bg-[#0049FF] text-white p-3 rounded-full shadow-lg z-50';
                mobileToggle.innerHTML = '<i data-feather="menu" class="h-6 w-6"></i>';
                document.body.appendChild(mobileToggle);

                
                feather.replace();
            }

            
            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            const sideNav = document.querySelector('.side-nav');

            if (mobileMenuToggle && sideNav) {
                mobileMenuToggle.addEventListener('click', function() {
                    sideNav.classList.toggle('open');
                });
            }

            
            const profilePictureUrl = document.getElementById('profile-picture-url');
            const previewImg = document.getElementById('profile-preview');

            profilePictureUrl?.addEventListener('change', function() {
                if (this.value.trim()) {
                    previewImg.src = this.value.trim();
                }
            });

            profilePictureUrl?.addEventListener('input', function() {
                if (this.value.trim()) {
                    previewImg.src = this.value.trim();
                }
            });
        });
    </script>
</body>

</html>