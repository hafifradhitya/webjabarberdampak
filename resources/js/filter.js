document.addEventListener('DOMContentLoaded', () => {
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