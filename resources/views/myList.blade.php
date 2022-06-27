@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="my-list__title">
            Your List
        </h2>
        @foreach ($user_list as $item)
            <div class="list-item">
                <a href="/single/{{$item->id_am}}"><img class="list-item__img" src="{{$item->image_am}}"></a>
                <div class="list-item__text-container">
                    <div class="list-item__title">
                        <h5>
                            Title:
                        </h5>
                        <h4>
                            {{$item->title_am}}
                        </h4>
                    </div>
                    <div class="list-item__status">
                        <h5>
                            Status:
                        </h5>
                        <select name="status"  placeholder="Status">
                            <option <?php if ($item->status == 1) echo 'selected="selected"' ?> value="1">Planning</option>
                            <option <?php if ($item->status == 2) echo 'selected="selected"' ?> value="2">In progress</option>
                            <option <?php if ($item->status == 3) echo 'selected="selected"' ?> value="3">Finished</option>
                        </select>
                    </div>
                    <div class="list-item__progress">
                        <h5>
                           Progress:
                        </h5>
                        <input name="progress" placeholder="Progresss" type="number" min="0" max="10" value="<?php if ($item->progress < 0 || $item->progress == null) echo 0;else echo $item->progress; ?>">
                    </div>
                    <div class="list-item__rate">
                        <h5>
                            Rate:
                        </h5>
                        <input name="rate" placeholder="0 - 10" type="number" min="0" max="10" value="<?php if ($item->rate < 0 || $item->rate == null)echo 0;else if ($item->rate > 10)echo 10;else echo $item->rate;?>">

                    </div>
                </div>
                <a class="list-item__delete" data-id-item='{{$item->id_list}}'>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        width="408.483px" height="408.483px" viewBox="0 0 408.483 408.483" style="enable-background:new 0 0 408.483 408.483;"
                        xml:space="preserve"><path d="M87.748,388.784c0.461,11.01,9.521,19.699,20.539,19.699h191.911c11.018,0,20.078-8.689,20.539-19.699l13.705-289.316
                        H74.043L87.748,388.784z M247.655,171.329c0-4.61,3.738-8.349,8.35-8.349h13.355c4.609,0,8.35,3.738,8.35,8.349v165.293
                        c0,4.611-3.738,8.349-8.35,8.349h-13.355c-4.61,0-8.35-3.736-8.35-8.349V171.329z M189.216,171.329
                        c0-4.61,3.738-8.349,8.349-8.349h13.355c4.609,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.737,8.349-8.349,8.349h-13.355
                        c-4.61,0-8.349-3.736-8.349-8.349V171.329L189.216,171.329z M130.775,171.329c0-4.61,3.738-8.349,8.349-8.349h13.356
                        c4.61,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.738,8.349-8.349,8.349h-13.356c-4.61,0-8.349-3.736-8.349-8.349V171.329z"/>
                        <path d="M343.567,21.043h-88.535V4.305c0-2.377-1.927-4.305-4.305-4.305h-92.971c-2.377,0-4.304,1.928-4.304,4.305v16.737H64.916
                        c-7.125,0-12.9,5.776-12.9,12.901V74.47h304.451V33.944C356.467,26.819,350.692,21.043,343.567,21.043z"/>
                    </svg>
                </a>
                <a class="list-item__edit" data-id-item='{{$item->id_list}}'>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                        <path d="m19.3 8.925-4.25-4.2 1.4-1.4q.575-.575 1.413-.575.837 0 1.412.575l1.4 1.4q.575.575.6 1.388.025.812-.55 1.387ZM17.85 10.4 7.25 21H3v-4.25l10.6-10.6Z"/>
                    </svg>
                </a>
            </div>
        @endforeach
    </div>
</div>
<script type="application/javascript">
document.querySelectorAll('.list-item__edit').forEach(el => {
    el.addEventListener('click', editlist);
});

document.querySelectorAll('.list-item__delete').forEach(el => {
    el.addEventListener('click', removelist);
});

function removelist(e) {
    e.preventDefault();

    let id_list = this.dataset.idItem;

    let params = {
        id_list: id_list
    }

    const headers = new Headers({
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{csrf_token()}}'
    });

    fetch('/removeList', {
        method: 'POST',
        headers,
        body: JSON.stringify(params)
    })

    .then(data => data.json())
    .then(data => {
        if (data[0]) location.reload();
        else alert(data[1]);
    })
}

function editlist(e) {
    e.preventDefault();

    let params = {
        id_list: this.dataset.idItem,
        status: this.parentElement.querySelector('select[name="status"]').value,
        progress: this.parentElement.querySelector('input[name="progress"]').value,
        rate: this.parentElement.querySelector('input[name="rate"]').value
    }

    const headers = new Headers({
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{csrf_token()}}'
    });

    fetch('/editList', {
        method: 'POST',
        headers,
        body: JSON.stringify(params)
    })

    .then(data => data.json())
    .then(data => {
        if (data[0]) location.reload();
        else alert(data[1]);
    })
}
</script>
@endsection
