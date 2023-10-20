document.addEventListener('DOMContentLoaded', () => {

    const server = 'http://45.87.246.20';

    const register = {
        username: document.getElementById('usernameRegister'),
        password: document.getElementById('passwordRegister'),
        confirm: document.getElementById('confirmPasswordRegister'),
    }

    const login = {
        username: document.getElementById('usernameLogin'),
        password: document.getElementById('passwordLogin'),
    }

    const userActions = {
        login: document.getElementById('submitLogin'),
        register: document.getElementById('submitRegistration'),
    }

    userActions.login.addEventListener('click', () => {
        const username = login.username.value;
        const password = login.password.value;

        const request = axios.post(server+'/todo/login', {username, password}).then(res => {
            window.location.reload();
        })
    })

    userActions.register.addEventListener('click', () => {
        const username = register.username.value;
        const password = register.password.value;
        const confirm = register.confirm.value;

        if (password === confirm) {
            const request = axios.post(server + 'todo/register', {username, password}).then(res => {
                window.location.reload();
            })
        }
    })
})