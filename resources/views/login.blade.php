<!DOCTYPE html>

<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('master/assets/') }}"
    data-template="vertical-menu-template-free"
>
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
        />

        <title>Login | Kidney Care RSU Mitra Sejati</title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href= "{{ asset('master/assets/img/favicon/icon.ico') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
        />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="{{ asset('master/assets/vendor/fonts/boxicons.css') }}" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('master/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('master/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('master/assets/css/demo.css') }}" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('master/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

        <!-- Page CSS -->
        <style>
            /* Styles for responsive logo */
            .responsive-logo {
                max-width: 30%;
            }

            /* Media query for smaller screens */
            @media (max-width: 768px) {
                .responsive-logo {
                    max-width: 25%; /* You can adjust this value as needed */
                }
            }
        </style>

        <!-- Page -->
        <link rel="stylesheet" href="{{ asset('master/assets/vendor/css/pages/page-auth.css') }}" />
        <!-- Helpers -->
        <script src="{{ asset('master/assets/vendor/js/helpers.js') }}"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{ asset('master/assets/js/config.js') }}"></script>
    </head>

    <body>
        <!-- Content -->
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <!-- Register -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center text-center">
                                <a href="#" class="app-brand-link gap-2">
                                    <span class="app-brand-logo demo">
                                        <img src="{{ asset('master/assets/img/kidney_care.png') }}" alt="Kidney Care Logo" class="responsive-logo">
                                    </span>
                                </a>
                            </div>
                            <!-- /Logo -->

                            <form id="formAuthentication" class="mb-3" action="{{ route('authenticate') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username Anda" autofocus/>
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="form-control" id="password" name="password"  placeholder="Masukkan Password Anda" autofocus/>
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Register -->
                </div>
            </div>
        </div>
        <!-- / Content -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="{{ asset('master/assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('master/assets/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('master/assets/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('master/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

        <script src="{{ asset('master/assets/vendor/js/menu.js') }}"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->

        <!-- Main JS -->
        <script src="{{ asset('master/assets/js/main.js') }}"></script>

        <!-- Page JS -->

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
</html>
