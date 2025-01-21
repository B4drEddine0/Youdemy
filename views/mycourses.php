<?php
require_once '../classes/enrollments.php';

if($_SESSION['role']!='student'){
    echo "<script>history.back();</script>";
    exit();
}
$enroll = new Enrollments();
$enrolls = $enroll->getEnroll($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Enrollments - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white min-h-screen">
    <nav class="glass-effect border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        YouDemy
                    </h1>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <a href="../index.php" class="px-3 py-2 text-gray-300 hover:text-purple-400">Dashboard</a>
                    <a href="mycourses.php" class="px-3 py-2 text-purple-400">My Courses</a>
                </div>

                <div class="flex items-center space-x-4">
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
                                <a href="../processes/logout.php" class="block px-4 py-2 text-sm text-red-400 hover:bg-red-500/10">
                                    Sign Out
                                </a>
                            </div>
                  </div>
            </div>
        </div>
    </nav>


    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-2xl font-bold mb-2">My Enrolled Courses</h1>
            <p class="text-gray-400">Track your progress and continue learning</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($enrolls as $enroll): ?>
            <div class="glass-effect rounded-2xl overflow-hidden">
                <img src="<?=$enroll['image']?>" 
                     alt="Course thumbnail" 
                     class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="font-semibold text-lg"><?=$enroll['title']?></h3>
                        <span class="px-2 py-1 bg-yellow-500/10 text-yellow-400 rounded-full text-sm"><?=$enroll['category_name']?></span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-400">Enrolled: <?=$enroll['enrollment_date']?></span>
                        <a href="course_details.php?id=<?= $enroll['courses_id']?>&type=<?= $enroll['type']?>">
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