$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function onScanSuccess(decodedText, decodedResult) {
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

let html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: {width: 250, height: 250} },
/* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);


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