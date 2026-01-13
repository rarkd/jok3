<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasa Joki Service</title>
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
                        'gradient-accent': 'linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%)',
                        'gradient-hero': 'linear-gradient(135deg, #6366f1 0%, #06b6d4 100%)'
                    }
                }
            }
        }
    </script>
    <style>
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .animate-pulse-slow {
            animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        .feature-icon {
            transition: all 0.3s ease;
        }
        .feature-icon:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <!-- Hero Section -->
    <div class="bg-gradient-hero text-white py-16 md:py-24">
        <div class="container mx-auto px-4 text-center">
            <div class="flex justify-center mb-8">
                <div class="bg-white bg-opacity-20 p-6 rounded-full animate-float">
                    <i class="fas fa-crown text-5xl"></i>
                </div>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Jasa Joki Service</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">Professional task completion service with seamless workflow management</p>
            <div class="flex flex-wrap justify-center gap-4">
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <i class="fas fa-bolt mr-2"></i> Fast Delivery
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <i class="fas fa-shield-alt mr-2"></i> Secure Process
                </div>
                <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <i class="fas fa-headset mr-2"></i> 24/7 Support
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-16">
        <!-- Features Section -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Why Choose Our Service?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition duration-300">
                    <div class="bg-primary bg-opacity-10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 feature-icon">
                        <i class="fas fa-lock text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Secure Token System</h3>
                    <p class="text-gray-600">Unique token-based authentication ensures your privacy and security throughout the process.</p>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition duration-300">
                    <div class="bg-secondary bg-opacity-10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 feature-icon">
                        <i class="fas fa-sync-alt text-secondary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Revision System</h3>
                    <p class="text-gray-600">Request revisions until you're completely satisfied with the results.</p>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition duration-300">
                    <div class="bg-accent bg-opacity-10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 feature-icon">
                        <i class="fas fa-cloud-upload-alt text-accent text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Easy File Sharing</h3>
                    <p class="text-gray-600">Seamlessly upload and download files with our intuitive interface.</p>
                </div>
            </div>
        </div>

        <!-- Login Cards -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Get Started</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Customer Login Card -->
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden card-hover transition-all duration-500 transform">
                    <div class="bg-gradient-primary p-8 text-center">
                        <div class="bg-white bg-opacity-20 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-user-circle text-3xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Customer Portal</h2>
                        <p class="text-indigo-200 mt-2">Submit tasks and track progress</p>
                    </div>
                    <div class="p-8">
                        <p class="text-gray-600 mb-8 text-center">Login with your unique token to submit tasks and track progress in real-time.</p>
                        <a href="login_customer.php" class="block w-full text-center bg-gradient-primary text-white py-4 px-6 rounded-xl hover:opacity-90 transition duration-300 font-medium text-lg shadow-lg">
                            <i class="fas fa-sign-in-alt mr-3"></i> Login as Customer
                        </a>
                        <div class="mt-6 text-center">
                            <p class="text-gray-500 text-sm">Don't have a token? Contact our support team.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Admin Login Card -->
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden card-hover transition-all duration-500 transform">
                    <div class="bg-gradient-secondary p-8 text-center">
                        <div class="bg-white bg-opacity-20 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-user-shield text-3xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Admin Portal</h2>
                        <p class="text-purple-200 mt-2">Manage tasks and customers</p>
                    </div>
                    <div class="p-8">
                        <p class="text-gray-600 mb-8 text-center">Manage tokens, view requests, and process submissions with our powerful dashboard.</p>
                        <a href="login_admin.php" class="block w-full text-center bg-gradient-secondary text-white py-4 px-6 rounded-xl hover:opacity-90 transition duration-300 font-medium text-lg shadow-lg">
                            <i class="fas fa-sign-in-alt mr-3"></i> Login as Admin
                        </a>
                        <div class="mt-6 text-center">
                            <p class="text-gray-500 text-sm">Authorized personnel only.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="bg-gradient-primary rounded-3xl shadow-xl p-8 mb-16">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-white">1000+</div>
                    <div class="text-indigo-200">Tasks Completed</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-white">98%</div>
                    <div class="text-indigo-200">Customer Satisfaction</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-white">24/7</div>
                    <div class="text-indigo-200">Support Available</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-white">50MB</div>
                    <div class="text-indigo-200">Max File Size</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <h3 class="text-2xl font-bold flex items-center">
                        <i class="fas fa-crown mr-3 text-accent"></i> Jasa Joki Service
                    </h3>
                    <p class="text-gray-400 mt-2">Professional task completion service</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500">
                <p>© <?= date('Y') ?> Jasa Joki Service. All rights reserved.</p>
                <p class="mt-2 text-sm">Designed with <i class="fas fa-heart text-red-500"></i> for seamless task management</p>
            </div>
        </div>
    </footer>
</body>
</html>