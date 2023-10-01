<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite('resources/css/app.css')
</head>

<body>
  <form action="">
    <h1 class="text-xl">システムへのご意見をお聞かせください</h1>
    <div class="">
      <label for="">氏名</label>
      <input type="text" placeholder="入力してください" required>
    </div>
    <div class="">
      <label for="">性別</label>
      <input type="radio" name="" id="man" value="man" checked><label for="man">男性</label>
      <input type="radio" name="" id="man" value="woman"> <label for="">女性</label>
    </div>
    <div>
      <label for="">年代</label>
      <select name="" id="">
        
      </select>
    </div>
    <div class="">
      </div> <label for="">メールアドレス</label>
      <input type="email" name="" id="" placeholder="入力してください" required>
      </div>
    </div>
    <div class="">
      <label for="">メール送信可否</label>
    </div>
    <div>
      <p>登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</p>
      <input type="checkbox" name="" id="">送信を許可します
    </div>
    <div class="">
      <label for="">ご意見</label>
      <textarea class="resize-none" name="" id="" cols="30" rows="10" placeholder="入力してください"></textarea>
    </div>
    <input type="submit" value="確認" class="text-white bg-red-500 py-2 px-4 rounded">
  </form>
</body>

</html>