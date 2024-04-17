<x-layout>
    <x-navbar />

    <div class="containerPadreLogin">
        <div id="containerFormLogin" class="col-12 col-xl-4">
            <h1 class="accediLogin">{{ __('ui.registerR') }}</h1>
            <form action="./register" method="POST" style="margin-top:05px">
                @csrf
                <div class="mb-3" style="margin-bottom: 5px !important">
                    <label for="exampleInputEmail1" class="form-label">{{ __('ui.insertNameR') }}</label>
                    <input type="text" name="name" class="form-control" style="width: 100%; height:35px;"
                        id="name" aria-describedby="emailHelp">
                    @error('name')
                        <div class="alert alert-danger"
                            style="height: 30px;display:flex;justify-content:center;align-items:center;">{{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="mb-3"style="margin-bottom: 5px !important">
                    <label for="exampleInputEmail1" class="form-label">{{ __('ui.insertemailR') }}</label>
                    <input type="email" name="email" class="form-control" style="width: 100%; height:35px;"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                @error('email')
                    <div class="alert alert-danger"
                        style="height: 30px;display:flex;justify-content:center;align-items:center;">{{ $message }}
                    </div>
                @enderror
                <div class="mb-3"style="margin-bottom: 5px !important">
                    <label for="exampleInputPassword1" class="form-label">{{ __('ui.newPswR') }}</label>
                    <input type="password" name="password" class="form-control" style="width: 100%; height:35px;"
                        id="exampleInputPassword1">
                    <div id="emailHelp" class="form-text"></div>

                </div>
                @error('password')
                    <div class="alert alert-danger"
                        style="height: 30px;display:flex;justify-content:center;align-items:center;">{{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{ __('ui.retypePswR') }}</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        style="width: 100%; height:35px;" id="exampleInputPassword1">
                </div>
                @error('password_confirmation')
                    <div class="alert alert-danger"
                        style="height: 30px;display:flex;justify-content:center;align-items:center;">{{ $message }}
                    </div>
                @enderror


                <div class="mb-3 form-check"style="margin-bottom: 5px !important">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">{{ __('ui.rememberR') }}</label>
                </div>
                <button type="submit" class="BtnRegistratiLogin">{{ __('ui.registerR') }}</button>
                {{-- <button type="submit" class="BtnRegistratiLogin">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-google" viewBox="0 0 16 16" style="margin-right: 20px">
                        <path
                            d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z" />
                    </svg>
                    Accedi con Google</button>
                <button type="submit" class="BtnRegistratiLogin">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-facebook" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg>
                    Accedi con Facebook</button> --}}


                <p class="giaRegistrato">{{ __('ui.requestRegister') }} <span style="font-weight: bold;"><a
                            href="/login" class="accedi">{{ __('ui.loginR') }}</a></span></p>
            </form>
        </div>
    </div>


</x-layout>
