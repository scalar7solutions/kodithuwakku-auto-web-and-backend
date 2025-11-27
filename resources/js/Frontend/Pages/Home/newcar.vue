<template>
    <AppLayout>
      <div class="border-0 container mt-3 py-4">
        <div class="small text-secondary mb-2">LEASE A BRAND NEW CAR</div>
  
        <div class="row">
          <!-- Main Image and Gallery Section -->
          <div class="col-lg-8">
            <div class="position-relative main-image-container mb-3">
              <span class="image-counter2">20</span>
              <!-- Main Image -->
              <img
                src="images/Assets/car1.jpg"
                class="img-fluid main-image rounded"
                alt="Volkswagen ID.7"
                id="mainImage"
              />
              <!-- Button to open modal -->
              <button
                class="btn btn-light gallery-btn"
                data-bs-toggle="modal"
                data-bs-target="#galleryModal"
              >
                <i class="bi bi-grid"></i> View gallery
              </button>
            </div>
  
            <!-- Thumbnails -->
            <div class="row g-2 thumbnail-gallery">
              <div class="col-4">
                <img
                  src="images/Assets/car2.jpg"
                  class="img-fluid rounded thumbnail"
                  alt="ID.7 Side View"
                  data-image="images/Assets/car2.jpg"
                />
              </div>
              <div class="col-4">
                <img
                  src="images/Assets/car3.jpg"
                  class="img-fluid rounded thumbnail"
                  alt="ID.7 Rear View"
                  data-image="images/Assets/car3.jpg"
                />
              </div>
              <div class="col-4">
                <img
                  src="images/Assets/car1.jpg"
                  class="img-fluid rounded thumbnail"
                  alt="ID.7 Front View"
                  data-image="images/Assets/car1.jpg"
                />
              </div>
            </div>
          </div>
  
          <!-- Car Details Section -->
          <div class="col-lg-4">
            <div class="car-details">
              <div class="badges mb-2">
                <span class="badge badge-custom-red">Brand new</span>
                <span class="badge badge-custom-green">Lease deal</span>
              </div>
  
              <h1 class="car-title text-start">Volkswagen ID.7</h1>
              <h2 class="car-subtitle text-secondary">Pro S 86kWh Match Fastback Auto 5dr</h2>
  
              <div class="price-section my-4">
                <h2 class="price">£292.12</h2>
              </div>
  
              <div class="rating mb-4">
                <div class="d-flex align-items-center">
                  <span class="rating-number me-2">4</span>
                  <div class="stars">★★★★☆</div>
                </div>
              </div>
  
              <p class="description">
                Big Volkswagen saloons have traditionally been cars of understated satisfaction
                offering spacious, quiet, smooth cocoons for executives who spend most of their
                lives on the motorway but   Big Volkswagen saloons have traditionally been cars of understated satisfaction
                offering spacious, quiet, smooth cocoons for executives who spend still have to prove value for money to the board...
              </p>
  
              <div class="action-buttons d-flex gap-2">
                <button class="btn btn-primary btn-lg flex-fill">Start application</button>
                <button class="btn btn-outline-primary btn-lg flex-fill">Contact us</button>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Modal for Gallery -->
        <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
  
              <div class="modal-body">
                <div id="galleryCarousel" class="carousel slide">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img
                        src="images/Assets/car1.jpg"
                        class="d-block w-100"
                        alt="Volkswagen ID.7"
                      />
                    </div>
                    <div class="carousel-item">
                      <img
                        src="images/Assets/car2.jpg"
                        class="d-block w-100"
                        alt="ID.7 Side View"
                      />
                    </div>
                    <div class="carousel-item">
                      <img
                        src="images/Assets/car3.jpg"
                        class="d-block w-100"
                        alt="ID.7 Rear View"
                      />
                    </div>
                    <div class="carousel-item">
                      <img
                        src="images/Assets/car4.jpg"
                        class="d-block w-100"
                        alt="ID.7 Front View"
                      />
                    </div>
                  </div>
  
                  <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#galleryCarousel"
                    data-bs-slide="prev"
                  >
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#galleryCarousel"
                    data-bs-slide="next"
                  >
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        

    <div class="container summary">
        <h1 class="fw-bold text-start">Vehicle summary</h1>
        
        <div class="summary-grid">
            <div class="summary-item">
                <span class="label">Vehicle Name</span>
                <span class="value">Volkswagen ID.7</span>
            </div>
            <div class="summary-item">
                <span class="label">Make</span>
                <span class="value">Volkswagen</span>
            </div>
            <div class="summary-item">
                <span class="label">Vehicle type</span>
                <span class="value">Covertable</span>
            </div>
            <div class="summary-item">
                <span class="label">Condition</span>
                <span class="value">Recondition</span>
            </div>
            <div class="summary-item">
                <span class="label">Fuel</span>
                <span class="value">Diesel</span>
            </div>
            <div class="summary-item">
                <span class="label">Vehicle Seats</span>
                <span class="value">4</span>
            </div>
            <div class="summary-item">
                <span class="label">Vehicle Doors</span>
                <span class="value">4</span>
            </div>
            <div class="summary-item">
                <span class="label">Ex Color</span>
                <span class="value">White</span>
            </div>
            <div class="summary-item">
                <span class="label">Transmission</span>
                <span class="value">Auto</span>
            </div>
            <div class="summary-item">
                <span class="label">In Color</span>
                <span class="value">Metallic Black</span>
            </div>
            <div class="summary-item">
                <span class="label">Chassis ID</span>
                <span class="value">Ch5021487</span>
            </div>
            <div class="summary-item">
                <span class="label">Passengers</span>
                <span class="value">5</span>
            </div>
            <div class="summary-item">
                <span class="label">Engine CC</span>
                <span class="value">2000cc</span>
            </div>
            <div class="summary-item">
                <span class="label">Drive Type</span>
                <span class="value">Front wheel drive</span>
            </div>
            <div class="summary-item">
                <span class="label">Auction Grade</span>
                <span class="value">A</span>
            </div>
            <div class="summary-item">
                <span class="label">Year</span>
                <span class="value">2022</span>
            </div>
            <div class="summary-item">
                <span class="label">Mileage</span>
                <span class="value">50000KM</span>
            </div>
            <div class="summary-item">
                <span class="label">Availability</span>
                <span class="value available">Available</span>
            </div>
        </div>

        <div class="description">
            <h1 class="fw-bold text-start">Description</h1>
            <div class="car-details">
                <h3>Genesis G70</h3>
                
                <div class="spec-item">
                    <span class="spec-label">Type:</span> Compact luxury sedan
                </div>
                
                <div class="spec-item">
                    <span class="spec-label">Engine Options:</span>
                    <ul class="features-list">
                        <li>2.0L Turbocharged Inline-4 (252 hp)</li>
                        <li>3.3L Twin-Turbocharged V6 (365 hp)</li>
                    </ul>
                </div>
                
                <div class="spec-item">
                    <span class="spec-label">Transmission:</span> 8-speed automatic
                </div>
                
                <div class="spec-item">
                    <span class="spec-label">Drive Options:</span> Rear-Wheel Drive (RWD) or All-Wheel Drive (AWD)
                </div>
                
                <div class="spec-item">
                    <span class="spec-label">Features:</span>
                    <ul class="features-list">
                        <li>Premium interior with leather upholstery</li>
                        <li>10.25-inch infotainment system with Apple CarPlay and Android Auto</li>
                        <li>Advanced Driver Assistance Systems (ADAS) like adaptive cruise control, lane-keeping assist, and blind-spot monitoring</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="vw-container2">
      <h2 class="text-center fw-bold">You may also like</h2>
      
      <div class="vw-car-grid" style="padding-right: 0;">

          <!-- Car Card 1 -->
          <div class="vw-car-card">
            <div class="vw-image-container">
              <img src="images/Assets/vwimage.png" alt="Volkswagen ID.7" class="vw-car-image">
              <div class="vw-image-counter">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="2" y="2" width="16" height="16" rx="2" />
                  <circle cx="8.5" cy="8.5" r="1.5" />
                  <path d="M20.4 14.5L16 10 4 20" />
                </svg>
                <span>20</span>
              </div>
            </div>
            <div class="vw-card-content">
              <div class="vw-price-section">
                <div class="vw-price-left">
                  <span class="vw-label">From</span>
                  <span class="vw-price">$293</span>
                  <span class="vw-price-note">Per Month (Inc. VAT)</span>
                </div>
                <div class="vw-price-right">
                  <div class="vw-detail-item">$3,026 Initial Payment</div>
                  <div class="vw-detail-item">24 Month Contract</div>
                  <div class="vw-detail-item">6000 Miles P/A</div>
                </div>
              </div>
              <div class="vw-car-details">
                <h2 class="vw-car-name">Volkswagen ID.7</h2>
                <p class="vw-car-model">Pro S 86kWh Match Fastback Auto 5dr</p>
              </div>
              <div class="vw-features-grid">
                <div class="vw-feature-item">
                  <img class="vw-ficon" style="width: 18px; height: 18px;" src="images/Assets/seat.svg" alt="" srcset="">
                  <span>5 Seats</span>
                </div>
                <div class="vw-feature-item">
                  <img class="vw-ficon" style="width: 17px; height: 17px;" src="images/Assets/doors.svg" alt="" srcset="">
                  <span>5 Doors</span>
                </div>
                <div class="vw-feature-item">
                  <img class="vw-ficon" style="width: 20px; height: 20px;" src="images/Assets/car-of-hatchback-model.svg" alt="" srcset="">
                  <span>Hatchback</span>
                </div>
                <div class="vw-feature-item">
                  <img class="vw-ficon" style="width: 18px; height: 18px;" src="images/Assets/flash.svg" alt="" srcset="">
                  <span>Electric</span>
                </div>
                <div class="vw-feature-item">
                  <img class="vw-ficon" style="width: 18px; height: 18px;" src="images/Assets/automatc.svg" alt="" srcset="">
                  <span>Automatic</span>
                </div>
                <div class="vw-feature-item">
                  <img class="vw-ficon" style="width: 18px; height: 18px;" src="images/Assets/miles.svg" alt="" srcset="">
                  <span>436 Miles</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Car Card 2 -->

          <div class="vw-car-card">
              <div class="vw-image-container">
                <img src="images/Assets/vwimage.png" alt="Volkswagen ID.7" class="vw-car-image">
                <div class="vw-image-counter">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="2" y="2" width="16" height="16" rx="2" />
                    <circle cx="8.5" cy="8.5" r="1.5" />
                    <path d="M20.4 14.5L16 10 4 20" />
                  </svg>
                  <span>20</span>
                </div>
              </div>
              <div class="vw-card-content">
                <div class="vw-price-section">
                  <div class="vw-price-left">
                    <span class="vw-label">From</span>
                    <span class="vw-price">$293</span>
                    <span class="vw-price-note">Per Month (Inc. VAT)</span>
                  </div>
                  <div class="vw-price-right">
                    <div class="vw-detail-item">$3,026 Initial Payment</div>
                    <div class="vw-detail-item">24 Month Contract</div>
                    <div class="vw-detail-item">6000 Miles P/A</div>
                  </div>
                </div>
                <div class="vw-car-details">
                  <h2 class="vw-car-name">Volkswagen ID.7</h2>
                  <p class="vw-car-model">Pro S 86kWh Match Fastback Auto 5dr</p>
                </div>
                <div class="vw-features-grid">
                  <div class="vw-feature-item">
                    <img class="vw-ficon" style="width: 18px; height: 18px;" src="images/Assets/seat.svg" alt="" srcset="">
                    <span>5 Seats</span>
                  </div>
                  <div class="vw-feature-item">
                    <img class="vw-ficon" style="width: 17px; height: 17px;" src="images/Assets/doors.svg" alt="" srcset="">
                    <span>5 Doors</span>
                  </div>
                  <div class="vw-feature-item">
                    <img class="vw-ficon" style="width: 20px; height: 20px;" src="images/Assets/car-of-hatchback-model.svg" alt="" srcset="">
                    <span>Hatchback</span>
                  </div>
                  <div class="vw-feature-item">
                    <img class="vw-ficon" style="width: 18px; height: 18px;" src="images/Assets/flash.svg" alt="" srcset="">
                    <span>Electric</span>
                  </div>
                  <div class="vw-feature-item">
                    <img class="vw-ficon" style="width: 18px; height: 18px;" src="images/Assets/automatc.svg" alt="" srcset="">
                    <span>Automatic</span>
                  </div>
                  <div class="vw-feature-item">
                    <img class="vw-ficon" style="width: 18px; height: 18px;" src="images/Assets/miles.svg" alt="" srcset="">
                    <span>436 Miles</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Car Card 3 -->

          <div class="vw-car-card">
              <div class="vw-image-container">
                <img src="images/Assets/vwimage.png" alt="Volkswagen ID.7" class="vw-car-image">
                <div class="vw-image-counter">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="2" y="2" width="16" height="16" rx="2" />
                    <circle cx="8.5" cy="8.5" r="1.5" />
                    <path d="M20.4 14.5L16 10 4 20" />
                  </svg>
                  <span>20</span>
                </div>
              </div>
              <div class="vw-card-content">
                <div class="vw-price-section">
                  <div class="vw-price-left">
                    <span class="vw-label">From</span>
                    <span class="vw-price">$293</span>
                    <span class="vw-price-note">Per Month (Inc. VAT)</span>
                  </div>
                  <div class="vw-price-right">
                    <div class="vw-detail-item">$3,026 Initial Payment</div>
                    <div class="vw-detail-item">24 Month Contract</div>
                    <div class="vw-detail-item">6000 Miles P/A</div>
                  </div>
                </div>
                <div class="vw-car-details">
                  <h2 class="vw-car-name">Volkswagen ID.7</h2>
                  <p class="vw-car-model">Pro S 86kWh Match Fastback Auto 5dr</p>
                </div>
                <div class="vw-features-grid">
                  <div class="vw-feature-item">
                    <img class="vw-ficon" style="width: 18px; height: 18px;" src="images/Assets/seat.svg" alt="" srcset="">
                    <span>5 Seats</span>
                  </div>
                  <div class="vw-feature-item">
                    <img class="vw-ficon" style="width: 17px; height: 17px;" src="images/Assets/doors.svg" alt="" srcset="">
                    <span>5 Doors</span>
                  </div>
                  <div class="vw-feature-item">
                    <img class="vw-ficon" style="width: 20px; height: 20px;" src="images/Assets/car-of-hatchback-model.svg" alt="" srcset="">
                    <span>Hatchback</span>
                  </div>
                  <div class="vw-feature-item">
                    <img class="vw-ficon" style="width: 18px; height: 18px;" src="images/Assets/flash.svg" alt="" srcset="">
                    <span>Electric</span>
                  </div>
                  <div class="vw-feature-item">
                    <img class="vw-ficon" style="width: 18px; height: 18px;" src="images/Assets/automatc.svg" alt="" srcset="">
                    <span>Automatic</span>
                  </div>
                  <div class="vw-feature-item">
                    <img class="vw-ficon" style="width: 18px; height: 18px;" src="images/Assets/miles.svg" alt="" srcset="">
                    <span>436 Miles</span>
                  </div>
                </div>
              </div>
            </div>

          
      </div>
  </div>
      </div>
    </AppLayout>
  </template>
  
  <script>
 
  import AppLayout from '@@/Layouts/AppLayout.vue';
  
  export default {
    name: 'HomePage',
    components: {
      AppLayout,
    },
    mounted() {
      // Grab references to elements
      const thumbnails = this.$el.querySelectorAll('.thumbnail');
      const mainImage = this.$el.querySelector('#mainImage');
      const galleryModalEl = this.$el.querySelector('#galleryModal');
      const carouselEl = this.$el.querySelector('#galleryCarousel');
  
      if (typeof bootstrap !== 'undefined') {
        const galleryModal = new bootstrap.Modal(galleryModalEl);
        const carousel = new bootstrap.Carousel(carouselEl);
  
        thumbnails.forEach((thumbnail) => {
          thumbnail.addEventListener('click', function() {
            const newImageSrc = this.getAttribute('data-image');
            mainImage.src = newImageSrc;
          });
        });
  
        const closeBtn = galleryModalEl.querySelector('.btn-close');
        closeBtn.addEventListener('click', () => {
          galleryModal.hide();
        });
      }
    },
  };
  </script>
  
  <style>
  body {
    padding: 0px 0px;
    background-color: #fff;
    color: #212529;
}

