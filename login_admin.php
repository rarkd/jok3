<?php
require_once 'config/database.php';
require_once 'includes/auth.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT id, email, password FROM admins WHERE email = ?");
    $stmt->execute([$email]);
    $admin = $stmt->fetch();
    
    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        header('Location: admin/dashboard.php');
        exit();
    } else {
        $error = 'Invalid credentials';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Jasa Joki</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        secondary: '#8b5cf6',
                        accent: '#06b6d4',
                        dark: '#1e293b'
                    },
                    backgroundImage: {
                        'gradient-primary': 'linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%)',
                        'gradient-secondary': 'linear-gradient(135deg, #06b6d4 0%, #0ea5e9 100%)',
                        'gradient-login': 'linear-gradient(135deg, #6366f1 0%, #06b6d4 100%)'
                    }
                }
            }
        }
    </script>
    <style>
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.3);
        }
        .login-card {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95);
        }
    </style>
</head>
<body class="bg-gradient-login min-h-screen flex items-center justify-center p-4">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-white bg-opacity-10 rounded-full floating"></div>
        <div class="absolute bottom-1/3 right-1/4 w-48 h-48 bg-white bg-opacity-10 rounded-full floating" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/3 right-1/3 w-32 h-32 bg-white bg-opacity-10 rounded-full floating" style="animation-delay: 2s;"></div>
    </div>

    <div class="relative w-full max-w-md">
        <!-- Logo/Header Section -->
        <div class="text-center mb-8">
            <div class="mx-auto bg-white p-4 rounded-full shadow-lg w-20 h-20 flex items-center justify-center mb-4 floating">
                <i class="fas fa-user-shield text-3xl text-primary"></i>
            </div>
            <h1 class="text-3xl font-bold text-white">Admin Portal</h1>
            <p class="text-indigo-200 mt-2">Secure access to management dashboard</p>
        </div>

        <!-- Login Card -->
        <div class="login-card rounded-2xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-primary p-6">
                <h2 class="text-2xl font-bold text-white text-center">
                    <i class="fas fa-sign-in-alt mr-3"></i> Administrator Login
                </h2>
            </div>
            
            <div class="p-8">
                <?php if ($error): ?>
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">
                                    <?= htmlspecialchars($error) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
                <form method="POST">
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 mb-2 font-medium">
                            <i class="fas fa-envelope mr-2 text-primary"></i> Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                required 
                                class="form-input w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition duration-300"
                                placeholder="admin@example.com"
                                value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
                            >
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 mb-2 font-medium">
                            <i class="fas fa-lock mr-2 text-primary"></i> Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                required 
                                class="form-input w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition duration-300"
                                placeholder="••••••••"
                            >
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input 
                                id="remember-me" 
                                name="remember-me" 
                                type="checkbox" 
                                class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
                            >
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                                Remember me
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="font-medium text-primary hover:text-indigo-700">
                                Forgot password?
                            </a>
                        </div>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-primary text-white py-3 px-4 rounded-lg hover:opacity-90 transition duration-300 font-medium shadow-lg flex items-center justify-center"
                    >
                        <i class="fas fa-sign-in-alt mr-3"></i> Sign In
                    </button>
                </form>
                
                <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                    <p class="text-gray-600">
                        Not an administrator? 
                        <a href="index.php" class="font-medium text-primary hover:text-indigo-700">
                            Return to home
                        </a>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Security Badge -->
        <div class="mt-6 text-center">
            <div class="inline-flex items-center bg-white bg-opacity-20 px-4 py-2 rounded-full text-white text-sm">
                <i class="fas fa-shield-alt mr-2"></i>
                Secure SSL Connection
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="absolute bottom-4 w-full text-center">
        <p class="text-white text-opacity-75 text-sm">
            © <?= date('Y') ?> Jasa Joki Service. All rights reserved.
        </p>
    </div>
</body>
</html>