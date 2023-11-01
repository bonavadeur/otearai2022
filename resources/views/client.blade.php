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
                Konnichiwa, {{$username}}, Thành tích của bạn là {{$achievement}}
                <a class="btn btn-primary col-auto" href="/stat">Xếp hạng</a>
                <a class="btn btn-danger col-auto" href="/logout">Đăng xuất</a>
            </div>
        </div>
        <table class="table table-striped'">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Đội 1</th>
                    <th scope="col">Đội 2</th>
                    <th scope="col">Thời gian</th>
                    <th scope="col">Tỉ lệ đội 1 chấp</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="table-body">
            </tbody>
            </table>
    </div>

<script type="text/javascript" src="resources/js/jquery-3.6.0.js"></script>
<script type="text/javascript" src="resources/js/bootstrap.bundle.js"></script>
<script type="text/javascript">
    function TS_date(timestamp) {
        date = new Date(timestamp);
        return date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear() + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
    }

    function TS_mil(timestamp) {
        return Date.parse(timestamp);
    }

    const NOW = Date.now();
    fetch('/api/matches').then(response => {return response.json();}).then(result => {
        result.forEach(element => {
            if((TS_mil(element["time"]) - NOW) > 3600000) {
                str = `<td><button type="button" class="btn btn-success" id="submit-${element["id"]}">Submit</button></td></tr>
                `;
            } else {
                str = `<td></td></tr>`;
            }
            $("#table-body").append(`
                <tr>
                    <td>${element["id"]}</td>
                    <td><input class="form-check-input" type="radio" name="match_team_${element["id"]}" value="1"> ${element["team_one"]}</td>
                    <td><input class="form-check-input" type="radio" name="match_team_${element["id"]}" value="2"> ${element["team_two"]}</td>
                    <td>${TS_date(element["time"])}</td>
                    <td>${element["challenge"]}</td>
                    ${str}
            `);

            body = {
                "userid": {{$userid}},
                "matchid": element["id"]
            };
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            fetch('/api/client-choice', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                },
                credentials: "same-origin",
                body: JSON.stringify(body)
            }).then(response => {
                return response.json();
            }).then(result => {
                console.log(result);
                $(`input[value='${result}'][name="match_team_${element["id"]}"]`).prop("checked", true);
            });
                    
            $(`#submit-${element["id"]}`).click(generate_handler({{$userid}}, element["id"]));
        });
    });

    function generate_handler(userid, matchid) {
        return function() {
            team = $(`input[name="match_team_${matchid}"]:checked`).val();
            body = {
                "userid": userid,
                "matchid": matchid,
                "choice": team
            };
            console.log(body);
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            fetch('/api/client-match-submit', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                },
                credentials: "same-origin",
                body: JSON.stringify(body)
            }).then(response => {
                return response.json();
            }).then(result => {
                window.alert(result);
            });
        }
    }
</script>
</body>
</html>