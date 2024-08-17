<x-app-layout :show-navbar="false">
    <x-slot:head>
        <title>Connexion</title>
        @vite(['resources/css/lib/fontawesome.css', 'resources/scss/login.scss'])
    </x-slot>

    <div class="page-wrapper flex justify-center items-center min-h-screen px-8 py-10 relative z-10"
        style="background-image: url('/img/login-bg.png')">
        <div class="content-wrapper bg-white flex justify-center w-full max-w-4xl rounded-lg">
            <div class="w-full hidden md:flex justify-center items-center">
                <img src="/img/login-form-illustration.png" alt="Login background" class="max-w-56" />
            </div>
            <div class="w-full pt-12 pb-8 px-8">
                <form method="POST" action="{{ route('login.submit') }}" class="max-w-80 mx-auto">
                    @csrf
                    <h1 class="text-3xl text-center font-bold mb-10">Authentification</h1>
                    <div class="space-y-4">
                        @error('credentials')
                            <div role="alert" class="alert alert-danger text-center">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="input-group">
                            <span class="input-group-text" id="email-field">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="text" name="email" value="{{ old('email') }}"
                                placeholder="Adresse e-mail" required aria-label="Adresse e-mail"
                                aria-describedby="email-field"
                                class="form-control @error('email') is-invalid @enderror">
                        </div>
                        <div class="input-group">
                            <span class="input-group-text" id="password-field">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="password" value="{{ old('password') }}"
                                placeholder="Mot de passe" required aria-label="Mot de passe"
                                aria-describedby="password-field"
                                class="form-control @error('password') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="d-grid mt-8">
                        <button class="submit-btn btn">Se connecter</button>
                    </div>
                </form>
                <p class="text-center mt-14">
                    <a href="{{ route('signup') }}" class="text-sm text-gray-700 hover:text-black duration-300">
                        Devenez membre ici
                        <i class="fa-solid fa-arrow-right-long ml-2"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
