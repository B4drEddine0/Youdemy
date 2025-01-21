<?php
require_once '../classes/users.php';
require_once '../classes/tags.php';
require_once '../classes/categorie.php';
require_once '../classes/course.php';

if($_SESSION['role']!='admin'){
    echo "<script>history.back();</script>";
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    $status = $_POST['status'];
    
    $user = new User();
    $user->updateStatus($userId, $status);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white min-h-screen flex">
    <aside class="w-72 glass-effect border-r border-gray-800 h-screen sticky top-0">
        <div class="p-6">
            <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                YouDemy Admin
            </h1>
        </div>
        
        <nav class="mt-6 px-6">
            <div class="space-y-2">
                <a href="#" id="dashboard-link" onclick="switchSection('dashboard')" class="flex items-center px-4 py-3 text-gray-400 hover:bg-purple-500/10 hover:text-purple-400 rounded-xl transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>
                <a href="#" id="courses-link" onclick="switchSection('courses')" class="flex items-center px-4 py-3 text-gray-400 hover:bg-purple-500/10 hover:text-purple-400 rounded-xl transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Courses
                </a>
                <a href="#" id="users-link" onclick="switchSection('users')" class="flex items-center px-4 py-3 text-gray-400 hover:bg-purple-500/10 hover:text-purple-400 rounded-xl transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Users
                </a>
                <a href="#" id="categorie-link" onclick="switchSection('categorie')" class="flex items-center px-4 py-3 text-gray-400 hover:bg-purple-500/10 hover:text-purple-400 rounded-xl transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                        </svg>
                    Categories
                </a>
                <a href="#" id="tag-link" onclick="switchSection('tag')" class="flex items-center px-4 py-3 text-gray-400 hover:bg-purple-500/10 hover:text-purple-400 rounded-xl transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6h.008v.008H6V6z"/>
                    </svg>
                    Tags
                </a>

                <a href="../index.php" class="flex items-center px-4 py-3 text-gray-400 hover:bg-purple-500/10 hover:text-purple-400 rounded-xl transition-colors">
                    Visite The Platform
                </a>
            </div>

            <div class="absolute bottom-0 left-0 right-0 p-6">
                <div class="flex items-center space-x-3 glass-effect rounded-xl p-3">
                    <img src="../assets/images/profil.webp" 
                         alt="Admin" 
                         class="w-10 h-10 rounded-full">
                    <div>
                        <div class="font-medium mr-16"><?=$_SESSION['username']?></div>
                        <div class="text-sm text-gray-400"><?=$_SESSION['role']?></div>
                    </div>
                    <a href="../processes/logout.php" class="hover:text-red-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </a>
                </div>
            </div>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold">Dashboard Overview</h2>
                <p class="text-gray-400">Welcome back, <?=$_SESSION['username']?></p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="glass-effect rounded-2xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-gray-400">Total Users</div>
                    <div class="p-2 bg-purple-500/10 rounded-xl text-purple-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-bold"><?php
                $user = new User();
                $users = $user->getUsers();
                echo count($user->getUsers());
                ?></div>
            </div>


            <div class="glass-effect rounded-2xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-gray-400">Total Courses</div>
                    <div class="p-2 bg-pink-500/10 rounded-xl text-pink-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-bold"><?php
                $course = new Course();
                $courses = $course->getAllCourses();
                echo count($course->getAllCourses());
                ?></div>
            </div>


            <div class="glass-effect rounded-2xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-gray-400">Total Tags</div>
                    <div class="p-2 bg-pink-500/10 rounded-xl text-pink-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6h.008v.008H6V6z"/>
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-bold"><?php $tag = new tag();
                                                      $tags = $tag->getTags();
                                                      echo count($tag->getTags());?></div>
            </div>


            <div class="glass-effect rounded-2xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-gray-400">Total Categories</div>
                    <div class="p-2 bg-pink-500/10 rounded-xl text-pink-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-bold"><?php
                $cat = new Categorie();
                $categories = $cat->getCategs();
                echo count($cat->getCategs());
                ?></div>
            </div>
        </div>



        <div id="dashboard-section">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
            <div class="glass-effect rounded-2xl p-6">
                <h3 class="text-xl font-bold mb-4">Répartition par catégorie</h3>
                <div class="space-y-4">
                    <?php
                    $reparts = $course->getRepartition();
                    foreach($reparts as $rep):
                    ?>
                    <div class="transform transition-all duration-200 hover:scale-102 glass-effect p-4 rounded-xl">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 rounded-full bg-purple-500"></div>
                                <span class="font-medium"><?=$rep->name?></span>
                            </div>
                            <span class="px-3 py-1 bg-purple-500/10 text-purple-400 rounded-lg">
                                <?=$rep->total?> cours
                            </span>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>

            <div class="glass-effect rounded-2xl p-6">
                <h3 class="text-xl font-bold mb-4">Cours le plus populaire</h3>
                <?php
                $pop = $course->getMostPop();
                ?>
                <div class="relative group">
                    <div class="relative h-48 rounded-xl overflow-hidden mb-4">
                        <img src="<?=$pop->image?>" 
                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300" 
                            alt="<?=htmlspecialchars($pop->title)?> thumbnail">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>

                    <div class="space-y-3">
                        <h4 class="text-lg font-semibold line-clamp-2"><?=htmlspecialchars($pop->title)?></h4>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="p-2 bg-purple-500/10 rounded-lg">
                                    <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-2xl font-bold text-purple-400"><?=$pop->nb?></span>
                                    <span class="text-gray-400 text-sm ml-1">étudiants</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

                <div class="glass-effect rounded-2xl p-6 lg:col-span-2">
                    <h3 class="text-xl font-bold mb-4">Top 3 Enseignants</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <?php 
                        $teachers = $course->getTopTeachers();
                        foreach($teachers as $teach):
                        ?>
                        <div class="flex items-center space-x-4 p-4 bg-purple-500/10 rounded-xl">
                            <div class="relative">
                                <img src="../assets/images/profil.webp" 
                                     class="w-16 h-16 rounded-full" alt="Teacher avatar">
                            </div>
                            <div>
                                <h4 class="font-semibold"><?=$teach->username?></h4>
                                <p class="text-sm text-gray-400"><?=$teach->courses?> cours</p>
                                <p class="text-sm text-purple-400"><?=$teach->enrolls?> étudiants</p>
                            </div>
                        </div>
                        <?php endforeach;?>
                        
                    </div>
                </div>
            </div>
        </div>


        <div id="courses-section" class="hidden">
            <div class="glass-effect rounded-2xl p-6 mt-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold">Courses Management</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-gray-400 text-sm border-b border-gray-800">
                                <th class="text-left py-4 px-4 font-medium">Title</th>
                                <th class="text-left py-4 px-4 font-medium">Description</th>
                                <th class="text-left py-4 px-4 font-medium">Teacher</th>
                                <th class="text-left py-4 px-4 font-medium">Category</th>
                                <th class="text-right py-4 px-4 font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($courses as $course):?>
                            <tr class="border-b border-gray-800 text-sm">
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <img src="<?=$course['image']?>" class="w-[50px] h-[30px] rounded" alt="Course thumbnail">
                                        <span><?=$course['title']?></span>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-400">
                                    <div class="max-w-xs truncate"><?=$course['description']?></div>
                                </td>
                                <td class="py-4 px-4"><?=$course['username']?></td>
                                <td class="py-4 px-4">
                                    <span class="px-2 py-1 bg-purple-500/10 text-purple-400 rounded-lg text-xs">
                                    <?=$course['name']?>
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex justify-end gap-2">
                                    <a href="../processes/coursePros.php?deleteIdAdmin=<?= $course['courses_id']?>"><button class="p-2 hover:bg-purple-500/10 rounded-xl text-purple-400 transition-colors"
                                                title="delete Course">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                        </button></a>
                                    </div>
                                </td>
                            </tr>
                                <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div id="users-section" class="hidden">
            <div class="glass-effect rounded-2xl p-6 mt-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold">Users Management</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-gray-400 text-sm border-b border-gray-800">
                                <th class="text-left py-4 px-4 font-medium">User</th>
                                <th class="text-left py-4 px-4 font-medium">Email</th>
                                <th class="text-left py-4 px-4 font-medium">Role</th>
                                <th class="text-left py-4 px-4 font-medium">Status</th>
                                <th class="text-right py-4 px-4 font-medium">Actions</th>
                            </tr>
                        </thead>
                        <?php foreach($users as $user):?>
                        <tbody>
                            <tr class="border-b border-gray-800 text-sm">
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://ui-avatars.com/api/?name=John+Doe&background=6D28D9&color=fff" 
                                             alt="User avatar" 
                                             class="w-8 h-8 rounded-full">
                                        <span><?= $user['username']?></span>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-400"><?= $user['email']?></td>
                                <td class="py-4 px-4">
                                    <span class="px-2 py-1 bg-blue-500/10 text-blue-400 rounded-lg text-xs">
                                    <?= $user['role']?>
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <?php 
                                    $statusColor = match($user['status']) {
                                        'active' => 'green',
                                        'suspended' => 'red',
                                        'pending' => 'orange',
                                        default => 'yellow'
                                    };
                                    ?>
                                    <span class="px-2 py-1 bg-<?= $statusColor ?>-500/10 text-<?= $statusColor ?>-400 rounded-lg text-xs">
                                        <?= $user['status'] ?>
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex justify-end">
                                        <form action="" method="POST">
                                            <input type="hidden" name="userId" value="<?= $user['users_id'] ?>">
                                            <select name="status" class="bg-purple-500/10 border border-purple-500/20 rounded-xl px-3 py-1 text-sm 
                                                    focus:outline-none focus:border-purple-500/50 text-white"onchange="this.form.submit()">
                                                <option value="" class="bg-slate-900 text-white" selected disabled>Actions</option>
                                                <option value="active" class="bg-slate-900 text-white">Activate</option>
                                                <option value="suspended" class="bg-slate-900 text-white">Suspend</option>
                                                <option value="deleted" class="bg-slate-900 text-white">Delete</option>
                                                <option value="pending" class="bg-slate-900 text-white">pending</option>
                                            </select>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div id="categorie-section" class="hidden">
            <div class="mb-6">
                <h2 class="text-2xl font-bold">Categories Management</h2>
                <p class="text-gray-400">Organize your courses with categories</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="glass-effect rounded-2xl p-6">
                    <h3 class="text-lg font-semibold mb-4">Add New Category</h3>
                    <form action="../processes/catPros.php" method="POST">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm text-gray-400 mb-2">Category Name</label>
                                <input type="text" name='name'
                                    placeholder="e.g., Web Development" 
                                    class="w-full bg-purple-500/10 border border-purple-500/20 rounded-xl px-4 py-2.5
                                            focus:outline-none focus:border-purple-500/50 text-white placeholder-gray-400">
                            </div>
                            <button type="submit" name='addCat'
                                    class="w-full px-6 py-2.5 bg-purple-500 hover:bg-purple-600 text-white rounded-xl transition-colors">
                                Add Category
                            </button>
                        </div>
                    </form>
                </div>

                <div class="lg:col-span-2">
                    <div class="glass-effect rounded-2xl p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold">All Categories</h3>
                        </div>
                        <div class="grid gap-4">
                        <?php
                        foreach($categories as $cat):
                        ?>
                            <div class="flex items-center justify-between p-4 glass-effect rounded-xl hover:bg-purple-500/5 transition-colors group">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-purple-500/10 flex items-center justify-center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium"><?= htmlspecialchars($cat['name']) ?></h4>
                                    </div>
                                </div>
                                <form action="../processes/catPros.php" method="POST" class="opacity-0 group-hover:opacity-100 transition-opacity">
                                <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 hover:bg-red-500/10 rounded-lg text-red-400 transition-colors">
                                    <input type="hidden" name="catId" value="<?= $cat['cat_id'] ?>">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                                </form>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            </div>


        <div id="tag-section" class="hidden">
            <div class="glass-effect rounded-2xl p-6 mt-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold">Tags Management</h3>
                </div>
                <div class="mb-8">
                    <form action="../processes/tagsPros.php" method="POST" class="space-y-4">
                        <div class="flex gap-4">
                            <div class="flex-1">
                                <input type="text" 
                                       name="tags"
                                       placeholder="Add new tags (comma separated)" 
                                       class="w-full bg-purple-500/10 border border-purple-500/20 rounded-xl px-4 py-2
                                              focus:outline-none focus:border-purple-500/50 text-white placeholder-gray-400">
                            </div>
                            <button type="submit" name='addTag'
                                    class="px-6 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-xl transition-colors">
                                Add Tags
                            </button>
                        </div>
                    </form>
                </div>

                <div class="space-y-4">
                    <h4 class="font-semibold text-gray-400">Existing Tags</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <?php
                        foreach($tags as $tag):
                        ?>
                        <div class="group flex items-center justify-between glass-effect p-3 rounded-xl">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-purple-400"></span>
                                <span><?= htmlspecialchars($tag['name']) ?></span>
                            </div>
                            <form action="../processes/tagsPros.php" method="POST" class="opacity-0 group-hover:opacity-100 transition-opacity">
                                <input type="hidden" name="tagId" value="<?= $tag['tag_id'] ?>">
                                <button type="submit" class="text-red-400 hover:text-red-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
    function switchSection(sectionName) {
        document.querySelectorAll('nav a').forEach(link => {
            link.classList.remove('bg-purple-500/10', 'text-purple-400');
            link.classList.add('text-gray-400');
        });

        const activeLink = document.getElementById(`${sectionName}-link`);
        if (activeLink) {
            activeLink.classList.remove('text-gray-400');
            activeLink.classList.add('bg-purple-500/10', 'text-purple-400');
        }

        document.querySelectorAll('[id$="-section"]').forEach(section => {
            section.classList.add('hidden');
        });

        const activeSection = document.getElementById(`${sectionName}-section`);
        if (activeSection) {
            activeSection.classList.remove('hidden');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        switchSection('dashboard');
    });
    </script>
</body>
</html>