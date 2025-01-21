<?php
require_once 'classes/course.php';


if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page=1;
}
$course = new Course();
$courses = $course->getCourses($page);
$totalPages = $course->getTotalPages();
?>
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
                    </div>
                </div>

                <div class="flex-1 max-w-2xl mx-8 hidden md:flex items-center">
                    <form class="relative w-full flex items-center" action='views/courses.php' method='POST'>
                            <input type="text" 
                                name="search"
                                placeholder="Search for courses..." 
                                class="w-full bg-gray-800/50 border border-gray-700 rounded-l-full px-4 py-2 pl-10 focus:outline-none focus:border-purple-500">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <button type="submit" class="bg-purple-500 hover:bg-purple-600 px-6 py-2 rounded-r-full border border-purple-500 transition-colors">
                                Search
                            </button>
                        </form>
                </div>

                <div class="flex items-center space-x-4">
                    <?php if($_SESSION['role']==='student'): ?>
                        <div class="relative">
                            <button class="flex items-center space-x-3 glass-effect rounded-full px-4 py-2 hover:bg-white/10 transition-colors profile-button">
                                <img src="assets/images/profil.webp" 
                                     alt="Profile Picture" 
                                     class="w-8 h-8 rounded-full">
                                <div class="text-left">
                                    <div class="text-sm font-medium"><?=$_SESSION['username']?></div>
                                    <div class="text-xs text-gray-400"><?=$_SESSION['role']?></div>
                                </div>
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div class="absolute right-0 mt-2 w-48 py-2 bg-gray-800 rounded-xl glass-effect border border-gray-700 shadow-xl z-50 hidden dropdown-menu">
                                <a href="views/mycourses.php" class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-500/10 hover:text-purple-400">
                                    My Courses
                                </a>
                                <div class="border-t border-gray-700 my-2"></div>
                                <a href="processes/logout.php" class="block px-4 py-2 text-sm text-red-400 hover:bg-red-500/10">
                                    Sign Out
                                </a>
                            </div>
                        </div>
                    <?php elseif($_SESSION['role']==='teacher'): ?>
                        <div class="relative">
                            <button class="flex items-center space-x-3 glass-effect rounded-full px-4 py-2 hover:bg-white/10 transition-colors profile-button">
                                <img src="assets/images/profil.webp" 
                                     alt="Profile Picture" 
                                     class="w-8 h-8 rounded-full">
                                <div class="text-left">
                                    <div class="text-sm font-medium"><?=$_SESSION['username']?></div>
                                    <div class="text-xs text-gray-400"><?=$_SESSION['role']?></div>
                                </div>
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div class="absolute right-0 mt-2 w-48 py-2 bg-gray-800 rounded-xl glass-effect border border-gray-700 shadow-xl z-50 hidden dropdown-menu">
                                <a href="views/dashboard-teacher.php" class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-500/10 hover:text-purple-400">
                                    Dashboard
                                </a>
                                <div class="border-t border-gray-700 my-2"></div>
                                <a href="processes/logout.php" class="block px-4 py-2 text-sm text-red-400 hover:bg-red-500/10">
                                    Sign Out
                                </a>
                            </div>
                        </div>
                        <?php elseif($_SESSION['role']==='admin'): ?>
                        <div class="relative">
                            <button class="flex items-center space-x-3 glass-effect rounded-full px-4 py-2 hover:bg-white/10 transition-colors profile-button">
                                <img src="assets/images/profil.webp" 
                                     alt="Profile Picture" 
                                     class="w-8 h-8 rounded-full">
                                <div class="text-left">
                                    <div class="text-sm font-medium"><?=$_SESSION['username']?></div>
                                    <div class="text-xs text-gray-400"><?=$_SESSION['role']?></div>
                                </div>
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div class="absolute right-0 mt-2 w-48 py-2 bg-gray-800 rounded-xl glass-effect border border-gray-700 shadow-xl z-50 hidden dropdown-menu">
                                <a href="views/dashboard-admin.php" class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-500/10 hover:text-purple-400">
                                    Dashboard
                                </a>
                                <div class="border-t border-gray-700 my-2"></div>
                                <a href="processes/logout.php" class="block px-4 py-2 text-sm text-red-400 hover:bg-red-500/10">
                                    Sign Out
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center space-x-4">
                            <a href="views/login.php" class="text-gray-300 hover:text-purple-400">Sign In</a>
                            <a href="views/signup.php" class="bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded-full transition-colors">Sign Up</a>
                        </div>
                    <?php endif; ?>
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
            <h2 class="text-2xl font-bold">Course Catalog</h2>
            <a href="views/courses.php" class="text-purple-400 hover:text-purple-300">View All</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
                foreach($courses as $course):
            ?>
            <div class="glass-effect rounded-2xl overflow-hidden">
                <img src="<?=$course['image']?>" alt="Course thumbnail" 
                     class="w-full h-32 object-cover">
                <div class="p-4">
                    <h4 class="font-semibold mb-1"><?=$course['title']?></h4>
                    <p class="text-gray-400 text-sm mb-2"><?=$course['description']?></p>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-purple-400"><?=$course['name']?></span>
                            <button class="flex items-center text-purple-400 hover:text-purple-300 transition-colors" 
                                onclick="window.location.href='views/course_details.php?id=<?=$course['courses_id']?>&type=<?= $course['type']?>'">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <span class="ml-1">View Details</span>
                            </button>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>

        <div class="mt-8 flex justify-center">
            <nav class="flex items-center space-x-2">
                <?php if($page > 1): ?>
                    <a href="?page=<?= $page-1 ?>" 
                       class="px-3 py-2 glass-effect rounded-lg text-gray-300 hover:text-purple-400 hover:bg-white/5 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                <?php endif; ?>

                <?php
                    for($i = 1; $i <= $totalPages; $i++):
                ?>
                    <a href="?page=<?= $i ?>" 
                       class="px-4 py-2 glass-effect rounded-lg <?= $page == $i ? 'bg-purple-500/20 text-purple-400' : 'text-gray-300 hover:text-purple-400 hover:bg-white/5' ?> transition-colors">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <?php if($page < $totalPages): ?>
                    <a href="?page=<?= $page+1 ?>" 
                       class="px-3 py-2 glass-effect rounded-lg text-gray-300 hover:text-purple-400 hover:bg-white/5 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </nav>
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
        const profileButton = document.querySelector('.profile-button');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        profileButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!profileButton.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>