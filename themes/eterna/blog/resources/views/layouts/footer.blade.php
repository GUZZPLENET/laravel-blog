
<!-- =======================
Footer START -->
<footer class="bg-dark pt-5">
    <div class="container">
        <!-- About and Newsletter START -->
        <div class="row pt-3 pb-4">
            @if(session()->has('newsletter-message'))
                <div class="col-md-12">
                    <div class="alert alert-success">{{ session('newsletter-message') }}</div>
                </div>
            @endif
            <div class="col-md-3">
                <img src="{{ asset('upload/'.$settings->footerLogo) }}" alt="footer logo">
            </div>
            <div class="col-md-5">
                <p class="text-body-secondary">{{ $settings->footerText }}</p>
            </div>
            <div class="col-md-4">
                <!-- Form -->
                <form class="row row-cols-lg-auto g-2 align-items-center justify-content-end" action="{{ route('newsletter') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary m-0">Abone ol</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- About and Newsletter END -->
    </div>
</footer>
<!-- =======================
Footer END -->
