<x-layout>
    <x-navbar />
    <div class="containerPadreLogin">
        <div id="containerFormLogin" class="col-12 col-xl-4" style="min-height:300px">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="accediLogin">{{ __('ui.recoverPsw') }}</h1>
            <form action="/forgot-password" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">{{ __('ui.insertemailPsw') }}</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        style="width: 100%; height:40px;" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">{{ __('ui.emailHelp') }}</div>
                </div>
                @error('email')
                    <div class="alert alert-danger"
                        style="height: 30px;display:flex;justify-content:center;align-items:center;">{{ $message }}
                    </div>
                @enderror
                <button type="submit" class="BtnAccediLogin">{{ __('ui.buttonContinues') }}</button>
            </form>
        </div>
    </div>

</x-layout>
