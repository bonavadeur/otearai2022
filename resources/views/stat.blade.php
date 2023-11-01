<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="resources/image/logo.png"/>
    <link rel="stylesheet" href="resources/css/bootstrap.css" />
    <link rel="stylesheet" href="resources/css/style.css" />
    <title>Otearai 2022</title>
</head>
<body>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-auto">
                Konnichiwa, {{$username}}, Thành tích của bạn là {{$achivement}}
                <a class="btn btn-warning col-auto" href="/client">Trang chủ</a>
                <a class="btn btn-danger col-auto" href="/logout">Đăng xuất</a>
            </div>
        </div>
        <table class="table table-striped'">
            <thead>
                <tr>
                    <th scope="col">Rank</th>
                    <th scope="col">Người chơi</th>
                    <th scope="col">Thành tích</th></th>
                </tr>
            </thead>
            <tbody id="table-body">
            </tbody>
            </table>
    </div>

<script type="text/javascript" src="resources/js/jquery-3.6.0.js"></script>
<script type="text/javascript" src="resources/js/bootstrap.bundle.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        fetch('/api/stat').then(response => {return response.json();}).then(result => {
        var i = -1;
        console.log(result);
        result.forEach(element => {
            i += 1;
            let color;
            if(element["achievement"] > 0) {
                color = "success";
            }
            if(element["achievement"] == 0) {
                color = "info";
            }
            if(element["achievement"] < 0) {
                color = "danger";
            }
            $("#table-body").append(`
                <tr>
                    <td class="table-${color}">${i}</td>
                    <td class="table-${color}">${element["username"]}</td>
                    <td class="table-${color}">${element["achievement"]}</td>
                </tr>
            `);
        });
    });
    });
</script>
</body>
</html>