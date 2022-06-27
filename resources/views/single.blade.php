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
            <form>
                @csrf
                <select name="status"  placeholder="Status">
                    <option selected="selected" value="1">Planning</option>
                    <option value="2">In progress</option>
                    <option value="3">Finished</option>
                </select>
                <input name="progress" type="number" min="0" placeholder="Progress">
                <input name="rate" type="number" min="0" max="10" placeholder="Rate (0 - 10)">
                <button id="add_to_list" type="submit" name="single" value="{{$anime_manga[0]->id_am}}">Add to list</button>
                <p id="response"></p>
            </form>
            <p class="single-am__form-error" id="error-msg"></p>
            <a class="single-am__popup-close">
                <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                    <path d="m12.45 37.65-2.1-2.1L21.9 24 10.35 12.45l2.1-2.1L24 21.9l11.55-11.55 2.1 2.1L26.1 24l11.55 11.55-2.1 2.1L24 26.1Z"/>
                </svg>
            </a>
        </div>
    </div>
</div>
<script type="application/javascript">
window.onload = addToList;


function addToList() {
    var popup = document.querySelector('#popup');
    document.querySelector('.single-am__popup-close').addEventListener('click', () => {popup.style.display = 'none'})
    document.querySelector('#single-am__button').addEventListener('click', function () {
        if(popup.style.display != 'flex'){
            popup.style.display = 'flex';
            popup.style.width = '100%';
            popup.style.height = '100%';
        } else {
            popup.style.display = 'none';
             popup.style.width = '0%';
              popup.style.height = '0%';
        }
    });
    popup.addEventListener('click', function (e) {
        if (e.target == popup) popup.style.display = 'none';
    });
}
document.querySelector('#add_to_list').addEventListener('click', addlist);

function addlist(e) {
    e.preventDefault();

    let id_am = {{$anime_manga[0]->id_am}};
    let status = document.querySelector('select[name="status"]').value;
    let progress = document.querySelector('input[name="progress"]').value;
    let rate = document.querySelector('input[name="rate"]').value;

    if (rate > 10)
        rate = 10;
    if (rate < 0)
        rate = 0;

    if (progress < 0)
        progress = 0;


    let params = {
        id_am: id_am,
        status: status,
        progress: progress,
        rate: rate
    }

    const headers = new Headers({
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{csrf_token()}}'
    });

    fetch('/addList', {
        method: 'POST',
        headers,
        body: JSON.stringify(params)
    })

    .then(data => data.json())
    .then(data => {
        let msg_container = document.getElementById('error-msg');
        msg_container.innerHTML = data[1];
        if(data[0]) msg_container.style.color = "#33AB5F";
        else msg_container.style.color = "#EE4D4D";

    })
}
</script>
@endsection
