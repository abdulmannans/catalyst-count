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
                        <div>
                            <div class="mb-3">
                                <label for="file" class="form-label text-dark">Choose CSV File:</label>
                                <div class="input-group">
                                    <input type="file" class="form-control visually-hidden" id="file" name="file" accept=".csv" aria-describedby="inputGroupFileAddon">
                                    <label class="input-group-text" for="file" id="browseButton">Browse</label>
                                </div>
                            </div>
                            <button  class="btn btn-primary" onclick="uploadFile()">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Hide the default file input button visually */
        #file::-webkit-file-upload-button {
            display: none;
        }
        #file::file-selector-button {
            display: none;
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

    <script>
        async function uploadFile() {
            const fileInput = document.getElementById('file');
            const file = fileInput.files[0];
            const chunkSize = 1024 * 1024; // 1MB chunks (adjust as needed)
            const totalChunks = Math.ceil(file.size / chunkSize);
            let currentChunk = 0;

            document.getElementById('upload-progress-container').style.display = 'block';

            async function uploadChunk() {
                const start = currentChunk * chunkSize;
                const end = Math.min(start + chunkSize, file.size);
                const chunk = file.slice(start, end);

                const formData = new FormData();
                formData.append('file', chunk, file.name);
                formData.append('chunk', currentChunk + 1); // 1-based index
                formData.append('totalChunks', totalChunks);
                formData.append('_token', "{{ csrf_token() }}")

                try {
                    const response = await fetch('/upload', {
                        method: 'POST',
                        body: formData,
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }

                    const data = await response.json();
                    console.log(data);

                    const progress = ((currentChunk + 1) / totalChunks) * 100;
                    document.getElementById('upload-progress').style.width = `${progress}%`;
                    document.getElementById('upload-progress').setAttribute('aria-valuenow', progress);
                    document.querySelector('.progress-text').innerText = `${Math.round(progress)}%`;
                    console.log(progress);

                    if (currentChunk < totalChunks - 1) {
                        currentChunk++;
                        await uploadChunk();
                    } else {
                        alert('File uploaded successfully!');
                    }
                } catch (error) {
                    console.error('Error uploading file:', error);
                    alert('Error uploading file. Please try again.');
                }
            }

            if (file) {
                await uploadChunk();
            }
        }
    </script>
@endsection
