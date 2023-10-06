<!DOCTYPE html>
<html lang="ja">
@include('components.head')


<body>
  <form action="{{route('confirm')}}" method="POST">
    @csrf
    <div class="text-center text-xl font-bold mb-7">システムへのご意見をお聞かせください</div>
    <div class="text-center">
      <label for="fullname">氏名</label>
      <input type="text" name="fullname" id="fullname" placeholder="入力してください">
      @error('fullname')
      <!-- fullnameフィールドのエラーメッセージを表示 -->
      <div class="">
        <p class="bg-red-500 text-white">{{ $message }}</p>
      </div>
      @enderror
    </div>
    <div class="text-center">
      <label for="gender">性別</label>
      <label for="man">
        <input type="radio" name="gender" id="man" value="1" checked>男性
      </label>
      <label for="woman">
        <input type="radio" name="gender" id="woman" value="2"> 女性
      </label>
      @error('gender')
      <!-- genderフィールドのエラーメッセージを表示 -->
      <div class="">
        <p class="bg-red-500 text-white">{{ $message }}</p>
      </div>
      @enderror
    </div>
    <div class="text-center">
      <label for="age">年代</label>
      <select name="age" id="age">
        <option value="">選択してください</option>
        @foreach($ages as $age)
        <option value="{{$age->sort}}">{{$age->age}}</option>
        @endforeach
      </select>
      @error('age')
      <!-- fullnameフィールドのエラーメッセージを表示 -->
      <div class="">
        <p class="bg-red-500 text-white">{{ $message }}</p>
      </div>
      @enderror
    </div>
    <div class="text-center">
      <label for="mail">メールアドレス</label>
      <input type="email" name="mail" id="mail" placeholder="入力してください">

      @error('mail')
      <!-- mailフィールドのエラーメッセージを表示 -->
      <div class="">
        <p class="bg-red-500 text-white">{{ $message }}</p>
      </div>
      @enderror
    </div>
    <div class="text-center">
      <label for="">メール送信可否</label>
    </div>
    <div class="text-center">
      <p>登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</p>
      <input type="checkbox" value='permit' name="permit" id="permit">送信を許可します
    </div>
    <div class="text-center">
      <label for="opinion">ご意見</label>
      <textarea class="resize-none" name="opinion" id="opinion" cols="30" rows="10" placeholder="入力してください"></textarea>
    </div>
    <input type="submit" value="確認" class="text-white bg-red-500 py-2 px-4 rounded text-center">
  </form>
</body>

</html>