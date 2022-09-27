
        let nullAlert = () => {
            document.getElementById('alert').classList.add('d-none');
        }
        var apiKey = "AKOIIKwhHCsfmo2pbsXwPpwYE6kbhWVR3g3tlDIQ";
        var curiosityManifest;
	
        function getManifests() {            
            var xmlHttp = new XMLHttpRequest();
            
            xmlHttp.onload = function() {
                if (xmlHttp.status == 200) {
                	curiosityManifest = JSON.parse(xmlHttp.responseText).photo_manifest;
                    
                    var updatedPhotos = {};
                    curiosityManifest.photos.forEach(photo => {
                        updatedPhotos[photo.sol] = photo;
                    });

                    curiosityManifest.photos = updatedPhotos;
                    console.log(curiosityManifest);
                }
            };
            
            xmlHttp.open("GET", "https://api.nasa.gov/mars-photos/api/v1/manifests/curiosity?api_key=" + apiKey, true);
            xmlHttp.send();
        }

        function changeSol() {
            var solVal = document.getElementById("sol").value;
            if (curiosityManifest.photos[solVal] == null) {
                // alert("No data for this sol");
                document.getElementById('alert').classList.remove('d-none');
                return;
            }

            var cameras = curiosityManifest.photos[solVal].cameras;
            var selectString = "";
            cameras.forEach(cam => {
                selectString += "<option value='" + cam + "'>" + cam + "</option>";
            });

            document.getElementById("cameraSelect").innerHTML = selectString;
        }

        function submitInfo() {
            let loading = document.getElementById('loading');
            loading.classList.remove('d-none')

            const images = document.getElementById('displayImages');
            images.innerHTML = "";
            document.getElementById('displayInSlider').innerHTML = ""
            var xmlHttp = new XMLHttpRequest();

            xmlHttp.onload = function() {
                if (xmlHttp.status == 200) {
                    loading.classList.add('d-none')
                    document.getElementById('sliderHolder').classList.remove('d-none');
                    response = JSON.parse(xmlHttp.responseText);
                   
                    
                    
                    response.photos.forEach(element => {
                        //Create img component
                        const image = document.createElement('img');
                        image.src = element.img_src;

                        // Create a main div
                        const div = document.createElement('div');
                        div.append(image);

                        //Create p tag
                        const p = document.createElement('p');
                        p.classList.add('p-2')
                        p.classList.add('fw-bold')
                        p.innerText = element.camera.full_name;
                        div.append(p);

                        //adding some class to div
                        div.classList.add('shadow');

                        const div2 = document.createElement('div');
                        div2.classList.add('mySlides')
                        const img2 = document.createElement('img');
                        img2.style.width = '100%';
                        img2.src = element.img_src;
                        div2.append(img2)
                        images.append(div);
                        document.getElementById('displayInSlider').append(div2)
                    });
                    slideIndex = 1
                    showSlides(slideIndex)
                    
                }
            };

            var sol = document.getElementById("sol").value;
            var camera = document.getElementById("cameraSelect").value;

            var url = "https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=" + sol + "&camera=" + camera + "&api_key=" + apiKey;
            xmlHttp.open("GET", url, true);
            xmlHttp.send();
        }




        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
        }