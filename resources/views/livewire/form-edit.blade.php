<div class="row div-form">
    <x-navbar-create :revisorCounter="$announcement_revisor_counter" />

    <div class="col-4 div-cons">
        <x-session-success />
        <div style="margin-right:70px;margin-left:60px;">
            <div class="cardLayoutFormCreate box">
                <div class="imgCard">
                    @if (empty($images))
                        <div aria-hidden="true">
                            <div class="card-text placeholder-glow skeleton centro-skeletron"
                                style="width: 100%;margin:0px;padding:0px;background-color:none;">
                                <span class="placeholder col-12 "
                                    style="height: 290px; width: 100%;cursor:default;"></span>
                            </div>
                        </div>
                    @else
                        <div id="carouselExampleDark" class="carousel carousel-dark slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner" style="background-color: none">
                                @foreach ($images as $key => $image)
                                    <div class="carousel-item @if ($loop->first) active @endif"
                                        data-bs-interval="10000">
                                        <img src="{{ $image->temporaryUrl() }}" class="d-block w-100" alt="..."
                                            style="object-fit:cover;">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5 style="color:white;">{{ __('ui.previewImage') }}</h5>
                                            <button class="RemoveFormCreate btn false"
                                                wire:click="removeImage({{ $key }})">{{ __('ui.buttonRemoveImage') }}</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="userCard">
                    <div class="imageUser">
                        <img src="https://banner2.cleanpng.com/20180508/toe/kisspng-user-profile-computer-icons-clip-art-5af1ac8cee74c6.8111281615257877889767.jpg"
                            alt="">
                    </div>
                    <div class="nomeUser ">
                        <div aria-hidden="true">
                            <div class="card-body">
                                <p class="card-text placeholder-glow skeleton ">
                                    @if ($title == false)
                                        <span class="placeholder col-4" style="cursor:default"></span>
                                    @else
                                        {{ Auth::user()->name }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="prezzoCard ">
                    <div aria-hidden="true">
                        <h4 class="card-text placeholder-glow skeleton centro-skeletron">
                            @if ($title == false)
                                <span class="placeholder col-12" style="cursor:default"></span>
                            @else
                                {{ $title }}
                            @endif
                        </h4>
                    </div>
                    <div aria-hidden="true">
                        <p class="card-text placeholder-glow skeleton centro-skeletron">
                            @if ($price == false)
                                <span class="placeholder col-6" style="cursor:default"></span>
                            @else
                                {{ __('ui.previewPriceAnnouncement') }} {{ $price }} €
                            @endif
                        </p>
                    </div>
                    <div aria-hidden="true">
                        <h6 class="card-text placeholder-glow skeleton centro-skeletron" style="margin: top:20px;">
                            @if ($category_id == false)
                                <span class="placeholder col-12" style="cursor:default"></span>
                            @else
                                {{ __('ui.previewCategoryAnnouncement') }} {{ $name[$category_id - 1] }}
                            @endif
                        </h6>
                    </div>
                </div>
                <div class="descrizioneCard" style="">
                    <div aria-hidden="true">
                        <p class="card-text placeholder-glow skeleton centro-skeletron"
                            style="font-size: 16px;margin-bottom:20px">
                            @if ($description == false)
                                <span class="placeholder col-12" style="cursor:default"></span>
                            @else
                                {{ $description }}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="Areabutton" style="padding: 10px;">
                    @if ($title == false || $price == false || $description == false || $category_id == false)
                        <a class="btn btn-primary disabled placeholder col-12" aria-disabled="true"></a>
                    @else
                        <button type="submit" id='submitButtonFormCreate' class="BtnRegistratiLogin"
                            style="height:35px; font-size:18px;cursor:pointer"><label for="ButtonSubmitForm"
                                tabindex="0">Modifica il tuo annuncio</label></button>
                    @endif
                </div>
            </div>

        </div>


        <div class="col-4 div-modale">
            <h1 style="margin-bottom: 20px">Modifica il tuo annuncio</h1>

            <div class="form3">

                <form id="FormCreateAnnouncement" wire:submit.prevent="submitForm">
                    <div class="mb-3">
                        <label for="title" class="form-label">Modifica il titolo dell'annuncio</label>
                        <input type="text" name="title" class="form-control" style="width: 100%; height:35px;"
                            id="title" wire:model.live="title">
                    </div>
                    @error('title')
                        <div class="alert alert-danger"
                            style="height: 25px;display:flex;justify-content:center;align-items:center">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mb-3">
                        <label for="price" class="form-label">Modifica il prezzo</label>
                        <input type="price" name="price" class="form-control" style="width: 100%; height:35px;"
                            id="price" wire:model.live="price">
                    </div>
                    @error('price')
                        <div class="alert alert-danger"
                            style="height: 25px;display:flex;justify-content:center;align-items:center">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mb-3">
                        <label for="description" class="form-label">Modifica la descrizione</label>
                        <input type="textarea" name="description" class="form-control"
                            style="width: 100%; height:35px;" id="description" wire:model.live="description">
                    </div>
                    @error('description')
                        <div class="alert alert-danger"
                            style="height: 25px;display:flex;justify-content:center;align-items:center">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mb-3">
                        <label for="category">Modifica la categoria</label>
                    </div>
                    <select class="form-select" aria-label="Default select example" name="category_id"
                        style="width: 100%; height:35px;margin-bottom: 20px;" wire:model.live="category_id">
                        <option selected>{{ __('ui.selectElement') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>



                    @error('category_id')
                        <div class="alert alert-danger"
                            style="height: 25px;display:flex;justify-content:center;align-items:center">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mb-3">
                        <label for="image" class="form-label">Carica una nuova immagine</label>
                        <input wire:model='temporary_images' type="file" name="image" multiple
                            class="form-control @error('temporary_images.*') is-invalide @enderror" id="image"
                            wire:model.blur="image" style="width: 100%; height:35px;margin-bottom: 20px">
                    </div>
                    @error('temporary_images')
                        <div class="alert alert-danger"
                            style="height: 25px;display:flex;justify-content:center;align-items:center">
                            {{ $message }}
                        </div>
                    @enderror


                    <button type="submit" class="BtnRegistratiLogin" hidden wire:click="editAnnouncement"
                        id="ButtonSubmitForm">Crea il
                        tuo
                        annuncio</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('redirectToProfile', () => {
                window.location.href = '{{ route('dashboard') }}'; // Reindirizza alla pagina del profilo
            });
        });
    </script>
</div>
