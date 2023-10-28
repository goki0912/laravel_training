<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

  <title>アンケート詳細</title>
</head>

<body>

  <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <tbody>

        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            ID
          </th>
          <td class="px-6 py-4">
            {{$answer->id}}
          </td>
        </tr>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            氏名
          </th>
          <td class="px-6 py-4">
            {{$answer->fullname}}
          </td>
        </tr>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            性別
          </th>
          <td class="px-6 py-4">
            {{$answer->gender==1?'男性':'女性'}}
          </td>
        </tr>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            年代
          </th>
          <td class="px-6 py-4">
            {{$answer->age->age}}
          </td>
        </tr>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            メールアドレス
          </th>
          <td class="px-6 py-4">
            {{$answer->mail}}
          </td>
        </tr>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            メール送信可否
          </th>
          <td class="px-6 py-4">
            {{$answer->age}}
          </td>
        </tr>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            ご意見
          </th>
          <td class="px-6 py-4">
            {{$answer->feedback}}
          </td>
        </tr>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            登録日時
          </th>
          <td class="px-6 py-4">
            {{$answer->created_at}}
          </td>
        </tr>
      </tbody>
    </table>
    <div class="flex justify-center gap-5">
      <a href="{{route('admin.index')}}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">戻る</a>
      <form action="{{route('admin.destroy',$answer->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">削除</button>
      </form>
    </div>
  </div>

</body>

</html>