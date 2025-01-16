<?php
if(isset($_GET['status'])){
    echo '<div class="fixed top-4 left-1/2 transform -translate-x-1/2 w-full max-w-md z-50">
    <div class="bg-gradient-to-r from-amber-500/10 to-yellow-500/10 backdrop-blur-md 
               border border-amber-400/20 rounded-2xl p-6 shadow-2xl 
               animate-fade-in-down">
        <div class="flex items-center gap-4">
            <div class="flex-shrink-0">
                <svg class="w-8 h-8 text-amber-400 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <h3 class="text-xl font-semibold text-white mb-1">Compte en attente</h3>
                <p class="text-gray-300">
                    Veuillez patienter pendant que l\'administrateur approuve votre compte. 
                    Vous recevrez un e-mail une fois votre compte activé.
                </p>
            </div>
        </div>
    </div>
  </div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - YouDemy</title>
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
                    Welcome to 
                    <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        YouDemy
                    </span>
                </h1>
                <p class="text-gray-300 text-xl">
                    Unlock your potential with our innovative learning platform
                </p>
            </div>
            <div class="hidden lg:block mt-12 relative">
                <div class="absolute top-0 left-0 w-20 h-20 bg-purple-500 rounded-full opacity-20"></div>
                <div class="absolute top-10 left-10 w-32 h-32 bg-pink-500 rounded-full opacity-20"></div>
                <div class="absolute top-20 left-20 w-24 h-24 bg-indigo-500 rounded-full opacity-20"></div>
            </div>
        </div>

        <div class="lg:w-1/2 w-full max-w-md">
            <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 shadow-2xl">
                <div class="mb-8 text-center">
                    <h2 class="text-3xl font-bold text-white mb-2">Sign In</h2>
                    <p class="text-gray-300">Access your learning journey</p>
                </div>

                <form class="space-y-6" method='POST' action='../processes/auth.php'>
                    <div class="relative">
                        <input type="email" name='email'
                               class="w-full bg-white/5 text-white border border-gray-600 rounded-xl px-4 py-3 outline-none focus:border-purple-400 transition-colors duration-300"
                               placeholder="Email address"
                               required>
                    </div>

                    <div class="relative">
                        <input type="password" name='password'
                               class="w-full bg-white/5 text-white border border-gray-600 rounded-xl px-4 py-3 outline-none focus:border-purple-400 transition-colors duration-300"
                               placeholder="Password"
                               required>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center text-gray-300">
                            <input type="checkbox" class="mr-2 rounded bg-white/5 border-gray-600 text-purple-500 focus:ring-purple-500">
                            Remember me
                        </label>
                        <a href="#" class="text-purple-400 hover:text-purple-300 transition-colors duration-300">
                            Forgot password?
                        </a>
                    </div>

                    <button type="submit" name='login'
                            class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-xl py-3 font-medium
                                   hover:opacity-90 transform transition-all duration-300 hover:scale-[1.02]
                                   focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                        Sign in
                    </button>

                    <p class="text-center text-gray-300">
                        Don't have an account? 
                        <a href="signup.php" class="text-purple-400 hover:text-purple-300 font-medium transition-colors duration-300">
                            Sign up
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>