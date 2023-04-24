<x-app-layout>
@include('header')
<div class="container-fluid">
    <div class="d-flex justify-content-center">
        <div class="col-12 col-md-6">
            <div class="odai box">
                <h2>お題</h2>
                <div>
                    <div id="random-text"></div>
                    <button id="generate-button" class="btn btn-primary">お題表示</button>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-md-6">
            <div class="recording">
                <div class="my-3" id="audio-controls">
                    <button id="start-recording" class="btn btn-primary">Start Recording</button>
                    <button id="stop-recording" disabled class="btn btn-primary">Stop Recording</button>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-md-6">
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
    </div>
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
    const texts = [
  "ここは、青々とした森に囲まれた小さな村。\n昔から、この村には不思議な力が宿っていると言われています。\n昨晩、村の中心にある神殿から、異変が起こったとの報せが入りました。\n神殿には古くから伝わる、不思議な神獣の像が祀られています。\n果たして、村に何が起こったのでしょうか？\n神殿の神獣像に何か起きたのか、それとも何か別の原因があるのでしょうか？\n次回の放送で、詳しくお伝えします。\nお見逃しなく！",
  "突然の災害に備え、常に備蓄品を確認しましょう。\nあなたの準備は、命を守るための最大の武器です。",
  "これは、ある町の物語。\nとある日、突然現れた謎の生物たちが、町を襲い始めました。\n人々はその脅威から逃れるため、必死になって逃げ惑っていました。\n果たして、彼らはこの危機を乗り越え、再び平和な日常を取り戻すことができるのでしょうか？\nそれは、あなたの目で確かめてください。",
];
   
const randomText = document.getElementById("random-text");
const generateButton = document.getElementById("generate-button");

generateButton.addEventListener("click", () => {
  const randomIndex = Math.floor(Math.random() * texts.length);
  randomText.textContent = texts[randomIndex];
});

</script>

