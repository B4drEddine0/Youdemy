<?php
require_once '../classes/courseText.php';
require_once '../classes/courseVideo.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    if($_GET['type']==='text'){
        $courseText = new CourseText();
        $courseDetails = $courseText->getCourseDet($id);
    }else{
        $courseText = new CourseVideo();
        $courseDetails = $courseText->getCourseDet($id);
    }
}else{
    echo "<script>history.back();</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }
    </style>
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
                    <a href="#" class="px-3 py-2 text-gray-300 hover:text-purple-400">Dashboard</a>
                    <a href="#" class="px-3 py-2 text-purple-400">Courses</a>
                    <a href="#" class="px-3 py-2 text-gray-300 hover:text-purple-400">My Learning</a>
                    <a href="#" class="px-3 py-2 text-gray-300 hover:text-purple-400">Analytics</a>
                </div>

                <div class="flex items-center">
                    <button class="flex items-center space-x-3 glass-effect rounded-full px-4 py-2">
                        <img src="https://ui-avatars.com/api/?name=John+Doe" alt="User" 
                             class="w-8 h-8 rounded-full">
                        <span><?=$_SESSION['username']?></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="glass-effect rounded-2xl p-8 mb-8">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="md:col-span-1">
                    <img src="<?=$courseDetails['image'];?>" 
                         alt="course_image" 
                         class="w-full h-64 object-cover rounded-xl">
                </div>
                
                <div class="md:col-span-2 space-y-4">
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                      <?=$courseDetails['title'];?>
                    </h1>
                    
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span class="text-gray-300"><?=$courseDetails['category_name'];?></span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="text-gray-300"><?=$courseDetails['teacher_name'];?></span>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <?php 
                        $tags = explode(',', $courseDetails['tags']);
                        foreach($tags as $tag): ?>
                            <span class="px-3 py-1 bg-purple-500/10 text-purple-400 rounded-full text-sm"><?= trim($tag) ?></span>
                        <?php endforeach; ?>
                    </div>

                    <p class="text-gray-300">
                        <?=$courseDetails['description'];?>
                    </p>
                    <form action="../processes/coursePros.php" method='POST'> 
                    <input type="hidden" name='userId' value='<?=$_SESSION['user_id']?>'>
                    <input type="hidden" name='courseId' value='<?=$_GET['id']?>'>
                    <button class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 
                                 text-white px-6 py-2.5 rounded-xl transition duration-200 inline-flex items-center space-x-2"
                                 onclick="return confirm('Do you want to enroll in this course?')" type='submit' name='enroll'>
                        <span>Enroll Now</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </button>
                    </form> 
                </div>
            </div>
        </div>


        <div class="glass-effect rounded-2xl p-8">
            <h2 class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent mb-6">
                Course Content
            </h2>
            
            <?php if($_GET['type']==='video'): ?>
            <div class="aspect-w-16 aspect-h-9 mb-6">
                <iframe src="<?=$courseDetails['content'];?>" 
                        class="w-full h-[500px] rounded-xl"
                        allowfullscreen>
                </iframe>
            </div>
                <?php else :?>

            <div class="prose prose-invert max-w-none">
                <p class="text-gray-300">
                <?=$courseDetails['content'];?>
                </p>
            </div>
            <?php endif;?>
        </div>
    </main>
</body>
</html>