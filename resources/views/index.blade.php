<x-app-layout>
    <div class="center">
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
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
    </div>

    <h1>Play Sample</h1>
      @if(isset($musics))
        @foreach($musics as $music)
        <div class="card card-body shadow-2 mb-2">
            <div class="d-flex">
                <div class="user">
                <p>
                     <span style="font-size: 0.8rem;">{{ $music->created_at }}</span>
                </p>
                </div>
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
      @endif
</x-app-layout>
<script>
    function myFunction(){
        document.getElementById("odai").innerHTML = "ここは、青々とした森に囲まれた小さな村。\n昔から、この村には不思議な力が宿っていると言われています。\n昨晩、村の中心にある神殿から、異変が起こったとの報せが入りました。\n神殿には古くから伝わる、不思議な神獣の像が祀られています。\n果たして、村に何が起こったのでしょうか？\n神殿の神獣像に何か起きたのか、それとも何か別の原因があるのでしょうか？\n次回の放送で、詳しくお伝えします。\nお見逃しなく！";
    }
</script>

