document.addEventListener('DOMContentLoaded', () => {
  // Organization Carousel Auto-Scroll & Buttons
  const track = document.getElementById('orgCarousel');
  const prevBtn = document.getElementById('orgPrevBtn');
  const nextBtn = document.getElementById('orgNextBtn');
  
  if (track && prevBtn && nextBtn) {
    const cards = track.querySelectorAll('.carousel-card');
    if (cards.length > 0) {
      let index = 0;
      let intervalId;
      
      const updateCarousel = () => {
        // Since each card is flex: 0 0 100%, we translate by index * 100%
        track.style.transform = `translateX(-${index * 100}%)`;
      };
      
      const nextSlide = () => {
        index++;
        if (index >= cards.length) {
          index = 0;
        }
        updateCarousel();
      };
      
      const prevSlide = () => {
        index--;
        if (index < 0) {
          index = cards.length - 1;
        }
        updateCarousel();
      };
      
      const startAutoSlide = () => {
        intervalId = setInterval(nextSlide, 5000);
      };
      
      const resetAutoSlide = () => {
        clearInterval(intervalId);
        startAutoSlide();
      };

      nextBtn.addEventListener('click', () => {
        nextSlide();
        resetAutoSlide();
      });

      prevBtn.addEventListener('click', () => {
        prevSlide();
        resetAutoSlide();
      });

      // Start the auto slide
      startAutoSlide();
    }
  }
});