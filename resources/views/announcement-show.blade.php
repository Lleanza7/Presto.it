<x-layout>
    <x-navbar />

    <div class="container-img-back">
        <div class="containerPageShow">
            <div class="containerCaruselShow">
                <div id="carouselExampleCaptions" class="carousel slide" style="margin-top: 50px">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @if ($announcementShow->images->isEmpty())
                            <div class="carousel-item active">
                                <img src="{{ asset('img/pexels-photo-4464487.jpeg') }}" class="d-block w-100"
                                    alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    {{--  <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p> --}}
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/pexels-photo-4464487.jpeg') }}" style="object-fit:cover"
                                    class="d-block w-100" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    {{-- <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p> --}}
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/pexels-photo-4464487.jpeg') }}" class="d-block w-100"
                                    alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    {{--                             <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p> --}}
                                </div>
                            </div>
                        @else
                            @foreach ($announcementShow->images as $announcement)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $announcement->getUrl(400, 500) }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="containerTextShow">
                <div style="width:80%: height: 50%; margin-top:0px">
                    <h1 style="font-size: 40px; overflow:hidden">{{ $announcementShow->title }}</h1>
                    <h2 style="font-size: 30px">{{ __('ui.priceCardDetails') }} {{ $announcementShow->price }} € </h2>
                    <p style="font-size: 25px">{{ __('ui.descriptionCardDetails') }}
                        {{ $announcementShow->description }}</p>
                    <p style="font-size: 23px">{{ __('ui.categoryCardDetails') }} {{ $categoryAnnouncement }}</p>
                </div>
                <div class="div-btn-acq">
                    <button class="btn btn-acq">{{ __('ui.buttonBuy') }}</button>
                    <button class="btn btn-acq">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                        </svg>{{ __('ui.addFavorites') }}</button>
                </div>
            </div>
        </div>
        <div class="ContainerCard">
            <div class="banner2">
                @foreach ($categories as $category)
                    <div style="background-color: #dbd8e3b0; flex:1;height:85px">
                        <div id="myButton" class="banner-cat"><a
                                href="{{ route('announcement.category', ['id' => $category->id]) }}">{{ $category->translatedName() }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row"
                style="display:flex;justify-content:center;padding:0px;margin:0px; flex:3;margin-top:20px">
                <h2 style="text-align:center;margin-top:30px;font-weight:100">Annunci correlati per categoria <span style="font-weight: 500">{{$categoryAnnouncement}}</span></h1>
                @forelse ($announcementOfCategory as $announcement)
                    <div id="containerColCard" class="col-12 col-xl-3 col-lg-4 col-md-6 mt-5"
                        style="height: 60vh; padding-top: 100px;">
                        @if ($announcement->images->isEmpty())
                            <x-card-home :imagecard="asset('img/pexels-photo-4464487.jpeg')" :user="$announcement->user->name" :date="$announcement->updated_at->format('d/m/y H:i:s')" :title="$announcement->title"
                                :price="$announcement->price" :description="$announcement->description" :category="$announcement->translatedCategory" :announcement="$announcement"
                                :userimageannouncement="$announcement->user->image && $announcement->user->image->path
                                    ? asset('storage/profile_images/' . $announcement->user->image->path)
                                    : asset('img/2318271-icona-profilo-utente-vettoriale-removebg-preview.png')">
                            </x-card-home>
                        @else
                            <x-card-home :imagecard="$announcement->images->first()->getUrl(200, 300)" :user="$announcement->user->name" :date="$announcement->updated_at->format('d/m/y H:i:s')" :title="$announcement->title"
                                :price="$announcement->price" :description="$announcement->description" :category="$announcement->translatedCategory" :announcement="$announcement"
                                :userimageannouncement="$announcement->user->image && $announcement->user->image->path
                                    ? asset('storage/profile_images/' . $announcement->user->image->path)
                                    : asset('img/2318271-icona-profilo-utente-vettoriale-removebg-preview.png')">
                            </x-card-home>
                        @endif
                    </div>
                @empty
                    <div class="col-6">
                        <div class="alert alert-secondary py-3 shadow"
                            style="margin-top:200px;display:flex;justify-content:center;align-items:center;">
                            <p class="lead">{{ __('ui.noAsdForThisCategory') }}</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
</x-layout>
