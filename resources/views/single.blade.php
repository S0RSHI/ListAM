@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="single-am">
            <div class="single-am__container">
                <div class="single-am__left-col">
                    <img src="{{ $anime_manga[0]->image_am }}" alt="poster" class="single-am__img">
                    <a id="single-am__button" class="single-am__button">Add to list</a>
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
    <div id="popup" class="single-am__popup">
        <div class="single-am__form">
            <h3>Add this title to list</h3>
            <form action="add_to_list" method="POST">

                <select name="status"  placeholder="Status">
                    <option>Planning</option>
                    <option>In progress</option>
                    <option>Finished</option>
                </select>
                <input name="progress" type="number" min="0" placeholder="Progress">
                <input name="rate" type="number" min="0" max="10" placeholder="Rate (0 - 10)">
                <button type="submit">Add to list</button>
            </form>
        </div>
    </div>
</div>
@endsection
