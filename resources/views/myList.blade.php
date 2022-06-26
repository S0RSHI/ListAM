@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($user_list as $item)
            <div class="list-item">
                <img class="list-item__img" src="{{$item->image_am}}">
                <div class="list-item__title">
                    <h2>
                        {{$item->title_am}}
                    </h2>
                </div>
                <div class="list-item__status">
                    <h4>
                        {{$item->status}}
                    </h4>
                </div>
                <div class="list-item__progress">
                    <h4>
                        {{$item->progress}}
                    </h4>
                </div>
                <div class="list-item__rate">
                    <h4>
                        {{$item->rate}}
                    </h4>
                </div>
            </div>
        @endforeach
    </div>
</div>
{{-- <script type="application/javascript">
document.querySelector('#add_to_list').addEventListener('click', addlist);

function addlist(e) {
    e.preventDefault();

    let id_am = {{$anime_manga[0]->id_am}};
    let status = document.querySelector('select[name="status"]').value;
    let progress = document.querySelector('input[name="progress"]').value;
    let rate = document.querySelector('input[name="rate"]').value;

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
        console.log(data);
    })
}
</script> --}}
@endsection
