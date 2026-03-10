<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EVolt — Historique de recharge</title>
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

        .stat-card {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(30, 41, 59, 0.6) 100%);
        }

        .chart-bar {
            background: linear-gradient(to top, #059669, #34d399);
            border-radius: 4px 4px 0 0;
            transition: height .3s ease;
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

<body class="min-h-screen bg-dark-950 text-white">

    <!-- Navbar -->
    <nav class="glass border-b border-slate-800/60 px-6 py-3.5 flex items-center justify-between sticky top-0 z-10">
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
                class="px-4 py-2 text-sm font-medium rounded-lg text-slate-400 hover:text-white transition">Carte</a>
            <a href="reservations.html"
                class="px-4 py-2 text-sm font-medium rounded-lg text-slate-400 hover:text-white transition">Réservations</a>
            <a href="history.html"
                class="px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-r from-brand-600 to-brand-500 text-white">Historique</a>
        </div>
        <div class="flex items-center gap-2.5">
            <div
                class="w-9 h-9 rounded-xl bg-gradient-to-br from-brand-600/30 to-brand-800/30 border border-brand-500/30 flex items-center justify-center text-sm font-bold text-brand-400">
                JD</div>
            <div class="hidden md:block">
                <p class="text-sm font-medium">Jean Dupont</p>
                <p class="text-xs text-slate-500">Utilisateur</p>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-4 py-8">

        <!-- Header -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-white">Historique de recharge</h1>
                <p class="text-slate-400 text-sm mt-1">Suivez vos sessions passées et actuelles</p>
            </div>
            <div class="flex items-center gap-2">
                <select
                    class="bg-dark-900 border border-slate-700 rounded-xl px-4 py-2.5 text-sm text-white appearance-none cursor-pointer">
                    <option>30 derniers jours</option>
                    <option>3 derniers mois</option>
                    <option>6 derniers mois</option>
                    <option>Cette année</option>
                </select>
                <button
                    class="p-2.5 bg-dark-900 border border-slate-700 rounded-xl text-slate-400 hover:text-brand-400 transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- KPI Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="glass rounded-2xl p-5 stat-card">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl bg-brand-500/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <p class="text-xs text-slate-400 font-medium">Énergie totale</p>
                </div>
                <p class="text-3xl font-bold text-white">342</p>
                <p class="text-sm text-brand-400 font-medium">kWh</p>
                <p class="text-xs text-slate-500 mt-1">+12% vs. mois dernier</p>
            </div>
            <div class="glass rounded-2xl p-5 stat-card">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <p class="text-xs text-slate-400 font-medium">Sessions</p>
                </div>
                <p class="text-3xl font-bold text-white">28</p>
                <p class="text-sm text-blue-400 font-medium">sessions</p>
                <p class="text-xs text-slate-500 mt-1">~1 session / jour</p>
            </div>
            <div class="glass rounded-2xl p-5 stat-card">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl bg-purple-500/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-xs text-slate-400 font-medium">Durée totale</p>
                </div>
                <p class="text-3xl font-bold text-white">47h</p>
                <p class="text-sm text-purple-400 font-medium">de recharge</p>
                <p class="text-xs text-slate-500 mt-1">Moy. 1h41 / session</p>
            </div>
            <div class="glass rounded-2xl p-5 stat-card">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-xs text-slate-400 font-medium">Coût total</p>
                </div>
                <p class="text-3xl font-bold text-white">119€</p>
                <p class="text-sm text-amber-400 font-medium">ce mois</p>
                <p class="text-xs text-slate-500 mt-1">Moy. 4,25€ / session</p>
            </div>
        </div>

        <!-- Chart + table layout -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <!-- Chart -->
            <div class="md:col-span-2 glass rounded-2xl p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-semibold text-white">Énergie rechargée (kWh)</h2>
                    <div class="flex gap-2">
                        <button
                            class="text-xs px-3 py-1.5 rounded-lg bg-brand-600/20 text-brand-400 border border-brand-500/30 font-medium">Semaine</button>
                        <button
                            class="text-xs px-3 py-1.5 rounded-lg text-slate-400 hover:text-white transition font-medium">Mois</button>
                    </div>
                </div>
                <!-- Simple bar chart -->
                <div class="flex items-end gap-3 h-40">
                    <div class="flex-1 flex flex-col items-center gap-1">
                        <span class="text-xs text-slate-500">18</span>
                        <div class="chart-bar w-full" style="height:45%"></div>
                        <span class="text-xs text-slate-500">Lun</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-1">
                        <span class="text-xs text-slate-500">32</span>
                        <div class="chart-bar w-full" style="height:75%"></div>
                        <span class="text-xs text-slate-500">Mar</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-1">
                        <span class="text-xs text-slate-500">12</span>
                        <div class="chart-bar w-full" style="height:28%"></div>
                        <span class="text-xs text-slate-500">Mer</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-1">
                        <span class="text-xs text-slate-500">42</span>
                        <div class="chart-bar w-full" style="height:100%"></div>
                        <span class="text-xs text-slate-500">Jeu</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-1">
                        <span class="text-xs text-slate-500">28</span>
                        <div class="chart-bar w-full" style="height:65%"></div>
                        <span class="text-xs text-slate-500">Ven</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-1">
                        <span class="text-xs text-slate-500">38</span>
                        <div class="chart-bar w-full" style="height:90%"></div>
                        <span class="text-xs text-slate-500">Sam</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-1">
                        <span class="text-xs text-slate-500">22</span>
                        <div class="chart-bar w-full" style="height:52%"></div>
                        <span class="text-xs text-slate-500">Dim</span>
                    </div>
                </div>
            </div>
            <!-- Top stations -->
            <div class="glass rounded-2xl p-6">
                <h2 class="font-semibold text-white mb-4">Bornes favorites</h2>
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-lg bg-brand-500/20 flex items-center justify-center text-xs font-bold text-brand-400">
                            1</div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-white truncate">Westfield</p>
                            <p class="text-xs text-slate-400">9 sessions</p>
                        </div>
                        <span class="text-xs text-brand-400 font-medium">142 kWh</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-lg bg-slate-700/40 flex items-center justify-center text-xs font-bold text-slate-400">
                            2</div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-white truncate">Montparnasse</p>
                            <p class="text-xs text-slate-400">7 sessions</p>
                        </div>
                        <span class="text-xs text-brand-400 font-medium">98 kWh</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-lg bg-slate-700/40 flex items-center justify-center text-xs font-bold text-slate-400">
                            3</div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-white truncate">République</p>
                            <p class="text-xs text-slate-400">5 sessions</p>
                        </div>
                        <span class="text-xs text-brand-400 font-medium">61 kWh</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-lg bg-slate-700/40 flex items-center justify-center text-xs font-bold text-slate-400">
                            4</div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-white truncate">Carrefour</p>
                            <p class="text-xs text-slate-400">4 sessions</p>
                        </div>
                        <span class="text-xs text-brand-400 font-medium">41 kWh</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sessions table -->
        <div class="glass rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-800/60 flex justify-between items-center">
                <h2 class="font-semibold text-white">Sessions récentes</h2>
                <span class="text-xs text-slate-500">28 sessions au total</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-800/60">
                            <th
                                class="px-6 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Borne</th>
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Date</th>
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Durée</th>
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Énergie</th>
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Coût</th>
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        <tr class="hover:bg-dark-900/50 transition">
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">Westfield Paris 15</div>
                                <div class="text-xs text-slate-400">CCS · 150 kW</div>
                            </td>
                            <td class="px-4 py-4 text-slate-300 whitespace-nowrap">15 juin 2025<br /><span
                                    class="text-xs text-slate-500">13:15 – 14:45</span></td>
                            <td class="px-4 py-4 text-slate-300">1h30</td>
                            <td class="px-4 py-4">
                                <span class="text-brand-400 font-semibold">42.3 kWh</span>
                            </td>
                            <td class="px-4 py-4 text-slate-300">14,81 €</td>
                            <td class="px-4 py-4">
                                <span
                                    class="text-xs px-2.5 py-1 rounded-full bg-green-500/15 text-green-400 border border-green-500/30 font-medium">Terminée</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-dark-900/50 transition">
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">Gare Montparnasse</div>
                                <div class="text-xs text-slate-400">Type 2 · 22 kW</div>
                            </td>
                            <td class="px-4 py-4 text-slate-300 whitespace-nowrap">13 juin 2025<br /><span
                                    class="text-xs text-slate-500">09:00 – 11:30</span></td>
                            <td class="px-4 py-4 text-slate-300">2h30</td>
                            <td class="px-4 py-4">
                                <span class="text-brand-400 font-semibold">28.6 kWh</span>
                            </td>
                            <td class="px-4 py-4 text-slate-300">10,51 €</td>
                            <td class="px-4 py-4">
                                <span
                                    class="text-xs px-2.5 py-1 rounded-full bg-green-500/15 text-green-400 border border-green-500/30 font-medium">Terminée</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-dark-900/50 transition">
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">Carrefour Grenelle</div>
                                <div class="text-xs text-slate-400">CHAdeMO · 50 kW</div>
                            </td>
                            <td class="px-4 py-4 text-slate-300 whitespace-nowrap">11 juin 2025<br /><span
                                    class="text-xs text-slate-500">18:00 – 18:45</span></td>
                            <td class="px-4 py-4 text-slate-300">45 min</td>
                            <td class="px-4 py-4">
                                <span class="text-brand-400 font-semibold">20.1 kWh</span>
                            </td>
                            <td class="px-4 py-4 text-slate-300">7,54 €</td>
                            <td class="px-4 py-4">
                                <span
                                    class="text-xs px-2.5 py-1 rounded-full bg-green-500/15 text-green-400 border border-green-500/30 font-medium">Terminée</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-dark-900/50 transition">
                            <td class="px-6 py-4">
                                <div class="font-medium text-white">Parking République</div>
                                <div class="text-xs text-slate-400">CCS · 100 kW</div>
                            </td>
                            <td class="px-4 py-4 text-slate-300 whitespace-nowrap">9 juin 2025<br /><span
                                    class="text-xs text-slate-500">12:30 – 13:45</span></td>
                            <td class="px-4 py-4 text-slate-300">1h15</td>
                            <td class="px-4 py-4">
                                <span class="text-slate-400 font-semibold">—</span>
                            </td>
                            <td class="px-4 py-4 text-slate-400">—</td>
                            <td class="px-4 py-4">
                                <span
                                    class="text-xs px-2.5 py-1 rounded-full bg-red-500/15 text-red-400 border border-red-500/30 font-medium">Interrompue</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-slate-800/60 flex justify-between items-center">
                <span class="text-xs text-slate-500">Page 1 sur 4</span>
                <div class="flex gap-2">
                    <button
                        class="px-3 py-1.5 rounded-lg text-xs border border-slate-700 text-slate-400 hover:text-white transition">Précédent</button>
                    <button
                        class="px-3 py-1.5 rounded-lg text-xs border border-brand-500/40 text-brand-400 hover:bg-brand-500/10 transition">Suivant</button>
                </div>
            </div>
        </div>

    </div>
</body>

</html>