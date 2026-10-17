<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Index</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Favicon -->
   

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    {{-- <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" /> --}}

    <link rel="stylesheet" href="https://cdn.plyr.io/3.8.5/plyr.css" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
    @routes
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Content Start -->
        <div class="content">
            <!-- Widget Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="g-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary ms-2">Exit</button>
                    </form>
                    {{-- to do list --}}
                    <div class="col-sm-12 col-md-6 col-xl-4 m-auto">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                            </div>
                            <div class="d-flex mb-2">
                                <label class="form-control bg-transparent">Enter New Note :</label>
                                <a type="button" href="{{ route('notes.create') }}" class="btn btn-primary ms-2">Add</a>
                            </div>
                            @foreach ($notes as $note)
                                <div class="d-flex align-items-center border-bottom py-2">
                                    @switch($note->status)
                                        @case('done')
                                            <input onclick="ChangeStatus('{{$note->id}}')" class="form-check-input m-0" type="checkbox" checked id="{{$note->id}}">
                                            @break
                                        @case('pending')
                                            <input onclick="ChangeStatus('{{$note->id}}')" class="form-check-input m-0" type="checkbox" id="{{$note->id}}">
                                            @break    
                                    
                                        @default
                                    @endswitch
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 align-items-center justify-content-between">
                                            <a style="color: gray" href="{{ route('notes.edit',$note->id) }}"><span>{{$note->note}}</span></a>
                                            <form action="{{ route('notes.destroy',$note->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm"><i class="fa fa-times"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- Video Player : --}}
                            <video id="player" playsinline controls data-poster="{{ asset('storage/pic/1.jpg') }}">

                                {{-- Main Video : --}}
                                <source src="{{ asset('storage/videos/video.mp4') }}" type="video/mp4" />

                                {{-- Backup Link : --}}
                                {{-- <source src="{{asset('storage/videos/koulampic.webm')}}" type="video/webm" /> --}}

                                <!-- Captions are optional -->
                                {{-- <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default /> --}}

                            </video>

                            {{-- Audio Player : --}}
                            {{-- <audio id="player" controls>
                                <source src="{{ asset('storage/voice/m.mp3') }}" type="audio/mp3" />
                                <source src="/path/to/audio.ogg" type="audio/ogg" />
                            </audio> --}}
                        </div>
                    </div>
                    {{-- end --}}
                </div>
            </div>
            <!-- Widget End -->
        </div>
        <!-- Content End -->
    </div>
    

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{asset('lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>

    {{-- Player --}}
    <script src="https://cdn.plyr.io/3.8.5/plyr.js"></script>

    <script>
    const player = new Plyr('#player');
    </script>

    @sweetAlert
</body>

</html>