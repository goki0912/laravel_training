<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>DataTables </title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!--Replace with your tailwind.css once created-->


	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/admin.css">



</head>

<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
	@auth
	@if(session('success'))
	<div class="bg-green-200 text-green-800 p-3">
		{{ session('success') }}
	</div>
	@endif
	@if(session('error'))
	<div class="bg-red-200 text-red-800 p-3">
		{{ session('error') }}
	</div>
	@endif

	<form method="POST" action="{{ route('logout') }}">
		@csrf
		<button type="submit">ログアウト</button>
	</form>

	<!--Container-->
	<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

		<!--Title-->
		<h1>アンケート一覧</h1>
		<form method="POST" action="{{route('choice_delete')}}">
			@csrf

			<!--Card-->
			<!-- Modal toggle -->

			<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
				<div class="flex gap-5">
					<button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
						class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
						type="button">
						検索
					</button>
					<button type="submit"
						class="bg-red-700 hover:bg-red-800 focus:ring-4 outline-none focus:ring-red-300 font-medium text-sm text-white px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 rounded-lg">削除</button>
				</div>

				{{$answers->links()}}
				<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
						<tr>
							<th><input type="checkbox" id="select-all">全選択</th>
							<th data-priority="1">ID</th>
							<th data-priority="2">名前</th>
							<th data-priority="3">性別</th>
							<th data-priority="4">年代</th>
							<th data-priority="5">フィードバック</th>
							<th data-priority="6">作成日時</th>
						</tr>
					</thead>
					<tbody>
						@foreach($answers as $answer)

						<tr class="cursor-pointer" onclick="window.location='{{ route('admin.show', ['id' => $answer->id]) }}';">
							<td><input type="checkbox" name="delete[]" id="delete" value="{{$answer->id}}" onclick="event.stopPropagation();"></td>
							<td>{{ $answer->id }}</td>
							<td>{{ $answer->fullname }}
							</td>
							<td>{{ $answer->gender === 1 ? '男性' : '女性' }}</td>
							<td>{{ $answer->age->age }}</td>
							<td>{{ $answer->feedback }}</td>
							<td>{{ $answer->created_at }}</td>
							</a>
						</tr>
						@endforeach

					</tbody>

				</table>

		</form>

	</div>
	<!--/Card-->



	<!-- Main modal -->
	<div id="authentication-modal" tabindex="-1" aria-hidden="true"
		class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
		<div class="relative w-full max-w-md max-h-full">
			<!-- Modal content -->
			<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
				<button type="button"
					class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
					data-modal-hide="authentication-modal">
					<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
					</svg>
					<span class="sr-only">Close modal</span>
				</button>
				<div class="px-6 py-6 lg:px-8">

					<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">絞り込み検索</h3>
					<form method="GET" class="space-y-6" action="{{route('admin.index')}}">
						@csrf

						<div>
							<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">氏名</label>
							<input type="text" name="name" id="name"
								class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
								placeholder="入力してください">
						</div>
						<div class="age">
							<label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">年代</label>
							<select name="age" id="age"
								class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring">
								<option value="">すべて</option>
								@foreach($ages as $age)
								<option value="{{$age->sort}}" @if (old('age')==$age->sort)
									selected
									@endif>{{$age->age}}</option>
								@endforeach
							</select>
						</div>


						<div>
							<label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">性別</label>
							<div class=" flex">
								<div class="flex items-center pl-4 rounded dark:border-gray-700"">
								<input type="radio" name="gender" id="man" value="1"
									class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
									{{old('gender')==1?'checked':''}}>
									<label for="man"
										class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">男性</label>
								</div>
								<div class="flex items-center pl-4 rounded dark:border-gray-700">
									<input type="radio" name="gender" id="woman" value="2"
										class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
										{{old('gender')==2?'checked':''}}>
									<label for="woman"
										class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">女性</label>
								</div>
							</div>

							<div>
								<label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">登録日</label>
								<div date-rangepicker class="flex items-center">
									<div class="relative">
										<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
											<svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
												xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
												<path
													d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
											</svg>
										</div>
										<input name="start" type="text"
											class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
											placeholder="Select date start">
									</div>
									<span class="mx-4 text-gray-500">to</span>
									<div class="relative">
										<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
											<svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
												xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
												<path
													d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
											</svg>
										</div>
										<input name="end" type="text"
											class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
											placeholder="Select date end">
									</div>
								</div>
							</div>


							<div>
								<label for="keyword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">キーワード</label>
								<input type="text" name="keyword" id="keyword" placeholder="入力してください"
									class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

							</div>


							<div class="flex justify-between">
								<div class="flex items-start">
									<div class="flex items-center h-5">
										<input id="remember" type="checkbox" value=""
											class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
									</div>
									<label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember
										me</label>
								</div>
								<a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
							</div>
							<button type="submit"
								class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">検索</button>
							<div class="text-sm font-medium text-gray-500 dark:text-gray-300">
								Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create
									account</a>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>



	<!--/container-->





	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true
				})
				.columns.adjust()
				.responsive.recalc();
		});
	</script>
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
	<script>
		$(document).ready(function() {
					// 全選択のチェックボックスをクリックしたとき
					$('#select-all').click(function(){
							if ($(this).is(':checked')) {
									// すべての行のチェックボックスを選択状態にする
									$('input[type="checkbox"]').prop('checked', true);
							} else {
									// すべての行のチェックボックスを非選択状態にする
									$('input[type="checkbox"]').prop('checked', false);
							}
					});
	
					// 個別の行のチェックボックスが変更されたとき
					$('input[type="checkbox"]').change(function() {
							// 全ての行が選択されているかどうかを確認
							if ($('input[type="checkbox"]').length === $('input[type="checkbox"]:checked').length) {
									// 全選択のチェックボックスを選択状態にする
									$('#select-all').prop('checked', true);
							} else {
									// 全選択のチェックボックスを非選択状態にする
									$('#select-all').prop('checked', false);
							}
					});
	
					var table = $('#example').DataTable({
							responsive: true
					});
					table.columns.adjust().responsive.recalc();
			});
	</script>

</body>
@endauth

</html>