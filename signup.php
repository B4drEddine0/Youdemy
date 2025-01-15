<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white min-h-screen">
    <div class="min-h-screen flex flex-col lg:flex-row items-center justify-center p-4">
        <div class="lg:w-1/2 text-center lg:text-left mb-8 lg:mb-0 lg:pr-12">
            <div class="float-animation">
                <h1 class="text-5xl font-bold text-white mb-6">
                    Join 
                    <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        YouDemy
                    </span>
                </h1>
                <p class="text-gray-300 text-xl">
                    Start your learning journey today - it's free!
                </p>
            </div>
            <div class="hidden lg:block mt-12 relative">
                <div class="absolute top-0 left-0 w-20 h-20 bg-purple-500 rounded-full opacity-20"></div>
                <div class="absolute top-10 left-10 w-32 h-32 bg-pink-500 rounded-full opacity-20"></div>
                <div class="absolute top-20 left-20 w-24 h-24 bg-purple-500 rounded-full opacity-20"></div>
            </div>
        </div>

        <div class="lg:w-1/2 w-full max-w-md">
            <div class="bg-white/10 backdrop-blur-xl rounded-2xl p-8 shadow-2xl">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-white">Create Account</h2>
                    <p class="text-gray-400 mt-2">Join our learning community today</p>
                </div>

                <form class="space-y-6">
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <label class="flex items-center justify-center p-4 border border-purple-500/30 rounded-xl cursor-pointer hover:bg-purple-500/10 transition-colors">
                            <input type="radio" name="role" value="student" class="hidden" checked>
                            <div class="text-center">
                                <span class="block text-purple-400 font-medium">Student</span>
                            </div>
                        </label>
                        <label class="flex items-center justify-center p-4 border border-purple-500/30 rounded-xl cursor-pointer hover:bg-purple-500/10 transition-colors">
                            <input type="radio" name="role" value="teacher" class="hidden">
                            <div class="text-center">
                                <span class="block text-gray-400 font-medium">Teacher</span>
                            </div>
                        </label>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">First Name</label>
                            <input type="text" 
                                   class="w-full bg-white/5 border border-gray-600 rounded-xl px-4 py-3 text-white
                                          focus:outline-none focus:border-purple-500 transition-colors"
                                   placeholder="John">
                        </div>
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">Last Name</label>
                            <input type="text" 
                                   class="w-full bg-white/5 border border-gray-600 rounded-xl px-4 py-3 text-white
                                          focus:outline-none focus:border-purple-500 transition-colors"
                                   placeholder="Doe">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Email Address</label>
                        <input type="email" 
                               class="w-full bg-white/5 border border-gray-600 rounded-xl px-4 py-3 text-white
                                      focus:outline-none focus:border-purple-500 transition-colors"
                               placeholder="john@example.com">
                    </div>

                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Password</label>
                        <input type="password" 
                               class="w-full bg-white/5 border border-gray-600 rounded-xl px-4 py-3 text-white
                                      focus:outline-none focus:border-purple-500 transition-colors"
                               placeholder="••••••••">
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" class="rounded bg-white/5 border-gray-600 text-purple-500 focus:ring-purple-500">
                        <label class="ml-2 text-sm text-gray-300">
                            I agree to the 
                            <a href="#" class="text-purple-400 hover:text-purple-300">Terms of Service</a>
                            and
                            <a href="#" class="text-purple-400 hover:text-purple-300">Privacy Policy</a>
                        </label>
                    </div>

                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-xl py-3 font-medium
                                   hover:opacity-90 transform transition-all duration-300 hover:scale-[1.02]
                                   focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                        Create Account
                    </button>

                    <p class="text-center text-gray-400">
                        Already have an account? 
                        <a href="login.php" class="text-purple-400 hover:text-purple-300 font-medium transition-colors duration-300">
                            Sign in
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('input[name="role"]').forEach(input => {
            input.addEventListener('change', function() {
                document.querySelectorAll('input[name="role"]').forEach(radio => {
                    const label = radio.parentElement;
                    const text = label.querySelector('span');
                    if (radio.checked) {
                        label.classList.add('bg-purple-500/10', 'border-purple-500');
                        text.classList.remove('text-gray-400');
                        text.classList.add('text-purple-400');
                    } else {
                        label.classList.remove('bg-purple-500/10', 'border-purple-500');
                        text.classList.remove('text-purple-400');
                        text.classList.add('text-gray-400');
                    }
                });
            });
        });
    </script>
</body>
</html>