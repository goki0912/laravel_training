<!DOCTYPE html>
<html lang="ja">
@include('components.head')


<body class="">
  <form action="{{route('confirm')}}" method="POST" class="mx-10 sm:mx-3 bg-gray-500">
    @csrf
    <div class="text-center text-xl font-bold mb-6">システムへのご意見をお聞かせください</div>
    <div class="flex mb-5 px-5">
      <label for="fullname" class="w-20 ">氏名</label>
      <input type="text"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring"
        name="fullname" id="fullname" placeholder="入力してください" value="{{old('fullname')}}">
      @error('fullname')
      <!-- fullnameフィールドのエラーメッセージを表示 -->
      <div class="">
        <p class="bg-red-500 text-white">{{ $message }}</p>
      </div>
      @enderror
    </div>
    <div class="flex items-center pl-4 rounded dark:border-gray-700 mb-5">
      <label for="gender" class="w-20">性別</label>
      <div class="flex items-center pl-4 rounded dark:border-gray-700"">
        <input type="radio" name="gender" id="man" value="1"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{old('gender')==1?'checked':''}}
        checked>
        <label for="man" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">男性</label>
      </div>
      <div class="flex items-center pl-4 rounded dark:border-gray-700">
        <input type="radio" name="gender" id="woman" value="2"
          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{old('gender')==2?'checked':''}}>
        <label for="woman" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">女性</label>


      </div> @error('gender')
      <!-- genderフィールドのエラーメッセージを表示 -->
      <div class="">
        <p class="bg-red-500 text-white">{{ $message }}</p>
      </div>
      @enderror
    </div>
    <div class="flex mb-5 px-5">
      <label for="age" class="w-20">年代</label>
      <select name="age" id="age"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring">
        <option value="">選択してください</option>
        @foreach($ages as $age)
        <option value="{{$age->sort}}" 
        @if (old('age')==$age->sort)
          selected
        @endif>{{$age->age}}</option>
        @endforeach
      </select>
      @error('age')
      <!-- fullnameフィールドのエラーメッセージを表示 -->
      <div class="">
        <p class="bg-red-500 text-white">{{ $message }}</p>
      </div>
      @enderror
    </div>
    <div class="mb-5 px-5 flex">
      <label for="mail">メールアドレス</label>
      <input type="email" name="mail" id="mail"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring"
        placeholder="入力してください" value="{{old('mail')}}">

      @error('mail')
      <!-- mailフィールドのエラーメッセージを表示 -->
      <div class="">
        <p class="bg-red-500 text-white">{{ $message }}</p>
      </div>
      @enderror
    </div>
    <div class="">
      <label for="">メール送信可否</label>
    </div>
    <div class="mb-5  px-5">
      <p>登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</p>
      <input type="checkbox" name="permit" value="1" id="permit" {{old('permit')==1||empty(old('permit'))?'checked':''}}>
      <label for="permit"> 送信を許可します</label>
    </div>
    <div class="px-5 flex">
      <label for="feedback" class="w-20">ご意見</label>
      <textarea
        class="block p-2.5 w-3/5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 resize-none focus:ring"
        name="feedback" cols="30" rows="10" placeholder="入力してください" >{{old('feedback')}}</textarea>
    </div>

    <div class="px-auto text-center">
      <input type="submit" value="確認"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">

    </div>
  </form>
</body>


</html>