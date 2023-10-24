window.onload = function () {
    selected_change();
};

function selected_change() {
    const date = document.getElementById('date').value
    const theater = document.getElementById('theater').value

    let data = {
        date: date,
        theater: theater
    }

    fetch('get_showtime.php', {
        'method': 'POST',
        'headers': {
            'Content-Type': 'application/json; charset=utf-8'
        },
        'body': JSON.stringify(data)
    })
        .then(function (response) {
            return response.json();
        }).then(function (data) {
            const output = document.getElementById('output')

            if (data.length == 0) {
                output.innerHTML = `<div class="alert alert-warning" role="alert">
                                    ไม่พบข้อมูลรอบฉายภาพยนตร์!
                                </div>`
            } else {
                output.innerHTML = ``
                for (let i = 0; i < data.length; i++) {
                    let div = document.createElement('div')
                    div.className = 'card mb-3'
                    div.innerHTML = `<div class="card-body">
                                        <div class="container my-4">
                                            <div class="row my-3">
                                                <div class="col-md-6">
                                                    <img class="center w-50" src="${data[i]['poster']}" alt="">
                                                </div>

                                                <div class="col-md-6" id="showtime_div${i}">
                                                    <p style="font-size: 1.4em;"><strong>${data[i]['name']}</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`

                    output.appendChild(div)

                    let id = data[i]['id']
                    let showtime = data[i]['show_time']
                    let dub = data[i]['dub']
                    let showtime_div = document.getElementById(`showtime_div${i}`)

                    for (let j = 0; j < showtime.length; j++) {
                        let div = document.createElement('div')
                        div.className = 'row my-4'
                        div.innerHTML = `<div class="col-3">
                                            <span">${showtime[j]}</span>
                                        </div>

                                        <div class="col-4">
                                            <span>${dub[j]}</span>
                                        </div>

                                        <div class="col-auto">
                                            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#edit_data" onclick="edit_button(${id[j]}, '${showtime[j]}', '${dub[j]}')">
                                                <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                                            </button>

                                            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#delete_data" onclick="delete_button(${id[j]})">
                                                <i class="fa-solid fa-trash" style="color: #000000;"></i>
                                            </button>
                                        </div>`
                        showtime_div.appendChild(div)
                    }
                }
            }
        })
}

function edit_button(id, time, dub) {
    const id_input = document.getElementById('id')
    const time_input = document.getElementById('time')
    const dub_input = document.getElementById('dub')

    id_input.value = id
    time_input.value = time
    dub_input.value = dub
}

function delete_button(id) {
    const delete_footer = document.getElementById('delete_footer')

    delete_footer.innerHTML = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="delete_showtime.php?id=${id}" class="btn btn-danger">Delete</a>`

}