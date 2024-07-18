<x-app-layout>
    <x-slot:head>
        <title>Connexion</title>
        @vite('resources/scss/login.scss')
    </x-slot>

    <div class="flex justify-center items-center min-h-screen px-8 py-10 relative z-10">
        <form method="POST" action="{{ route('login.submit') }}"
            class="login-form flex flex-col items-center px-8 pt-10 pb-12">
            @csrf
            <img src="/img/logo-xl.png" alt="Logo XL" class="login-form__logo block mb-12">
            @error('credentials')
                <div role="alert" class="alert alert-danger w-full">
                    {{ $message }}
                </div>
            @enderror
            <div class="space-y-5 w-full">
                <div>
                    <label for="email-field" class="form-label">Adresse e-mail:</label>
                    <input type="email" id="email-field" name="email" required placeholder="name@example.com"
                        value="{{ old('email') }}" class="form-control @error('credentials') is-invalid @enderror" />
                </div>
                <div>
                    <label for="password-field" class="form-label">Mot de passe:</label>
                    <input type="password" id="password-field" name="password" required placeholder="Mot de passe"
                        value="{{ old('password') }}" class="form-control @error('credentials') is-invalid @enderror" />
                </div>
            </div>
            <div class="d-grid mt-7 w-full">
                <button type="submit" class="btn btn-secondary">
                    Se connecter
                </button>
            </div>
        </form>
    </div>

    {{-- Background --}}
    <img src="/img/bg-login.png" alt="Town background" class="page-bg">
</x-app-layout>
