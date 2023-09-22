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
    <h2>システムへのご意見をお聞かせください</h2>
    <label for="">氏名</label>
    <input type="text" required>
    <label for="">性別</label>
    <input type="radio" name="" id="man" value="man" checked><label for="man">男性</label>
    <input type="radio" name="" id="man" value="woman"> <label for="">女性</label> 
    <label for="">メールアドレス</label>
    <input type="email" name="" id="">
    <label for="">メール送信可否</label>
    <input type="checkbox" name="" id="">
    <label for="">ご意見</label>
    <textarea name="" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="確認" class="text-white py-2 px-4 rounded">
  </form>
</body>
</html>