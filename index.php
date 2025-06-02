<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/output.css">
    <title>ACLC Tacloban HR Management</title>
</head>
<body class="bg-[#0509A9DB]">
    <div class="m-auto flex items-center justify-center h-screen">
        <div class="bg-white rounded-2xl p-10 w-auto flex flex-col gap-y-5 items-center justify-center">
            <img src="assets/img/logo.png" alt="ACLC Tacloban Logo" class="w-24 h-24 mb-4">
            <h1 class="font-bold text-3xl cursor-default">ACLC Tacloban HR Management</h1>
            <!-- Username -->
            <div class="flex items-center w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus-within:ring-2 focus-within:ring-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user text-gray-500 mr-2">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
                <input type="text" placeholder="Username" class="w-full outline-none bg-transparent placeholder-gray-400 text-sm" />
            </div>
            <!-- Password -->
            <div class="flex items-center w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus-within:ring-2 focus-within:ring-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock-icon lucide-lock text-gray-500 mr-2">
                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
                <input type="password" placeholder="Password" class="w-full outline-none bg-transparent placeholder-gray-400 text-sm" />
            </div>
                <div id="login-message" class="hidden opacity-0 transition-opacity duration-500 ease-in-out"></div>
                <button class="bg-[#0509A9DB] cursor-pointer p-3 rounded-full w-full text-white border-2 border-[#0509A9DB] hover:bg-transparent hover:text-[#0509A9DB] transition-all">LOGIN</button>
        </div>
    </div>
    
</body>
</html>

<script src="script.js"></script>

<style>
        @keyframes zoomOut {
    0% {
        opacity: 0;
        transform: scale(1.3);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
    }

    @keyframes zoomIn {
    0% {
        opacity: 1;
        transform: scale(1);
    }
    100% {
        opacity: 0;
        transform: scale(1.3);
    }
    }

    .zoom-out-animation {
    animation: zoomOut 0.4s ease forwards;
    }

    .zoom-in-animation {
    animation: zoomIn 0.4s ease forwards;
    }
</style>
