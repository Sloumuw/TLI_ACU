function validateSignUpForm() {
    let login = document.getElementById("login");
    let pass = document.getElementById("password");
    let confirm = document.getElementById("password-confirm");
    let feedback = document.getElementById('feedback');

    if (!login.value || !pass.value || !confirm.value) {
        feedback.innerText = 'Formulaire incomplet';
        feedback.classList.add('alert');
        feedback.style.display = 'block';

        pass.innerText = '';
        confirm.innerText = '';
        return;
    }

    if (pass.value !== confirm.value) {
        feedback.innerText = 'Les mots de passe ne sont pas identiques';
        feedback.classList.add('alert');
        feedback.style.display = 'block';

        pass.innerText = '';
        confirm.innerText = '';
    } else {
        document.forms['login-form'].submit();
    }
}

(function() {
    let feedback = document.getElementById('feedback');
    if (feedback.nextElementSibling.classList.contains('success')) {
        setTimeout(function() {
            window.location.replace("/login");
        }, 1000);
    }
})();
