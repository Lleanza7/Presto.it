<div class="cardLayout box">
    <div class="imgCard">
        <img src="{{$imagecard}}" alt="">
    </div>
    <div class="userCard">
        <div class="imageUser">
            {{-- <img src="{{asset('img\2318271-icona-profilo-utente-vettoriale-removebg-preview.png')}}"> --}}
            <img src="{{ $userimageannouncement}}">
        </div>
        <div class="nomeUser">
            <p style="font-size: 15px;color:black">{{ $user }}</p>
            <p style="font-size: 11px">{{ __('ui.publicationDate') }} {{ $date }}</p>
        </div>
    </div>
    <div class="prezzoCard">
        <h4>{{ $title }}</h4>
        <p>{{ $price }} €</p>
        <h6>{{ $category }}</h6>
    </div>

    <div class="descrizioneCard">
        <p>{{ Str::limit($description, 100) }}</p>
    </div>

    <div class="Areabutton">

        <button class="btnCardLayout"><a style="color: white"
                href="{{ route('announcement.show', ['announcement' => $announcement]) }}">{{ __('ui.buttonDetails') }}</a></button>
    </div>


</div>
