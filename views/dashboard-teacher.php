<?php 
require_once '../classes/course.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }
        .course-card:hover .course-actions {
            opacity: 1;
        }
    </style>
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
                    <a href="#" class="px-3 py-2 text-purple-400">Dashboard</a>
                    <a href="#" class="px-3 py-2 text-gray-300 hover:text-purple-400">My Courses</a>
                    <a href="#" class="px-3 py-2 text-gray-300 hover:text-purple-400">Students</a>
                    <a href="#" class="px-3 py-2 text-gray-300 hover:text-purple-400">Analytics</a>
                </div>

                <div class="flex items-center">
                    <button class="flex items-center space-x-3 glass-effect rounded-full px-4 py-2">
                        <img src="https://ui-avatars.com/api/?name=Teacher+User" alt="Teacher" 
                             class="w-8 h-8 rounded-full">
                        <span>John Doe</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h2 class="text-3xl font-bold">Welcome back, <?=$_SESSION['username']?></h2>
            <p class="text-gray-400 mt-1">Here's what's happening with your courses today.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="glass-effect rounded-2xl p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-gray-400">Total Students</h3>
                    <span class="p-2 bg-purple-500/10 rounded-lg">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </span>
                </div>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">328</span>
                    <span class="ml-2 text-sm text-green-400">+24 this week</span>
                </div>
            </div>

            <div class="glass-effect rounded-2xl p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-gray-400">Course Revenue</h3>
                    <span class="p-2 bg-green-500/10 rounded-lg">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </span>
                </div>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">$8,459</span>
                    <span class="ml-2 text-sm text-green-400">+12.5%</span>
                </div>
            </div>

            <div class="glass-effect rounded-2xl p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-gray-400">Average Rating</h3>
                    <span class="p-2 bg-yellow-500/10 rounded-lg">
                        <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </span>
                </div>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">4.8</span>
                    <span class="ml-2 text-sm text-yellow-400">out of 5.0</span>
                </div>
            </div>
        </div>

        <div class="mb-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold">My Courses</h3>
                <a href="create_course.php">
                <button class="px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition-colors">
                    Create New Course
                </button>
                </a>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php 
                        $course = new Course();
                        $courses = $course->getTechCourses($_SESSION['user_id']);
                        foreach($courses as $cours):
                    ?>
                <div class="glass-effect rounded-2xl overflow-hidden group course-card">
                    <img src="<?= $cours['image']?>" alt="Course thumbnail" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h4 class="text-lg font-semibold mb-1"><?= $cours['title']?></h4>
                                <p class="text-gray-400 text-sm"><?= $cours['description']?></p>
                            </div>
                            <span class="bg-yellow-500/10 text-yellow-400 text-xs px-2 py-1 rounded-full"><?= $cours['name']?></span>
                        </div>
                        <div class="course-actions opacity-0 group-hover:opacity-100 transition-opacity mt-4 pt-4 border-t border-gray-700">
                            <div class="flex justify-between">
                                <div>
                                <a href="edit_course.php?id=<?= $cours['courses_id']?>&type=<?= $cours['type']?>"><button class="text-purple-400 hover:text-purple-300">Edit</button></a>
                                <a href="../processes/coursePros.php?deleteId=<?= $cours['courses_id']?>"><button class="text-purple-400 hover:text-purple-300">Delete</button></a>
                                </div>
                                <a href="course_details.php?id=<?= $cours['courses_id']?>&type=<?= $cours['type']?>"><button class="text-purple-400 hover:text-purple-300">View Details</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

    
    </main>
</body>
</html>