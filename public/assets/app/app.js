$(document).ready(function() {
    auth()

})

function auth() {
    $.getScript('assets/app/auth.js', function() {
        funLogin()
            //funRegister()
        registerValidate()
    })
}