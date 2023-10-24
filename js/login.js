const button = document.getElementById('submit')
let e_bool = false
let p_bool = false

function validateEmail(email_input, email_p) {
    const email = email_input.value
    const email_req = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/

    if (email_req.test(email)) {
        email_input.classList.remove('focus:border-red-500')
        email_input.classList.remove('border-red-500')
        email_p.innerHTML = ''
        e_bool = true
        button.disabled = !(e_bool && p_bool)
        console.log(e_bool, p_bool)
    } else if (email === '') {
        email_input.classList.add('focus:border-red-500')
        email_input.classList.add('border-red-500')
        email_p.innerHTML = 'กรุณากรอกอีเมล'
        e_bool = false
        button.disabled = !(e_bool && p_bool)
    } else {
        email_input.classList.add('focus:border-red-500')
        email_input.classList.add('border-red-500')
        email_p.innerHTML = 'อีเมล ต้องเป็นรูปแบบอีเมล'
        e_bool = false
        button.disabled = !(e_bool && p_bool)
    }

    if (!(e_bool && p_bool)) {
        button.className = `bg-gradient-to-r from-cyan-300 to-indigo-300 text-gray-100 p-4 w-full rounded-full tracking-wide
            font-semibold font-display focus:outline-none focus:shadow-outline hover:from-cyan-300 hover:to-indigo-300`
    } else {
        button.className = `bg-gradient-to-r from-cyan-400 to-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
            font-semibold font-display focus:outline-none focus:shadow-outline hover:from-cyan-500 hover:to-indigo-600`
    }
}

function validatePassword(pw_input, pw_p) {
    const pw = pw_input.value

    if (pw.length >= 8) {
        pw_input.classList.remove('focus:border-red-500')
        pw_input.classList.remove('border-red-500')
        pw_p.innerHTML = ''
        p_bool = true
        button.disabled = !(e_bool && p_bool)
    } else if (pw === '') {
        pw_input.classList.add('focus:border-red-500')
        pw_input.classList.add('border-red-500')
        pw_p.innerHTML = 'กรุณากรอกรหัสผ่าน'
        p_bool = false
        button.disabled = !(e_bool && p_bool)
    } else {
        pw_input.classList.add('focus:border-red-500')
        pw_input.classList.add('border-red-500')
        pw_p.innerHTML = 'รหัสผ่าน ต้องมีความยาวอย่างน้อย 8 ตัวอักษร'
        p_bool = false
        button.disabled = !(e_bool && p_bool)
    }

    if (!(e_bool && p_bool)) {
        button.className = `bg-gradient-to-r from-cyan-300 to-indigo-300 text-gray-100 p-4 w-full rounded-full tracking-wide
            font-semibold font-display focus:outline-none focus:shadow-outline hover:from-cyan-300 hover:to-indigo-300`
    } else {
        button.className = `bg-gradient-to-r from-cyan-400 to-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
            font-semibold font-display focus:outline-none focus:shadow-outline hover:from-cyan-500 hover:to-indigo-600`
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const email_input = document.getElementById('email')
    const email_p = document.getElementById('email_p')
    email_input.addEventListener('input', function () {
        validateEmail(email_input, email_p)
    });

    const pw_input = document.getElementById('password')
    const pw_p = document.getElementById('password_p')
    pw_input.addEventListener('input', function () {
        validatePassword(pw_input, pw_p)
    });
});
