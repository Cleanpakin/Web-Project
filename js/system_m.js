let count_add = 1;

function add_actor_add() {
    count_add++

    const actor_count = document.getElementById('actor_count')
    actor_count.value = count_add

    const actor = document.getElementById('actor')
    let new_actor = document.createElement('div')
    new_actor.id = count_add
    new_actor.innerHTML =
        `<div class="row mb-3">
            <label class="col-sm-3 col-form-label">ชื่อนักแสดงคนที่ ${count_add}</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="actor_name${count_add}" placeholder="ชื่อนักแสดง" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">รูปนักแสดงคนที่ ${count_add}</label>
            <div class="col-sm-9">
                <input type="url" class="form-control" name="actor_pic${count_add}" placeholder="https://example.com" pattern="https://.*" required>
            </div>
        </div>`
    actor.appendChild(new_actor)

}

function delete_actor_add() {
    const actor = document.getElementById('actor')
    if (count_add > 1) {
        let actor_del = document.getElementById(count_add)
        actor.removeChild(actor_del)

        count_add--

        const actor_count = document.getElementById('actor_count')
        actor_count.value = count_add
    }
}

function submit_button(type, movie_id) {
    let data = {
        movie_id: movie_id
    }

    if (type == 'delete') {
        const delete_footer = document.getElementById('delete_footer')

        delete_footer.innerHTML = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a href="delete_data.php?movie_id=${movie_id}" class="btn btn-danger">Delete</a>`
    } else {
        fetch('get_data.php', {
            'method': 'POST',
            'headers': {
                'Content-Type': 'application/json; charset=utf-8'
            },
            'body': JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (data) {
            const input = ['name', 'poster', 'release_date', 'category', 'viewer_rate', 'time_range', 'trailer', 'director_name', 'director_pic', 'synopsis', 'status']

            if (type == 'view') {
                const row = ['name_view', 'poster_view', 'release_date_view', 'category_view', 'viewer_rate_view', 'time_range_view', 'trailer_view', 'director_name_view', 'director_pic_view', 'synopsis_view', 'status_view']

                for (let i = 0; i < input.length; i++) {
                    let data_row = document.getElementById(row[i])
                    if (row[i] == 'poster_view' || row[i] == 'director_pic_view') {
                        data_row.innerHTML = `<img style="width: 120px" src="${data[input[i]]}" alt=""></img>`
                    } else if (row[i] == 'trailer_view') {
                        data_row.innerHTML = `<a href="${data[input[i]]}">Trailer Link</a>`
                    } else {
                        data_row.innerHTML = data[input[i]]
                    }

                }

                const actor_view = document.getElementById('actor_view')
                actor_view.innerHTML = ''

                for (let i = 1; i <= data['count']; i++) {
                    let actor = document.createElement('div')
                    actor.innerHTML = `<div class="row mb-3">
                                        <div class="col-sm-4">ชื่อนักแสดงคนที่ ${i} :</div>
                                        <div class="col-sm-8">${data['actor_name'][i - 1]}</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4">รูปนักแสดงคนที่ ${i} :</div>
                                        <div class="col-sm-8"><img style="width: 120px" src="${data['actor_pic'][i - 1]}" alt=""></img></div>
                                    </div>`
                    actor_view.appendChild(actor)
                }
            }

            if (type == 'edit') {
                const id = document.getElementById('id')
                id.value = movie_id

                for (let i = 0; i < input.length; i++) {
                    let data_row = document.getElementById(input[i])
                    data_row.value = data[input[i]]
                }

                const actor_edit = document.getElementById('actor_edit')
                actor_edit.innerHTML = `<input id="actor_edit_count" name="actor_count" value="${data['count']}" hidden>`

                for (let i = 1; i <= data['count']; i++) {
                    let actor = document.createElement('div')
                    actor.id = i
                    actor.innerHTML = `<div class="row mb-3">
                                            <label class="col-sm-3 col-form-label">ชื่อนักแสดงคนที่ ${i}</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="actor_name${i}" name="actor_name${i}" value="${data['actor_name'][i - 1]}" placeholder="ชื่อนักแสดง" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label">รูปนักแสดงคนที่ ${i}</label>
                                            <div class="col-sm-9">
                                                <input type="url" class="form-control" id="actor_pic${i}" name="actor_pic${i}" value="${data['actor_pic'][i - 1]}" placeholder="https://example.com" pattern="https://.*" required>
                                            </div>
                                        </div>`
                    actor_edit.appendChild(actor)
                }

                count_edit = data['count']
            }

        })
    }
}

let count_edit

function add_actor_edit() {
    count_edit++

    const actor_count = document.getElementById('actor_edit_count')
    actor_count.value = count_edit

    const actor = document.getElementById('actor_edit')
    let new_actor = document.createElement('div')
    new_actor.id = count_edit
    new_actor.innerHTML =
        `<div class="row mb-3">
            <label class="col-sm-3 col-form-label">ชื่อนักแสดงคนที่ ${count_edit}</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="actor_name${count_edit}" placeholder="ชื่อนักแสดง" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">รูปนักแสดงคนที่ ${count_edit}</label>
            <div class="col-sm-9">
                <input type="url" class="form-control" name="actor_pic${count_edit}" placeholder="https://example.com" pattern="https://.*" required>
            </div>
        </div>`
    actor.appendChild(new_actor)

}

function delete_actor_edit() {
    const actor = document.getElementById('actor_edit')
    if (count_edit > 1) {
        let actor_del = document.getElementById(count_edit)
        actor.removeChild(actor_del)

        count_edit--

        const actor_count = document.getElementById('actor_edit_count')
        actor_count.value = count_edit
    }
}