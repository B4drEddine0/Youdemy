<?php
require_once '../classes/users.php';

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
                <a href="#" class="flex items-center px-4 py-3 bg-purple-500/10 text-purple-400 rounded-xl">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-400 hover:bg-purple-500/10 hover:text-purple-400 rounded-xl transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Courses
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-400 hover:bg-purple-500/10 hover:text-purple-400 rounded-xl transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Users
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-400 hover:bg-purple-500/10 hover:text-purple-400 rounded-xl transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Analytics
                </a>
            </div>

            <div class="absolute bottom-0 left-0 right-0 p-6">
                <div class="flex items-center space-x-3 glass-effect rounded-xl p-3">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=6D28D9&color=fff" 
                         alt="Admin" 
                         class="w-10 h-10 rounded-full">
                    <div>
                        <div class="font-medium">Admin User</div>
                        <div class="text-sm text-gray-400">Super Admin</div>
                    </div>
                </div>
            </div>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold">Dashboard Overview</h2>
                <p class="text-gray-400">Welcome back, Admin</p>
            </div>
            
            <div class="flex space-x-4">
                <button class="glass-effect px-4 py-2 rounded-xl text-purple-400 hover:bg-purple-500/10 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </button>
                <button class="glass-effect px-4 py-2 rounded-xl text-purple-400 hover:bg-purple-500/10 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>
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
                <div class="flex items-center text-green-400 text-sm mt-2">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                    12.5%
                </div>
            </div>

            <div class="glass-effect rounded-2xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-gray-400">Active Courses</div>
                    <div class="p-2 bg-pink-500/10 rounded-xl text-pink-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-bold">56</div>
                <div class="flex items-center text-green-400 text-sm mt-2">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                    8.2%
                </div>
            </div>
        </div>

        <!-- <div class="glass-effect rounded-2xl p-6 mt-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold">Courses Management</h3>
                <div class="flex gap-3">
                    <div class="relative">
                        <input type="text" 
                               placeholder="Search courses..." 
                               class="bg-purple-500/10 border border-purple-500/20 rounded-xl px-4 py-2 text-sm 
                                      focus:outline-none focus:border-purple-500/50 text-white placeholder-gray-400">
                        <svg class="w-4 h-4 absolute right-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <select class="bg-purple-500/10 border border-purple-500/20 rounded-xl px-4 py-2 text-sm 
                                 focus:outline-none focus:border-purple-500/50 text-white">
                        <option value="">All Categories</option>
                        <option value="1">Programming</option>
                        <option value="2">Design</option>
                        <option value="3">Business</option>
                    </select>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-gray-400 text-sm border-b border-gray-800">
                            <th class="text-left py-4 px-4 font-medium">Title</th>
                            <th class="text-left py-4 px-4 font-medium">Description</th>
                            <th class="text-left py-4 px-4 font-medium">Teacher</th>
                            <th class="text-left py-4 px-4 font-medium">Category</th>
                            <th class="text-left py-4 px-4 font-medium">Type</th>
                            <th class="text-left py-4 px-4 font-medium">Status</th>
                            <th class="text-right py-4 px-4 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-800 text-sm">
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://placehold.co/100x60" class="w-[50px] h-[30px] rounded" alt="Course thumbnail">
                                    <span>Introduction to PHP</span>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-gray-400">
                                <div class="max-w-xs truncate">Learn PHP from scratch with practical examples...</div>
                            </td>
                            <td class="py-4 px-4">John Doe</td>
                            <td class="py-4 px-4">
                                <span class="px-2 py-1 bg-purple-500/10 text-purple-400 rounded-lg text-xs">
                                    Programming
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-2 py-1 bg-blue-500/10 text-blue-400 rounded-lg text-xs">
                                    Premium
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-2 py-1 bg-yellow-500/10 text-yellow-400 rounded-lg text-xs">
                                    Pending
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex justify-end gap-2">
                                    <button class="p-2 hover:bg-green-500/10 rounded-xl text-green-400 transition-colors" 
                                            title="Approve">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </button>
                                    <button class="p-2 hover:bg-red-500/10 rounded-xl text-red-400 transition-colors"
                                            title="Reject">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                    <button class="p-2 hover:bg-purple-500/10 rounded-xl text-purple-400 transition-colors"
                                            title="View Details">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-center mt-6">
                <div class="text-sm text-gray-400">
                    Showing 1 to 10 of 45 entries
                </div>
                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-purple-500/10 text-purple-400 rounded-xl hover:bg-purple-500/20 transition-colors">
                        Previous
                    </button>
                    <button class="px-4 py-2 bg-purple-500/10 text-purple-400 rounded-xl hover:bg-purple-500/20 transition-colors">
                        Next
                    </button>
                </div>
            </div>
        </div> -->


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
                                            <option value="" class="bg-slate-900 text-white">Actions</option>
                                            <option value="active" class="bg-slate-900 text-white">Activate</option>
                                            <option value="suspended" class="bg-slate-900 text-white">Suspend</option>
                                            <option value="deleted" class="bg-slate-900 text-white">Delete</option>
                                        </select>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>

    </main>
</body>
</html>