<x-guest-layout>

    {{-- Session Status --}}
    @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif

    <div class="text-center mb-4">

        <h4 class="fw-bold mb-1">
            Welcome Back
        </h4>

        <p class="text-muted mb-0">
            Sign in to your account
        </p>

    </div>

    <form method="POST" action="{{ route('login') }}">

        @csrf

        {{-- Email --}}
        <div class="mb-3">

            <label for="email" class="form-label fw-semibold">
                Email Address
            </label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror"
                required
                autofocus
                autocomplete="username"
            >

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- Password --}}
        <div class="mb-3">

            <label for="password" class="form-label fw-semibold">
                Password
            </label>

            <input
                id="password"
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                required
                autocomplete="current-password"
            >

            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- Remember Me --}}
        <div class="mb-4 form-check">

            <input
                id="remember_me"
                type="checkbox"
                name="remember"
                class="form-check-input"
            >

            <label for="remember_me"
                   class="form-check-label">
                Remember me
            </label>

        </div>


        {{-- Login Button / Forgot Password --}}
        <div class="d-flex flex-column gap-3">

            @if (Route::has('password.request'))

                <div class="text-end">

                    <a href="{{ route('password.request') }}"
                       class="text-decoration-none small school-link">

                        Forgot your password?

                    </a>

                </div>

            @endif


            <button type="submit"
                    class="btn school-primary w-100 py-2">

                <i class="bi bi-box-arrow-in-right me-2"></i>

                Log in

            </button>

        </div>

    </form>

</x-guest-layout>