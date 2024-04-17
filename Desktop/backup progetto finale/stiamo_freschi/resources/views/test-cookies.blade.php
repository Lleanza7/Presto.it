<x-layout>
    <x-navbar />





    @if (!isset($_COOKIE['request_user_cookies']))
        <div id="cookies" class="ContainerModaleCookies">
            <div class="modaleCookies">
                <div class="containerTextModale">
                    <h5>{{ __('ui.information') }}</h5>
                    <p>{{ __('ui.theSite') }} <b>Presto.it</b> {{ __('ui.textInformation') }}</p>
                </div>
                <div class="containerBtnCookies">
                    <button class="btn btn-primary"><a style="text-decoration: none;color:white;"
                            href="{{ route('accetta-cookies') }}">{{ __('ui.buttonAcceptCookies') }}</a></button>
                    <button class="btn btn-danger"><a style="text-decoration: none;color:white;"
                            href="{{ route('accetta-cookies') }}">{{ __('ui.buttonrefuseCookies') }}</a></button>
                </div>
            </div>
        </div>
    @endif


    <div onclick="openinfo()" style="position:absolute; right:5px; bottom:5px">
        <button style="border-radius: 50%;height:50px;width:50px: padding :0px ">cookie
        </button>
    </div>

    <script>
        var open = true;

        function openinfo() {
            if (open === false) {
                document.getElementById('cookies').style.display = 'none';
                open = true;
            } else {
                document.getElementById('cookies').style.display = 'flex';
                open = false;
            }

        }
    </script>


</x-layout>
