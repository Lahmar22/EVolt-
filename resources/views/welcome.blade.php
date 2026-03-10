<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EVolt — Connexion</title>
  <meta name="description" content="Connectez-vous à EVolt pour gérer vos bornes de recharge pour véhicules électriques."/>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter', 'sans-serif'] },
          colors: {
            brand: { 50:'#ecfdf5', 100:'#d1fae5', 400:'#34d399', 500:'#10b981', 600:'#059669', 700:'#047857', 900:'#064e3b' },
            dark:  { 800:'#1e293b', 900:'#0f172a', 950:'#020617' }
          }
        }
      }
    }
  </script>
  <style>
    body { font-family: 'Inter', sans-serif; }
    .glass { background: rgba(15,23,42,0.7); backdrop-filter: blur(16px); border: 1px solid rgba(52,211,153,0.15); }
    .glow { box-shadow: 0 0 40px rgba(16,185,129,0.25); }
    .tab-active { background: linear-gradient(135deg, #059669, #34d399); }
    .bolt-bg { background: radial-gradient(ellipse at 60% 40%, rgba(16,185,129,0.18) 0%, transparent 60%), radial-gradient(ellipse at 20% 80%, rgba(52,211,153,0.08) 0%, transparent 50%); }
    input:focus { outline: none; border-color: #34d399; box-shadow: 0 0 0 3px rgba(52,211,153,0.15); }
    .fade-in { animation: fadeIn .5s ease forwards; }
    @keyframes fadeIn { from{opacity:0;transform:translateY(12px)} to{opacity:1;transform:translateY(0)} }
  </style>
</head>
<body class="min-h-screen bg-dark-950 bolt-bg flex items-center justify-center p-4">

  <!-- Background decoration -->
  <div class="fixed inset-0 overflow-hidden pointer-events-none">
    <div class="absolute -top-32 -right-32 w-96 h-96 bg-brand-500/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-brand-700/10 rounded-full blur-3xl"></div>
  </div>

  <div class="relative w-full max-w-md fade-in">

    <!-- Logo -->
    <div class="text-center mb-8">
      <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 mb-4 glow">
        <svg class="w-9 h-9 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
        </svg>
      </div>
      <h1 class="text-3xl font-bold text-white">EVolt</h1>
      <p class="text-slate-400 mt-1 text-sm">Gestion intelligente de bornes de recharge</p>
    </div>

    <!-- Card -->
    <div class="glass rounded-2xl p-8 glow">

      <!-- Tabs -->
      <div class="flex rounded-xl bg-dark-900 p-1 mb-8 gap-1" id="authTabs">
        <button onclick="showTab('login')" id="tab-login"
          class="flex-1 py-2.5 text-sm font-semibold rounded-lg transition-all tab-active text-white">
          Connexion
        </button>
        <button onclick="showTab('register')" id="tab-register"
          class="flex-1 py-2.5 text-sm font-semibold rounded-lg transition-all text-slate-400 hover:text-white">
          Inscription
        </button>
      </div> 
      <p id="message" class="text-white"></p>

      <!-- Login Form -->
      <form id="loginForm" class="space-y-5">
        <div>
          <label class="block text-sm font-medium text-slate-300 mb-2">Adresse e-mail</label>
          <input type="email" name="email" id="email" placeholder="vous@example.com"
            class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 text-sm transition-all"/>
        </div>
        <div>
          <label class="block text-sm font-medium text-slate-300 mb-2">Mot de passe</label>
          <div class="relative">
            <input type="password" name="password" id="loginPassword" placeholder="••••••••"
              class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 text-sm transition-all pr-12"/>
            <button type="button" onclick="togglePassword('loginPassword')" class="absolute right-3 top-3.5 text-slate-400 hover:text-brand-400">
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </button>
          </div>
          <div class="flex justify-end mt-2">
            <a href="#" class="text-xs text-brand-400 hover:text-brand-300 transition">Mot de passe oublié ?</a>
          </div>
        </div>
        <button type="submit"
          class="w-full py-3 rounded-xl font-semibold text-white bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 transition-all transform hover:scale-[1.02] active:scale-95 shadow-lg shadow-brand-900/40">
          Se connecter
        </button>
        <p class="text-center text-xs text-slate-500 mt-4">Sécurisé par <span class="text-brand-400 font-medium">Laravel Sanctum</span></p>
         <p id="message"></p>
      </form>

      <!-- Register Form -->
      <form id="formRegister" class="space-y-5 hidden">
        <div class="grid grid-cols-1 gap-4">
          <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Nom complet</label>
            <input type="text" name="nom" id="nom" placeholder="Jean"
              class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 text-sm transition-all"/>
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium text-slate-300 mb-2">Adresse e-mail</label>
          <input type="email" name="regemail" id="regemail" placeholder="vous@example.com"
            class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 text-sm transition-all"/>
        </div>
        <div>
          <label class="block text-sm font-medium text-slate-300 mb-2">Mot de passe</label>
          <div class="relative">
            <input type="password" name="regPassword" id="regPassword" placeholder="Min. 6 caractères"
              class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 text-sm transition-all pr-12"/>
            <button type="button" onclick="togglePassword('regPassword')" class="absolute right-3 top-3.5 text-slate-400 hover:text-brand-400">
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </button>
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium text-slate-300 mb-2">Confirmer le mot de passe</label>
          <input type="password" name="confPassword" id="confPassword" placeholder="••••••••"
            class="w-full bg-dark-900 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 text-sm transition-all"/>
        </div>
        <div class="flex items-start gap-3">
          <input type="checkbox" id="terms" class="mt-1 accent-brand-500 w-4 h-4 cursor-pointer"/>
          <label for="terms" class="text-xs text-slate-400">J'accepte les <a href="#" class="text-brand-400 hover:underline">conditions d'utilisation</a> et la <a href="#" class="text-brand-400 hover:underline">politique de confidentialité</a></label>
        </div>
        <button type="submit"
          class="w-full py-3 rounded-xl font-semibold text-white bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-500 hover:to-brand-400 transition-all transform hover:scale-[1.02] active:scale-95 shadow-lg shadow-brand-900/40">
          Créer mon compte
        </button>
         
      </form>
     

    </div>

    <p class="text-center text-xs text-slate-600 mt-6">© 2025 EVolt — Tous droits réservés</p>
  </div>

  <script>
    function showTab(tab) {
      document.getElementById('loginForm').classList.toggle('hidden', tab !== 'login');
      document.getElementById('formRegister').classList.toggle('hidden', tab !== 'register');
      document.getElementById('tab-login').className = 'flex-1 py-2.5 text-sm font-semibold rounded-lg transition-all ' + (tab==='login' ? 'tab-active text-white' : 'text-slate-400 hover:text-white');
      document.getElementById('tab-register').className = 'flex-1 py-2.5 text-sm font-semibold rounded-lg transition-all ' + (tab==='register' ? 'tab-active text-white' : 'text-slate-400 hover:text-white');
    }
    function togglePassword(id) {
      const el = document.getElementById(id);
      el.type = el.type === 'password' ? 'text' : 'password';
    }

    document.getElementById("loginForm").addEventListener("submit", function(e){

        e.preventDefault();

        fetch("http://localhost:8000/api/login",{
            method:"POST",
            headers:{
                "Content-Type":"application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body:JSON.stringify({
                email:document.getElementById("email").value,
                password:document.getElementById("loginPassword").value
            })
        })
        .then(res=>res.json())
        .then(data=>{

            if(data.token){

              localStorage.setItem("token",data.token);

              document.getElementById("message").innerText="Login success";
              window.location.href = "/dashboard";

            }else{

                document.getElementById("message").innerText=data.message;

            }

        });

    });

    document.getElementById("formRegister").addEventListener("submit", function(e){

        e.preventDefault();

        fetch("http://localhost:8000/api/register",{
            method:"POST",
            headers:{
                "Content-Type":"application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body:JSON.stringify({
                nom:document.getElementById("nom").value,
                regemail:document.getElementById("regemail").value,
                regPassword:document.getElementById("regPassword").value,
                regPassword_confirmation:document.getElementById("confPassword").value
            })
        })
        .then(res=>res.json())
        .then(data=>{

            if(data.token){

                localStorage.setItem("token",data.token);

                document.getElementById("message").innerText="register success";
                window.location.href = "/";

            }else{

                document.getElementById("message").innerText=JSON.stringify(data.errors ?? data.message);

            }

        });

    });
  </script>
</body>
</html>
