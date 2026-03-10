<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EVolt — Tableau de bord</title>
    <meta name="description" content="Recherchez des bornes de recharge disponibles près de chez vous." />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <script>
        if(!localStorage.getItem("token")){
            window.location.href="/login";
        }
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        brand: { 50: '#ecfdf5', 100: '#d1fae5', 400: '#34d399', 500: '#10b981', 600: '#059669', 700: '#047857', 900: '#064e3b' },
                        dark: { 700: '#334155', 800: '#1e293b', 900: '#0f172a', 950: '#020617' }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .glass {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(52, 211, 153, 0.12);
        }

        .sidebar {
            width: 380px;
            min-width: 340px;
        }

        .map-placeholder {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f2a1e 100%);
        }

        .station-card:hover {
            border-color: rgba(52, 211, 153, 0.5);
            transform: translateY(-1px);
        }

        .badge-available {
            background: rgba(16, 185, 129, 0.15);
            color: #34d399;
            border: 1px solid rgba(52, 211, 153, 0.3);
        }

        .badge-busy {
            background: rgba(245, 158, 11, 0.15);
            color: #fbbf24;
            border: 1px solid rgba(251, 191, 36, 0.3);
        }

        .badge-offline {
            background: rgba(100, 116, 139, 0.15);
            color: #94a3b8;
            border: 1px solid rgba(148, 163, 184, 0.3);
        }

        .pulse-dot {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: .4
            }
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #34d399;
            box-shadow: 0 0 0 3px rgba(52, 211, 153, 0.12);
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: #0f172a;
        }

        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 9999px;
        }
    </style>
</head>

