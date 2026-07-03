// Jabar Berdampak - Main Script

document.addEventListener('DOMContentLoaded', () => {
  console.log('Website Jabar Berdampak loaded successfully.');
  
  // Hamburger Menu Logic
  const hamburger = document.querySelector('.hamburger');
  const navLinks = document.querySelector('.nav-links');
  
  if (hamburger && navLinks) {
    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('active');
      navLinks.classList.toggle('active');
    });
  }

  // Auto Year
  const yearElement = document.getElementById('currentYear');
  if (yearElement) {
    yearElement.textContent = new Date().getFullYear();
  }
  
  // Organization Carousel Auto-Scroll & Buttons
  const track = document.getElementById('orgCarousel');
  const prevBtn = document.getElementById('orgPrevBtn');
  const nextBtn = document.getElementById('orgNextBtn');
  
  if (track && prevBtn && nextBtn) {
    const cards = track.querySelectorAll('.carousel-card');
    if (cards.length > 0) {
      let index = 0;
      let intervalId;
      
      const getItemsToShow = () => {
        if (window.innerWidth >= 1024) return 5;
        if (window.innerWidth >= 768) return 3;
        return 1;
      };

      const updateCarousel = () => {
        const itemsToShow = getItemsToShow();
        const maxIndex = Math.max(0, cards.length - itemsToShow);
        
        if (index > maxIndex) index = maxIndex;
        if (index < 0) index = maxIndex;
        
        // Translate by index * (100% / itemsToShow)
        // Wait, flex is calc(100% / 5), so each card is 20%. Moving index by 1 means moving by 20%.
        // But since the track width is 100% of the container, moving by 20% means 20% of the container.
        // Actually, if track is 100% wide, then track.style.transform = `translateX(-${index * (100 / itemsToShow)}%)`;
        track.style.transform = `translateX(-${index * (100 / itemsToShow)}%)`;
      };
      
      const nextSlide = () => {
        const itemsToShow = getItemsToShow();
        index++;
        if (index > cards.length - itemsToShow) {
          index = 0;
        }
        updateCarousel();
      };
      
      const prevSlide = () => {
        const itemsToShow = getItemsToShow();
        index--;
        if (index < 0) {
          index = Math.max(0, cards.length - itemsToShow);
        }
        updateCarousel();
      };

      window.addEventListener('resize', () => {
        updateCarousel();
      });
      
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

  // Modal Logic
  const detailButtons = document.querySelectorAll('.btn-detail');
  const modal = document.getElementById('profileModal');
  const closeBtn = document.getElementById('closeModalBtn');
  const modalImg = document.getElementById('modalImg');
  const modalName = document.getElementById('modalName');
  const modalRole = document.getElementById('modalRole');
  const modalDivisi = document.getElementById('modalDivisi');

  if (modal && detailButtons.length > 0) {
    detailButtons.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const card = e.target.closest('.carousel-card');
        if (card) {
          modalImg.src = card.querySelector('.profile-img').src;
          modalName.textContent = card.querySelector('.profile-name').textContent;
          modalRole.textContent = card.querySelector('.profile-role').textContent;
          modalDivisi.textContent = card.querySelector('.profile-divisi').textContent;
          
          modal.classList.add('active');
        }
      });
    });

    closeBtn.addEventListener('click', () => {
      modal.classList.remove('active');
    });

    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.classList.remove('active');
      }
    });
  }

  // Category Filter Logic
  const btnOpenCategory = document.getElementById('btnOpenCategory');
  const categoryModal = document.getElementById('categoryModal');
  const closeCategoryBtn = document.getElementById('closeCategoryBtn');
  const applyCategoryBtn = document.getElementById('applyCategoryBtn');
  const catCheckboxes = document.querySelectorAll('.cat-filter');
  
  if (btnOpenCategory && categoryModal && closeCategoryBtn && applyCategoryBtn) {
    btnOpenCategory.addEventListener('click', () => {
      categoryModal.classList.add('active');
    });

    closeCategoryBtn.addEventListener('click', () => {
      categoryModal.classList.remove('active');
    });

    categoryModal.addEventListener('click', (e) => {
      if (e.target === categoryModal) {
        categoryModal.classList.remove('active');
      }
    });

    applyCategoryBtn.addEventListener('click', () => {
      // Get selected categories
      const checkedValues = Array.from(catCheckboxes)
                                 .filter(cb => cb.checked)
                                 .map(cb => cb.value.toLowerCase());
      
      const articles = document.querySelectorAll('.article-card');
      const featuredArticle = document.querySelector('.featured-article');

      const filterArticle = (element) => {
        if (!element) return;
        const categorySpan = element.querySelector('.article-meta .category') || element.querySelector('.article-meta span');
        if (categorySpan) {
          const catText = categorySpan.textContent.trim().toLowerCase();
          const isMatch = checkedValues.length === 0 || checkedValues.some(val => catText.includes(val));
          if (isMatch) {
            element.style.display = '';
          } else {
            element.style.display = 'none';
          }
        }
      };

      // Apply to cards
      articles.forEach(filterArticle);
      // Apply to featured
      if (featuredArticle) filterArticle(featuredArticle);

      // Render category chips
      const chipsContainer = document.getElementById('selectedCategoriesContainer');
      if (chipsContainer) {
        chipsContainer.innerHTML = '';
        
        const selectedOriginalNames = Array.from(catCheckboxes)
                                           .filter(cb => cb.checked)
                                           .map(cb => cb.parentElement.textContent.trim());
        
        const MAX_CHIPS = window.innerWidth <= 768 ? 2 : 5;
        for (let i = 0; i < selectedOriginalNames.length; i++) {
          if (i < MAX_CHIPS) {
            const span = document.createElement('span');
            span.className = 'category-chip';
            span.textContent = selectedOriginalNames[i];
            chipsContainer.appendChild(span);
          } else if (i === MAX_CHIPS) {
            const extraCount = selectedOriginalNames.length - MAX_CHIPS;
            const moreSpan = document.createElement('span');
            moreSpan.className = 'category-chip chip-more';
            moreSpan.textContent = `+${extraCount} Lainnya`;
            moreSpan.addEventListener('click', () => {
              categoryModal.classList.add('active');
            });
            chipsContainer.appendChild(moreSpan);
            break;
          }
        }
      }

      categoryModal.classList.remove('active');
    });
  }
});
