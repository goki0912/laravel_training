<!DOCTYPE html>
<html lang="ja">
@include('components.head')
<form action="{{route('store')}}" method="POST">
  @csrf
  <h1 class="text-3xl">内容確認</h1>
  <div>
    <h2>氏名</h2>
    <h2>{{$data['fullname'] }}</h2>
    <input type="hidden" name="fullname" value="{{$data['fullname'] }}">
  </div>
  </div>
  <div>
    <h2>性別：</h2>
    @if ($data['gender']==1)
        男性
    @elseif($data['gender']==2)
        女性
    @endif
    <input type="hidden" name="gender" value="{{$data['gender'] }}">

  </div>
  <div>
    <h2>年代</h2>
    <h2> {{ $ageData->age }}</h2>
    <input type="hidden" name="age" value="{{$ageId}}">

  </div>
  <div>
    <h2>メールアドレス</h2>
    <h2>{{ $data['mail'] }}</h2>
    <input type="hidden" name="mail" value="{{$data['mail'] }}">

  </div>
  <div>
    <h2>メール送信可否</h2>
    <h2></h2>
  </div>
  <div>
    <h2>ご意見:{{ $data['opinion'] }}</h2>
    <input type="hidden" name="opinion" value="{{$data['opinion'] }}">

  </div>

  <button type="submit" name="back" value="back">再入力</button>

  <button type="submit">送信</button>

</form>
</html>