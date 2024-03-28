<link rel="stylesheet" href="{{asset('/assets/front/uploadgames.scss')}}">
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

@extends("layouts.front.frontbase")

@section("content")
    <div class="main">
        <div class="content-my">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Game</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('upload_game')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Game Title</label>
                            <input type="text" class="form-control" name="gameTitle" id="gameTitle" placeholder="Game Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <input type="text" class="form-control" name="category" id="category" placeholder="Category">
                        </div>
                        <div class="form-group">
                            <label for="">Build Sources ( Just Loader And .unityweb Files) And Thumbnail</label>
                            <div>
                                <input type="file"
                                       class="filepond"
                                       name="filepond"
                                       id="filepond"
                                       multiple
                                       data-allow-reorder="true"
                                       data-max-file-size="10MB"
                                       data-max-files="5"
                                >

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement,{
            allowMultiple: true, // Birden fazla dosya yükleme izni
            // Dosyalar seçildikten sonra otomatik olarak yükleme
        });
    </script>
    <script>
        FilePond.setOptions({
            server: {
                process: '/temp-upload',
                revert: '/temp-delete',
                headers:{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            },
        });
    </script>
    <script>
        FilePond.parse(document.body);
    </script>
@endsection

