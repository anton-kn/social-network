/* Функция для загрузки данных Ajax */
async function createRequest(url){ // await работает только с async
    let response = await fetch(url);
    // json файл о пользователях
    let commits = await response.json();
    return commits; // возвращает Promise
}

/* Заполняем дополнительные блоки */
function fillData(data){
    let content = document.querySelector('.comment_main');
    /* Проверяем наличие ответов на комментарий */
    const countReplay = data.comments.replays.id.length;
    // console.log(countReplay);
    /* Если ответов на комментарий нет */
    if( countReplay == 0 )
    {
        const comment = `
        <div class="author-comment border border-1 m-2 p-3">
            <div class="topic">
                <div class="text-primary">
                    <!--имя пользователя, который оставил комментарий-->
                    <h3 class="autor-name-comment text-dark">${data.comments.author}</h3>
                </div>
                <h5 class="topic">${data.comments.topic}</h5>
            </div>
            <p>${data.comments.comment}</p>
            <!--Если текущий пользователь оставил комментарий на чужом профиле
             или на своем профиле, отображаем кнопку Удалить-->
            <form method="post" action="/profile/${data.comments.id}">
                <input type="hidden" name="_token" value="${data.comments.token}">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-link">Удалить</button>
            </form>
            <a class="btn btn-link" href="/profile/replay/${data.comments.id}">Ответить</a>
        </div>
    `;

        content.insertAdjacentHTML('beforeEnd', comment);
    }
    else
    {
        /* Комментарии */
        const comment = `
        <div class="author-comment border border-1 m-2 p-3">
            <div class="topic">
                <div class="text-primary">
                    <!--имя пользователя, который оставил комментарий-->
                    <h3 class="autor-name-comment text-dark">${data.comments.author}</h3>
                </div>
                <h5 class="topic">${data.comments.topic}</h5>
            </div>
            <p>${data.comments.comment}</p>
            <!--Если текущий пользователь оставил комментарий на чужом профиле
             или на своем профиле, отображаем кнопку Удалить-->
            <form method="post" action="/profile/${data.comments.id}">
                <input type="hidden" name="_token" value="${data.comments.token}">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-link">Удалить</button>
            </form>
            <a class="btn btn-link" href="/profile/replay/${data.comments.id}">Ответить</a>
        </div>
    `;
        /* Вставляем заполненную форму */

        content.insertAdjacentHTML('beforeEnd', comment);

        /* перебираем все ответы на комметарий */
        for (let i = 0; i < countReplay; i++) {
            /* ответы на комментрий */
            let replay = `
             <!--Автор комментария -->
            <div class="replay_author border border-1 ml-5 w-60 py-2 px-3">
                <h4>${data.comments.replays.author_id[i]}</h4>
                <h5>${data.comments.replays.topic_replay[i]}</h5>
                <p>${data.comments.replays.comment_replay[i]}</p>
                <!-- id ответа на комментарий -->
                <form method="post" action="/profile/${data.comments.replays.id[i]}">
                <input type="hidden" name="_token" value="${data.comments.token}">
                <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-link">Удалить</button>
                </form>
            </div>
        `;
            content.insertAdjacentHTML('beforeEnd', replay);
        }

    }
}

/* При нажатии на кнопку делаем запрос на сервер */
// const button = document.querySelector('#button');
function load()
{
    let buttonLoad = document.querySelector('#button_load');
    /* url страница пользователя */
    let endString = window.location.pathname.slice(-1);
    let url = '/profile/additional/data/' + endString;
// let url = '/profile/additional/data/1';

    console.log('/profile/additional/data/' + endString);
    let promise = createRequest(url);
    promise.then(
        data => {
            /* Перебираем данные json */
            data.forEach((item)=>{
                console.log(item);
                /* заполняем данные */
                fillData(item);
            });
            buttonLoad.style.display = "none";
        }
    )
}





