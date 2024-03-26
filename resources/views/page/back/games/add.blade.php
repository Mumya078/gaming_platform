@extends("layouts.back.adminbase")
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

@section("content_back")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
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
