@php
    $item=App\Models\About::all();
@endphp

<section class="about_section layout_padding">
    <div class="container">

        <div class="row">
            <div class="col-md-6 ">
                <div class="img-box">
                    <img src="{{ asset('images/about-img.png') }}" alt=""/>
                </div>
            </div>

            @foreach($item as $items)
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                {{$items->title}}
                            </h2>
                        </div>
                        <p>
                            {{$items->body}}
                        </p>
                        <a href="{{$items->link}}">
                            مشاهده بیشتر
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
