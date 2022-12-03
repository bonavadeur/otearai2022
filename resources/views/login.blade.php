<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="resources/image/logo.png"/>
    <link rel="stylesheet" href="resources/css/bootstrap.css" />
    <link rel="stylesheet" href="resources/css/style.css" />
    <title>Otearai 2022</title>
</head>
<body>
    <div class="container text-center">
        <form action="/login" method="post" class="user">
            @csrf
            <div class="row justify-content-center">
                <div class="form-group col-3">
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group col-3">
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                    </div>
                </div>
            </div>
            <input type="submit" name="login" value="Đăng nhập" class="btn btn-danger btn-user btn-block">
        </form>
    </div>

    <script type="text/javascript" src="resources/js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.bundle.js"></script>
</body>
</html>