<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Smart Stitch School Uniforms - Quality Uniforms for Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('site/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/profile.css')}}">
    <link rel="stylesheet" href="{{asset('site/welcome.css')}}">
</head>
<body>
    <!-- Sticky Offer Badge (right side) -->
    <div id="offerBanner" class="offer-badge">
        <div class="offer-badge-icon"><i class="fas fa-shirt"></i></div>
        <div class="offer-badge-title">Bulk</div>
        <div class="offer-badge-line">School</div>
        <div class="offer-badge-line">Orders</div>
        <div class="offer-badge-sub">Custom sizes<br>and logos</div>
    </div>
     @include('site_includes.header')
      @yield('content')
     @include('site_includes.footer')

    

    <!-- YouTube Video Modal -->
    <div class="modal fade" id="youtubeModal" tabindex="-1" aria-labelledby="youtubeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark border-0">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ratio ratio-16x9">
                        <iframe id="youtubeIframe"
                            src=""
                            title="Smart Stitch School Uniforms - Learn More"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('site/script.js')}}"></script>
    <script>
        // YouTube modal — stop video on close
        const ytModal = document.getElementById('youtubeModal');
        if (ytModal) {
            const youtubeVideoSrc = 'https://www.youtube.com/embed/YOUR_VIDEO_ID?autoplay=1&rel=0';
            ytModal.addEventListener('show.bs.modal', function () {
                document.getElementById('youtubeIframe').src = youtubeVideoSrc;
            });
            ytModal.addEventListener('hide.bs.modal', function () {
                document.getElementById('youtubeIframe').src = '';
            });
        }
    </script>
    <script src="{{asset('site/profile.js')}}"></script>
    <script src="{{asset('site/credit_request.js')}}"></script>
</body>
</html>
