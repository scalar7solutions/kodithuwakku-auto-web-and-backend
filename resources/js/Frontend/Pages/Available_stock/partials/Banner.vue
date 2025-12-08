<template>
    <div class="carousel slide" role="region" aria-label="Featured Vehicle Stock">
      <div class="carousel-inner">
        <div class="carousel-item d-block custom_slide_height">
          <div class="overlay"></div>
          <img src="/images/Assets/lambo1.png" class="d-block w-100 swiperImg custom_slide_height"
            alt="Available stock">
          <div class="carousel-caption text-center custom_caption_position" >
            <div class="caption">
              <div class="p-0">
                <h1 class="main-topic-banner">
                  AVAILABLE STOCK 
                  <span v-if="selectedCountry">  IN {{ selectedCountry.name }}</span>
                </h1>
              </div>
              <div class="hero-content-about">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <Link :href="route('index')">Home</Link>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        AVAILABLE STOCK 
                      </li>
                      <span class="breadcrumb-item active" aria-current="page" v-if="selectedCountry">{{ selectedCountry.name }}</span>

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
  import { Link } from '@inertiajs/inertia-vue3';
  
  export default {
    components: {
      Link,
    },
    props: {
      selectedCountry: {
        type: Object,
        default: null,
      },
    },
    mounted() {
      console.log('Selected Country in Banner:', this.selectedCountry);
    },
  };
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
    object-position: center 70% !important;
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

/* Ensure the inner block shrinks to its content */
.caption {
  display: inline-block;
}
  .main-topic-banner {
    
    font-size: 3.4rem;
    font-weight: 700;
    color: #ffffff;
    line-height: 1;
    display: block;
    margin: 0; 
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  }
  
  .hero-content-about {
    margin-top: 26px;
    padding: 0px;
    position: relative;
  }
  
  .about-us-text {
    font-size: 1.2rem;
    color: #ffffff;
    margin: 0 auto 15px;
    max-width: 90%;
  }
  
  .breadcrumb-wrapper {
    display: flex;
    justify-content: center;
     margin-top: 1rem; 
  }
  
  .breadcrumb {
    background: transparent;
     padding: 0.5rem 1rem;
    margin: 0;
    display: flex;
    align-items: center;
  }
  
  .breadcrumb-item {
    font-size: 1rem;
    color: #ffffff;
    line-height: 1.2;
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
    color: #ffffff;
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