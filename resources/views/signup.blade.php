
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            
        <a href="{{route('index')}} " class="ms-5 mt-5"><img src="assets/images/logo/bey.jpg" width="230px" height="230px"></a>
        
            <h1 class="mt-3 mb-4 text-center">BEY GARAJ KAYIT</h1>

            <form action="{{route('signup')}}" method="POST">
                @csrf
                 <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" name="name" placeholder="Ad Soyad">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" name="email" placeholder="Kullanıcı Adı">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="password" placeholder="Şifre">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                
                <button class="btn btn-warning btn-block btn-lg shadow-lg mt-5" type="submit">Kayıt</button>
            </form>
            <div class="text-center mt-5 text-lg fs-6">
                <p>© 2023 MIKBAL</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block bg-warning">
        
    </div>
</div>

    </div>
</body>

</html>
