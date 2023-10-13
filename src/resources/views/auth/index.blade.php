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
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">ログアウト</button>
    </form>

	<!--Container-->
	<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

		<!--Title-->
        <h1>アンケート一覧</h1>

		<!--Card-->
		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

            {{$answers->links()}}
			<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead>
					<tr>
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

					<tr>
						<td>{{ $answer->id }}</td>
            <td>{{ $answer->fullname }}</td>
            <td>{{ $answer->gender === 1 ? '男性' : '女性' }}</td>
            <td>{{ $answer->age->age }}</td>
            <td>{{ $answer->feedback }}</td>
            <td>{{ $answer->created_at }}</td>
            <td><button>詳細</button></td>
					</tr>
                    @endforeach

					<!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->

					
				</tbody>

			</table>


		</div>
		<!--/Card-->


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

</body>
@endauth

</html>
