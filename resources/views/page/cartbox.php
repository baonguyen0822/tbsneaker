<!-- 
							<li class="dropdown">
									
								<a href="#" class="ti-bag" data-toggle="dropdown" role="button" aria-expanded="false" style="color: black;"> 
									<span class="glyphicon glyphicon-shopping-cart"></span>
									(@if(Session::has('cart')) 
									{{Session('cart')->totalQty}}
									@else 0 
									@endif)
									 - San Pham<span class="caret"></span>
								</a>
								@if(Session::has('cart'))	
								@foreach($product_cart as $product)
								<ul class="dropdown-menu dropdown-cart" role="menu">
									<li>
										<span class="item">
											<span class="item-left">
												<img src="img/product/{{$product['item']['avatar']}}" alt="" />
												<span class="item-info">
													<span>{{$product['item']['name']}}</span>
												</span>
											</span>
											<span class="item-right">
												<button class="btn btn-xs btn-danger pull-right">x</button>
											</span>
										</span>
									</li>
									<li class="divider"></li>
									<li><a class="text-center" href="">View Cart</a></li>
								</ul>
								@endforeach
								@endif	
							</li>
-->