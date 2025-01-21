<?php
require_once '../classes/enrollments.php';
if($_SESSION['role']!='teacher'){
    echo "<script>history.back();</script>";
    exit();
}

$enroll = new Enrollments();
$enrolls = $enroll->getEnrollsByTeach($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Enrollments - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white min-h-screen">
<nav class="glass-effect border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        YouDemy Teacher
                    </h1>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <a href="dashboard-teacher.php" class="px-3 py-2 hover:text-purple-400">Dashboard</a>
                    <a href="enrollments.php" class="px-3 py-2 text-gray-300 text-purple-400">Students</a>
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
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold">Course Enrollments</h1>
                <p class="text-gray-400">View and manage student enrollments</p>
            </div>
        </div>

        <div class="glass-effect rounded-2xl overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-800">
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Student</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Course</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Enrollment Date</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody>
                   <?php foreach($enrolls as $enroll):?>
                    <tr class="border-b border-gray-800 hover:bg-purple-500/5">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <img src="<?=$enroll['image']?>" 
                                     class="w-8 h-8 rounded-full">
                                <div>
                                    <div class="font-medium"><?=$enroll['username']?></div>
                                    <div class="text-sm text-gray-400"><?=$enroll['email']?></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium"><?=$enroll['title']?></div>
                            <div class="text-sm text-gray-400"><?=$enroll['category_name']?></div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm"><?=$enroll['enrollment_date']?></div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex ml-2">
                            <a href="course_details.php?id=<?= $enroll['courses_id']?>&type=<?= $enroll['type']?>"><button class="p-1 hover:text-purple-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                  
                </tbody>
            </table>
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