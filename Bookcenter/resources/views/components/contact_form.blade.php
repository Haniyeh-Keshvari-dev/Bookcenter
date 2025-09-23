<div class="form_container">
    <form action="{{route('contact.store')}}" method="POST">
        @csrf
        <div>
            <input name="name" value="{{old('name')}}" type="text" class="form-control" placeholder="نام و نام خانوادگی"/>
            <div class="form-text text-danger">@error('name'){{$message}}@enderror</div>

        </div>
        <div>
            <input name="email" type="email" class="form-control" placeholder="ایمیل"/>
            <div class="form-text text-danger">@error('email'){{$message}}@enderror</div>
        </div>
        <div>
            <input name="subject" type="text" class="form-control" placeholder="موضوع پیام"/>
            <div class="form-text text-danger">@error('subject'){{$message}}@enderror</div>

        </div>
        <div>
                                <textarea rows="10" style="height: 100px" class="form-control" name="body"
                                          placeholder="متن پیام"></textarea>
            <div class="form-text text-danger">@error('body') {{$message}}@enderror</div>

        </div>
        <div class="btn_box">
            <button type="submit">
                ارسال پیام
            </button>
        </div>
    </form>
</div>
