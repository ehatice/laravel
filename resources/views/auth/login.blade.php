<!DOCTYPE html>
<html data-bs-theme="light" lang="en"
    style="padding-top: 56px;padding-right: 12px;padding-bottom: 11px;padding-left: 95px;margin-left: -7px;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Giriş Sayfası</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body
    style="margin-top: 11px;margin-bottom: -211px;margin-right: 0px;padding-right: 116px;padding-bottom: 198px;padding-top: 0px;padding-left: 56px;margin-left: 103px;">
    <div class="d-flex d-xl-flex align-items-center align-items-xl-center" style="width: 100%;height: 100%;"></div>
    <div class="col-md-9 col-lg-12 col-xl-10" style="color: var(--bs-secondary-color);">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0" style="padding-left: 0px;margin-left: 0px;">
                <div class="row"
                    style="padding-bottom: 0px;margin-bottom: -1px;padding-top: 0px;padding-right: 0px;margin-right: -30px;margin-left: 19px;">
                    <div class="col-lg-6 d-none d-lg-flex"><img src="assets/img/login.jpg" width="445" height="435"
                            style="color: rgba(86,180,195,255);margin-left: -14px;margin-right: -21px;padding-bottom: 0px;margin-bottom: -1px;padding-right: 3px;padding-top: 10px;">
                    </div>
                    <div class="col-lg-6 col-xl-6"
                        style="padding-top: 0px;padding-left: 0px;margin-left: -25px;margin-top: 14px;padding-bottom: 22px;margin-right: -2px;">
                        <div class="p-5"
                            style="margin-left: 20px;padding-bottom: 32px;padding-top: 20px;margin-right: 26px;margin-bottom: -18px;">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">DOKTOR RANDEVU SİSTEMİ</h4>
                            </div>
                            <form class="user" id="loginForm" method="POST" action={{route('login')}}>
                                @csrf
                                <div class="mb-3"><input class="form-control form-control-user" type="email"
                                        id="email" placeholder="email adresinizi giriniz..." name="email"></div>
                                <div class="mb-3"><input class="form-control form-control-user " type="password"
                                        id="password" placeholder="Şifrenizi giriniz..." name="password"
                                        autocomplete="off"></div>
                                <div class="mb-3">
                                    <div class="custom-control custom-checkbox small"></div>
                                </div><button class="btn btn-primary d-block btn-user w-100" type="submit"
                                    style="background: #56b4c3;">Giriş Yap</button>
                                <hr>
                                <hr>
                            </form>
                            <div class="text-center"
                                style="padding-left: 0px;padding-right: 0px;margin-right: 0px;border-color: var(--bs-secondary-color);">
                                <a class="small" href="forgot-password.html"
                                    style="color: var(--bs-black);background: var(--bs-body-bg);border-color: var(--bs-emphasis-color);--bs-body-color: var(--bs-emphasis-color);">Şifreni
                                    mi unuttun?</a>
                            </div>
                            <div class="text-center" style="padding-left: 0px;padding-right: 0px;margin-right: 0px;"><a
                                    class="small" href="forgot-password.html"
                                    style="color: var(--bs-emphasis-color);border-color: var(--bs-emphasis-color);background: var(--bs-body-bg);--bs-body-color: var(--bs-emphasis-color);--bs-body-bg: var(--bs-card-cap-bg);">Kayıt
                                    Ol</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


 


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#loginForm').submit(function(e) {
            e.preventDefault();
            var data = $("#loginForm").serialize();
            var url = "login-process";
           
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: "json",
                success: function(result) {
                    responseMessage("success", result.message);
                    setTimeout(function() {
                        window.location = "/";
                    }, 2000);
                },
                error: function(xhr) {
                    let result = xhr.responseJSON || {};
                    let resultCnt = '';

                    switch (result.status) {
                        case 'invalidArg':
                            $.each(result.message, function(index, item) {
                                resultCnt += '<p>' + item[0] + '</p>';
                            });
                            responseMessage("error", resultCnt);
                            break;
                        default:
                            responseMessage("error", result.message);
                            break;
                    }
                }
            });
        });

        function responseMessage(classType, text = '') {
            Swal.fire({
                position: 'top-end',
                icon: classType,
                html: text,
                showConfirmButton: false,
                timer: 5000
            });
        }
    </script>

</html>
