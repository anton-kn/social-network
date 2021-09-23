<div class="position-absolute top-0 end-0 border border-1 w-75 p-3">
    <h2>Коментарии</h2>
    <form method="post" action="/test">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
            <input type="text" name="topic" value="" class="form-control" id="exampleFormControlInput1"
                   placeholder="Введитете заголовок">
            @error('topic')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Текст сообщения</label>
            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"
                      placeholder="Введите текст сообщения"></textarea>
            @error('comment')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-info" >Отправить</button>
    </form>
</div>
