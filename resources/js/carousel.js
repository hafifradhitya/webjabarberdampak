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
      
      const getVisibleCards = () => {
        if (window.innerWidth >= 1024) return 3;
        if (window.innerWidth >= 768) return 2;
        return 1;
      };

      const updateCarousel = () => {
        // Calculate the width of one card including the gap
        const gap = parseInt(window.getComputedStyle(track).gap) || 0;
        const cardWidth = cards[0].offsetWidth;
        const moveAmount = index * (cardWidth + gap);
        track.style.transform = `translateX(-${moveAmount}px)`;
      };
      
      const nextSlide = () => {
        const maxIndex = Math.max(0, cards.length - getVisibleCards());
        index++;
        if (index > maxIndex) {
          index = 0;
        }
        updateCarousel();
      };
      
      const prevSlide = () => {
        const maxIndex = Math.max(0, cards.length - getVisibleCards());
        index--;
        if (index < 0) {
          index = maxIndex;
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

      window.addEventListener('resize', () => {
        const maxIndex = Math.max(0, cards.length - getVisibleCards());
        if (index > maxIndex) index = maxIndex;
        updateCarousel();
      });

      // Start the auto slide
      startAutoSlide();
    }
  }
});