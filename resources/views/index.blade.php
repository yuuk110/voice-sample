<x-app-layout>
    <div class="odai box">
        <h2>お題</h2>
        <div>
            <button onclick="myFunction()">お題表示</button>
            <p id="odai"></p>
        </div>
    </div>
    <h1>Upload Sample</h1>
    <form method="POST" action="/upload" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="text" name="title" placeholder="サンプル名入力">
        </div>
        <div>
            <input type="text" name="odai" placeholder="お題入力">
        </div>
        <div>
            <input type="file" name="file">
        </div>
        <button type="submit">Upload</button>
    </form>

    <h1>Play Sample</h1>
        @foreach($musics as $music)
        <div class="card card-body shadow-2 mb-2">
            <div class="d-flex">
                <p>
                     <span style="font-size: 0.8rem;">{{ $music->created_at }}</span>
                </p>
               <div class="card-text">
                <div>
                    {{ $music->title }}
                </div>
                <div>
                    {{ $music->odai }}
                </div>
                
                    <audio controls>
                        <source src="/storage/{{ $music->filename }}" type="audio/mp3">
                        <source src="/storage/{{ $music->filename }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
               </div>
            </div>
        </div>
        @endforeach
</x-app-layout>

