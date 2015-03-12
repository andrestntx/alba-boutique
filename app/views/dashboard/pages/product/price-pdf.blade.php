<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style type="text/css">
			@page {
				margin-top: 130px;
			}
			header {
				position:fixed; 
				margin-top: -120px;
			}
			header figure#logo{
				width: 100%;
				margin-left: 20px;
			}
			h1,h2{
				text-align: center;
				margin-top: 0px;
			}
			.category {
				width: 100%;
				display: block;
			}
			.category h2
			{
				font-size: 30px;
				margin-top: 0px;
			}

			table {
				margin-bottom: 20px;
			}
			
			table.tftable {	
				font-size:12px;
				color:#333333;
				width:100%;
				border-width: 1px;
				border-color: #729ea5;
				border-collapse: collapse;
			}

			table.tftable th {
				font-size:14px;
				background-color: #F2F2F2;
				border-width: 1px;
				padding: 8px;
				border-style: solid;
				border-color: #729ea5;
				text-align:left;
			}

			table.tftable tr {
				background-color: white;
			}

			table.tftable td {
				font-size:13px;
				border-width: 1px;
				padding: 8px;
				border-style: solid;
				border-color: #729ea5;
			}

			p {
				margin: 5px;
			}
			
		</style>
	</head>
	<body>
		<header>
			<figure id="logo">
				{{ HTML::image('img/logo.jpg', 'Logo', [])}}
			</figure>
		</header>
		
		@foreach($categories as $category)
			<div class="category">
				<h2>{{ $category->name }}</h2>
				<table class="tftable">
					<thead>
						<tr>
							<th>No.</th>
							<th>Referencia</th>
							<th>Nombre</th>
							<th>Precio Por Mayor</th>
							<th>Precio Sugerido</th>
							<th>Tallas</th>
						</tr>
					</thead>
					<tbody>				
						@foreach($category->products as $item => $product)
							<tr>
				    			<td>{{$item + 1}}</td>
				    			<td>{{$product->id}}</td>
				    			<td>{{$product->name}}</td>
				    			<td>${{$product->formated_wholesale_price}}</td>
				    			<td>${{$product->formated_sale_price}}</td>
				    			<td>{{$product->sizes}}</td>            			
				    		</tr>            		
						@endforeach
					</tbody>
				</table>
			</div>
		@endforeach

		<p>Alba Boutique</p> 
		<p>Carrera 38 # 23-68 San Benito / Villavicencio </p> 
		<p>Telefono - WhatsApp: 313 816 7962</p> 
	</body>

</html>