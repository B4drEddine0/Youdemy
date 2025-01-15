<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript Basics - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white min-h-screen">
    <header class="glass-effect border-b border-gray-800 sticky top-0 z-50">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-white">YouDemy</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white">Home</a>
                    <a href="#" class="text-gray-300 hover:text-white">Courses</a>
                    <a href="#" class="text-gray-300 hover:text-white">About</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-4xl font-bold mb-4">JavaScript Fundamentals: From Zero to Hero</h1>
            <div class="flex items-center text-gray-400">
                <span class="mr-4">By John Doe</span>
                <span>Beginner Level</span>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <div class="lg:w-2/3">
                <div class="glass-effect rounded-2xl overflow-hidden mb-8">
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <div class="glass-effect rounded-2xl p-8">
                    <h2 class="text-2xl font-bold mb-6">About This Course</h2>
                    <p class="text-gray-300 mb-6">
                        Learn JavaScript from scratch! This course covers all the fundamentals you need 
                        to start your journey in web development. Perfect for beginners who want to 
                        understand modern JavaScript programming.
                    </p>
                    
                    <h3 class="text-xl font-bold mb-4">What You'll Learn</h3>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-300">
                        <li class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>JavaScript Basics</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>DOM Manipulation</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>ES6+ Features</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Async Programming</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="lg:w-1/3">
                <div class="glass-effect rounded-2xl p-6 sticky top-24">
                    <div class="text-center mb-6">
                        <button class="w-full bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl 
                                     py-4 px-6 font-medium hover:opacity-90 transition-all duration-300 
                                     transform hover:scale-[1.02] mb-4">
                            Start Learning
                        </button>
                    </div>

                    <div class="space-y-4">
                        <h3 class="font-semibold">Course Details:</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>8 hours of content</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Certificate included</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                                </svg>
                                <span>Beginner friendly</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>Lifetime access</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="glass-effect border-t border-gray-800 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center text-gray-400">
                <p>© 2024 YouDemy. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>