<body class="h-screen flex flex-col bg-dark-950 text-white overflow-hidden">

    <!-- Navbar -->
    <nav class="glass border-b border-slate-800/60 px-6 py-3.5 flex items-center justify-between z-10 flex-shrink-0">
        <div class="flex items-center gap-3">
            <div
                class="w-9 h-9 rounded-xl bg-gradient-to-br from-brand-500 to-brand-700 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <span class="text-xl font-bold text-white">EVolt</span>
        </div>
        <div class="hidden md:flex items-center gap-1 bg-dark-900 rounded-xl p-1">
            <a href="dashboard.html"
                class="px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-r from-brand-600 to-brand-500 text-white">Carte</a>
            <a href=""
                class="px-4 py-2 text-sm font-medium rounded-lg text-slate-400 hover:text-white transition">Réservations</a>
            <a href="history.html"
                class="px-4 py-2 text-sm font-medium rounded-lg text-slate-400 hover:text-white transition">Historique</a>
        </div>
        <div class="flex items-center gap-3">
            <div class="relative">
                <button
                    class="w-9 h-9 flex items-center justify-center rounded-xl bg-dark-900 hover:bg-dark-800 text-slate-400 hover:text-white transition relative">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-brand-500 rounded-full pulse-dot"></span>
                </button>
            </div>
            <div class="flex items-center gap-2.5 cursor-pointer group">
                <div
                    class="w-9 h-9 rounded-xl bg-gradient-to-br from-brand-600/30 to-brand-800/30 border border-brand-500/30 flex items-center justify-center text-sm font-bold text-brand-400">
                    JD</div>
                <div class="hidden md:block">
                    <p id="name" class="text-sm font-medium text-white group-hover:text-brand-400 transition"></p>
                    <p id="role" class="text-xs text-slate-500"></p>
                </div>
            </div>
            <a href="index.html" class="text-slate-500 hover:text-red-400 transition ml-1">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </a>
        </div>
    </nav>

    <!-- Main layout -->
    <div class="flex flex-1 overflow-hidden">

        <!-- Left Sidebar -->
        <div class="sidebar glass border-r border-slate-800/60 flex flex-col overflow-hidden">

            <!-- Search -->
            <div class="p-4 border-b border-slate-800/60">
                <h2 class="text-lg font-bold mb-3">Rechercher une borne</h2>
                <div class="relative mb-3">
                    <svg class="absolute left-3.5 top-3.5 w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" placeholder="Adresse, ville, code postal..."
                        class="w-full bg-dark-900 border border-slate-700 rounded-xl pl-10 pr-4 py-3 text-sm text-white placeholder-slate-500 transition-all" />
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="text-xs text-slate-400 mb-1.5 block font-medium">Connecteur</label>
                        <select
                            class="w-full bg-dark-900 border border-slate-700 rounded-xl px-3 py-2.5 text-sm text-white transition-all appearance-none cursor-pointer">
                            <option value="">Tous types</option>
                            <option>Type 2</option>
                            <option>CCS</option>
                            <option>CHAdeMO</option>
                            <option>Tesla</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs text-slate-400 mb-1.5 block font-medium">Puissance min.</label>
                        <select
                            class="w-full bg-dark-900 border border-slate-700 rounded-xl px-3 py-2.5 text-sm text-white transition-all appearance-none cursor-pointer">
                            <option value="">Toute puissance</option>
                            <option>7 kW</option>
                            <option>22 kW</option>
                            <option>50 kW</option>
                            <option>100 kW+</option>
                        </select>
                    </div>
                </div>
                <div class="mt-2">
                    <label class="text-xs text-slate-400 mb-1.5 block font-medium">Rayon de recherche : <span
                            class="text-brand-400 font-semibold" id="radiusVal">5 km</span></label>
                    <input type="range" min="1" max="50" value="5"
                        oninput="document.getElementById('radiusVal').textContent=this.value+' km'"
                        class="w-full accent-brand-500 cursor-pointer" />
                </div>
                <button
                    class="w-full mt-3 py-2.5 rounded-xl font-semibold text-sm bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 transition-all">
                    Rechercher
                </button>
            </div>

            <!-- Results count -->
            <div class="px-4 py-3 flex items-center justify-between border-b border-slate-800/60">
                <span class="text-sm text-slate-400"><span class="text-white font-semibold">12</span> bornes
                    trouvées</span>
                <div class="flex items-center gap-2 text-xs text-slate-400">
                    <span class="w-2 h-2 rounded-full bg-brand-500 inline-block"></span>Disponible
                    <span class="w-2 h-2 rounded-full bg-amber-400 inline-block ml-1"></span>Occupée
                </div>
            </div>

            <!-- Station list -->
            <div class="flex-1 overflow-y-auto p-3 space-y-2">

                <!-- Station Card -->
                <a href="station.html"
                    class="station-card block bg-dark-900 border border-slate-800 rounded-xl p-4 transition-all duration-200 cursor-pointer">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-semibold text-sm text-white">Centre Commercial Westfield</h3>
                            <p class="text-xs text-slate-500 mt-0.5">12 Rue du Commerce, Paris 15e</p>
                        </div>
                        <span
                            class="badge-available text-xs px-2.5 py-1 rounded-full font-medium whitespace-nowrap">Disponible</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs text-slate-400">
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg><span class="text-brand-400 font-medium">150 kW</span></span>
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m-4 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>CCS Combo</span>
                        <span class="flex items-center gap-1 ml-auto"><svg class="w-3.5 h-3.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>0.8 km</span>
                    </div>
                </a>

                <a href="station.html"
                    class="station-card block bg-dark-900 border border-slate-800 rounded-xl p-4 transition-all duration-200 cursor-pointer">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-semibold text-sm text-white">Parking Gare Montparnasse</h3>
                            <p class="text-xs text-slate-500 mt-0.5">Place Raoul Dautry, Paris 14e</p>
                        </div>
                        <span
                            class="badge-available text-xs px-2.5 py-1 rounded-full font-medium whitespace-nowrap">Disponible</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs text-slate-400">
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg><span class="text-brand-400 font-medium">22 kW</span></span>
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m-4 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>Type 2</span>
                        <span class="flex items-center gap-1 ml-auto"><svg class="w-3.5 h-3.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>1.4 km</span>
                    </div>
                </a>

                <a href="station.html"
                    class="station-card block bg-dark-900 border border-slate-800 rounded-xl p-4 transition-all duration-200 cursor-pointer">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-semibold text-sm text-white">Supermarché Carrefour City</h3>
                            <p class="text-xs text-slate-500 mt-0.5">45 Bd de Grenelle, Paris 15e</p>
                        </div>
                        <span
                            class="badge-busy text-xs px-2.5 py-1 rounded-full font-medium whitespace-nowrap">Occupée</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs text-slate-400">
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg><span class="text-amber-400 font-medium">50 kW</span></span>
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m-4 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>CHAdeMO</span>
                        <span class="flex items-center gap-1 ml-auto"><svg class="w-3.5 h-3.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>2.1 km</span>
                    </div>
                </a>

                <a href="station.html"
                    class="station-card block bg-dark-900 border border-slate-800 rounded-xl p-4 transition-all duration-200 cursor-pointer">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-semibold text-sm text-white">Parking République</h3>
                            <p class="text-xs text-slate-500 mt-0.5">Place de la République, Paris 10e</p>
                        </div>
                        <span class="badge-offline text-xs px-2.5 py-1 rounded-full font-medium whitespace-nowrap">Hors
                            ligne</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs text-slate-400">
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg><span class="text-slate-400 font-medium">100 kW</span></span>
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m-4 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>CCS</span>
                        <span class="flex items-center gap-1 ml-auto"><svg class="w-3.5 h-3.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>3.5 km</span>
                    </div>
                </a>

            </div>
        </div>

        <!-- Map Area -->
        <div class="flex-1 map-placeholder relative">
            <!-- Grid overlay for map feel -->
            <div class="absolute inset-0 opacity-10"
                style="background-image:linear-gradient(rgba(52,211,153,0.3) 1px,transparent 1px),linear-gradient(90deg,rgba(52,211,153,0.3) 1px,transparent 1px);background-size:40px 40px;">
            </div>

            <!-- Map center label -->
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center">
                    <div
                        class="w-16 h-16 rounded-full bg-brand-500/20 border-2 border-brand-500/50 flex items-center justify-center mx-auto mb-4 animate-pulse">
                        <div
                            class="w-8 h-8 rounded-full bg-brand-500/40 border border-brand-400 flex items-center justify-center">
                            <div class="w-3 h-3 rounded-full bg-brand-400"></div>
                        </div>
                    </div>
                    <p class="text-slate-500 text-sm">Carte interactive</p>
                    <p class="text-slate-600 text-xs mt-1">Intégrez Google Maps ou Leaflet.js ici</p>
                </div>
            </div>

            <!-- Map markers -->
            <div class="absolute top-1/3 left-1/3">
                <div class="relative group cursor-pointer">
                    <div
                        class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center shadow-lg shadow-brand-900/60 border-2 border-white group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div
                        class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 hidden group-hover:block bg-dark-800 border border-slate-700 rounded-lg p-2 text-xs whitespace-nowrap shadow-xl">
                        <p class="font-medium text-white">Westfield</p>
                        <p class="text-brand-400">150 kW · Disponible</p>
                    </div>
                </div>
            </div>
            <div class="absolute top-1/2 left-1/2">
                <div
                    class="w-10 h-10 rounded-full bg-amber-500 flex items-center justify-center shadow-lg border-2 border-white cursor-pointer hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>
            <div class="absolute top-2/3 left-2/5">
                <div
                    class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center shadow-lg border-2 border-white cursor-pointer hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>

            <!-- Map controls -->
            <div class="absolute top-4 right-4 flex flex-col gap-2">
                <button
                    class="w-10 h-10 glass rounded-xl flex items-center justify-center text-slate-300 hover:text-white transition font-bold text-lg">+</button>
                <button
                    class="w-10 h-10 glass rounded-xl flex items-center justify-center text-slate-300 hover:text-white transition font-bold text-lg">−</button>
                <button
                    class="w-10 h-10 glass rounded-xl flex items-center justify-center text-brand-400 hover:text-brand-300 transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
            </div>

            <!-- Stats bar -->
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2">
                <div class="glass rounded-2xl px-6 py-3 flex items-center gap-6 shadow-2xl">
                    <div class="text-center">
                        <p class="text-2xl font-bold text-white">8</p>
                        <p class="text-xs text-brand-400">Disponibles</p>
                    </div>
                    <div class="w-px h-8 bg-slate-700"></div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-white">3</p>
                        <p class="text-xs text-amber-400">Occupées</p>
                    </div>
                    <div class="w-px h-8 bg-slate-700"></div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-white">1</p>
                        <p class="text-xs text-slate-400">Hors ligne</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    fetch("http://localhost:8000/api/user",{
        method:"GET",
        headers:{
            "Authorization":"Bearer " + localStorage.getItem("token"),
            "Accept":"application/json"
        }
    })
    .then(res=>res.json())
    .then(data=>{
        document.getElementById("name").innerText = data.user.name;
        document.getElementById("role").innerText = data.user.role;
    });
</script>

</html>