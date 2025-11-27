<template>
    <div class="carousel slide" role="region" aria-label="Featured Vehicle Stock">
        <div class="carousel-inner">
            <div class="carousel-item d-block custom_slide_height">
                <div class="overlay"></div>
                <img src="/images/Assets/1990.png" class="d-block w-100 swiperImg custom_slide_height" alt="Available stock in Sri Lanka">
                <div class="carousel-caption text-center custom_caption_position">
                    <div class="caption">
                        <div class="p-0">
                            <h1 class="main-topic-banner">LIVE AUCTION IN JAPAN</h1>
                        </div>
                        <div class="hero-content-about">
                            <div class="breadcrumb-wrapper">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">LIVE AUCTION</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {}
</script>

<style scoped>
.carousel-item {
    position: relative;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #0b0a6480; 
    z-index: 1;
}

.custom_slide_height {
    height: 40vh !important;
    object-fit: cover;
    object-position: center 70%;
}

.carousel-caption {
     position: absolute;          
  top: 55%;                    
  left: 50%;                    
  transform: translate(-50%, -50%);
  width: 100%;                  
  padding: 0 1rem;              
  text-align: center;           
  z-index: 2;
}

.main-topic-banner {
    font-size: 3.4rem;
    font-weight: 700;
    color: #ffffff;
    line-height: 1;
    margin: 0; 
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.hero-content-about {
    margin-top: 26px; 
    padding: 0; 
    position: relative;
}

.breadcrumb-wrapper {
    display: flex;
    justify-content: center;
}

.breadcrumb {
    background: transparent;
    padding: 8px 15px;
    margin: 0;
    display: flex;
    align-items: center;
}

.breadcrumb-item {
    font-size: 1rem;
    color: #ffffff;
}

.breadcrumb-item a {
    color: #ffffff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
    color: #cccccc;
}

.breadcrumb-item a:focus {
    outline: 2px solid #ffbf00;
    outline-offset: 2px;
}

.breadcrumb-item.active {
    color: #cccccc;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "/"; 
    color: #ffffff;
    padding: 0 8px;
}

@media (max-width: 768px) {
    .main-topic-banner {
        font-size: 2.4rem;
    }

    .custom_slide_height {
        height: 30vh !important;
    }

    .hero-content-about {
        margin-top: 8px;
    }

    .breadcrumb-item {
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    .main-topic-banner {
        font-size: 1.8rem;
    }

    .custom_slide_height {
        height: 25vh !important;
    }

    .hero-content-about {
        margin-top: 5px;
    }

    .breadcrumb-item {
        font-size: 0.8rem;
    }
}
</style>