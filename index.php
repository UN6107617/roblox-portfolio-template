<?php
// ==========================================
//            PORTFOLIO CONFIGURATION
// ==========================================

// 1. BASIC INFO
$name         = "UN6107617";            // Your (Display) Name
$roblox_id    = "319189457";          // Your Roblox User ID
$discord_id   = "550752986343931916"; // Your Discord User ID
$for_hire     = "No";                // Change to "No" if you are closed. Options: "Yes" or "No"
$title        = "Web Dev";         // Your main headline (e.g. Scripter, Builder, UI Designer) try not to use more then 10 characters
$title_color  = "blue-500";            // Options: white, blue-500, red-500, yellow-400, etc.
$bio          = "Focused on backend systems and clean web architecture. Building practical and scalable solutions.";
$bio_color    = "white";              // Options: white, blue-500, red-500, yellow-400, etc.

// 2. THEME SETTINGS
$theme_color  = "blue";                // Main accent color (Tailwind color name)
$accent_hex   = "#3b82f6";             // Corresponding HEX code for CSS (blue-500)
$avatar_animation = "Yes"; // Options: "Yes" or "No"

// 3. ADVANCED COLORS (HEX Codes)
$bg_color     = "#0b1120";             // Main background
$text_color   = "#f8fafc";             // General text color
$glass_bg     = "rgba(30, 41, 59, 0.5)"; // Card background (with transparency)
$card_border  = "rgba(255, 255, 255, 0.08)"; // Subtle border around cards

// 4. SEO & META SETTINGS (For Google & Discord Embeds)
$seo_title       = "$name | Professional Roblox Developer";
$seo_description = "Check out my portfolio! I am a Roblox developer specializing in $bio";
$seo_keywords    = "Roblox, Developer, Portfolio, Luau, Scripting, Game Design";
$seo_image       = ""; // Optional: URL to a banner image. If empty, it uses your Roblox avatar.
$seo_favicon     = ""; // Optional: URL to a Favicon image. If empty, it uses your Roblox avatar.

// 5. TECH STACK (Add as many as you want)
$tools = [
    "HTML" => [
        "years" => 7,
        "desc" => "Building structured and responsive layouts since 2019."
    ],
    "CSS / TailwindCSS" => [
        "years" => 2,
        "desc" => "Creating modern UI systems using utility-first styling."
    ],
    "PHP" => [
        "years" => 1,
        "desc" => "Developing backend logic, API integrations, and dynamic systems."
    ],
    "MySQL" => [
        "years" => 1,
        "desc" => "Working with relational databases and structured data handling."
    ]
];

// 6. CONTACT LINKS
$links = [
    "Roblox Profile" => "https://www.roblox.com/users/$roblox_id/profile",
    "Discord"        => "https://discord.com/users/$discord_id",
  	"GitHub"         => "https://github.com/UN6107617",
    "RBLXTax.com"    => "https://rblxtax.com",
    
    // Currently Hidden (Commented out):
    // "Twitter / X" => "https://twitter.com/ROBLOX", 
    // "Resume/Docs" => "https://google.com"
];

