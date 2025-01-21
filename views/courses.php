<?php
require_once '../classes/course.php';

if(isset($_POST['search'])){
    $s = $_POST['search'];
    $cours = new Course();
    $courses = $cours->search($s);
}else{
    $cours = new Course();
    $courses = $cours->getAllCourses();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white min-h-screen">
<nav class="glass-effect border-b border-gray-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-8">
                    <h1 class="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        YouDemy
                    </h1>
                    <div class="hidden md:flex space-x-6">
                        <a href="../index.php" class="text-gray-300 hover:text-purple-400">Home</a>
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
                                <img src="../assets/images/profil.webp" 
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
                                <a href="../processes/logout.php" class="block px-4 py-2 text-sm text-red-400 hover:bg-red-500/10">
                                    Sign Out
                                </a>
                            </div>
                        </div>
                    <?php elseif($_SESSION['role']==='teacher'): ?>
                        <div class="relative">
                            <button class="flex items-center space-x-3 glass-effect rounded-full px-4 py-2 hover:bg-white/10 transition-colors profile-button">
                                <img src="../assets/images/profil.webp" 
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
                                <a href="dashboard-teacher.php" class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-500/10 hover:text-purple-400">
                                    Dashboard
                                </a>
                                <div class="border-t border-gray-700 my-2"></div>
                                <a href="../processes/logout.php" class="block px-4 py-2 text-sm text-red-400 hover:bg-red-500/10">
                                    Sign Out
                                </a>
                            </div>
                        </div>
                        <?php elseif($_SESSION['role']==='admin'): ?>
                        <div class="relative">
                            <button class="flex items-center space-x-3 glass-effect rounded-full px-4 py-2 hover:bg-white/10 transition-colors profile-button">
                                <img src="../assets/images/profil.webp" 
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
                                <a href="dashboard-admin.php" class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-500/10 hover:text-purple-400">
                                    Dashboard
                                </a>
                                <div class="border-t border-gray-700 my-2"></div>
                                <a href="../processes/logout.php" class="block px-4 py-2 text-sm text-red-400 hover:bg-red-500/10">
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



    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-2xl font-bold mb-2">All Courses</h1>
            <p class="text-gray-400">Find Your Course And Start learning</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach($courses as $cours): ?>
            <div class="glass-effect rounded-2xl overflow-hidden">
                <img src="<?=$cours['image']?>" 
                     alt="Course thumbnail" 
                     class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="font-semibold text-lg"><?=$cours['title']?></h3>
                        <span class="px-2 py-1 bg-yellow-500/10 text-yellow-400 rounded-full text-sm"><?=$cours['name']?></span>
                    </div>
                    <p class="text-gray-400 text-sm mb-4"><?=$cours['description']?></p>
                    <div class="flex justify-end items-center">
                        <a href="course_details.php?id=<?= $cours['courses_id']?>&type=<?= $cours['type']?>">
                            <button class="px-4 py-2 bg-purple-500 hover:bg-purple-600 rounded-xl transition-colors">
                                Open Course
                            </button>
                        </a>
                    </div>
                </div>
            </div> 
            <?php endforeach;?>
        </div>
    </main>
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

<style>
.glass-effect {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
}
</style>