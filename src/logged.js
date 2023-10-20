document.addEventListener('DOMContentLoaded', () => {
    let userStatus = false;

    const buttons = {
        loginBtn: document.getElementById('login'),
        registerBtn: document.getElementById('register'),
    }

    const getCookie = (name) => {
        let cookieValue = null;
        if (document.cookie && document.cookie !== '') {
            const cookies = document.cookie.split(';');
            for (let i = 0; i < cookies.length; i++) {
                const cookie = cookies[i].trim();
                if (cookie.substring(0, name.length + 1) === (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        if (cookieValue) {
            return cookieValue;
        } else {
            return false;
        }
    }

    const setCookie = (name, value, days) => {
        let expires = '';
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = '; expires=' + date.toUTCString();
        }
        document.cookie = name + '=' + (value || '') + expires + '; path=/';
    }

    const deleteCookie = (name) => {
        document.cookie = name + '=; Max-Age=-99999999;';
    }

    (() => {
        if (getCookie('username')) {
            userStatus = true;
        }
    })();

    if (userStatus) {
        buttons.loginBtn.innerText = getCookie('username');
        buttons.loginBtn.disabled = true;

        buttons.registerBtn.innerText = 'Logout';
        buttons.registerBtn.addEventListener('click', () => {
            deleteCookie('username');
            deleteCookie('PHPSESSID');
            window.location.reload();
        })
    }
})