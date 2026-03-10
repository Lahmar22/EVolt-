<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EVolt — Mes réservations</title>
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

        .badge-upcoming {
            background: rgba(59, 130, 246, 0.15);
            color: #93c5fd;
            border: 1px solid rgba(147, 197, 253, 0.3);
        }

        .badge-active {
            background: rgba(16, 185, 129, 0.15);
            color: #34d399;
            border: 1px solid rgba(52, 211, 153, 0.3);
        }

        .badge-cancelled {
            background: rgba(100, 116, 139, 0.12);
            color: #94a3b8;
            border: 1px solid rgba(148, 163, 184, 0.2);
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #34d399;
            box-shadow: 0 0 0 3px rgba(52, 211, 153, 0.12);
        }

        .modal-bg {
            background: rgba(2, 6, 23, 0.85);
            backdrop-filter: blur(8px);
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
                class="px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-r from-brand-600 to-brand-500 text-white">Réservations</a>
            <a href="history.html"
                class="px-4 py-2 text-sm font-medium rounded-lg text-slate-400 hover:text-white transition">Historique</a>
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

    <div class="max-w-4xl mx-auto px-4 py-8">

        <!-- Header -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-white">Mes réservations</h1>
                <p class="text-slate-400 text-sm mt-1">Gérez vos créneaux de recharge</p>
            </div>
            <a href="dashboard.html"
                class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-brand-600 to-brand-500 text-white text-sm font-semibold hover:from-brand-500 hover:to-brand-400 transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nouvelle réservation
            </a>
        </div>

        <!-- Tabs -->
        <div class="flex gap-2 mb-6 bg-dark-900 rounded-xl p-1 w-fit">
            <button onclick="filterTab('all')" id="tab-all"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-all bg-gradient-to-r from-brand-600 to-brand-500 text-white">Toutes
                (4)</button>
            <button onclick="filterTab('upcoming')" id="tab-upcoming"
                class="px-4 py-2 rounded-lg text-sm font-medium text-slate-400 hover:text-white transition-all">À venir
                (2)</button>
            <button onclick="filterTab('active')" id="tab-active"
                class="px-4 py-2 rounded-lg text-sm font-medium text-slate-400 hover:text-white transition-all">En cours
                (1)</button>
            <button onclick="filterTab('cancelled')" id="tab-cancelled"
                class="px-4 py-2 rounded-lg text-sm font-medium text-slate-400 hover:text-white transition-all">Annulées
                (1)</button>
        </div>

        <!-- Reservation Cards -->
        <div class="space-y-4" id="reservationList">

            <!-- Active (en cours) -->
            <div class="glass rounded-2xl p-6 border-l-4 border-brand-500" data-status="active">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 rounded-xl bg-brand-500/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white">Westfield — CCS 150 kW</h3>
                            <p class="text-xs text-slate-400 mt-0.5">12 Rue du Commerce, Paris 15e</p>
                        </div>
                    </div>
                    <span class="badge-active text-xs px-2.5 py-1 rounded-full font-medium whitespace-nowrap">● En
                        cours</span>
                </div>
                <div class="grid grid-cols-3 gap-3 mb-4">
                    <div class="bg-dark-900 rounded-xl p-3 text-center">
                        <p class="text-xs text-slate-400 mb-1">Démarrage</p>
                        <p class="text-sm font-semibold text-white">13:15</p>
                    </div>
                    <div class="bg-dark-900 rounded-xl p-3 text-center">
                        <p class="text-xs text-slate-400 mb-1">Durée</p>
                        <p class="text-sm font-semibold text-white">1h30</p>
                    </div>
                    <div class="bg-dark-900 rounded-xl p-3 text-center">
                        <p class="text-xs text-slate-400 mb-1">Fin prévue</p>
                        <p class="text-sm font-semibold text-brand-400">14:45</p>
                    </div>
                </div>
                <!-- Progress -->
                <div class="mb-4">
                    <div class="flex justify-between text-xs text-slate-400 mb-1.5"><span>Progression</span><span
                            class="text-brand-400 font-medium">42 kWh · 35%</span></div>
                    <div class="h-2 bg-dark-900 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-brand-600 to-brand-400 rounded-full" style="width:35%">
                        </div>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button
                        class="flex-1 py-2.5 rounded-xl text-sm font-medium border border-red-500/40 text-red-400 hover:bg-red-500/10 transition">Arrêter
                        la session</button>
                </div>
            </div>

            <!-- Upcoming 1 -->
            <div class="glass rounded-2xl p-6 border-l-4 border-blue-500/60" data-status="upcoming">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white">Gare Montparnasse — Type 2</h3>
                            <p class="text-xs text-slate-400 mt-0.5">Place Raoul Dautry, Paris 14e</p>
                        </div>
                    </div>
                    <span class="badge-upcoming text-xs px-2.5 py-1 rounded-full font-medium whitespace-nowrap">À
                        venir</span>
                </div>
                <div class="grid grid-cols-3 gap-3 mb-4">
                    <div class="bg-dark-900 rounded-xl p-3 text-center">
                        <p class="text-xs text-slate-400 mb-1">Date</p>
                        <p class="text-sm font-semibold text-white">16 juin</p>
                    </div>
                    <div class="bg-dark-900 rounded-xl p-3 text-center">
                        <p class="text-xs text-slate-400 mb-1">Heure</p>
                        <p class="text-sm font-semibold text-white">09:00</p>
                    </div>
                    <div class="bg-dark-900 rounded-xl p-3 text-center">
                        <p class="text-xs text-slate-400 mb-1">Durée</p>
                        <p class="text-sm font-semibold text-white">2h</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button onclick="openEditModal()"
                        class="flex-1 py-2.5 rounded-xl text-sm font-medium border border-brand-500/40 text-brand-400 hover:bg-brand-500/10 transition flex items-center justify-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Modifier
                    </button>
                    <button onclick="openCancelModal()"
                        class="flex-1 py-2.5 rounded-xl text-sm font-medium border border-red-500/40 text-red-400 hover:bg-red-500/10 transition flex items-center justify-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Annuler
                    </button>
                </div>
            </div>

            <!-- Upcoming 2 -->
            <div class="glass rounded-2xl p-6 border-l-4 border-blue-500/60" data-status="upcoming">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white">Westfield — CCS 150 kW</h3>
                            <p class="text-xs text-slate-400 mt-0.5">12 Rue du Commerce, Paris 15e</p>
                        </div>
                    </div>
                    <span class="badge-upcoming text-xs px-2.5 py-1 rounded-full font-medium whitespace-nowrap">À
                        venir</span>
                </div>
                <div class="grid grid-cols-3 gap-3 mb-4">
                    <div class="bg-dark-900 rounded-xl p-3 text-center">
                        <p class="text-xs text-slate-400 mb-1">Date</p>
                        <p class="text-sm font-semibold text-white">18 juin</p>
                    </div>
                    <div class="bg-dark-900 rounded-xl p-3 text-center">
                        <p class="text-xs text-slate-400 mb-1">Heure</p>
                        <p class="text-sm font-semibold text-white">16:30</p>
                    </div>
                    <div class="bg-dark-900 rounded-xl p-3 text-center">
                        <p class="text-xs text-slate-400 mb-1">Durée</p>
                        <p class="text-sm font-semibold text-white">1h</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button onclick="openEditModal()"
                        class="flex-1 py-2.5 rounded-xl text-sm font-medium border border-brand-500/40 text-brand-400 hover:bg-brand-500/10 transition flex items-center justify-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Modifier
                    </button>
                    <button onclick="openCancelModal()"
                        class="flex-1 py-2.5 rounded-xl text-sm font-medium border border-red-500/40 text-red-400 hover:bg-red-500/10 transition flex items-center justify-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Annuler
                    </button>
                </div>
            </div>

            <!-- Cancelled -->
            <div class="glass rounded-2xl p-6 border-l-4 border-slate-700 opacity-70" data-status="cancelled">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 rounded-xl bg-slate-700/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-400 line-through">Carrefour Grenelle — CHAdeMO</h3>
                            <p class="text-xs text-slate-500 mt-0.5">45 Bd de Grenelle, Paris 15e</p>
                        </div>
                    </div>
                    <span
                        class="badge-cancelled text-xs px-2.5 py-1 rounded-full font-medium whitespace-nowrap">Annulée</span>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="bg-dark-900 rounded-xl p-3 text-center">
                        <p class="text-xs text-slate-500 mb-1">Date</p>
                        <p class="text-sm font-medium text-slate-500">14 juin</p>
                    </div>
                    <div class="bg-dark-900 rounded-xl p-3 text-center">
                        <p class="text-xs text-slate-500 mb-1">Heure</p>
                        <p class="text-sm font-medium text-slate-500">11:00</p>
                    </div>
                    <div class="bg-dark-900 rounded-xl p-3 text-center">
                        <p class="text-xs text-slate-500 mb-1">Durée</p>
                        <p class="text-sm font-medium text-slate-500">30 min</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 z-50 modal-bg flex items-center justify-center p-4 hidden">
        <div class="glass rounded-2xl p-6 w-full max-w-md shadow-2xl">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold">Modifier la réservation</h3>
                <button onclick="closeModal('editModal')" class="text-slate-400 hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Nouvelle heure de début</label>
                    <input type="time" value="09:00"
                        class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white transition-all" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Nouvelle durée</label>
                    <select
                        class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white transition-all appearance-none">
                        <option>30 min</option>
                        <option>1h</option>
                        <option selected>2h</option>
                        <option>3h</option>
                    </select>
                </div>
                <div class="flex gap-3 mt-6">
                    <button onclick="closeModal('editModal')"
                        class="flex-1 py-2.5 rounded-xl text-sm border border-slate-700 text-slate-400 hover:text-white transition">Annuler</button>
                    <button onclick="closeModal('editModal')"
                        class="flex-1 py-2.5 rounded-xl text-sm font-semibold bg-gradient-to-r from-brand-600 to-brand-500 text-white hover:from-brand-500 hover:to-brand-400 transition">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cancel Modal -->
    <div id="cancelModal" class="fixed inset-0 z-50 modal-bg flex items-center justify-center p-4 hidden">
        <div class="glass rounded-2xl p-6 w-full max-w-md shadow-2xl text-center">
            <div class="w-16 h-16 rounded-2xl bg-red-500/20 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-lg font-bold mb-2">Annuler la réservation ?</h3>
            <p class="text-slate-400 text-sm mb-6">Cette action est irréversible. Votre créneau sera libéré pour
                d'autres utilisateurs.</p>
            <div class="flex gap-3">
                <button onclick="closeModal('cancelModal')"
                    class="flex-1 py-2.5 rounded-xl text-sm border border-slate-700 text-slate-400 hover:text-white transition">Garder</button>
                <button onclick="closeModal('cancelModal')"
                    class="flex-1 py-2.5 rounded-xl text-sm font-semibold bg-red-600 hover:bg-red-500 text-white transition">Oui,
                    annuler</button>
            </div>
        </div>
    </div>

    <script>
        function openEditModal() { document.getElementById('editModal').classList.remove('hidden'); }
        function openCancelModal() { document.getElementById('cancelModal').classList.remove('hidden'); }
        function closeModal(id) { document.getElementById(id).classList.add('hidden'); }
        function filterTab(tab) {
            const tabs = ['all', 'upcoming', 'active', 'cancelled'];
            tabs.forEach(t => {
                const el = document.getElementById('tab-' + t);
                el.className = 'px-4 py-2 rounded-lg text-sm font-medium transition-all ' + (t === tab ? 'bg-gradient-to-r from-brand-600 to-brand-500 text-white' : 'text-slate-400 hover:text-white');
            });
            document.querySelectorAll('#reservationList > div').forEach(card => {
                if (tab === 'all') { card.style.display = ''; return; }
                card.style.display = card.dataset.status === tab ? '' : 'none';
            });
        }
    </script>
</body>

</html>