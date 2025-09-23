@extends('layout.master')
@section('title', 'About Us Edit')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">نماش پیام کاربر</h4>
    </div>

    <form class="row gy-4">
        <div class="col-md-6">
            <label class="form-label">نام</label>
            <input disabled value="{{ $contact->name }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">ایمیل</label>
            <input disabled value="{{ $contact->email }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">موضوع پیام</label>
            <input disabled value="{{ $contact->subject }}" class="form-control" />
        </div>
        <div class="col-md-12">
            <label class="form-label">متن پیام</label>
            <textarea disabled class="form-control" rows="3">{{ $contact->body }}</textarea>
        </div>
    </form>
@endsection
