<x-layout>
    <x-navbar />
    <div class="PadreDivREvi">
        <div class="div-card1">
            <div class="div-card_dash">
                <div href="{{ route('revisor.index') }}" class="card_dash_pR RevisorDashboard lf box XcolorA">
                    <div class="li-aside2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-card-checklist" viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                            <path
                                d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0" />
                        </svg>
                        <span class="liMargin" style="font-weight:500;font-size:20px">Zona Revisore</span>
                    </div>
                    @if (Auth::check())
                        @if (Auth::user()->is_revisor)
                            <a href="{{route('revisor.index')}}">
                                <div
                                    style="display:flex;flex-direction:column; justify-content:center; align-items:center; height:200px;padding-top:20px">
                                    <div style="margin: 10px">
                                        <h5 style="color:white">Articoli da revisionare</h5>
                                    </div>
                                    <div id="border_num" class="grafic-revisor">
                                        <span id="dash_num" class="dropdown-item dash_num">
                                            {{ App\Models\Announcement::toBeRevisionedCount() }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endif
                    @if (!Auth::user()->is_revisor)
                        <div
                            style="display:flex; justify-content:center; align-items:center; height:200px;padding-top:20px">
                            <div style="display: flex;flex-direction:column;justify-content:center;align-items:center">
                                <h1>Non sei ancora revisore?</h1>

                                <a href="{{route('become.revisor')}}"><button class="btn buttonBecomeRevisorDashboard">Invia ora la tua richiesta</button></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="div-card_dash">

                <a href="/">
                    <div class="card_dash_p box homepageDashboard">
                        <div class="li-aside2" style="border-bottom:1px solid white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-house-door" viewBox="0 0 16 16">
                                <path
                                    d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                            </svg>
                            <li class="liMargin">Vai alla Home</li>
                        </div>
                        <div
                            style="height:400px; display:flex; justify-content:center;align-items:center;background-color:none;margin:none;padding:none">

                        </div>
                    </div>
                </a>
                <a class="XcolorA" href="{{ route('profile') }}">
                    <div class="card_dash_p box">
                        <div class="li-aside2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            </svg>
                            <li class="liMargin">Il tuo profilo</li>
                        </div>
                        <div
                            style="display:flex; justify-content:center;align-items:center;background-color:none;margin:none;padding:none">
                            <div class="divfoto" style="justify-content: center; background-color:none">
                                @if (!Auth::user()->image)
                                    <img src="{{ asset('img/2318271-icona-profilo-utente-vettoriale-removebg-preview.png') }}"
                                        alt="">
                                @else
                                    <img src="{{ asset('storage/profile_images/' . Auth::user()->image->path) }}"
                                        alt="" style="height: 180px;width:180px;margin-top:5px">
                                @endif
                            </div>
                            <h4>{{ auth()->user()->name }}</h4>
                        </div>
                    </div>
                </a>
                <a href="/create">
                    <div class="card_dash_p  box creaAnnuncioDashboard">
                        <div class="li-aside2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-bag-heart" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                            </svg>
                            <li class="liMargin">Crea il tuo annuncio</li>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {


            // Recupera l'elemento span con la classe num_ann
            var numAnnSpan = document.getElementById('dash_num');
            console.log('Contenuto di dash_num:', numAnnSpan.textContent);

            // Ottieni il conteggio dei annunci da revisionare
            var numAnnCount = parseInt(numAnnSpan.textContent);

            // Imposta il colore in base al conteggio
            if (numAnnCount === 0) {
                numAnnSpan.style.color = 'green';
                document.getElementById('border_num').style.borderColor = 'green';
            } else if (numAnnCount > 0 && numAnnCount < 10) {
                numAnnSpan.style.color = 'orange';
                document.getElementById('border_num').style.borderColor = 'orange';
            } else {
                numAnnSpan.style.color = 'red';
                document.getElementById('border_num').style.borderColor = 'red';
            }
        });
    </script>
</x-layout>
