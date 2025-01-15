<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }
        .progress-ring {
            transform: rotate(-90deg);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white min-h-screen flex flex-col">
    <nav class="glass-effect border-b border-gray-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-8">
                    <h1 class="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        YouDemy
                    </h1>
                    <div class="hidden md:flex space-x-6">
                        <a href="#" class="text-gray-300 hover:text-purple-400">Home</a>
                        <a href="#" class="text-gray-300 hover:text-purple-400">My Courses</a>
                    </div>
                </div>

                <div class="flex-1 max-w-2xl mx-8 hidden md:flex items-center">
                    <div class="relative w-full">
                        <input type="text" 
                               placeholder="Search for courses..." 
                               class="w-full bg-gray-800/50 border border-gray-700 rounded-full px-4 py-2 pl-10 focus:outline-none focus:border-purple-500">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <button class="text-gray-300 hover:text-purple-400 p-2 relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-pink-500 rounded-full"></span>
                    </button>

                    <div class="relative">
                        <button class="flex items-center space-x-3 glass-effect rounded-full px-4 py-2 hover:bg-white/10 transition-colors profile-button">
                            <img src="https://ui-avatars.com/api/?name=Alex+Johnson&background=6D28D9&color=fff" 
                                 alt="Alex Johnson" 
                                 class="w-8 h-8 rounded-full">
                            <div class="text-left">
                                <div class="text-sm font-medium">Alex Johnson</div>
                                <div class="text-xs text-gray-400">Student</div>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <div class="absolute right-0 mt-2 w-48 py-2 bg-gray-800 rounded-xl glass-effect border border-gray-700 shadow-xl z-50 hidden dropdown-menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-500/10 hover:text-purple-400">
                                My Profile
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-500/10 hover:text-purple-400">
                                Account Settings
                            </a>
                            <div class="border-t border-gray-700 my-2"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-red-400 hover:bg-red-500/10">
                                Sign Out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative overflow-hidden mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="glass-effect rounded-3xl p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-purple-500/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-pink-500/10 rounded-full translate-y-1/2 -translate-x-1/2"></div>
                
                <div class="relative z-10 grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold mb-4">
                            Discover Your Next 
                            <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                                Learning Adventure
                            </span>
                        </h2>
                        <p class="text-gray-300 mb-6">
                            Explore our collection of free courses taught by industry experts. 
                            Start learning today and unlock your potential.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#courses" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-xl hover:opacity-90 transition-opacity">
                                Browse Courses
                            </a>
                            <a href="#featured" class="bg-white/10 text-white px-6 py-3 rounded-xl hover:bg-white/20 transition-colors">
                                Featured Content
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="glass-effect rounded-xl p-4 text-center">
                            <div class="text-3xl font-bold text-purple-400 mb-1">100+</div>
                            <div class="text-gray-400">Free Courses</div>
                        </div>
                        <div class="glass-effect rounded-xl p-4 text-center">
                            <div class="text-3xl font-bold text-pink-400 mb-1">50k+</div>
                            <div class="text-gray-400">Students</div>
                        </div>
                        <div class="glass-effect rounded-xl p-4 text-center">
                            <div class="text-3xl font-bold text-purple-400 mb-1">200+</div>
                            <div class="text-gray-400">Instructors</div>
                        </div>
                        <div class="glass-effect rounded-xl p-4 text-center">
                            <div class="text-3xl font-bold text-pink-400 mb-1">24/7</div>
                            <div class="text-gray-400">Support</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-grow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Popular Courses</h2>
            <a href="#" class="text-purple-400 hover:text-purple-300">View All</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="glass-effect rounded-2xl overflow-hidden">
                <img src="https://placehold.co/800x400/png" alt="Course thumbnail" 
                     class="w-full h-32 object-cover">
                <div class="p-4">
                    <h4 class="font-semibold mb-1">Vue.js for Beginners</h4>
                    <p class="text-gray-400 text-sm mb-2">Learn Vue.js 3 fundamentals</p>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-purple-400">Free</span>
                        <div class="flex items-center text-yellow-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="ml-1">4.8</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="glass-effect border-t border-gray-800 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-2">
                    <h3 class="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent mb-4">
                        YouDemy
                    </h3>
                    <p class="text-gray-400">
                        Free learning platform for everyone. Learn, share, and grow together.
                    </p>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-purple-400">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-purple-400">Courses</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-purple-400">About</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-purple-400">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-purple-400">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-purple-400">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 YouDemy. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script>
        // Toggle dropdown menu
        const profileButton = document.querySelector('.profile-button');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        profileButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!profileButton.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>