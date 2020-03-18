const form = document.getElementsByClassName("registration-form")[0]
form.addEventListener("submit", onFormSubmit)

function onFormSubmit(event) {
    event.preventDefault()

    const email = document.forms["registration-form"]["email"].value
    const name = document.forms["registration-form"]["name"].value
    const telephone = document.forms["registration-form"]["telephone"].value

    let emailRegExp = /^[\.\-_A-Za-z0-9]+?@[\.\-A-Za-z0-9]+?\.[A-Za-z0-9]{2,6}$/
    let isEmailValid = emailRegExp.test(email)

    let nameRegExp = /^[a-zA-Zа-яёА-ЯЁ\s\-]+$/u
    let isNameValid = nameRegExp.test(name)

    let telephoneRegExp = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/
    let isTelephoneValid = telephoneRegExp.test(telephone)

    if (isEmailValid === false) {
        alert('Email введен неверно')
        return
    }

    if (isNameValid === false) {
        alert('Имя введено неверно')
        return
    }

    if (isTelephoneValid === false) {
        alert('Teлефон введен неверно')
        return
    }

    if (name.length === 0 || email.length === 0) {
        alert('Заподните обязательные поля')
        return
    }

    let confirmAnswer = confirm("Вы уверены, что хотите отправить введенные данные ?")
    if (confirmAnswer) submit()
}
