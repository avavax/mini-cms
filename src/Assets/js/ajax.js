/*---- форма подписки на главной  ----*/

const subscribeForm = document.querySelector('#subscribe-form')

if (subscribeForm) {
    subscribeForm.addEventListener('submit', function(e) {

        e.preventDefault()
        const formData = new FormData(subscribeForm);

        fetch('/', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {

            const message = document.querySelector('.subscribe-msg')

            if (data.result) {
                subscribeForm.querySelector('div').remove()
                message.textContent = 'Вы успешно подписаны на обновления!'
            } else {
                message.textContent = data.errors
            }
        })
    })
}


/*---- форма добавления комментария ----*/

const commentForm = document.querySelector('#comment-form')
const newComment = comment => {
    const img = comment.img ? comment.img : "anonimus.jpg"
    const moderate = comment.moderate === 1 ? '' : '<p class="comment-moderate"><em>(Комментарий находится на модерации)</em></p>'
    return `
        <div class="single-comment">
            <div class="image-box">
                <img src="/src/assets/img/avatars/${img}" alt="avatar">
            </div>
            <div class="text-box">
                <p><strong>${comment.username} </strong> / ${comment.created_at}</p>
                <p>${comment.content}</p>
                ${moderate}
            </div>
        </div>
    `
}

if (commentForm) {
    commentForm.addEventListener('submit', function(e) {

        e.preventDefault()
        const formData = new FormData(commentForm)
        const commentContainer = document.querySelector('.commnet-text')

        fetch('/article', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {

            const message = document.querySelector('#commentAddMessage')
            message.textContent = ''

            if (data.result) {
                commentContainer.insertAdjacentHTML('beforeend', newComment(data.comment))
                this.reset()
            } else {
                message.textContent = data.error
            }
        })
    })
}

/* -- смена подписки -- */

var subscribeElement = document.querySelector('#cabinet-subscribe')

if (subscribeElement) {
    subscribeElement.addEventListener('click', function(e) {
        e.preventDefault()

        fetch('/cabinet/unsubscribe', {
            method: 'GET'
        })
        .then(response => response.json())
        .then(data => {

            if (data.result) {
                subscribeElement.textContent = data.status === 1 ? 'Оформлена' : 'Отсутствует'
            }
        })
    })
}

/* -- смена аватарки в кабинете юзера -- */

const imageAvatarForm = document.querySelector('form#image-change')

if (imageAvatarForm) {
    imageAvatarForm.addEventListener('submit', function(e) {

        e.preventDefault()

        const formData = new FormData(imageAvatarForm)
        const imgContainer = document.querySelector('.author-content > img')

        fetch('/cabinet/changeimage', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {

            const message = document.querySelector('.message-img-load')
            message.innerHTML = ''

            if (data.result) {
                imgContainer.src = data.img
                message.innerHTML = "Изображение аватара обновлено<br>"
                this.reset()
            } else {
                message.innerHTML = data.errors
            }
        })
    })
}

/* -- смена статуса комментария -- */

const comments = document.querySelectorAll('.comment-status')

comments.forEach(comment => {
    comment.addEventListener('click', event => {

        const id = event.target.dataset.id

        fetch(`/admin/comments/aprove/${id}`, {
          method: 'GET',
        })
        .then(response => response.json())
        .then(data => {

            if (data.result) {
                event.target.textContent = data.moderate === 1 ? 'одобрен' : 'модерация'
                event.target.dataset.moderate = data.moderate
            }
        })
    })
})
