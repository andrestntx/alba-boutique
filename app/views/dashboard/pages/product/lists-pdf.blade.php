<html>
<head>
	<title></title>
	<style type="text/css">
		@page {
			margin-top: 120px;
		}
		header {
			position:fixed; 
			margin-top: -100px;
		}
		header figure#logo{
			width: 100%;
			margin-left: 20px;
		}
		h1,h2{
			text-align: center;
			margin-top: 0px;
		}
		.category, .products, .product {
			width: 100%;
			display: block;
		}
		.product {
			margin: 0 5% 30px 5%;
		}
		.product .product-img, .product .product-info{
			display: inline-block;
			vertical-align: top;
			margin: 0;
		}
		.product .product-img{
			width: 60%;
		}
		.product .product-info{
			width: 35%;
		}
		.product .product-info h3{
			font-size: 19px;
			font-style: none;
			font-weight: normal;
			margin: 5px 0;
		}
		.product .product-info span.product-column{
			font-weight: bold;
		}
		.product .product-info #product-name{
			font-size: 22px;
		}
		.product .product-img img{
			max-width: 100%;
			max-height: 400px;
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
			<div class="products">
				@foreach($category->products as $product)
					<div class="product">
						<div class="product-img">
							{{ HTML::image($product->image, $product->name, [])}}
						</div>
						<div class="product-info">
							<h3 id="product-name"> {{ $product->name }} </h3>
							<h3> <span class="product-column">Referencia:</span> {{ $product->id }} </h3>
							
							<h3> <span class="product-column">Precio Mayorista:</span> ${{ $product->formated_wholesale_price }} </h3>
							<h3> <span class="product-column">Precio Sugerido:</span> ${{ $product->formated_sale_price }} </h3>
							<h3> <span class="product-column">Tallas:</span>  {{ $product->sizes }} </h3>
							<h3> <span class="product-column">Detalle:</span> {{ $product->description }} </h3>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	@endforeach
</body>
</html>