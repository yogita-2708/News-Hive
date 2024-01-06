<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carosuel</title>
    <style>
        .carousel-inner {
            position: relative;
        }

        .carousel-item img {
            width: 100%;
            opacity: 0.6; 
        }
        .carousel-caption {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white; 
        }
        .carousel-item {
            height: 41rem; 
        }
    </style>
</head>
<body>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images\politics2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="display-6 fw-bold">Politics</h5>
                <p>Stay tuned for the latest developments.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="images\science.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="display-6 fw-bold">Science & Technology</h5>
                <p>Breakthrough in quantum computing research sparks optimism for revolutionary advancements.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="images\sports.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="display-6 fw-bold">Sports</h5>
                <p>NewsHive sports is the ultimate destination for sports.</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
</body>
</html>