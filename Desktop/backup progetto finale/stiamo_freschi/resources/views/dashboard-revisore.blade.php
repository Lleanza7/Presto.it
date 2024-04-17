<x-layout-revisore>
    <x-navbar />
    <div style="display: flex;height:max-content">
        <div class="aside-left">
            <ul class="ul-aside">
                <a class="li-aside" href="{{ route('home') }}" style="color:black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-house-door" viewBox="0 0 16 16">
                        <path
                            d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                    </svg>
                    <li class="liMargin">Homepage</li>
                </a>
                <a class="li-aside" href="{{ route('dashboard') }}" style="color:black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-columns-gap" viewBox="0 0 16 16">
                        <path
                            d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z" />
                    </svg>
                    <li class="liMargin">Dashboard</li>
                </a>
                <a class="li-aside" href="{{ route('profile') }}" style="color:black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                    <li class="liMargin">Il mio profilo</li>
                </a>

                <a class="li-aside" href="{{ route('announcement.create') }}" style="color:black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-bag-heart" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                    </svg>
                    <li class="liMargin">Crea un annuncio</li>
                </a>


                {{--  <div class="li-aside">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-trash" viewBox="0 0 16 16">
                        <path
                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                        <path
                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                    </svg>
                    <li class="liMargin">Basket</li>
                </div> --}}
            </ul>
        </div>

        <div class="div-card"
            style="@if ($announcement_to_check) justify-content: center;@else justify-content: start;padding-top:60px @endif">
            <div class="copyRev" style="">
                <h1 style="text-align:center;margin-top:30px">{{ __('ui.welcomeBackRevisor') }}
                    {{ Auth::user()->name }}
                </h1>
                <h3 style="text-align:center">{{ __('ui.youHave') }} <span class="num_ann"
                        id="num_ann">{{ App\Models\Announcement::toBeRevisionedCount() }}</span>
                    {{ __('ui.adsReview') }}</h3>

            </div>


            @if ($announcement_to_check)
                <x-session-success-revisor />
                <div class="card-dash">
                    <div class="inserzione">
                        <div class="containerTitleRevisor">
                            <div class="containerTitleRevisorChild">
                                <h3 class="ann_tit_rev">{{ __('ui.asd') }}
                                    {{ $announcement_to_check->title }}
                                </h3>
                            </div>
                            <div class="containerTitleRevisorChild2">
                                <h3 style="font-size:20px;">{{ $announcement_to_check->category->name }}</h3>
                            </div>

                        </div>
                    </div>
                    <div id="box-card" class="containerCardDash">
                        <div class="card-dash2">
                            <div id="carouselExample" class="carousel slide" style="width: 400px;height:500px">
                                <div class="carousel-inner" style="width: 100%;height:100%">
                                    @if ($announcement_to_check->images->isEmpty())
                                        <div class="carousel-item active">
                                            <img src="https://images1.vinted.net/t/01_00c4d_ibKrDo5AVXpgGHcrrAVUxZwh/f800/1711030911.jpeg?s=162684a97acb85e57eac3596398af8bbcb25c46e"
                                                class=" img-size d-block " alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://images1.vinted.net/t/01_00c4d_ibKrDo5AVXpgGHcrrAVUxZwh/f800/1711030911.jpeg?s=162684a97acb85e57eac3596398af8bbcb25c46e"
                                                class="img-size d-block  " alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://images1.vinted.net/t/01_00c4d_ibKrDo5AVXpgGHcrrAVUxZwh/f800/1711030911.jpeg?s=162684a97acb85e57eac3596398af8bbcb25c46e"
                                                class="img-size d-block " alt="...">
                                        </div>
                                    @else
                                        @foreach ($announcement_to_check->images as $announcement)
                                            <div class="carousel-item @if ($loop->first) active @endif">
                                                <img src="{{ $announcement->getUrl(400, 500) }}" class="d-block w-100"
                                                    alt="...">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="containerInfoRevisor">
                                <div class="div-descr">
                                    <div class="containerUserRevisor">
                                        <img src="{{ $announcement_to_check->user->image && $announcement_to_check->user->image->path
                                            ? asset('storage/profile_images/' . $announcement_to_check->user->image->path)
                                            : asset('img/2318271-icona-profilo-utente-vettoriale-removebg-preview.png') }}"
                                            alt="">
                                        <h6>{{ $announcement_to_check->user->name }}</h6>
                                    </div>
                                    <h1>{{ $announcement_to_check->title }}</h1>
                                    <h2>{{ __('ui.priceAsdReview') }} {{ $announcement_to_check->price }}</h2>
                                    <p>{{ __('ui.descriptionAsdReview') }} {{ $announcement_to_check->description }}
                                    </p>
                                    <div class="containerButtonRevisor">
                                        <form
                                            action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                                            method="post">
                                            @csrf
                                            @method ('PATCH')
                                            <button class="btn true" style="width: 130px;">
                                                <h4 style="text-align: center">{{ __('ui.buttonAccept') }}</h4>
                                            </button>
                                        </form>
                                        <form
                                            action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                                            method="post">
                                            @csrf
                                            @method ('PATCH')
                                            <button class="btn false" style="width: 130px">
                                                <h4 style="text-align: center">{{ __('ui.buttonrefuse') }}</h4>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="containerInfoGoogle">
                                <div class="card-body containerFlagRevisor" id="container">
                                    @if (!$announcement_to_check->images->isEmpty())
                                        <h4 class="tc-accent" style="text-align: start">Media Revisione Immagini</h4>
                                        <div id="image_info">
                                            <p>Media Adulti: <span {{-- id="media_adulti" --}}
                                                    class="{{ $announcement_to_check->images[0]->adult }}"></span>
                                            </p>
                                            <p>Media Satira: <span id="media_satira"
                                                    class="{{ $announcement_to_check->images[0]->spoof }}"></span></p>
                                            <p>Media Medicina: <span id="media_medicina"
                                                    class="{{ $announcement_to_check->images[0]->medical }}"></span>
                                            </p>
                                            <p>Media Violenza: <span id="media_violenza"
                                                    class="{{ $announcement_to_check->images[0]->violence }}"></span>
                                            </p>
                                            <p>Media Contenuto ammiccante: <span id="media_ammiccante"
                                                    class="{{ $announcement_to_check->images[0]->racy }}"></span></p>
                                        </div>
                                    @endif
                                </div>
                                <div class="containerTag">
                                    <div class="row">
                                        <div class="col">
                                            <div id="tags-container" style="text-align: center">
                                                @if (!$announcement_to_check->images->isEmpty())
                                                    <h4 style="text-align: center;font-weight:bold">Tags</h4>
                                                    @foreach ($announcement_to_check->images as $image)
                                                        @if ($image->labels == null)
                                                            <span class="badge badge-primary tag">Nessun tag</span>
                                                        @else
                                                            @foreach ($image->labels as $label)
                                                                <span class="badge badge-primary tag"
                                                                    style="font-weight: 500;text-align:center">{{ $label }}</span>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                    @else
                        <button class="btn" style="margin-left:200px">
                            <a href="/" style="color: white;font-weight:500;">Torna alla
                                homepage
                            </a>
                        </button>
            @endif

        </div>
    </div>
    <script>
        /* let apertura = false;

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            function apriBox() {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            if (apertura === false) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                document.getElementById('box-card').style.display = "flex";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                document.getElementById('btn').style.display = "none";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                document.getElementById('btn2').style.display = "block";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                document.getElementById('div_container_btn').style.display = "none";

                                                                                                                                                                                                                                                                                                                                                                                                                                                                        apertura = true;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        document.getElementById('box-card').style.display = "none";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        document.getElementById('btn').style.display = "block";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        document.getElementById('btn2').style.display = "none";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        document.getElementById('div_container_btn').style.display = "flex";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        apertura = false;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                } */
        document.addEventListener('DOMContentLoaded', function() {

            // Recupera l'elemento span con la classe num_ann
            var numAnnSpan = document.getElementById('num_ann');

            // Ottieni il conteggio dei annunci da revisionare
            var numAnnCount = parseInt(numAnnSpan.textContent);

            // Imposta il colore in base al conteggio
            if (numAnnCount === 0) {
                numAnnSpan.style.color = 'green';
            } else if (numAnnCount > 0 && numAnnCount < 10) {
                numAnnSpan.style.color = 'orange';
            } else {
                numAnnSpan.style.color = 'red';
            }
            // Supponiamo che currentIndex sia l'indice dell'immagine attualmente visualizzata nel carousel
            var currentIndex = 0; // Inizializziamo currentIndex a 0

            // Recupera l'annuncio da controllare
            var announcement_to_check = {!! json_encode($announcement_to_check) !!};

            // Aggiorna le informazioni dell'immagine corrente sulla pagina
            function updateCurrentImage() {
                var currentImage = announcement_to_check.images[currentIndex];
                document.getElementById('media_adulti').innerText = currentImage.adult;
                document.getElementById('media_satira').innerText = currentImage.spoof;
                document.getElementById('media_medicina').innerText = currentImage.medical;
                document.getElementById('media_violenza').innerText = currentImage.violence;
                document.getElementById('media_ammiccante').innerText = currentImage.racy;
            }

            // Aggiorna le informazioni dell'immagine corrente quando il carousel cambia immagine
            $('#carouselExample').on('slid.bs.carousel', function() {
                currentIndex = $('#carouselExample').find('.carousel-item.active').index();
                var currentImage = announcement_to_check.images[currentIndex];
                document.getElementById('media_adulti').innerText = "Media Adulti: " + currentImage.adult;
                document.getElementById('media_satira').innerText = "Media Satira: " + currentImage.spoof;
                document.getElementById('media_medicina').innerText = "Media Medicina: " + currentImage
                    .medical;
                document.getElementById('media_violenza').innerText = "Media Violenza: " + currentImage
                    .violence;
                document.getElementById('media_ammiccante').innerText = "Media Contenuto ammiccante: " +
                    currentImage.racy;
            });

            // Chiamata iniziale per aggiornare le informazioni dell'immagine corrente all'avvio
            updateCurrentImage();
        });
    </script>

</x-layout-revisore>


{{--                                 <div class="div_container_btn">
                                    <form
                                        action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                                        method="post">
                                        @csrf
                                        @method ('PATCH')
                                        <button class="btn">
                                            <h4>{{ __('ui.buttonAccept') }}</h4>
                                        </button>
                                    </form>
                                    <form
                                        action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                                        method="post">
                                        @csrf
                                        @method ('PATCH')
                                        <button class="btn">
                                            <h4>{{ __('ui.buttonrefuse') }}</h4>
                                        </button>
                                    </form>
                                </div> --}}
