(function() {
    document.querySelector('#login-submit').addEventListener("click", function(event) {
        event.preventDefault();

        let login = document.getElementById('login').value;
        let pass = document.getElementById('password').value;

        if (!login || !pass) {
            let feedback = document.getElementById('feedback');
            feedback.innerText = 'Formulaire incomplet';
            feedback.classList.add('alert');
            feedback.style.display = 'block';
            return;
        }

        let params = "login="+login+"&password="+pass;
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let response = JSON.parse(this.responseText);
                if (response.status === "success") {
                    window.location.replace("/");
                } else {
                    let feedback = document.getElementById('feedback');
                    feedback.innerText = response.message;
                    feedback.classList.add('alert');
                    feedback.style.display = 'block';
                }
            }
        };
        xhr.open('POST', '/login-ajax', true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(params);
    })
})();
