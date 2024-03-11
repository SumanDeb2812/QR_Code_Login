<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container d-flex align-items-center" style="height: 100vh">
        <div class="row justify-content-between align-items-center shadow-lg p-5">
            <div class="col-5">
                <div style="width: 500px" id="reader"></div>
            </div>
            <div class="col-5 d-flex flex-column text-center">
                <h5 class="mb-5">Login With Credentials</h5>
                <div class="w-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <label for="" class="w-100">Employee ID</label>
                        <input type="emp_id" class="w-100">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-5">
                        <label for="" class="w-100">Password</label>
                        <input type="password" class="w-100">
                    </div>
                    <input type="submit" value="Login" class="w-50">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        // decodedText.forEach(element => {
        //     document.getElementById('emp_id').innerHTML = element.emp_id;
        //     document.getElementById('password').innerHTML = element.password;
        // });
            $.ajax({
                url: 'login',
                type: 'POST',
                data: {data: decodedText},
                success: function(response){
                    if(response == 1){
                        window.location.pathname = '/dashboard';
                    }else{
                        alert('invailed credentials');
                    }
                }
            });
        }

        function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: {width: 250, height: 250} },
        /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);

    </script>
    {{-- <script>
        // document.addEventListener('DOMContentLoaded', () => {
        //     let video = document.getElementById('video');
        //     let login = document.getElementById('login');
        //     let mediaDevices = navigator.mediaDevices;

        //     login.addEventListener('click', () => {
        //         navigator.mediaDevices
        //             .getUserMedia({ video: true, audio: false })
        //             .then((stream) => {
        //                 video.srcObject = stream;
        //                 video.play();
        //             })
        //             .catch((err) => {
        //                 console.error(`An error occurred: ${err}`);
        //             });
        //     });

        // });
    </script> --}}
</body>
</html>