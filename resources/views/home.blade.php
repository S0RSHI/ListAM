@extends('layouts.app')

<?php
    $index_anime = 0;
    $index_manga = 0;
?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <section class="custom-section__01">
            <h2 class="custom-title__01">
                Recommended Anime
            </h2>
            <div class="grid-am">
                @foreach ($anime_manga as $am_item)
                    @if($am_item->is_anime == true)
                        <?php
                            $index_anime++;
                        ?>
                        <a class="grid-am__tile" href="/single/{{$am_item->id_am}}">
                            <img class="grid-am__img" src="{{ $am_item->image_am }}">
                            <div class="grid-am__overlay"></div>
                            <div class="grid-am__title">
                                {{ $am_item->title_am }}
                            </div>
                        </a>
                        <?php
                            if($index_anime == 5) break;
                        ?>
                    @endif
                @endforeach
            </div>
        </section>
        <section class="custom-section__01">
            <h2 class="custom-title__01">
                Recommended Manga
            </h2>
            <div class="grid-am">
                @foreach ($anime_manga as $am_item)
                    @if($am_item->is_anime == false)
                        <?php
                            $index_manga++;
                        ?>
                        <a class="grid-am__tile" href="/single/{{$am_item->id_am}}">
                            <img class="grid-am__img" src="{{ $am_item->image_am }}">
                            <div class="grid-am__overlay"></div>
                            <div class="grid-am__title">
                                {{ $am_item->title_am }}
                            </div>
                        </a>
                        <?php
                            if($index_manga == 5) break;
                        ?>
                    @endif
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