// ==========================================
//             CORE LOGIC (Do not touch)
// ==========================================
function proxyGet($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/122.0.0.0');
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

// First, get the avatar (needed for favicon and seo)
$avatar_res = proxyGet("https://thumbnails.roblox.com/v1/users/avatar-headshot?userIds=$roblox_id&size=420x420&format=Png&isCircular=false");
$avatar_url = json_decode($avatar_res, true)['data'][0]['imageUrl'] ?? "";

// Logic for favicon and SEO image
$final_favicon = !empty($seo_favicon) ? $seo_favicon : $avatar_url;
if(empty($seo_image)) { $seo_image = $avatar_url; }

// Get games
$games_res = proxyGet("https://games.roblox.com/v2/users/$roblox_id/games?accessFilter=2&limit=10&sortOrder=Asc");
$games_data = json_decode($games_res, true);
$my_games = $games_data['data'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<!-- © 2026 UN6107617 – Do not remove credit without license -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $seo_title; ?></title>
    <meta name="description" content="<?php echo $seo_description; ?>">
    <meta name="keywords" content="<?php echo $seo_keywords; ?>">
    
    <meta property="og:title" content="<?php echo $seo_title; ?>">
    <meta property="og:description" content="<?php echo $seo_description; ?>">
    <meta property="og:image" content="<?php echo $seo_image; ?>">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" type="image/png" href="<?php echo $final_favicon; ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    :root {
        --accent: <?php echo $accent_hex; ?>;
    }
    body { 
        background-color: <?php echo $bg_color; ?>; 
        color: <?php echo $text_color; ?>; 
        scroll-behavior: smooth; 
    }
    .glass { 
        background: <?php echo $glass_bg; ?>; 
        backdrop-filter: blur(12px); 
        border: 1px solid <?php echo $card_border; ?>; 
    }
    
    /* Core Logic - Do not change */
    section { display: none; }
    section:target { display: block; }
    #home { display: block; }
    body:has(section:target) #home { display: none; }
    
    .img-container { 
        position: relative; 
        width: 100%; 
        aspect-ratio: 16 / 9; 
        overflow: hidden; 
        background: rgba(0,0,0,0.2); 
    }
    .img-container img { 
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
        transition: transform 0.5s ease; 
    }
    .group:hover .img-container img { transform: scale(1.05); }
    .desc-truncate { 
        display: -webkit-box; 
        -webkit-line-clamp: 3; 
        -webkit-box-orient: vertical; 
        overflow: hidden; 
    }

    /* Animation For avatar */
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    .animate-bounce-slow { animation: bounce-slow 4s ease-in-out infinite; }

	section {
    display: none;
    /* Space above the section so that the title doesn't disappear below the navbar */
    scroll-margin-top: 120px; 
	}
</style>
</head>
<body class="antialiased tracking-tight">

    <nav class="fixed top-0 w-full z-50 py-4 md:py-5 px-6 glass">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-2 md:gap-3">
                <span class="font-black text-xl md:text-2xl italic text-<?php echo $theme_color; ?>-500 tracking-tighter uppercase leading-none"><?php echo $name; ?></span>
                <span class="text-[8px] md:text-[10px] border px-1.5 py-0.5 md:px-2 md:py-1 rounded font-bold uppercase tracking-widest leading-none 
                <?php echo ($for_hire == 'Yes') 
                    ? 'bg-emerald-500/20 text-emerald-400 border-emerald-500/30' 
                    : 'bg-amber-500/20 text-amber-400 border-amber-500/30'; ?>">
                For Hire: <?php echo ($for_hire == 'Yes') ? 'Available' : 'Busy'; ?>
                </span>
            </div>
            <div class="hidden md:flex space-x-8 text-xs font-black uppercase tracking-[0.2em]">
                <a href="#" class="hover:text-<?php echo $theme_color; ?>-400 transition">Home</a>
                <a href="#work" class="hover:text-<?php echo $theme_color; ?>-400 transition">Experience</a>
                <a href="#tools" class="hover:text-<?php echo $theme_color; ?>-400 transition">Stack</a>
                <a href="#contact" class="hover:text-<?php echo $theme_color; ?>-400 transition">Contact</a>
            </div>
            <button id="menu-btn" class="md:hidden text-<?php echo $theme_color; ?>-500 p-2 focus:outline-none">
                <svg id="menu-icon" class="w-6 h-6 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
        <div id="mobile-menu" class="hidden absolute top-full left-0 w-full glass border-t border-white/5 py-6 px-6 flex flex-col space-y-4 text-center font-black uppercase tracking-widest italic">
            <a href="#" onclick="toggleMenu()" class="text-sm hover:text-<?php echo $theme_color; ?>-400 py-2">Home</a>
            <a href="#work" onclick="toggleMenu()" class="text-sm hover:text-<?php echo $theme_color; ?>-400 py-2 border-t border-white/5">Experience</a>
            <a href="#tools" onclick="toggleMenu()" class="text-sm hover:text-<?php echo $theme_color; ?>-400 py-2 border-t border-white/5">Stack</a>
            <a href="#contact" onclick="toggleMenu()" class="text-sm hover:text-<?php echo $theme_color; ?>-400 py-2 border-t border-white/5 border-b">Contact</a>
        </div>
    </nav>

    <div class="pt-40 pb-20 px-6 max-w-6xl mx-auto min-h-screen">
        <section id="home" class="text-center">
    <div class="relative inline-block mb-10 <?php echo ($avatar_animation == 'Yes') ? 'animate-bounce-slow' : ''; ?>">
        <img src="<?php echo $avatar_url; ?>" class="w-56 h-56 rounded-full border-4 shadow-[0_0_50px_rgba(0,0,0,0.3)]" style="border-color: var(--accent);">
    </div>
    <h1 class="text-7xl md:text-8xl font-black mb-6 italic uppercase tracking-tighter text-<?php echo $title_color; ?>">
        <?php echo $title; ?>
    </h1>
    <p class="text-<?php echo $bio_color; ?> text-xl md:text-2xl max-w-2xl mx-auto font-light leading-relaxed mb-12 italic">
         <?php echo $bio; ?>
    </p>
    <div class="flex flex-wrap justify-center gap-4">
        <a href="#work" class="bg-<?php echo $theme_color; ?>-600 hover:bg-<?php echo $theme_color; ?>-700 text-white px-10 py-4 rounded-xl font-black uppercase italic transition-all shadow-xl">Portfolio</a>
        <a href="#contact" class="glass px-10 py-4 rounded-xl font-black uppercase italic hover:bg-white/10 transition-all">Get in Touch</a>
    </div>
</section>

        <section id="work">
            <div class="flex items-center gap-4 mb-12">
                <div class="h-10 w-2" style="background-color: var(--accent);"></div>
                <h2 class="text-5xl font-black italic uppercase tracking-tighter">My Work</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php foreach($my_games as $game): 
                    $universeId = $game['id']; 
                    $rootPlaceId = $game['rootPlace']['id']; 
                    $thumb_res = proxyGet("https://thumbnails.roblox.com/v1/games/icons?universeIds=$universeId&returnPolicy=PlaceHolder&size=512x512&format=Png&isCircular=false");
                    $thumb_json = json_decode($thumb_res, true);
                    $thumb_url = $thumb_json['data'][0]['imageUrl'] ?? "";
                ?>
                <div class="glass rounded-[2rem] overflow-hidden group border border-white/5 transition-all hover:border-<?php echo $theme_color; ?>-500/30 flex flex-col">
                    <div class="img-container">
                        <img src="<?php echo $thumb_url; ?>" alt="Game Icon">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0b1120] via-transparent to-transparent opacity-80"></div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-3xl font-black mb-3 italic uppercase tracking-tight"><?php echo htmlspecialchars($game['name']); ?></h3>
                        <p class="text-gray-400 mb-8 leading-relaxed font-medium desc-truncate italic"><?php echo htmlspecialchars($game['description'] ?: "No description provided."); ?></p>
                        <div class="mt-auto">
                            <a href="https://www.roblox.com/games/<?php echo $rootPlaceId; ?>/" target="_blank" class="inline-flex items-center gap-2 text-<?php echo $theme_color; ?>-400 font-black text-xs tracking-widest uppercase hover:text-white transition group">
                                Open Experience <span class="group-hover:translate-x-1 transition-transform">→</span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="tools">
            <div class="flex flex-col items-center mb-12 text-center">
                <h2 class="text-5xl font-black italic uppercase tracking-tighter mb-2 text-<?php echo $theme_color; ?>-500">Tech Stack</h2>
                <p class="text-gray-500 text-[10px] font-bold uppercase tracking-[0.3em]">Click for details</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                <?php foreach($tools as $toolName => $info): ?>
                    <div onclick="showToolDetail('<?php echo $toolName; ?>', '<?php echo $info['years']; ?>', '<?php echo addslashes($info['desc']); ?>')" 
                         class="glass p-6 rounded-2xl border border-white/5 uppercase font-black italic tracking-widest text-sm transition-all hover:scale-105 hover:border-<?php echo $theme_color; ?>-500/50 hover:text-<?php echo $theme_color; ?>-400 group cursor-pointer">
                        <span class="relative">
                            <?php echo $toolName; ?>
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-<?php echo $theme_color; ?>-500 transition-all group-hover:w-full"></span>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="contact">
            <h2 class="text-5xl font-black mb-12 italic uppercase text-center tracking-tighter">Let's <span class="text-<?php echo $theme_color; ?>-500">Connect</span></h2>
            <div class="max-w-xl mx-auto grid gap-4">
                <?php foreach($links as $label => $url): ?>
                    <a href="<?php echo $url; ?>" target="_blank" class="glass p-6 rounded-2xl flex justify-between items-center group hover:bg-<?php echo $theme_color; ?>-600/20 hover:border-<?php echo $theme_color; ?>-500/50 transition-all duration-500 relative overflow-hidden">
                        <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                        <div class="flex flex-col text-left">
                            <span class="text-[10px] text-<?php echo $theme_color; ?>-500 font-bold uppercase tracking-[0.3em] mb-1">Direct Link</span>
                            <span class="font-black italic uppercase tracking-widest text-xl"><?php echo $label; ?></span>
                        </div>
                        <span class="text-2xl group-hover:translate-x-2 transition-all duration-300 text-<?php echo $theme_color; ?>-500">→</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

<footer class="glass mt-20 border-t border-white/5 py-10 text-center">
  <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-6 px-6 md:flex-row">
    <div class="text-left">
      <p class="font-black text-<?php echo $theme_color; ?>-500 uppercase italic"><?php echo $name; ?></p>
      <p class="text-[10px] font-bold tracking-widest text-gray-500 uppercase">Roblox Developer Portfolio © <?php echo date('Y'); ?></p>
    </div>

    <div class="flex flex-col gap-2 md:items-end">
      <div class="flex gap-4 text-[10px] font-black tracking-widest uppercase">
        <a href="#" class="transition hover:text-<?php echo $theme_color; ?>-400">Back to top</a>
        <span class="text-gray-800">|</span>
        <span class="text-gray-500">
          Template by
          <a href="https://www.roblox.com/users/319189457/profile" target="_blank" rel="noopener noreferrer" class="text-white transition hover:text-<?php echo $theme_color; ?>-400"> UN6107617 </a>
        </span>
      </div>

      <div class="flex gap-3 text-[9px] font-bold tracking-tighter text-gray-600 uppercase">
        <span>Powered by PHP & Tailwind</span>
        <span>•</span>
        <a href="https://github.com/UN6107617/roblox-portfolio-template/" target="_blank" class="hover:text-<?php echo $theme_color; ?>-500">Get this Template</a>
      </div>
    </div>
  </div>
</footer>

    <div id="toolModal" class="fixed inset-0 z-[100] flex items-center justify-center px-6 hidden">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-md" onclick="closeToolModal()"></div>
        <div class="glass max-w-lg w-full p-10 rounded-[2.5rem] relative z-10 text-center scale-90 transition-transform duration-300" id="modalContent" style="border-color: rgba(<?php echo $accent_hex; ?>, 0.3);">
            <h3 id="modalTitle" class="text-5xl font-black italic uppercase tracking-tighter text-<?php echo $theme_color; ?>-500 mb-2"></h3>
            <div class="inline-block bg-<?php echo $theme_color; ?>-600/20 text-<?php echo $theme_color; ?>-400 border px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest mb-6" style="border-color: var(--accent);"><span id="modalYears"></span> Years Experience</div>
            <p id="modalDesc" class="text-gray-400 italic leading-relaxed text-lg"></p>
            <button onclick="closeToolModal()" class="mt-8 text-xs font-black uppercase tracking-widest text-gray-500 hover:text-white transition underline">Close [ESC]</button>
        </div>
    </div>

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        function toggleMenu() {
            mobileMenu.classList.toggle('hidden');
            menuIcon.style.transform = mobileMenu.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(90deg)';
        }
        menuBtn.addEventListener('click', toggleMenu);
        window.addEventListener('click', (e) => {
            if (!menuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
                menuIcon.style.transform = 'rotate(0deg)';
            }
        });
        function showToolDetail(name, years, desc) {
            const modal = document.getElementById('toolModal');
            const content = document.getElementById('modalContent');
            document.getElementById('modalTitle').innerText = name;
            document.getElementById('modalYears').innerText = years;
            document.getElementById('modalDesc').innerText = desc;
            modal.classList.remove('hidden');
            setTimeout(() => content.classList.replace('scale-90', 'scale-100'), 10);
        }
        function closeToolModal() {
            const modal = document.getElementById('toolModal');
            const content = document.getElementById('modalContent');
            content.classList.replace('scale-100', 'scale-90');
            setTimeout(() => modal.classList.add('hidden'), 200);
        }
        document.addEventListener('keydown', (e) => { if(e.key === "Escape") closeToolModal(); });
    </script>
<!--
================================================================================
UN6107617 Portfolio Template
License: Custom Free License – Attribution Required
Made by UN6107617
Roblox DevForum: https://devforum.roblox.com/u/un6107617/summary

LICENSE NOTICE:

This template is free to use for personal and commercial projects.
You are allowed to modify styling, layout, content, and functionality.

However:
- The visible credit "Template by UN6107617" in the footer must remain intact.
- This comment block may not be removed.
- You may not claim this template as your own work.
- Redistribution of this template as your own product is not allowed.

If you wish to remove visible credits, you must obtain a paid license
from the original author.

Copyright (c) 2026 UN6107617
All rights reserved.
================================================================================
-->
</body>
</html>
