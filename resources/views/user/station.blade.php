<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EVolt — Détail borne</title>
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

        .badge-available {
            background: rgba(16, 185, 129, 0.15);
            color: #34d399;
            border: 1px solid rgba(52, 211, 153, 0.3);
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #34d399;
            box-shadow: 0 0 0 3px rgba(52, 211, 153, 0.12);
        }

        .connector-btn.selected {
            background: rgba(16, 185, 129, 0.15);
            border-color: rgba(52, 211, 153, 0.5);
            color: #34d399;
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
            <a href="dashboard.html" class="flex items-center gap-2 text-slate-400 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="text-sm">Retour à la carte</span>
            </a>
        </div>
        <div class="flex items-center gap-3">
            <div
                class="w-9 h-9 rounded-xl bg-gradient-to-br from-brand-500 to-brand-700 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <span class="text-xl font-bold text-white">EVolt</span>
        </div>
        <div class="flex items-center gap-2.5">
            <div
                class="w-9 h-9 rounded-xl bg-gradient-to-br from-brand-600/30 to-brand-800/30 border border-brand-500/30 flex items-center justify-center text-sm font-bold text-brand-400">
                JD</div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-4 py-8 grid md:grid-cols-2 gap-8">

        <!-- Left: Station Info -->
        <div class="space-y-6">

            <!-- Station Header -->
            <div class="glass rounded-2xl p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <span class="badge-available text-xs px-2.5 py-1 rounded-full font-medium">● Disponible</span>
                        <h1 class="text-2xl font-bold text-white mt-2">Centre Commercial Westfield</h1>
                        <p class="text-slate-400 text-sm mt-1 flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            12 Rue du Commerce, Paris 15e — 0.8 km
                        </p>
                    </div>
                    <button
                        class="w-10 h-10 rounded-xl bg-dark-900 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-brand-400 transition">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                </div>

                <!-- Specs grid -->
                <div class="grid grid-cols-3 gap-3">
                    <div class="bg-dark-900 rounded-xl p-3 text-center border border-slate-800">
                        <svg class="w-6 h-6 text-brand-400 mx-auto mb-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <p class="text-lg font-bold text-brand-400">150 kW</p>
                        <p class="text-xs text-slate-500">Puissance</p>
                    </div>
                    <div class="bg-dark-900 rounded-xl p-3 text-center border border-slate-800">
                        <svg class="w-6 h-6 text-brand-400 mx-auto mb-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m-4 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                        <p class="text-lg font-bold text-white">CCS</p>
                        <p class="text-xs text-slate-500">Connecteur</p>
                    </div>
                    <div class="bg-dark-900 rounded-xl p-3 text-center border border-slate-800">
                        <svg class="w-6 h-6 text-brand-400 mx-auto mb-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-lg font-bold text-white">24h/24</p>
                        <p class="text-xs text-slate-500">Horaires</p>
                    </div>
                </div>
            </div>

            <!-- Available connectors -->
            <div class="glass rounded-2xl p-6">
                <h2 class="font-semibold text-white mb-4">Connecteurs disponibles</h2>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-dark-900 rounded-xl border border-slate-800">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-brand-500/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-brand-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white">CCS Combo 2</p>
                                <p class="text-xs text-slate-400">150 kW DC Rapide</p>
                            </div>
                        </div>
                        <span class="text-xs px-2.5 py-1 rounded-full badge-available font-medium">Libre</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-dark-900 rounded-xl border border-slate-800">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-brand-500/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-brand-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white">Type 2</p>
                                <p class="text-xs text-slate-400">22 kW AC</p>
                            </div>
                        </div>
                        <span class="text-xs px-2.5 py-1 rounded-full badge-available font-medium">Libre</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-dark-900 rounded-xl border border-slate-800">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-amber-500/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-amber-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white">CHAdeMO</p>
                                <p class="text-xs text-slate-400">50 kW DC</p>
                            </div>
                        </div>
                        <span class="text-xs px-2.5 py-1 rounded-full badge-busy font-medium">Occupé</span>
                    </div>
                </div>
            </div>

            <!-- Tariff info -->
            <div class="glass rounded-2xl p-6">
                <h2 class="font-semibold text-white mb-4">Tarification</h2>
                <div class="space-y-2">
                    <div class="flex justify-between text-sm"><span class="text-slate-400">Coût / kWh</span><span
                            class="text-white font-medium">0,35 €</span></div>
                    <div class="flex justify-between text-sm"><span class="text-slate-400">Frais de session</span><span
                            class="text-white font-medium">0,50 €</span></div>
                    <div class="flex justify-between text-sm"><span class="text-slate-400">Stationnement</span><span
                            class="text-brand-400 font-medium">Gratuit (2h)</span></div>
                    <div class="border-t border-slate-800 pt-2 flex justify-between text-sm"><span
                            class="text-slate-400">Estimation 80 km</span><span class="text-white font-semibold">≈ 8,50
                            €</span></div>
                </div>
            </div>
        </div>

        <!-- Right: Booking Form -->
        <div class="space-y-6">
            <div class="glass rounded-2xl p-6 sticky top-24">
                <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Réserver cette borne
                </h2>
                <form class="space-y-5" id="bookingForm">

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Type de connecteur</label>
                        <div class="grid grid-cols-3 gap-2">
                            <button type="button" onclick="selectConnector(this)"
                                class="connector-btn selected py-2.5 px-3 rounded-xl border border-slate-700 text-xs font-medium text-slate-400 bg-dark-900 transition-all text-center">CCS<br />150
                                kW</button>
                            <button type="button" onclick="selectConnector(this)"
                                class="connector-btn py-2.5 px-3 rounded-xl border border-slate-700 text-xs font-medium text-slate-400 bg-dark-900 transition-all text-center">Type
                                2<br />22 kW</button>
                            <button type="button" onclick="selectConnector(this)"
                                class="connector-btn py-2.5 px-3 rounded-xl border border-slate-700 text-xs font-medium text-slate-400 bg-dark-900 transition-all text-center opacity-50 cursor-not-allowed">CHAdeMO<br />50
                                kW</button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Date</label>
                        <input type="date" value="2025-06-15"
                            class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white transition-all cursor-pointer" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Heure de début</label>
                            <input type="time" value="14:00"
                                class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white transition-all cursor-pointer" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Durée estimée</label>
                            <select
                                class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white transition-all cursor-pointer appearance-none">
                                <option>30 min</option>
                                <option>1h</option>
                                <option selected>1h30</option>
                                <option>2h</option>
                                <option>3h</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Véhicule</label>
                        <select
                            class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white transition-all cursor-pointer appearance-none">
                            <option>Tesla Model 3 — AB-123-CD</option>
                            <option>Renault Zoe — EF-456-GH</option>
                            <option>+ Ajouter un véhicule</option>
                        </select>
                    </div>

                    <!-- Summary -->
                    <div class="bg-dark-900 rounded-xl p-4 border border-brand-500/20 space-y-2">
                        <h3 class="text-sm font-semibold text-white mb-3">Récapitulatif</h3>
                        <div class="flex justify-between text-xs"><span class="text-slate-400">Borne</span><span
                                class="text-white">Westfield · CCS 150kW</span></div>
                        <div class="flex justify-between text-xs"><span class="text-slate-400">Date</span><span
                                class="text-white">15 juin 2025, 14:00</span></div>
                        <div class="flex justify-between text-xs"><span class="text-slate-400">Durée</span><span
                                class="text-white">1h30</span></div>
                        <div class="border-t border-slate-800 pt-2 flex justify-between text-sm"><span
                                class="text-slate-400">Estimation</span><span class="text-brand-400 font-semibold">≈
                                12,80 €</span></div>
                    </div>

                    <button type="submit"
                        class="w-full py-3.5 rounded-xl font-semibold text-white bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 transition-all transform hover:scale-[1.02] active:scale-95 shadow-lg shadow-brand-900/40 flex items-center justify-center gap-2 text-sm">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Confirmer la réservation
                    </button>
                    <p class="text-center text-xs text-slate-500">Annulation gratuite jusqu'à 15 min avant</p>
                </form>
            </div>
        </div>

    </div>

    <!-- Toast notification (hidden by default) -->
    <div id="toast"
        class="fixed bottom-6 right-6 glass border border-brand-500/40 rounded-2xl p-4 flex items-center gap-3 shadow-2xl transform translate-y-24 opacity-0 transition-all duration-300 max-w-sm">
        <div class="w-10 h-10 rounded-xl bg-brand-500/20 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <div>
            <p class="text-sm font-semibold text-white">Réservation confirmée !</p>
            <p class="text-xs text-slate-400">Un email de confirmation vous a été envoyé.</p>
        </div>
    </div>

    <script>
        function selectConnector(btn) {
            document.querySelectorAll('.connector-btn').forEach(b => b.classList.remove('selected'));
            btn.classList.add('selected');
        }
        document.getElementById('bookingForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const toast = document.getElementById('toast');
            toast.classList.remove('translate-y-24', 'opacity-0');
            setTimeout(() => { toast.classList.add('translate-y-24', 'opacity-0'); }, 3500);
        });
    </script>
</body>

</html>