.main-image-container {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
}
.small {
    font-size: 2rem !important;
    color: #232323 !important;
    font-weight: bold;
    font-size: 25px; /* Change to your preferred size */
}
.main-image {
    width: 100%;
    height: auto;
    object-fit: cover;
}
.image-counter2 {
    position: absolute;
    top: 16px;
    left: 16px;
    background: rgba(161, 159, 159, 0.6);
    color: white;
    padding: 4px 12px;
    border-radius: 4px;
    font-size: 14px;
}

.gallery-btn {
    position: absolute;
    bottom: 16px;
    right: 16px;
    background: white;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.car-title {
    font-family: 'Inter', sans-serif;
    font-size: 2.5rem;
    font-weight: 600;
    margin-bottom: 8px;
}

.car-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 1.1rem;
    font-weight: normal;
    color: #6c757d;
}

.price {
    font-family: 'Inter', sans-serif;
    font-size: 2.5rem;
    font-weight: 600;
    margin: 0;
}

.rating-number {
    background: #212529;
    color: white;
    padding: 4px 12px;
    border-radius: 4px;
    font-weight: 600;
}

.stars {
    color: #000000;
    font-size: 1.2rem;
}

.description {
    font-family: 'Inter', sans-serif;
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 24px;
}

.thumbnail-gallery img {
    height: 150px;
    width: 100%;
    object-fit: cover;
    cursor: pointer;
    transition: opacity 0.2s ease;
}

