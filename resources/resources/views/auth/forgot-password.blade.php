<x-guest-layout>

    {{-- Page Heading --}}
    <div class="text-center mb-4">

        <h4 class="fw-bold mb-1">
            Forgot Password?
        </h4>

        <p class="text-muted mb-0">
            Reset your password
        </p>

    </div>


    {{-- Information Message --}}
    <div class="alert alert-info mb-4">

        <i class="bi bi-info-circle me-2"></i>

        {{ __('Enter your email address and we will send you a password reset link.') }}

    </div>


    {{-- Session Status --}}
    @if (session('status'))

        <div class="alert alert-success mb-4">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('status') }}

        </div>

    @endif


    <form method="POST" action="{{ route('password.email') }}">

        @csrf


        {{-- Email --}}
        <div class="mb-4">

            <label for="email"
                   class="form-label fw-semibold">

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
                autocomplete="email"
            >

            @error('email')

                <div class="invalid-feedback">
                    {{ $message }}
                </div>

            @enderror

        </div>


        {{-- Submit --}}
        <button type="submit"
                class="btn school-primary w-100 py-2">

            <i class="bi bi-envelope me-2"></i>

            Email Password Reset Link

        </button>


        {{-- Back to Login --}}
        <div class="text-center mt-3">

            <a href="{{ route('login') }}"
               class="text-decoration-none small school-link">

                <i class="bi bi-arrow-left me-1"></i>

                Back to Login

            </a>

        </div>

    </form>

</x-guest-layout>