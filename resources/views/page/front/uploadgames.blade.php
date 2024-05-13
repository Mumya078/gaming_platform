<link rel="stylesheet" href="{{asset('/assets/front/uploadgames.scss')}}">
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<!-- Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<!-- Or for RTL support -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
@extends("layouts.front.frontbase")

@section("content")
    <div class="main">
        <div class="content">
            <div class="container-fluid">
            <div class="card card-primary" style="margin-top: 80px">
                <div class="card-header">
                    <h3 class="my-title">Add Game</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('upload_game')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label class="label" for="exampleInputEmail1">Game Title</label>
                            <input type="text" class="form-control" name="gameTitle" id="gameTitle" placeholder="Game Title">
                        </div>
                        <div class="form-group">
                            <label for="category">Select categories</label>
                            <select name="category[]" class="form-select" data-placeholder="Choose anything" id="category" multiple>
                                @foreach($category as $rs)
                                    <option value="{{$rs->id}}">{{$rs->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label">Build Sources ( Just Loader And .unityweb Files) And Thumbnail</label>
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
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
    <script>
        $( '#category' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        } );
    </script>
@endsection

