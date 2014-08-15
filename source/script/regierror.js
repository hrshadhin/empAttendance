function checkForm(form) {
    var mailCheck = checkMail(form.elements['email']),
        pwdCheck = checkPwd(form.elements['pwd']);
    return mailCheck && pwdCheck;
}

function checkMail(input) {
    var check = input.value.indexOf('@') >= 0;
    input.style.borderColor = check ? 'black' : 'red';
    check.focus();
    return check;
}

function checkPwd(input) {
    var check = input.value.length >= 5;
    input.style.borderColor = check ? 'black' : 'red';
    return check;
}
