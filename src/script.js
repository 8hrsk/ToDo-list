document.addEventListener('DOMContentLoaded', () => {

    const animateModal = (modal, from, to, callback) => {
        const duration = 300;
        const start = performance.now();
      
        function updateOpacity(timestamp) {
          const elapsed = timestamp - start;
          const progress = elapsed / duration;
      
          modal.style.opacity = (from + (to - from) * progress).toFixed(2);
      
          if (progress < 1) {
            requestAnimationFrame(updateOpacity);
          } else {
            if (callback) {
              callback();
            }
          }
        }
      
        requestAnimationFrame(updateOpacity);
    }

    const closeModal = (modal) => {
        animateModal(modal, 1, 0, () => {
            modal.style.display = 'none';   
        })
    }

    const openModal = (modal) => {
        modal.style.display = 'block';
        animateModal(modal, 0, 1);
    }

    const actions = document.querySelectorAll('[id*=editTask], [id*=deleteTask], [id*=completeTask]');

    const ids = Array.from(actions).map(actions => actions.id);

    ids.forEach(id => {
        const button = document.getElementById(id);
        button.addEventListener('click', () => {
            console.log('click' + id);
        })
    })

    const modals = {
        loginModal: document.getElementById('loginModal'),
        registerModal: document.getElementById('registerModal'),
    }

    const buttons = {
        loginBtn: document.getElementById('login'),
        registerBtn: document.getElementById('register'),
    }

    buttons.registerBtn.addEventListener('click', () => {
        openModal(modals.registerModal);

        setTimeout(() => {
            window.addEventListener('click', (e) => {
                if (e.target === modals.registerModal) {
                    closeModal(modals.registerModal);
                }
            })
        })
    })

    buttons.loginBtn.addEventListener('click', () => {
        openModal(modals.loginModal);

        setTimeout(() => {
            window.addEventListener('click', (e) => {
                if (e.target === modals.loginModal) {
                    closeModal(modals.loginModal);
                }
            })
        })
    })
})