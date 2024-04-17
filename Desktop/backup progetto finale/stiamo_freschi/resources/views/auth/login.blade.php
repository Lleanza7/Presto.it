<x-layout>
    <x-navbar />

    <div class="containerPadreLogin">
        <div id="containerFormLogin" class="col-12 col-xl-4">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="accediLogin">{{ __('ui.login') }}</h1>
            <form action="./login" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">{{ __('ui.insertemail') }}</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        style="width: 100%; height:40px;" aria-describedby="emailHelp" value="{{ old('email') }}">
                </div>

                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">{{ __('ui.insertipsw') }}</label>
                    <input type="password" name="password" class="form-control" style="width: 100%; height:40px;"
                        id="exampleInputPassword1">
                </div>
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">{{ __('ui.remember') }}</label>
                </div>
                @error('email')
                    <div class="alert alert-danger"
                        style="height: 30px;display:flex;justify-content:center;align-items:center;">{{ $message }}
                    </div>
                @enderror

                <button type="submit" class="BtnAccediLogin">{{ __('ui.login') }}</button>

                
                <h6 class="oppureLogin">{{ __('ui.or') }}</h6>


                <button type="button" class="BtnAuthGoogle">
                    {{-- icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-google" viewBox="0 0 16 16">
                        <path
                            d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z" />
                    </svg>
                    {{-- text --}}
                    <a href="{{route ('google.auth')}}" style="color: white">{{ __('ui.registerGoogle') }}</a></button>
                <a href="/forgot-password">
                    <p class="pswDimenticata" style="color: black">{{ __('ui.requestPsw') }}</p>
                </a>
                <p class="vaiARegistrati" style="color: black;margin-top:0px;">{{ __('ui.youNotRegister') }} <a href="/register"><span style="font-weight: 500">{{ __('ui.clickHere') }}</span></p></a>
            </form>
        </div>
    </div>

</x-layout>
