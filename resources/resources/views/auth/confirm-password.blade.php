<x-guest-layout>

    {{-- Page Heading --}}
    <div class="text-center mb-4">

        <h4 class="fw-bold mb-1">
            Confirm Password
        </h4>

        <p class="text-muted mb-0">
            Please confirm your password to continue
        </p>

    </div>


    {{-- Information Message --}}
    <div class="alert alert-info mb-4">

        <i class="bi bi-shield-lock me-2"></i>

        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}

    </div>


    <form method="POST" action="{{ route('password.confirm') }}">

        @csrf


        {{-- Password --}}
        <div class="mb-4">

            <label for="password"
                   class="form-label fw-semibold">

                Password

            </label>

            <input
                id="password"
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                required
                autocomplete="current-password"
                autofocus
            >

            @error('password')

                <div class="invalid-feedback">
                    {{ $message }}
                </div>

            @enderror

        </div>


        {{-- Confirm --}}
        <button type="submit"
                class="btn school-primary w-100 py-2">

            <i class="bi bi-shield-check me-2"></i>

            Confirm Password

        </button>


        {{-- Back --}}
        <div class="text-center mt-3">

            <a href="{{ url()->previous() }}"
               class="text-decoration-none small school-link">

                <i class="bi bi-arrow-left me-1"></i>

                Go Back

            </a>

        </div>

    </form>

</x-guest-layout>