document.addEventListener('DOMContentLoaded', () => {
  // Modal Logic
  const detailButtons = document.querySelectorAll('.btn-detail');
  const modal = document.getElementById('profileModal');
  const closeBtn = document.getElementById('closeModalBtn');
  const modalImg = document.getElementById('modalImg');
  const modalName = document.getElementById('modalName');
  const modalRole = document.getElementById('modalRole');
  const modalDivisi = document.getElementById('modalDivisi');
  const modalDesc = document.getElementById('modalDescContent');
  const modalIg = document.getElementById('modalIg');

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
          
          const descEl = card.querySelector('.profile-desc');
          let igUsername = null;

          if (descEl && modalDesc) {
            modalDesc.innerHTML = descEl.innerHTML;
            
            // Extract Instagram Username dynamically from text
            const text = descEl.textContent || descEl.innerText;
            const igMatch = text.match(/(?:ig|instagram)\s*:\s*@?([a-zA-Z0-9_.]+)/i);
            if (igMatch && igMatch[1]) {
               igUsername = igMatch[1].trim();
            }
          } else if (modalDesc) {
            modalDesc.innerHTML = 'Anggota dari Jabar Berdampak yang berdedikasi tinggi untuk pelestarian lingkungan dan pemberdayaan pemuda di Jawa Barat.';
          }
          
          // Setup Social Links
          if (modalIg) {
            if (igUsername) {
              modalIg.href = `https://instagram.com/${igUsername}`;
              modalIg.style.display = 'inline-flex';
            } else {
              modalIg.style.display = 'none';
            }
          }
          
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
});