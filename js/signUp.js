
grecaptcha.ready(function () {
    grecaptcha.execute('6LftnKcUAAAAAPuntM8pMSeZ0yj7hROBtbiVzNdl', {
        action: 'homepage'
    }).then(function (token) {
        //console.log(token);
        document.getElementById('g-recaptcha-response').value = token;
    });
});

