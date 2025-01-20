<?php 
require_once '../classes/tags.php';
require_once '../classes/categorie.php';
require_once '../classes/courseText.php';
require_once '../classes/courseVideo.php';

if($_SESSION['role']!='teacher'){
    echo "<script>history.back();</script>";
    exit();
}

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
    <title>Create Course - YouDemy</title>
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
                    <a href="#" class="px-3 py-2 text-purple-400">Dashboard</a>
                    <a href="#" class="px-3 py-2 text-gray-300 hover:text-purple-400">My Courses</a>
                    <a href="#" class="px-3 py-2 text-gray-300 hover:text-purple-400">Students</a>
                    <a href="#" class="px-3 py-2 text-gray-300 hover:text-purple-400">Analytics</a>
                </div>

                <div class="flex items-center">
                    <button class="flex items-center space-x-3 glass-effect rounded-full px-4 py-2">
                        <img src="https://ui-avatars.com/api/?name=Teacher+User" alt="Teacher" 
                             class="w-8 h-8 rounded-full">
                        <span><?=$_SESSION['username']?></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold">Edit Course</h1>
            <p class="text-gray-400">Change in the details to Edit your course</p>
        </div>

        <form action="../processes/coursePros.php" method="POST" class="space-y-8">
            <div class="glass-effect rounded-2xl p-6">
                <h2 class="text-xl font-semibold mb-4">Basic Information</h2>
                <div class="grid gap-6 md:grid-cols-2">
                    <div  class="md:col-span-2">
                        <input type="hidden" name='id' value='<?=$_GET['id']?>'>
                        <label class="block text-sm text-gray-400 mb-2">Course Title</label>
                        <input type="text" 
                               name="title" 
                               value='<?=$courseDetails['title']?>'
                               required
                               placeholder="e.g., Complete Web Development 2024" 
                               class="w-full bg-purple-500/10 border border-purple-500/20 rounded-xl px-4 py-2.5
                                      focus:outline-none focus:border-purple-500/50 text-white placeholder-gray-400">
                    </div>
                    

                    <div class="md:col-span-2">
                        <label class="block text-sm text-gray-400 mb-2">Course Description</label>
                        <textarea name="description"
                                  rows="4" 
                                  required
                                  placeholder="Detailed description of what students will learn" 
                                  class="w-full bg-purple-500/10 border border-purple-500/20 rounded-xl px-4 py-2.5
                                         focus:outline-none focus:border-purple-500/50 text-white placeholder-gray-400"><?=$courseDetails['description']?></textarea>
                    </div>
                </div>
            </div>

            <div class="glass-effect rounded-2xl p-6">
                <h2 class="text-xl font-semibold mb-4">Course Details</h2>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Category</label>
                        <select name="category" 
                                required
                                class="w-full bg-purple-500/10 border border-purple-500/20 rounded-xl mb-2 px-4 py-2.5
                                       focus:outline-none focus:border-purple-500/50 text-white">
                            <option value="<?=$courseDetails['category_id']?>" selected class="bg-slate-900"><?=$courseDetails['category_name']?></option>
                                <?php $cat = new Categorie();
                                  $categories = $cat->getCategs();
                                  foreach($categories as $cat):
                                    if($cat['cat_id'] != $courseDetails['category_id']):
                                ?>
                            <option value="<?=$cat['cat_id']?>" class="bg-slate-900"><?=$cat['name']?></option>
                            <?php endif; endforeach;?>
                        </select>
                    </div>
                   
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Course Image URL</label>
                        <input type="url" 
                               name="image" 
                               value='<?=$courseDetails['image']?>'
                               placeholder="Image URL" 
                               class="w-full bg-purple-500/10 border border-purple-500/20 rounded-xl px-4 py-2.5
                                      focus:outline-none focus:border-purple-500/50 text-white placeholder-gray-400">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Content Type</label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="cursor-pointer">
                                <input type="radio" 
                                       name="content_type" 
                                       value="text"
                                       class="hidden peer" 
                                       <?= $_GET['type'] === 'text' ? 'checked' : '' ?>>
                                <div class="flex items-center justify-center px-4 py-2.5 rounded-xl border border-purple-500/20 
                                          bg-purple-500/10 hover:bg-purple-500/20 transition-all duration-200
                                          peer-checked:bg-purple-500 peer-checked:border-purple-500">
                                    <span class="text-gray-300 peer-checked:text-white">Text Content</span>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" 
                                       name="content_type" 
                                       value="video"
                                       class="hidden peer"
                                       <?= $_GET['type'] === 'video' ? 'checked' : '' ?>>
                                <div class="flex items-center justify-center px-4 py-2.5 rounded-xl border border-purple-500/20 
                                          bg-purple-500/10 hover:bg-purple-500/20 transition-all duration-200
                                          peer-checked:bg-purple-500 peer-checked:border-purple-500">
                                    <span class="text-gray-300 peer-checked:text-white">Video Content</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    
                    <div id="textContent" <?= $_GET['type'] === 'video' ? 'class="hidden"' : '' ?>>
                        <label class="block text-sm text-gray-400 mb-2">Course Content</label>
                        <textarea name="content-text"
                                  rows="6" 
                                  <?= $_GET['type'] === 'text' ? 'required' : '' ?>
                                  placeholder="Write your course content here..." 
                                  class="w-full bg-purple-500/10 border border-purple-500/20 rounded-xl px-4 py-2.5
                                         focus:outline-none focus:border-purple-500/50 text-white placeholder-gray-400"><?=$courseDetails['content']?></textarea>
                    </div>

                    <div id="videoContent" <?= $_GET['type'] === 'text' ? 'class="hidden"' : '' ?>>
                        <label class="block text-sm text-gray-400 mb-2">Video URL</label>
                        <input type="url" 
                               name="content-video" 
                               value="<?= $_GET['type'] === 'video' ? $courseDetails['content'] : '' ?>"
                               <?= $_GET['type'] === 'video' ? 'required' : '' ?>
                               placeholder="Enter video URL (YouTube, Vimeo, etc.)" 
                               class="w-full bg-purple-500/10 border border-purple-500/20 rounded-xl px-4 py-2.5
                                      focus:outline-none focus:border-purple-500/50 text-white placeholder-gray-400">
                    </div>
                </div>
            </div>



            <div class="glass-effect rounded-2xl p-6">
                <h2 class="text-xl font-semibold mb-4">Course Tags</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <?php 
                        $tag = new Tag();
                        $tags = $tag->getTags();
                        $courseTags = explode(',', $courseDetails['tags']);
                        $courseTags = array_map('trim', $courseTags);
    
                        foreach($tags as $tag):
                    ?>
                    <label class="group cursor-pointer">
                        <input type="checkbox" 
                               name="tags[]" 
                               value="<?=$tag['tag_id']?>"
                               <?= in_array($tag['name'], $courseTags) ? 'checked' : '' ?>
                               class="hidden peer">
                        <div class="flex items-center px-4 py-2 rounded-xl border border-purple-500/20 
                                  bg-purple-500/10 hover:bg-purple-500/20 transition-all duration-200
                                  peer-checked:bg-purple-500 peer-checked:border-purple-500">
                            <span class="text-gray-300 peer-checked:text-white"><?=$tag['name']?></span>
                        </div>
                    </label>
                    <?php endforeach;?>
                </div>
                <p class="text-xs text-gray-400 mt-4">Select all tags that apply to your course</p>
            </div>

            <div class="flex justify-end gap-4">
                <button type="button" 
                        onclick="history.back()" 
                        class="px-6 py-2.5 border border-gray-600 text-gray-300 rounded-xl hover:bg-gray-800 transition-colors">
                    Cancel
                </button>
                <button type="submit" name='EditCourse'
                        class="px-6 py-2.5 bg-purple-500 text-white rounded-xl hover:bg-purple-600 transition-colors">
                    Edit Course
                </button>
            </div>
        </form>
    </main>

    <script>
        const radioButtons = document.querySelectorAll('input[name="content_type"]');
        const textContent = document.getElementById('textContent');
        const videoContent = document.getElementById('videoContent');
        const textInput = document.querySelector('textarea[name="content-text"]');
        const videoInput = document.querySelector('input[name="content-video"]');

        const initialType = '<?= $_GET['type'] ?>';
        if (initialType === 'video') {
            textContent.classList.add('hidden');
            videoContent.classList.remove('hidden');
            videoInput.required = true;
            textInput.required = false;
        } else {
            textContent.classList.remove('hidden');
            videoContent.classList.add('hidden');
            textInput.required = true;
            videoInput.required = false;
        }

        radioButtons.forEach(radio => {
            radio.addEventListener('change', (e) => {
                if (e.target.value === 'text') {
                    textContent.classList.remove('hidden');
                    videoContent.classList.add('hidden');
                    textInput.required = true;
                    videoInput.required = false;
                } else {
                    textContent.classList.add('hidden');
                    videoContent.classList.remove('hidden');
                    videoInput.required = true;
                    textInput.required = false;
                }
            });
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