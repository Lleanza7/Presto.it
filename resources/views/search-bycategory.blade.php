<x-layout>
    <x-navbar />



    <div class="img-container"
        style="display: flex; align-items:end;justify-content:center;color:white;padding-bottom:30px">
        <h1>{{ __('ui.textAdsByCategory') }} {{ $thisCategory }}</h1>
    </div>
    <div class="back-by-cat">
        <div class="banner2">
            @foreach ($categories as $category)
                <div style="background-color: #dbd8e3b0; flex:1;height:85px">
                    <div id="myButton" class="banner-cat"><a
                            href="{{ route('announcement.category', ['id' => $category->id]) }}">{{ $category->translatedName() }}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="ContainerCard1">
            <div class="row">
                @forelse ($announcements as $announcement)
                    <div id="containerColCard" class="col-12 col-xl-3 col-lg-4 col-md-6 mt-5">
                        @if ($announcement->images->isEmpty())
                            <x-card-home :imagecard="asset('img/pexels-photo-4464487.jpeg')" :user="$announcement->user->name" :date="$announcement->updated_at->format('d/m/y H:i:s')" :title="$announcement->title"
                                :price="$announcement->price" :description="$announcement->description" :category="$announcement->translatedCategory" :announcement="$announcement" :userimageannouncement=" $announcement->user->image && $announcement->user->image->path ? asset('storage/profile_images/' . $announcement->user->image->path) : asset('img/2318271-icona-profilo-utente-vettoriale-removebg-preview.png')">
                            </x-card-home>
                        @else
                            <x-card-home :imagecard="$announcement->images->first()->getUrl(400, 500)" :user="$announcement->user->name" :date="$announcement->updated_at->format('d/m/y H:i:s')" :title="$announcement->title"
                                :price="$announcement->price" :description="$announcement->description" :category="$announcement->translatedCategory" :announcement="$announcement" :userimageannouncement=" $announcement->user->image && $announcement->user->image->path ? asset('storage/profile_images/' . $announcement->user->image->path) : asset('img/2318271-icona-profilo-utente-vettoriale-removebg-preview.png')">
                            </x-card-home>
                        @endif
                    </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-secondary py-3 shadow"
                        style="margin-top:100px;display:flex;justify-content:center;align-items:center;">
                        <p class="lead">Nessun risultato trovato per questa categoria</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

    </div>


















</x-layout>
