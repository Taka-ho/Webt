@vite(['resources/css/top.css'])
<!DOCTYPE html>
<html lang='ja'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    @component('components.header')
    @endcomponent
    <title>Webt(ウェブティー)</title>
</head>
    <body>
        <div class='allSpaces'>  
            <div class='title'>
                <h1>サービス名: Webt(ウェッブティー)</h1>
            </div>
            <div class='overView'>
                <h2>概要</h2>
            </div>
                <hr />
            <div className='detail'>
                <p>
                    プログラミング経験者同士が、Webサイトと技術を通じてコミュニケーションを取ることができるコミュニティです。
                </p>
                <p>
                    目的としては、プログラミングをやっている人は同士は思想・宗教関係なく技術やプログラミングの経験を通じてコミュニケーションを取ることができる点が、プログラミングの素晴らしさだなと私は考えています。
                    ですが、いざコミュニケーションを取ろうと思っても、なかなかプログラミングのそういった中身の部分を引き出すことはできません。
                    ですので、その部分を私達が提供します。
                    皆さんで、ギークな会話を楽しみましょう!!
                </p>
                <p>ちなみにこのサイトLaravelで作ってるんだけど、色々おかしいところあると思うから、ぜひ検証ツールで見て笑ってねw</p>
            </div>
        </div>
    </body>
</html>
