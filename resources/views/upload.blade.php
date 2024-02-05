<!-- resources/views/upload.blade.php -->

@extends('layouts.app')

@section('content')
    @include('navbar')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-white">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Upload CSV File</h4>
                    </div>

                    <div class="card-body">
                        <div id="upload-progress-container" style="display: none;">
                            <div class="progress mb-4">
                                <div id="upload-progress" class="progress-bar progress-bar-primary" role="progressbar" data-dz-uploadprogress>
                                    <span class="progress-text"></span>
                                </div>
                            </div>
                        </div>
                        <form action="/upload" method="post" enctype="multipart/form-data" id="uploadForm">
                            @csrf
                            <div class="mb-3">
                                <label for="dataFile" class="form-label text-dark">Choose CSV File:</label>
                                <div class="input-group">
                                    <input type="file" class="form-control visually-hidden" id="dataFile" name="dataFile" accept=".csv" aria-describedby="inputGroupFileAddon">
                                    <label class="input-group-text" for="dataFile" id="browseButton">Browse</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Hide the default file input button visually */
        #dataFile::-webkit-file-upload-button {
            display: none;
        }
        #dataFile::file-selector-button {
            visibility: hidden;
        }

        #upload-progress {
            background-color: #000; /* Black background color */
            color: #fff; /* White text color */
            text-align: center;
            font-size: 16px;
            padding: 5px;
        }

        #upload-progress span {
            display: inline-block;
            width: 100%;
        }

        .progress {
            height: 30px; /* Adjust the height of the progress bar */
            border-radius: 5px; /* Add rounded corners */
            overflow: hidden; /* Hide overflowing content */
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.uploadCsv = { // caelized version of the `id`
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2048, // MB
        chunking: true,
        forceChunking: true,
        chunkSize: 5000000, // KB
        addRemoveLinks: true,
        parallelUploads: 1,
        acceptedFiles: '.csv', 
        createImageThumbnails:false,
        autoQueue:true,
        accept: function(file, done) {
            done();
            $("#upload-progress-container").show();
        },
        init: function () {
            this.on("uploadprogress", function (file, progress, bytesSent) {
                var progressText = progress.toFixed(1) + "%";
                $("#upload-progress").css("width", progressText).text(progressText);
            });

            this.on('error', function(file, response) {d
                console.log(response);
            });
        }
    }
    </script>
@endsection