.thumbnail-gallery img:hover {
    opacity: 0.8;
}
.badge {
    font-family: 'Inter', sans-serif;
    border: 2px solid #07192c;/* Change this to your preferred color */
    padding: 5px 10px;
    border-radius: 25px; /* Optional: Adjust border radius */
    color: #ffffff;
}
.badges .badge {
    font-weight: 500;
    padding: 6px 12px;
    margin-right: 8px;
    color: #07192c;
    margin-bottom: 5px;
}
.badge-custom-red {
    background-color: rgb(255, 255, 255) !important; 
    border: 2px solid #07192c;
}

.badge-custom-green {
    background-color: rgb(255, 255, 255) !important;
    border: 2px solid #07192c;
}

.btn-primary {
    font-family: 'Inter', sans-serif;
    background-color: #07192c !important;
    border-color: #07192c;

  }
  .btn-outline-primary {
    font-family: 'Inter', sans-serif;
    background-color: #ffffff !important;
    border-color: #07192c !important;
    color: #07192c !important;
  }
  .btn-primary:hover {
    background-color: #ffffff !important;
    border-color: #07192c !important;
    color: #07192c  !important;

  }
  .btn-outline-primary:hover {
    background-color: #d8d8d8 !important;
    border-color: #07192c !important;
    color: #07192c !important;
  }
