@extends('layouts.app')

@section('content')
    <div class="wrapper container ">
        <div class="row row-cols-3 flex-column ">

            <section class="bio text-center my-5 mx-auto">
                <h1 class="welcome">Welcome! 📱</h1>
            </section>
            <figure class="mx-auto my-5 code d-flex gap-2 flex-row align-items-end justify-content-between ">
                <div class="tooltipp" data-tooltip="HTML">
                    <i class="fa-brands fa-html5" style="color: #f53d00;"></i>
                </div>
                <div class="tooltipp" data-tooltip="CSS">
                    <i class="fa-brands fa-css3-alt" style="color: #0353dd;"></i>
                </div>
                <div class="tooltipp" data-tooltip="BOOTSTRAP">
                    <i class="fa-brands fa-bootstrap" style="color: #a90dfd;"></i>
                </div>
                <div class="tooltipp" data-tooltip="JAVASCRIPT">
                    <i class="fa-brands fa-square-js" style="color: #edf104;"></i>
                </div>
                <div class="tooltipp" data-tooltip="VUE">
                    <i class="fa-brands fa-vuejs" style="color: #3FB984;"></i>
                </div>
                <div class="tooltipp" data-tooltip="VITE">
                    <i class="fa-brands fa-vuejs" style="color: #8966F2;"></i>
                </div>
                <div class="tooltipp" data-tooltip="SCSS">
                    <i class="fa-brands fa-sass" style="color: #fd444d;"></i>
                </div>
                <div class="tooltipp" data-tooltip="PHP">
                    <i class="fa-brands fa-php" style="color: #787CB4;"></i>
                </div>
                <div class="tooltipp" data-tooltip="MYSQL">
                    <i class="fa-solid fa-database" style="color: #417399;"></i>
                </div>
                <div class="tooltipp" data-tooltip="LARAVEL">
                    <i class="fa-brands fa-laravel" style="color:#F2271C"></i>
                </div>
            </figure>

            <div class="mx-auto">
                <ul class="d-flex social gap-3 justify-content-center">
                    <li class="my-2">
                        <a href="https://www.instagram.com/fedekh_/">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li class="my-2">
                        <a href="https://www.linkedin.com/in/federico-ceteron4a91b2/">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </li>
                    <li class="my-2">
                        <a href="https://github.com/Fedekh?tab=repositories">
                            <i class="fa-brands fa-github"></i>
                        </a>
                    </li>
                    <li class="my-2">
                        <a href="https://wa.me/qr/UXWDX7A6BJXKC1">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </li>
                    <li class="my-2">
                        <a href="mailTo:federicocet@gmail.com">
                            <i class="fa-solid fa-envelope"></i>
                        </a>
                    </li>
                    <li class="my-2">
                        <a href="https://discord.gg/eaKFCHrV">
                            <i class="fa-brands fa-discord"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
