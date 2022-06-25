@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <section class="custom-section__01">
            <h2 class="custom-title__01">
                That's all anime
            </h2>
            <div class="grid-am">
                @foreach ($anime_manga as $am_item)
                    @if($am_item->is_anime == true)
                        <a class="grid-am__tile" href="/single/{{$am_item->id_am}}">
                            <img class="grid-am__img" src="{{ $am_item->image_am }}">
                            <div class="grid-am__overlay"></div>
                            <div class="grid-am__title">
                                {{ $am_item->title_am }}
                                <br>
                                <span class="grid-am__category">
                                    <?php
                                        $categories = explode(", ", $am_item->category_am);
                                        foreach ($categories as $key=>$category) {
                                            if($key>2) break;
                                            if($key != 2)
                                                echo $category.', ';
                                            else
                                                echo $category;
                                        }
                                    ?>
                                </span>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
