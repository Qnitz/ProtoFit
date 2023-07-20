function submitAsGuest() {
    var form = document.getElementById("loginForm");
    var loginMailInput = document.getElementById("loginMail");
    var loginPassInput = document.getElementById("loginPass");
    loginMailInput.value = "guest";
    loginPassInput.value = "123";
    form.submit();
}
