// function getVideo()
// {
//     $.ajax({
//         type: 'GET',
//         url: 'https://www.googleapis.com/youtube/v3/search',
//         data: {
//             key: 'AIzaSyBO4oz1bTTkFKIO56EutgMISzzHqQ-jcLc',
//             q: "daai tv indonesia",
//             part: 'snippet',
//             maxResults: 10,
//             type: 'video',
//             videoEmbeddable: true,
//         },
//         success: function (data) {
//             embedVideo(data)
//         },
//         error: function (response) {
//             console.log("Request Failed!");
//         }
//     });
// }

// function embedVideo(data) {
//     $('iframe').attr('src', 'https://www.youtube.com/embed/' + data.items[2].id.videoId)
// }

// getVideo();

function togglepass() {
    let pass = document.getElementById("regPassword");
    if (pass.type == 'password') {
        pass.type = 'text'
    } else {
        pass.type = 'password'
    }
}

function previewImage()
{
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[ 0 ]);

    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}