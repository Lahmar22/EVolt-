<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EVolt — Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <script>
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
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(52, 211, 153, 0.12);
        }

        .sidebar-link {
            transition: all .2s;
        }

        .sidebar-link.active {
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.25), rgba(16, 185, 129, 0.1));
            color: #34d399;
            border-left: 3px solid #34d399;
        }

        .sidebar-link:not(.active):hover {
            background: rgba(255, 255, 255, 0.04);
            color: #fff;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #34d399;
            box-shadow: 0 0 0 3px rgba(52, 211, 153, 0.12);
        }

        .modal-bg {
            background: rgba(2, 6, 23, 0.85);
            backdrop-filter: blur(8px);
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

        .progress-bar {
            background: linear-gradient(90deg, #059669, #34d399);
            border-radius: 9999px;
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

<body class="min-h-screen bg-dark-950 text-white flex">

    <!-- Sidebar -->
    <aside class="w-64 min-h-screen glass border-r border-slate-800/60 flex flex-col fixed top-0 left-0 z-20">
        <div class="p-5 border-b border-slate-800/60">
            <div class="flex items-center gap-3">
                <div
                    class="w-9 h-9 rounded-xl bg-gradient-to-br from-brand-500 to-brand-700 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div>
                    <span class="text-lg font-bold text-white">EVolt</span>
                    <p class="text-xs text-brand-400 font-medium">Admin Panel</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 p-3 space-y-1">
            <p class="text-xs text-slate-600 font-semibold uppercase tracking-widest px-3 pt-3 pb-1">Tableau de bord</p>
            <a href="#" onclick="showSection('stats')"
                class="sidebar-link active flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium border-l-transparent">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Statistiques
            </a>
            <a href="#" onclick="showSection('stations')"
                class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400 border-l-transparent border-l-3">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Gestion des bornes
            </a>
            <a href="#" onclick="showSection('users')"
                class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400 border-l-transparent">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Utilisateurs
            </a>
            <a href="#"
                class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-400 border-l-transparent">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                Réservations
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800/60">
            <div class="flex items-center gap-3 p-3 rounded-xl bg-dark-900">
                <div
                    class="w-9 h-9 rounded-xl bg-gradient-to-br from-purple-600/30 to-purple-800/30 border border-purple-500/30 flex items-center justify-center text-sm font-bold text-purple-400">
                    A</div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-white truncate">Admin</p>
                    <p class="text-xs text-slate-500">Administrateur</p>
                </div>
                <a href="index.html" class="text-slate-500 hover:text-red-400 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </a>
            </div>
        </div>
    </aside>

    <!-- Main content -->
    <main class="flex-1 ml-64 p-8">

        <!-- ===== STATISTICS SECTION ===== -->
        <div id="section-stats">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-white">Vue d'ensemble</h1>
                <p class="text-slate-400 text-sm mt-1">Performances du réseau EVolt</p>
            </div>

            <!-- KPI row -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="glass rounded-2xl p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 rounded-xl bg-brand-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-xs text-brand-400 bg-brand-500/10 px-2 py-1 rounded-lg font-medium">+8%</span>
                    </div>
                    <p class="text-3xl font-bold text-white">47</p>
                    <p class="text-sm text-slate-400 mt-0.5">Bornes actives</p>
                </div>
                <div class="glass rounded-2xl p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <span class="text-xs text-amber-400 bg-amber-500/10 px-2 py-1 rounded-lg font-medium">73%</span>
                    </div>
                    <p class="text-3xl font-bold text-white">34/47</p>
                    <p class="text-sm text-slate-400 mt-0.5">Taux d'occupation</p>
                </div>
                <div class="glass rounded-2xl p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-xs text-blue-400 bg-blue-500/10 px-2 py-1 rounded-lg font-medium">+22%</span>
                    </div>
                    <p class="text-3xl font-bold text-white">18.4</p>
                    <p class="text-sm text-slate-400 mt-0.5">MWh délivrés / mois</p>
                </div>
                <div class="glass rounded-2xl p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 rounded-xl bg-purple-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <span
                            class="text-xs text-purple-400 bg-purple-500/10 px-2 py-1 rounded-lg font-medium">+15%</span>
                    </div>
                    <p class="text-3xl font-bold text-white">1,248</p>
                    <p class="text-sm text-slate-400 mt-0.5">Utilisateurs actifs</p>
                </div>
            </div>

            <!-- Charts row -->
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <!-- Occupation chart -->
                <div class="glass rounded-2xl p-6">
                    <h3 class="font-semibold text-white mb-4">Taux d'occupation par heure</h3>
                    <div class="flex items-end gap-1.5 h-32 mt-4">
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-t bg-brand-600/30" style="height:20%"></div>
                            <span class="text-xs text-slate-600">0h</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-t bg-brand-600/30" style="height:15%"></div>
                            <span class="text-xs text-slate-600">2h</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-t bg-brand-600/30" style="height:10%"></div>
                            <span class="text-xs text-slate-600">4h</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-t bg-brand-600/50" style="height:35%"></div>
                            <span class="text-xs text-slate-600">6h</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-t"
                                style="height:80%;background:linear-gradient(to top,#059669,#34d399)"></div>
                            <span class="text-xs text-slate-500">8h</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-t"
                                style="height:95%;background:linear-gradient(to top,#059669,#34d399)"></div>
                            <span class="text-xs text-slate-500">10h</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-t"
                                style="height:100%;background:linear-gradient(to top,#059669,#34d399)"></div>
                            <span class="text-xs text-slate-500">12h</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-t"
                                style="height:90%;background:linear-gradient(to top,#059669,#34d399)"></div>
                            <span class="text-xs text-slate-500">14h</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-t"
                                style="height:85%;background:linear-gradient(to top,#059669,#34d399)"></div>
                            <span class="text-xs text-slate-500">16h</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-t"
                                style="height:75%;background:linear-gradient(to top,#059669,#34d399)"></div>
                            <span class="text-xs text-slate-500">18h</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-t bg-brand-600/50" style="height:50%"></div>
                            <span class="text-xs text-slate-600">20h</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-t bg-brand-600/30" style="height:30%"></div>
                            <span class="text-xs text-slate-600">22h</span>
                        </div>
                    </div>
                </div>
                <!-- Energy by connector type -->
                <div class="glass rounded-2xl p-6">
                    <h3 class="font-semibold text-white mb-5">Énergie par type de connecteur</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-sm mb-1.5">
                                <span class="text-slate-300">CCS Combo</span>
                                <span class="text-brand-400 font-medium">8.2 MWh <span
                                        class="text-slate-500 font-normal">(45%)</span></span>
                            </div>
                            <div class="h-2 bg-dark-900 rounded-full overflow-hidden">
                                <div class="progress-bar h-full" style="width:45%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1.5">
                                <span class="text-slate-300">Type 2</span>
                                <span class="text-brand-400 font-medium">5.5 MWh <span
                                        class="text-slate-500 font-normal">(30%)</span></span>
                            </div>
                            <div class="h-2 bg-dark-900 rounded-full overflow-hidden">
                                <div class="progress-bar h-full" style="width:30%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1.5">
                                <span class="text-slate-300">CHAdeMO</span>
                                <span class="text-brand-400 font-medium">3.1 MWh <span
                                        class="text-slate-500 font-normal">(17%)</span></span>
                            </div>
                            <div class="h-2 bg-dark-900 rounded-full overflow-hidden">
                                <div class="progress-bar h-full" style="width:17%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1.5">
                                <span class="text-slate-300">Tesla</span>
                                <span class="text-brand-400 font-medium">1.6 MWh <span
                                        class="text-slate-500 font-normal">(8%)</span></span>
                            </div>
                            <div class="h-2 bg-dark-900 rounded-full overflow-hidden">
                                <div class="progress-bar h-full" style="width:8%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== STATIONS SECTION ===== -->
        <div id="section-stations" class="hidden">
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-white">Gestion des bornes</h1>
                    <p class="text-slate-400 text-sm mt-1">Ajoutez, modifiez ou supprimez des bornes</p>
                </div>
                <button onclick="openStationModal()"
                    class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-brand-600 to-brand-500 text-white text-sm font-semibold hover:from-brand-500 hover:to-brand-400 transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Ajouter une borne
                </button>
            </div>

            <!-- Search bar -->
            <div class="flex gap-3 mb-6">
                <div class="flex-1 relative">
                    <svg class="absolute left-3.5 top-3.5 w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" placeholder="Rechercher une borne..."
                        class="w-full bg-dark-900 border border-slate-700 rounded-xl pl-10 pr-4 py-3 text-sm text-white placeholder-slate-500 transition-all" />
                </div>
                <select
                    class="bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white appearance-none cursor-pointer">
                    <option>Tous statuts</option>
                    <option>Disponible</option>
                    <option>Occupée</option>
                    <option>Hors ligne</option>
                </select>
                <select
                    class="bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white appearance-none cursor-pointer">
                    <option>Tous connecteurs</option>
                    <option>CCS</option>
                    <option>Type 2</option>
                    <option>CHAdeMO</option>
                </select>
            </div>

            <!-- Table -->
            <div class="glass rounded-2xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-800/60">
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Borne</th>
                            <th
                                class="px-4 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Connecteur</th>
                            <th
                                class="px-4 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Puissance</th>
                            <th
                                class="px-4 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Statut</th>
                            <th
                                class="px-4 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Occupation</th>
                            <th
                                class="px-4 py-4 text-right text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        <tr class="hover:bg-dark-900/50 transition">
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">Westfield Paris 15</div>
                                <div class="text-xs text-slate-400">12 Rue du Commerce</div>
                            </td>
                            <td class="px-4 py-4 text-slate-300">CCS Combo</td>
                            <td class="px-4 py-4"><span class="text-brand-400 font-semibold">150 kW</span></td>
                            <td class="px-4 py-4"><span
                                    class="badge-available text-xs px-2.5 py-1 rounded-full font-medium">Disponible</span>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="flex-1 h-1.5 bg-dark-900 rounded-full overflow-hidden max-w-16">
                                        <div class="bg-brand-500 h-full rounded-full" style="width:73%"></div>
                                    </div>
                                    <span class="text-xs text-slate-400">73%</span>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button onclick="openStationModal()"
                                        class="p-2 rounded-lg bg-dark-900 border border-slate-700 text-slate-400 hover:text-brand-400 hover:border-brand-500/40 transition">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button onclick="openDeleteModal()"
                                        class="p-2 rounded-lg bg-dark-900 border border-slate-700 text-slate-400 hover:text-red-400 hover:border-red-500/40 transition">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-dark-900/50 transition">
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">Gare Montparnasse</div>
                                <div class="text-xs text-slate-400">Place Raoul Dautry</div>
                            </td>
                            <td class="px-4 py-4 text-slate-300">Type 2</td>
                            <td class="px-4 py-4"><span class="text-brand-400 font-semibold">22 kW</span></td>
                            <td class="px-4 py-4"><span
                                    class="badge-available text-xs px-2.5 py-1 rounded-full font-medium">Disponible</span>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="flex-1 h-1.5 bg-dark-900 rounded-full overflow-hidden max-w-16">
                                        <div class="bg-brand-500 h-full rounded-full" style="width:58%"></div>
                                    </div>
                                    <span class="text-xs text-slate-400">58%</span>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button onclick="openStationModal()"
                                        class="p-2 rounded-lg bg-dark-900 border border-slate-700 text-slate-400 hover:text-brand-400 hover:border-brand-500/40 transition">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button onclick="openDeleteModal()"
                                        class="p-2 rounded-lg bg-dark-900 border border-slate-700 text-slate-400 hover:text-red-400 hover:border-red-500/40 transition">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-dark-900/50 transition">
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">Carrefour Grenelle</div>
                                <div class="text-xs text-slate-400">45 Bd de Grenelle</div>
                            </td>
                            <td class="px-4 py-4 text-slate-300">CHAdeMO</td>
                            <td class="px-4 py-4"><span class="text-amber-400 font-semibold">50 kW</span></td>
                            <td class="px-4 py-4"><span
                                    class="badge-busy text-xs px-2.5 py-1 rounded-full font-medium">Occupée</span></td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="flex-1 h-1.5 bg-dark-900 rounded-full overflow-hidden max-w-16">
                                        <div class="bg-amber-500 h-full rounded-full" style="width:92%"></div>
                                    </div>
                                    <span class="text-xs text-slate-400">92%</span>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button onclick="openStationModal()"
                                        class="p-2 rounded-lg bg-dark-900 border border-slate-700 text-slate-400 hover:text-brand-400 hover:border-brand-500/40 transition">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button onclick="openDeleteModal()"
                                        class="p-2 rounded-lg bg-dark-900 border border-slate-700 text-slate-400 hover:text-red-400 hover:border-red-500/40 transition">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-dark-900/50 transition opacity-60">
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">Parking République</div>
                                <div class="text-xs text-slate-400">Place de la République</div>
                            </td>
                            <td class="px-4 py-4 text-slate-300">CCS</td>
                            <td class="px-4 py-4"><span class="text-slate-400 font-semibold">100 kW</span></td>
                            <td class="px-4 py-4"><span
                                    class="badge-offline text-xs px-2.5 py-1 rounded-full font-medium">Hors ligne</span>
                            </td>
                            <td class="px-4 py-4"><span class="text-xs text-slate-500">—</span></td>
                            <td class="px-4 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button onclick="openStationModal()"
                                        class="p-2 rounded-lg bg-dark-900 border border-slate-700 text-slate-400 hover:text-brand-400 hover:border-brand-500/40 transition">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button onclick="openDeleteModal()"
                                        class="p-2 rounded-lg bg-dark-900 border border-slate-700 text-slate-400 hover:text-red-400 hover:border-red-500/40 transition">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ===== USERS SECTION ===== -->
        <div id="section-users" class="hidden">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-white">Utilisateurs</h1>
                <p class="text-slate-400 text-sm mt-1">Gérez les comptes utilisateurs</p>
            </div>
            <div class="glass rounded-2xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-800/60">
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Utilisateur</th>
                            <th
                                class="px-4 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Rôle</th>
                            <th
                                class="px-4 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Sessions</th>
                            <th
                                class="px-4 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                kWh total</th>
                            <th
                                class="px-4 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Inscrit le</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        <tr class="hover:bg-dark-900/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-9 h-9 rounded-xl bg-brand-500/20 flex items-center justify-center text-sm font-bold text-brand-400">
                                        JD</div>
                                    <div>
                                        <div class="font-medium text-white">Jean Dupont</div>
                                        <div class="text-xs text-slate-400">jean.dupont@email.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4"><span
                                    class="text-xs px-2.5 py-1 rounded-full bg-brand-500/15 text-brand-400 border border-brand-500/30 font-medium">Utilisateur</span>
                            </td>
                            <td class="px-4 py-4 text-slate-300">28</td>
                            <td class="px-4 py-4 text-brand-400 font-medium">342 kWh</td>
                            <td class="px-4 py-4 text-slate-400 text-xs">1 janv. 2025</td>
                        </tr>
                        <tr class="hover:bg-dark-900/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-9 h-9 rounded-xl bg-blue-500/20 flex items-center justify-center text-sm font-bold text-blue-400">
                                        ML</div>
                                    <div>
                                        <div class="font-medium text-white">Marie Lambert</div>
                                        <div class="text-xs text-slate-400">marie.lambert@email.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4"><span
                                    class="text-xs px-2.5 py-1 rounded-full bg-brand-500/15 text-brand-400 border border-brand-500/30 font-medium">Utilisateur</span>
                            </td>
                            <td class="px-4 py-4 text-slate-300">15</td>
                            <td class="px-4 py-4 text-brand-400 font-medium">189 kWh</td>
                            <td class="px-4 py-4 text-slate-400 text-xs">15 fév. 2025</td>
                        </tr>
                        <tr class="hover:bg-dark-900/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-9 h-9 rounded-xl bg-purple-500/20 flex items-center justify-center text-sm font-bold text-purple-400">
                                        AD</div>
                                    <div>
                                        <div class="font-medium text-white">Admin</div>
                                        <div class="text-xs text-slate-400">admin@evolt.fr</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4"><span
                                    class="text-xs px-2.5 py-1 rounded-full bg-purple-500/15 text-purple-400 border border-purple-500/30 font-medium">Administrateur</span>
                            </td>
                            <td class="px-4 py-4 text-slate-300">—</td>
                            <td class="px-4 py-4 text-slate-400">—</td>
                            <td class="px-4 py-4 text-slate-400 text-xs">1 jan. 2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- Add/Edit Station Modal -->
    <div id="stationModal" class="fixed inset-0 z-50 modal-bg flex items-center justify-center p-4 hidden">
        <div class="glass rounded-2xl p-6 w-full max-w-lg shadow-2xl max-h-screen overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold">Ajouter / Modifier une borne</h3>
                <button onclick="closeModal('stationModal')" class="text-slate-400 hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Nom de la borne</label>
                    <input type="text" placeholder="Ex: Westfield Paris 15" value="Westfield Paris 15"
                        class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white transition-all" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Adresse</label>
                    <input type="text" placeholder="12 Rue du Commerce, Paris 15e" value="12 Rue du Commerce, Paris 15e"
                        class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white transition-all" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Type de connecteur</label>
                        <select
                            class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white appearance-none cursor-pointer transition-all">
                            <option>CCS Combo</option>
                            <option>Type 2</option>
                            <option>CHAdeMO</option>
                            <option>Tesla</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Puissance (kW)</label>
                        <input type="number" placeholder="150" value="150"
                            class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white transition-all" />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Latitude</label>
                        <input type="text" placeholder="48.8566" value="48.8467"
                            class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white transition-all" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Longitude</label>
                        <input type="text" placeholder="2.3522" value="2.2925"
                            class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white transition-all" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Statut</label>
                    <select
                        class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white appearance-none cursor-pointer transition-all">
                        <option>Disponible</option>
                        <option>Hors ligne</option>
                        <option>Maintenance</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Prix / kWh (€)</label>
                    <input type="number" step="0.01" placeholder="0.35" value="0.35"
                        class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white transition-all" />
                </div>
                <div class="flex gap-3 mt-6 pt-2">
                    <button onclick="closeModal('stationModal')"
                        class="flex-1 py-2.5 rounded-xl text-sm border border-slate-700 text-slate-400 hover:text-white transition">Annuler</button>
                    <button onclick="closeModal('stationModal')"
                        class="flex-1 py-2.5 rounded-xl text-sm font-semibold bg-gradient-to-r from-brand-600 to-brand-500 text-white hover:from-brand-500 hover:to-brand-400 transition">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 modal-bg flex items-center justify-center p-4 hidden">
        <div class="glass rounded-2xl p-6 w-full max-w-md shadow-2xl text-center">
            <div class="w-16 h-16 rounded-2xl bg-red-500/20 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </div>
            <h3 class="text-lg font-bold mb-2">Supprimer cette borne ?</h3>
            <p class="text-slate-400 text-sm mb-6">Cette action est irréversible. Toutes les réservations associées
                seront annulées.</p>
            <div class="flex gap-3">
                <button onclick="closeModal('deleteModal')"
                    class="flex-1 py-2.5 rounded-xl text-sm border border-slate-700 text-slate-400 hover:text-white transition">Annuler</button>
                <button onclick="closeModal('deleteModal')"
                    class="flex-1 py-2.5 rounded-xl text-sm font-semibold bg-red-600 hover:bg-red-500 text-white transition">Supprimer</button>
            </div>
        </div>
    </div>

    <script>
        function showSection(name) {
            ['stats', 'stations', 'users'].forEach(s => document.getElementById('section-' + s).classList.add('hidden'));
            document.getElementById('section-' + name).classList.remove('hidden');
            document.querySelectorAll('.sidebar-link').forEach(l => l.classList.remove('active'));
            event.currentTarget.classList.add('active');
        }
        function openStationModal() { document.getElementById('stationModal').classList.remove('hidden'); }
        function openDeleteModal() { document.getElementById('deleteModal').classList.remove('hidden'); }
        function closeModal(id) { document.getElementById(id).classList.add('hidden'); }
    </script>
</body>

</html>