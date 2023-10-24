const card_number = document.getElementById('card-number')

card_number.addEventListener('input', function () {
    let value = this.value.replace(/\D/g, '')
    let format = ''

    for (let i = 0; i < value.length; i++) {
        if (i > 0 && i % 4 === 0) {
            format += ' '
        }
        format += value[i]
    }

    this.value = format
})

const exp_date = document.getElementById('expiration-date')

exp_date.addEventListener('input', function () {
    let value = this.value.replace(/\D/g, '')
    let format = ''

    if (value.length >= 2) {
        format = value.slice(0, 2) + ' / ' + value.slice(2)
    } else {
        format = value
    }

    this.value = format
})

const cvv = document.getElementById('cvv')

cvv.addEventListener('input', function () {
    let value = this.value.replace(/\D/g, '')
    this.value = value
})

const form = document.getElementById('form')

form.addEventListener('submit', function (event) {
    const card = document.getElementById('card-number')
    const card_p = document.getElementById('card_p')
    let card_val = card.value

    if (card_val.length != 19) {
        card_p.innerHTML = 'เลขบัตรเครดิตของคุณไม่ถูกต้อง'

        card.classList.add('focus:border-red-500')
        card.classList.add('border-red-500')

        event.preventDefault();
    } else {
        card_p.innerHTML = ''

        card.classList.remove('focus:border-red-500')
        card.classList.remove('border-red-500')
    }

    const exp = document.getElementById('expiration-date')
    const exp_p = document.getElementById('exp_p')
    let exp_val = exp.value

    if (exp_val.length != 7) {
        exp_p.innerHTML = 'วันหมดอายุบัตรเครดิตของคุณไม่ถูกต้อง'

        exp.classList.add('focus:border-red-500')
        exp.classList.add('border-red-500')

        event.preventDefault();
    } else {
        exp_p.innerHTML = ''

        exp.classList.remove('focus:border-red-500')
        exp.classList.remove('border-red-500')
    }

    const cvv = document.getElementById('cvv')
    const cvv_p = document.getElementById('cvv_p')
    let cvv_val = cvv.value

    if (cvv_val.length != 3) {
        cvv_p.innerHTML = 'เลขหลังบัตรเครดิตของคุณไม่ถูกต้อง'

        cvv.classList.add('focus:border-red-500')
        cvv.classList.add('border-red-500')

        event.preventDefault();
    } else {
        cvv_p.innerHTML = ''

        cvv.classList.remove('focus:border-red-500')
        cvv.classList.remove('border-red-500')
    }
})