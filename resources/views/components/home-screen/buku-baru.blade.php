<div class="container-fluid py-2">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light shadow-5-strong">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <h3 class="fw-bold">Buku Terbaru</h3>
                </a>
            </div>
        </nav>
    </div>
    <div class="container my-4">
        <div class="row">
            <div class="owl-carousel buku-baru-carousel owl-theme">
                @include('components.widget.widget-buku')
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        $('.buku-baru-carousel').owlCarousel({
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        })
    </script>
@endsection
