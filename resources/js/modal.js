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
          if (descEl && modalDesc) {
            modalDesc.innerHTML = descEl.innerHTML;
          } else if (modalDesc) {
            modalDesc.innerHTML = 'Anggota dari Jabar Berdampak yang berdedikasi tinggi untuk pelestarian lingkungan dan pemberdayaan pemuda di Jawa Barat.';
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