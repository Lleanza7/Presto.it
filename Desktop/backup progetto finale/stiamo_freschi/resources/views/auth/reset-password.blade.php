<x-layout>
    <x-navbar />
    <div class="containerPadreLogin">
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div id="containerFormLogin" class="col-12 col-xl-4">
            <h1 class="accediLogin">{{__('ui.resetPsw')}}</h1>
            <form action="/reset-password" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">{{__('ui.emailResetPsw')}}</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        style="width: 100%; height:40px;" @if(Auth::check())value="{{Auth::user()->email}}"@endif aria-describedby="emailHelp">
                </div>
                @error('email')
                    <div class="alert alert-danger"
                        style="height: 30px;display:flex;justify-content:center;align-items:center;">{{ $message }}
                    </div>
                @enderror
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">{{__('ui.newPswReset')}}</label>
                    <input type="password" name="password" class="form-control" style="width: 100%; height:40px;"
                        id="exampleInputPassword1" value="">
                </div>
                @error('password')
                    <div class="alert alert-danger"
                        style="height: 30px;display:flex;justify-content:center;align-items:center;">{{ $message }}
                    </div>
                @enderror

                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">{{__('ui.retypePswReset')}}</label>
                    <input style="width: 100%; height:40px;" type="password" name="password_confirmation"
                        class="form-control" style="width: 100%; height:35px;" id="exampleInputPassword1">
                </div>
                @error('password_confirmation')
                    <div class="alert alert-danger"
                        style="height: 30px;display:flex;justify-content:center;align-items:center;">{{ $message }}
                    </div>
                @enderror
                <div class="mb-4">
                    <input hidden type="hidden" name="token" value="{{request()->route('token')}}" class="form-control">
                </div>

                <button type="submit" class="BtnAccediLogin">{{__('ui.editPsw')}}</button>
            </form>
        </div>
    </div>

</x-layout>
