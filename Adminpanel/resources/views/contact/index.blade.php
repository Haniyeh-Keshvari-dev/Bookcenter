@extends('layout.master')
@section('title', 'Contact_Us')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">پیام ها</h4>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
            <tr>
                <th>نام</th>
                <th>ایمیل</th>
                <th>موضوع پیام</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact['name']}}</td>
                    <td>{{$contact['email']}}</td>
                    <td>{{$contact['subject']}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('contact.show',['contact'=>$contact->id])}}" class="btn btn-sm btn-outline-info me-2">نمایش</a>

                            <form action="{{route('contact.destroy',['contact'=>$contact->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection

