<x-guest-layout>

    {{-- Page Heading --}}
    <div class="text-center mb-4">

        <h4 class="fw-bold mb-1">
            Create Account
        </h4>

        <p class="text-muted mb-0">
            Register for the Student Management System
        </p>

    </div>


    <form method="POST" action="{{ route('register') }}">

        @csrf


        {{-- Name --}}
        <div class="mb-3">

            <label for="name" class="form-label fw-semibold">
                Name
            </label>

            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror"
                required
                autofocus
                autocomplete="name"
            >

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


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
                autocomplete="new-password"
            >

            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- Confirm Password --}}
        <div class="mb-4">

            <label for="password_confirmation"
                   class="form-label fw-semibold">

                Confirm Password

            </label>

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror"
                required
                autocomplete="new-password"
            >

            @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- Actions --}}
        <div class="d-flex flex-column gap-3">

            <button type="submit"
                    class="btn school-primary w-100 py-2">

                <i class="bi bi-person-plus me-2"></i>

                Register

            </button>


            <div class="text-center">

                <span class="text-muted small">
                    Already have an account?
                </span>

                <a href="{{ route('login') }}"
                   class="text-decoration-none small school-link">

                    Log in

                </a>

            </div>

        </div>

    </form>

</x-guest-layout>