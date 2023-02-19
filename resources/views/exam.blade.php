@vite(['resources/css/exam.css'])
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @component('components.header')
    @endcomponent
    <title>Webt</title>
</head>
    <body>
        <div class='all-elements'>  
            <div class='introduction'>
                <h1>入団する前に</h1>
                <h2>コーディング試験を受けてもらいます。</h2>
                <p>
                    なぜかというと、最近エンジニアを名乗る詐欺業者がTwitterを始めゴキブリのごとく生息しているからです。<br>
                    さらに、無作為にこういったギーク系のコミュニティに人を入れてしまうと、Githubのソースをそのまま中身も知らずに使ってハッカーですと名乗るやつも出てきます。<br>
                    例えばガキのチーターとかがそれに該当しますね(年齢関係ないガキ)。<br>
                    それと、たまにあるのが、Github上で公開されているゲームのチートツールを、そのまま売りつけようとしてくるやつも出てきて無法地帯化してしまうといった問題もあります。<br>
                    私の友人のコミュニティでそういった事が起きてしまい、BANをしようにも、Discordのアタックツールも持っている方々もいるので、BANをするとなると、そういった人たちと戦争をするということになる。といった事態も起きてしまいます。<br>
                    そういったことを防ぎたいといった意図もあります。<br>
                    そのために、無条件で受け入れるのではなく、ある程度のコーディング能力があるのかをテストします。
                </p>
            </div>
            <div class='overView'>
                <h2>必要なもの</h2>
            </div>
            <div class='must-tool'>
                <p><li>Githubアカウント</li></p>
                <p><li>JavaScriptの知識</li></p>
                <p><li>Discordクライアント</li></p>
                <p><li>Discordアカウント(持っていると非常に作業がスムーズに進みます)</li></p>
                <p><li>情熱(なんだかんだコレが一番大事)</li></p>
            </div>
            <div class='exam-flow'>
                <h2>試験の流れ</h2>
            </div>
            <div class='detail-flow'>
                <p>
                    まず、ターミナルで、<br>
                </p>
                <pre class='command-space'>cd</pre>
                <p>を実行し、ホームディレクトリへ移動します。<br>
                    その後、
                </p>
                <pre class='command-space'>curl ダウンロードリンク</pre>
                <p>
                    を実行し、問題を取得します。<br />
                    問題を取得したら、
                </p>
                <pre class='command-space'>unzip exam</pre>
                <p>
                    で問題のZipファイルの中身を解凍します。<br>
                </p>
                <div class='encourage-part'>
                    <h2>
                        さぁ、試験の準備は整いました。<br>
                        思いっきり培ってきた実力を発揮してください!!!!!
                    </h2>
                </div>
                <div class='scoring'>
                    <h3>問題が解き終わりましたら</h3>
                </div>
                <pre class='command-space'>問題採点用のプログラム</pre>
                <div class='scoring-flow'>
                    <p>
                        を実行してください。
                        もし、合格していたら、私達のDiscordの招待リンクが届きますので、そちらから入団してください。
                    <p>
                </div>
                <!-- 
                    このpタグのものに関しては最後に注意書きとして書くものである。コードを書くときは、この上から埋めていって。
                -->
                <p class='caution'>
                    制限時間は2時間です。2時間でセッションが切れて、書いていたコードも全て消失します。つまりその時点で、不合格とみなされたとおもってください。
                </p>
                <p>以上のことに同意されたら、スタートしてください。</p>

            </div>
        </div>
    </body>
</html>
