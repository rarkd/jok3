<?php
require_once 'config/database.php';
require_once 'includes/auth.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    
    // Ambil semua token untuk mencari yang cocok
    $stmt = $pdo->query("SELECT id, token_hash FROM tokens");
    $tokens = $stmt->fetchAll();
    
    $validToken = false;
    $tokenId = null;
    
    foreach ($tokens as $t) {
        if (password_verify($token, $t['token_hash'])) {
            $validToken = true;
            $tokenId = $t['id'];
            break;
        }
    }
    
    if ($validToken) {
        // Update last used
        $stmt = $pdo->prepare("UPDATE tokens SET last_used = NOW() WHERE id = ?");
        $stmt->execute([$tokenId]);
        
        $_SESSION['token_id'] = $tokenId;
        header('Location: customer/dashboard.php');
        exit();
    } else {
        $error = 'Invalid token';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login - Jasa Joki</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#8b5cf6',
                        accent: '#06b6d4',
                        dark: '#1e293b'
                    },
                    backgroundImage: {
                        'gradient-primary': 'linear-gradient(135deg, #3b82f6 0%, #6366f1 100%)',
                        'gradient-secondary': 'linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%)',
                        'gradient-login': 'linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%)'
                    }
                }
            }
        }
    </script>
    <style>
        .floating {
            animation: floating 4s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }
        .login-card {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95);
        }
        .token-example {
            background: linear-gradient(90deg, #f0f9ff 0%, #e0f2fe 100%);
            border-left: 4px solid #3b82f6;
        }
    </style>
</head>
<body class="bg-gradient-login min-h-screen flex items-center justify-center p-4">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/5 left-1/6 w-48 h-48 bg-white bg-opacity-10 rounded-full floating"></div>
        <div class="absolute bottom-1/4 right-1/5 w-32 h-32 bg-white bg-opacity-10 rounded-full floating" style="animation-delay: 1s;"></div>
        <div class="absolute top-2/3 left-1/3 w-24 h-24 bg-white bg-opacity-10 rounded-full floating" style="animation-delay: 2s;"></div>
    </div>

    <div class="relative w-full max-w-md">
        <!-- Logo/Header Section -->
        <div class="text-center mb-8">
            <div class="mx-auto bg-white p-4 rounded-full shadow-lg w-20 h-20 flex items-center justify-center mb-4 floating">
                <i class="fas fa-user-circle text-3xl text-primary"></i>
            </div>
            <h1 class="text-3xl font-bold text-white">Customer Portal</h1>
            <p class="text-blue-200 mt-2">Access your task management dashboard</p>
        </div>

        <!-- Login Card -->
        <div class="login-card rounded-2xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-primary p-6">
                <h2 class="text-2xl font-bold text-white text-center">
                    <i class="fas fa-key mr-3"></i> Token Authentication
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
                        <label for="token" class="block text-gray-700 mb-2 font-medium">
                            <i class="fas fa-key mr-2 text-primary"></i> Enter Your Token
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-key text-gray-400"></i>
                            </div>
                            <input 
                                type="text" 
                                id="token" 
                                name="token" 
                                required 
                                class="form-input w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition duration-300"
                                placeholder="xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                                value="<?= isset($_POST['token']) ? htmlspecialchars($_POST['token']) : '' ?>"
                            >
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i> Your unique token was provided by our service
                        </p>
                    </div>
                    
                    <!-- Token Example -->
                    <div class="mb-6 token-example p-4 rounded-lg">
                        <h3 class="font-medium text-gray-800 flex items-center">
                            <i class="fas fa-lightbulb mr-2 text-primary"></i> Example Token Format
                        </h3>
                        <p class="mt-2 font-mono text-sm bg-gray-100 p-2 rounded">
                            a1b2c3d4e5f67890abcdef1234567890abcdef1234567890abcdef
                        </p>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-primary text-white py-3 px-4 rounded-lg hover:opacity-90 transition duration-300 font-medium shadow-lg flex items-center justify-center"
                    >
                        <i class="fas fa-sign-in-alt mr-3"></i> Access Dashboard
                    </button>
                </form>
                
                <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                    <p class="text-gray-600">
                        Don't have a token? 
                        <a href="index.php" class="font-medium text-primary hover:text-blue-700">
                            Contact support
                        </a>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Security Info -->
        <div class="mt-6 text-center">
            <div class="inline-flex items-center bg-white bg-opacity-20 px-4 py-2 rounded-full text-white text-sm">
                <i class="fas fa-lock mr-2"></i>
                Secure Token Authentication
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