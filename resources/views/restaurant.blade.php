@extends('master')

@section('title')
    ایران باگت
@endsection


@section('content')
    <meta name="_token" content="{{ csrf_token() }}" />

    <div class="container-fluid mt-0 ">

        <div class="row pl-2 py-0">

            <div class="shadow special-text d-block d-md-inline-block col-lg-3 col-12 px-0 p-3" style="font-size: 1.2rem;background-color: hsla(360, 52%, 56%, 0.2);">
                <ul style="text-align: justify;line-height: 3rem">
                    <li>
                        <span>جای پارک : </span>
                        <span>
                            @isset($restaurant->options['park'])
                                دارد
                            @else
                                ندارد
                            @endisset
                        </span>
                    </li>
                    <li>
                        <span>اینترنت : </span>
                        <span>
                            @isset($restaurant->options['wifi'])
                                دارد
                            @else
                                ندارد
                            @endisset
                        </span>
                    </li>
                    <li>
                        <span>زمین بازی : </span>
                        <span>
                            @isset($restaurant->options['game'])
                                دارد
                            @else
                                ندارد
                            @endisset
                        </span>
                    </li>
                    <li>
                        <span>میز کودک : </span>
                        <span>
                            @isset($restaurant->options['child_bench'])
                                دارد
                            @else
                                ندارد
                            @endisset
                        </span>
                    </li>
                    <li>
                        <span>موسیقی زنده : </span>
                        <span>
                            @isset($restaurant->options['music'])
                                دارد
                            @else
                                ندارد
                            @endisset
                        </span>
                    </li>
                    <li>
                        <span>تحویل رایگان : </span>
                        <span>
                            @isset($restaurant->options['delivery'])
                                دارد
                            @else
                                ندارد
                            @endisset
                        </span>
                    </li>
                    <li>
                        <span>کارت خوان سیار : </span>
                        <span>
                            @isset($restaurant->options['kart'])
                                دارد
                            @else
                                ندارد
                            @endisset
                        </span>
                    </li>
                </ul>
            </div>
            <!--                           -->
            <div class="row p-0 m-0 col-12 col-lg-9">
                <div class="mt-2 col-12">
                    <div></div>
                    <div class="row mb-3" style="direction: ltr !important">
                        <div class="slider" id="slider" style="height: 120px !important;">
                            <div class="slide " id="slide">

                                @foreach($cats as $cat)
                                    <div class="ads-parent each shadow m-2 py-4 text-center rounded" style="background: linear-gradient(to right, #cb2d3e, #ef473a);width: 200px !important;">
                                        <span class="d-none">{{ $cat->id }}</span>
                                        <span class="text-center w-100 h-50">
                                            <span style="cursor: pointer;font-size: 2rem;color: white !important;">{{ $cat->name }}</span>
                                        </span>
                                    </div>
                                @endforeach

                            </div>
                            <button class="ctrl-btn pro-prev text-white"><</button>
                            <button class="ctrl-btn pro-next text-white">></button>
                        </div>
                    </div>
                </div>

                <div class="pb-5 col-12 pt-3 p-0 d-flex flex-row flex-wrap justify-content-center align-items-stretch" id="ajax">

                    @foreach($foods as $key => $food)
                        <div class="col-lg-4 col-11 my-2 animate" style="opacity: 0;">
                            <div class="card bg-light p-hover">
                                <div class="card-header text-bold text-dark">{{ $food->name }}</div>
                                <div class="card-img-top" style="width:100%;height: 200px;background-position: center;background-image: url({{ asset('upload/'.$food->img) }});background-repeat:no-repeat;background-size: cover;"></div>
                                <div class="card-body">
                                    <p class="text-justify text-dark">

                                        <span style="color: #1f4;">توضیحات:</span>
                                        {{ $food->small_detail }}
                                        <br>
                                        <span style="color: #f14;">قیمت:</span>
                                        {{ $food->price }}
                                        <span>تومان</span>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ url('food/'.$food->id) }}" class="btn btn-outline-danger btn-block">خرید محصول</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                </div>
            </div>
        </div>

    </div>

    @if(!empty($special) && !empty($imgs))
        <span class="col-12 px-3 m-auto d-block rounded col-lg-5 text-center text-bold" style="font-size: 2.5rem;background-color: #ffc107;box-shadow: 0px 0px 5px black;">
                    رویداد ویژه
        </span>
        <div class="row col-12 m-0 p-0" style="border-top: 5px solid #ffc107;border-bottom: 5px solid #ffc107;box-shadow: inset 0px 0px 10px black">

            <div class="col-12 col-lg-3 p-0 m-0">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @forelse($imgs as $key => $img)
                            <div class="carousel-item {{ ($key == 0) ? 'active' : ' ' }}">
                                <img src="{{ asset('upload/'.$img->img) }}" class="d-block w-100">
                            </div>
                        @empty

                        @endforelse
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-lg-8 col-12 p-lg-5 p-3">

                <div class="row col-12">
                <span class="col-12 col-lg-5 text-center text-bold ">
                    {{ $special->main }}
                </span>
                </div>
            </div>

        </div>
    @endif

    <div class="col-12 d-flex justify-content-center">{{ $foods->links() }}</div>

    <div class="container-fluid p-lg-3 p-1 col-12 m-0 p-0 d-flex flex-lg-row flex-column justify-content-around">
        <div class="shadow col-12 col-lg-2" style="height:200px;padding: 5px;">
            <div id="card-1" class="w-100 h-100 d-flex align-items-center">
                <div class="front bg-danger text-center" style="background: url({{ asset('img/reserve1.jpg') }});background-size:cover">
                    <p style=" font-weight: bold;color: darkblue;padding: 14px;">
                    </p>
                </div>
                <div class="back" style="background: url({{ asset('img/halo_4_2013-wallpaper-1440x960.jpg') }});background-size: cover;background-position: center;">
                    <a href="{{ url("reserve/".$restaurant->id) }}" class="d-block back"></a>
                </div>
            </div>
        </div>

    </div>

    <script>
        function animation()
        {
            let animate = document.getElementsByClassName('animate');
            for (let s =0;s < animate.length;s++) {
                window.setTimeout(()=>{
                    animate[s].classList.add('animation');
                    animate[s].style.opacity = 1;
                },s*1000);
            }
        }
        animation();
        let acc = document.getElementsByClassName('each');
        for (let i = 0; i < acc.length; i++)
        {
            acc[i].onclick = ()=>{
                ajax.innerHTML =
                    `
                            <div class="spinner">
                              <div class="dot1"></div>
                              <div class="dot2"></div>
                            </div>
                        `;
                var request = new XMLHttpRequest();
                let id = acc[i].firstElementChild.innerHTML;
                let url = "{{ url('/restaurant/down') }}";
                request.open('POST',url);
                request.onreadystatechange = function () {
                    if (request.status == 200) {
                        if (request.readyState === 4) {
                            var jsontext = request.responseText;
                            jsontext = JSON.parse(jsontext);
                            Object.size = function (jsontext) {
                                var size = 0, key;
                                for (key in jsontext) {
                                    if (jsontext.hasOwnProperty(key)) size++;
                                }
                                return size;
                            };
                            var size = Object.size(jsontext);
                            let text = "";
                            console.log(jsontext);
                            for (let j = 0; j < size; j++) {
                                text += `
                                <div class="col-lg-4 col-11 my-2 animate" style="opacity: 0;">
                                    <div class="card bg-light p-hover">
                                        <div class="card-header text-bold text-dark">` + jsontext[j].title + `</div>
                                        <div class="card-img-top" style="width:100%;height: 200px;background-position: center;background-image: url(` + jsontext[j].img + `);background-repeat:no-repeat;background-size: cover;"></div>
                                        <div class="card-body">
                                            <p class="text-justify text-dark">

                                                <span style="color: #1f4;">توضیحات:</span>
                                                ` + jsontext[j].small_detail + `
                                        <br>
                                        <span style="color: #f14;">قیمت:</span>
                                             ` + jsontext[j].price + `
                                        <span>تومان</span>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="` + jsontext[j].url + `" class="btn btn-outline-danger btn-block">خرید محصول</a>
                                        </div>
                                    </div>
                                </div>
                            `;
                            }
                            ajax.innerHTML = text;
                            animation();
                        }
                    }
                };
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.setRequestHeader('X-CSRF-TOKEN', $('meta[name="_token"]').attr('content'));
                request.send('id='+id);
            }
        }

    </script>


@endsection