const payment_button = document.getElementById('payment_button')
const seat = document.querySelectorAll('.seat:not(.disabled)');
const selected_seat = document.getElementById('seat');
const price = document.getElementById('price');
let selected_seat_list = [];
let total_price = 0;

fetch('seat_occupied.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(seat_id => {
            const seat_occupied = document.querySelector(`.seat[seat_id="${seat_id}"]`);
            if (seat_occupied) {
                seat_occupied.classList.add('occupied');
                seat_occupied.disabled = true;
            }
        });
    })

seat.forEach(button => {
    button.addEventListener('click', toggleSelected);
});

function toggleSelected(event) {
    const seat_id = event.target.getAttribute('seat_id');
    const seat_price = parseFloat(event.target.getAttribute('seat_price'));

    if (event.target.classList.contains('selected')) {
        event.target.classList.remove('selected');
        selected_seat_list = selected_seat_list.filter(id => id !== seat_id);
        total_price -= seat_price;
    } else {
        event.target.classList.add('selected');
        selected_seat_list.push(seat_id);
        total_price += seat_price;
    }

    selected_seat_list.sort()

    if (total_price == 0) {
        payment_button.disabled = true
        payment_button.className = `mt-3 inline-block rounded px-6 pb-2 pt-2.5 text-lg font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150
        ease-in-out hover:shadow-[0_4px_9px_-4px_#3b71ca] focus:bg-blue-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] 
        focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] 
        dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] 
        dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] bg-gradient-to-r from-sky-300 to-indigo-300 hover:from-sky-300 hover:to-indigo-300`
    } else {
        payment_button.disabled = false
        payment_button.className = `mt-3 inline-block rounded px-6 pb-2 pt-2.5 text-lg font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150
        ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-blue-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] 
        focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] 
        dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] 
        dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-sky-600 hover:to-indigo-600`
    }

    update();
}

function update() {
    const selected_seat_string = selected_seat_list.join(', ');
    selected_seat.textContent = selected_seat_string;
    price.textContent = total_price.toFixed(0);

    const data = {
        seat_id: selected_seat_list,
        total_price: total_price
    }

    fetch('session.php', {
        'method': 'POST',
        'headers': {
            'Content-Type': 'application/json; charset=utf-8'
        },
        'body': JSON.stringify(data)
    })
}
