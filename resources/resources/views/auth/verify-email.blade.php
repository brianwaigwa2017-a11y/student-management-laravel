<x-guest-layout>

    {{-- Page Heading --}}
    <div class="text-center mb-4">

        <div class="auth-logo mx-auto mb-3">
            <i class="bi bi-envelope-check"></i>
        </div>

        <h4 class="fw-bold mb-1">
            Verify Your Email
        </h4>

        <p class="text-muted mb-0">
            One more step to get started
        </p>

    </div>


    {{-- Information Message --}}
    <div class="alert alert-info mb-4">

        <i class="bi bi-info-circle me-2"></i>

        {{ __('Thanks for signing up! Before getting started, please verify your email address by clicking the link we just emailed to you.') }}

    </div>


    {{-- Verification Link Sent --}}
    @if (session('status') == 'verification-link-sent')

        <div class="alert alert-success mb-4">

            <i class="bi bi-check-circle me-2"></i>

            {{ __('A new verification link has been sent to your email address.') }}

        </div>

    @endif


    {{-- Actions --}}
    <div class="d-flex flex-column gap-3">


        {{-- Resend Verification Email --}}
        <form method="POST"
              action="{{ route('verification.send') }}">

            @csrf

            <button type="submit"
                    class="btn school-primary w-100 py-2">

                <i class="bi bi-envelope-arrow-up me-2"></i>

                Resend Verification Email

            </button>

        </form>


        {{-- Logout --}}
        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button type="submit"
                    class="btn btn-outline-secondary w-100 py-2">

                <i class="bi bi-box-arrow-right me-2"></i>

                Log Out

            </button>

        </form>

    </div>

</x-guest-layout>