<x-layout>
    <x-navbar />
    <x-session-success />

    {{-- <div class="banner">
        @foreach ($categories as $category)
            <div id="myButton" class="banner-cat"><a
                    href="{{ route('announcement.category', ['id' => $category->id]) }}">{{ $category->name }}</a></div>
        @endforeach
    </div> --}}
    <div class="DivPadreProfile">
        <div style="height:350px; background: transparent;">
            <div class="divInfoProfile">
                <div class="divInfoProfile1">
                    <div class="divfoto">
                        @if (!Auth::user()->image)
                            <img src="{{ asset('img/2318271-icona-profilo-utente-vettoriale-removebg-preview.png') }}"
                                alt="">
                        @else
                            <img src="{{ asset('storage/profile_images/' . Auth::user()->image->path) }}" alt="">
                        @endif

                    </div>
                    <div class="divNome">
                        <div>
                            <h3>{{ auth()->user()->name }} </h3>
                        </div>
                        <div>
                            <p>{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="divModifica">
                        <button class="btnModificaProfile btn-desk2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                class="bi bi-pencil" viewBox="0 0 16 16" style="margin-right:5px">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg>
                            Modifica</button>
                    </a>
                </div>
                <div class="btnArt">
                    <button {{-- onclick="CambioPagina()" --}} class=" btn-prof">I miei articoli</button>
                </div>
            </div>
        </div>
        {{-- MY-ANNOUNCEMENTS --}}
        <div id="MyArticle" class="MyArticle">
            <div class="row" style="display:flex;justify-content:center;padding:0px;margin:0px;width:100%">
                @forelse($myAnnouncements as $myAnnouncement)
                    <div id="containerColCard" class="col-12 col-xl-3 col-lg-4 col-md-6 mt-5">
                        @if ($myAnnouncement->images->isEmpty())
                            <x-card-profile :imagecard="asset('img/pexels-photo-4464487.jpeg')" :user="$myAnnouncement->user->name" :date="$myAnnouncement->updated_at->format('d/m/y H:i:s')" :title="$myAnnouncement->title"
                                :price="$myAnnouncement->price" :description="$myAnnouncement->description" :category="$myAnnouncement->category->name" :announcement="$myAnnouncement" :userimageannouncement=" $myAnnouncement->user->image && $myAnnouncement->user->image->path ? asset('storage/profile_images/' . $myAnnouncement->user->image->path) : asset('img/2318271-icona-profilo-utente-vettoriale-removebg-preview.png')">
                            </x-card-profile>
                        @else
                            <x-card-profile :imagecard="$myAnnouncement->images->first()->getUrl(400, 500)" :user="$myAnnouncement->user->name" :date="$myAnnouncement->updated_at->format('d/m/y H:i:s')" :title="$myAnnouncement->title"
                                :price="$myAnnouncement->price" :description="$myAnnouncement->description" :category="$myAnnouncement->category->name" :announcement="$myAnnouncement" :userimageannouncement=" $myAnnouncement->user->image && $myAnnouncement->user->image->path ? asset('storage/profile_images/' . $myAnnouncement->user->image->path) : asset('img/2318271-icona-profilo-utente-vettoriale-removebg-preview.png')">
                            </x-card-profile>
                        @endif
                    </div>
                @empty
                    <div class="col-12" style="display:flex;justify-content:center;align-items:center">
                        <div class="alert alert-secondary py-3 shadow"
                            style="display:flex;justify-content:center;align-items:center;flex-direction:column;width:800px;margin-top:80px">
                            <p class="lead">Non hai ancora creato nessun annuncio!</p>
                            <button class="btn">
                                <a href="/create" style="color: white;font-weight:500;">Inizia a vendere!</a></button>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        {{-- MY-FAVOURITES --}}

        {{-- <script>
            let apertura = false;

            let apertura2 = false;

            function CambioPagina() {


                if (apertura === false) {
                    document.getElementById('MyArticle').style.display = "flex";
                    document.getElementById('MyFavourite').style.display = "none";
                }
            }

            function CambioPagina1() {


                if (apertura2 === false) {
                    document.getElementById('MyArticle').style.display = "none";
                    document.getElementById('MyFavourite').style.display = "flex";
                }
            }
        </script> --}}
</x-layout>