#galleryModal .modal-content {
    background-color: rgba(204, 201, 201, 0.26);
}

#galleryModal .modal-header {
    padding:1rem;
    position: absolute;
    right: 0;
    z-index: 1500;
}

#galleryModal .btn-close {
    background-color: rgb(194, 188, 188);
    opacity: 0.8;
}

#galleryModal .carousel-item img {
    max-height: 80vh;
    object-fit: contain;
}

@media (max-width: 768px) {
    .car-title {
        font-size: 2rem;
    }
    
    .price {
        font-size: 2rem;
    }
    
    .thumbnail-gallery img {
        height: 100px;
    }
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}




.summary {
    max-width: 1400px;
    margin: 20px auto;
    background-color: rgb(255, 255, 255);
    padding: 30px;
    border-radius: 8px;
    /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.83); */
}
h1 {
    font-family: 'Inter', sans-serif;
    font-size: 24px;
    color: #333;
    margin-bottom: 30px;
}

.summary-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 40px;
}

.summary-item {
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.label {
    color: #333;
    font-weight: 500;
    font-family: 'Inter', sans-serif;
}

.value {
    color: #666;
    font-family: 'Inter', sans-serif;
    font-weight: 400;
    text-align: right;
}

.available {
    color: #22c55e;
}

.description {
    margin-top: 30px;
}

.description h2 {
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    margin-bottom: 20px;
    color: #333;
}

.car-details h3 {
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    margin-bottom: 15px;
    color: #444;
}

.car-details p {
    font-family: 'Inter', sans-serif;
    margin-bottom: 10px;
    color: #666;
}

.features-list {
    margin-top: 15px;
    padding-left: 20px;
}

.features-list li {
    font-family: 'Inter', sans-serif;
    margin-bottom: 8px;
    color: #666;
    line-height: 1.4;
}

.spec-item {
    margin-bottom: 12px;
}

.spec-label {
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    color: #555;
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
}


.vw-container2 {
    font-family: 'Inter', sans-serif;
    max-width: 1400px;
    align-items: center;
    margin: 0 auto;
    padding: 20px;
}


h1 {
    text-align: center;
    color: #333;
    font-size: 28px;
    margin-bottom: 40px;
}

.vw-car-grid {
    margin-top: 40px;
    display: grid;
    width: 100%;
    align-items: center;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2rem;
    justify-content: center;
    
}

.vw-action-btn {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.vw-car-card {
    font-family: Inter, sans-serif;
    width: 100%;
    max-width: 400px;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.vw-image-container {
    position: relative;
    width: 100%;
    height: 250px;
}

.vw-car-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.vw-image-counter {
    font-family: Inter, sans-serif;
    position: absolute;
    bottom: 0;
    right: 0;
    background: rgba(255, 255, 255, 0.582);
    padding: 10px 12px;
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 15px;
}

.vw-card-content {
    padding: 20px;
}

.vw-price-section {
    font-family: Inter, sans-serif;
    display: flex;
    justify-content: space-between;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
    margin-bottom: 20px;
}

.vw-price-left {
    display: flex;
    flex-direction: column;
}

.vw-label {
    color: #666;
    font-size: 12px;
}

.vw-price {
    font-size: 28px;
    font-weight: 700;
}

.vw-price-note {
    color: #666;
    font-size: 12px;
}

.vw-price-right {
    text-align: right;
}

.vw-detail-item {
    color: #333;
    font-size: 12px;
    margin-bottom: 6px;
}

.vw-car-details {
    margin-bottom: 20px;
}

.vw-car-name {
    font-family: Inter, sans-serif;
    font-size: 20px;
    font-weight: 600;
    color: #333;
    margin-bottom: 4px;
}

.vw-car-model {
    font-family: Inter, sans-serif;
    font-size: 16px;
    color: #666;
}

.vw-features-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.vw-feature-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

.vw-feature-item span {
    font-family: Inter, sans-serif;
    color: #1f1f1f;
    font-size: 15px;
}
/* 
.vw-ficon {
    
} */
/* Site Header Styles */
.site-header {
    position: sticky;
    z-index: 1000;
    top: -35px;
}

/* Top Bar Styles */
.top-bar {
    background-color: #f5f5f5;
    padding: 8px 0;
    font-size: 0.8rem;
}

.top-bar-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.vehicle-categories {
    display: flex;
    gap: 22px;
}

.vehicle-categories a {
    font-family: Inter, sans-serif;
    color: #666;
    text-decoration: none;
    transition: color 0.3s ease;
}

.vehicle-categories a:hover {
    color: #2b2b2b;
}

.contact-info {
    display: flex;
    gap: 24px;
}

.contact-info a {
    font-family: Inter, sans-serif;
    color: #666;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: color 0.3s ease;
}

.contact-info a:hover {
    color: #2b2b2b;
}

/* Main Header Styles */
.main-header {
    position: sticky;
    width: 100%;
    top: 10;
    z-index: 1000;
    background-color: white;
    padding: 16px 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.header-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo img {
    height: 48px;
    width: auto;
}

.main-nav {
    display: flex;
    gap: 32px;
}

.main-nav a {
    font-family: Inter, sans-serif;
    font-size: 0.9rem;
    color: #333;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
    position: relative;
}

.main-nav a:hover {
    color: #C72629;
}

.main-nav a::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: #C72629;
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.main-nav a:hover::after {
    transform: scaleX(1);
}

.header-actions {
    display: flex;
    gap: 16px;
}

.header-actions button {
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.header-actions button:hover {
    background-color: #f5f5f5;
}

/* Responsive Styles */
@media (max-width: 1200px) {
    .main-nav {
        gap: 24px;
    }
}

@media (max-width: 1024px) {
    .vehicle-categories {
        display: none;
    }

    .main-nav {
        gap: 16px;
        font-size: 0.9rem;
    }
} 

  </style>
  