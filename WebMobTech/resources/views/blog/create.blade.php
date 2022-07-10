<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <style type="text/css">
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .topnav a:hover {
            border-bottom: 3px solid red;
        }
        
        div ul li a{
            margin-right: 10px;
        }



        /* Add a gray background color with some padding */
        body {
            font-family: Arial;
            padding: 20px;
            background: #f1f1f1;
        }

        /* Header/Blog Title */
        .header {
            padding: 30px;
            font-size: 40px;
            text-align: center;
            background: white;
        }

        /* Create two unequal columns that floats next to each other */
        /* Left column */
        .leftcolumn {
            float: center;
            width: 75%;
            padding-left: 200px
        }

        /* Right column */
        .rightcolumn {
            float: left;
            width: 25%;
            padding-left: 20px;
        }

        /* Fake image */
        .fakeimg {
            background-color: #aaa;
            width: 100%;
            padding: 20px;
        }

        /* Add a card effect for articles */
        .card {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Footer */
        .footer {
            padding: 20px;
            text-align: center;
            background: #ddd;
            margin-top: 20px;
        }

        .navbar{
            height: 70px;
            background-color: black;
            color: white;
        }

        .btn{
            width: 100px;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 800px) {

            .leftcolumn,
            .rightcolumn {
                width: 100%;
                padding: 0;
            }
        }
        .dropdown-toggle{
            height: 40px;
            width: 400px !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand" href="#">Blog Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">Insert Blog Details</h6>
                    </div>
                    @if ($errors->any())
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="post" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label><strong>Title :</strong></label>
                                <input type="text" name="title" class="form-control"/>
                            </div>  
                            <div class="form-group">
                                <label><strong>Content :</strong></label>
                                <textarea class="ckeditor form-control" name="content"></textarea>
                            </div>
                            <div class="">
                                <label><strong>Select Category :</strong></label><br/>
                                <select class="selectpicker" multiple data-live-search="true" name="category[]">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group text-right" style="margin-top: 20px;">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                                <a href="{{ route('blog.index') }}" class="btn btn-primary btn-sm" type="button">back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
   
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
  
</html>