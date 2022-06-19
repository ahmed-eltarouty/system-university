<div class="container">
    <div class="row">
        @isset($notifications)
            @foreach ($notifications as $notification)
                @if($notification->status == 1)
                    <div class="d-flex justify-content-center align-content-center w-100">
                        <div class="row mr-2 ml-2 mt-2 w-100" >
                            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                                    id="type-error" wire:click='deleteNoti({{$notification->id}})'>
                                    {{$notification->content}}
                            </button>
                            <span>{{$notification->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                @else
                    <div class="d-flex justify-content-center align-content-center w-100">
                        <div class="row mr-2 ml-2 mt-2 w-100" >
                            <button type="text" class="btn btn-lg btn-block btn-outline-info mb-2"
                                    id="type-error"  wire:click='deleteNoti({{$notification->id}})'>
                                    {{$notification->content}}
                            </button>
                            <span>{{$notification->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                @endif

            @endforeach

        @endisset
    </div>

</div>
