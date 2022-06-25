@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="single-am">
            <div class="single-am__container">
                <div class="single-am__left-col">
                    <img src="{{ $anime_manga[0]->image_am }}" alt="poster" class="single-am__img">
                    <form action="addList" method="POST">
                        <button type="submit" class="single-am__button">>Dodaj do listy</button>
                    </form>
                </div>
                <div class="single-am__content">
                    <h2 class="single-am__title">{{$anime_manga[0]->title_am}}</h2>
                    <div class="single-am__content-container">
                        <div class="single-am__center-content">
                            <div class="single-am__details">
                                <ul>
                                    <li>{{$anime_manga[0]->format_am}}</li>
                                    <li>{{$anime_manga[0]->status_am}}</li>
                                    <li>{{$anime_manga[0]->date_start_am}}</li>
                                    @if ($anime_manga[0]->date_end_am != '0000-00-00')
                                    <li>{{$anime_manga[0]->date_end_am}}</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="single-am__info">
                                <?php
                                    $desc = str_replace('&lt;', '<', $anime_manga[0]->desc_am);
                                    $desc = str_replace('&gt;', '>', $desc);
                                    echo $desc;
                                ?>
                            </div>
                        </div>
                        <ul class="single-am__category">
                            <li>Category:</li>
                            <?php
                                $categories = explode(", ", $anime_manga[0]->category_am);
                                foreach ($categories as $category) {
                            ?>
                                <li>
                                    <?php echo $category ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
