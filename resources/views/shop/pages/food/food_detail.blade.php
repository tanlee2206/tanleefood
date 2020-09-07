@if ($food_detail)
  
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
					<a href="{{$food_detail->img}}" class="image-popup"><img src="{{$food_detail->img}}" class="img-fluid">
					</a>
					<button type="button" class="btn btn-primary btn-lg btn-block">Chỉnh sửa</button>
					<button type="button" class="btn btn-danger btn-lg btn-block">Xóa</button>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>{{$food_detail->name}}</h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">bình luận</span></a>
							</p>
						</div>
    				<p class="price"><span>{{number_format($food_detail->price,0)}} VNĐ</span></p>
					<p>{!! $food_detail->description !!}	</p>
					<div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
						
						<div class="au-inbox-wrap js-inbox-wrap">
							<div class="au-message js-list-load " >
								<div class="au-message__noti">
									
								</div>
								<div class="au-message-list"> 
									<div class="au-message__item ">
										<div class="au-message__item-inner comment-food">
											<div class="au-message__item-text">
												<div class="avatar-wrap">
													<div class="avatar">
														<img src="asset/admin/images/icon/avatar-02.jpg" alt="John Smith">
													</div>
												</div>
												<div class="text">
													<h5 class="name">John Smith</h5>
													<p>Have sent a photo</p>
												</div>
											</div>
											<div class="au-message__item-time">
												<span>12 Min ago</span>
											</div>
										</div>
									</div>
									<div class="au-message__item ">
										<div class="au-message__item-inner comment-food">
											<div class="au-message__item-text">
												<div class="avatar-wrap online">
													<div class="avatar">
														<img src="asset/admin/images/icon/avatar-03.jpg" alt="Nicholas Martinez">
													</div>
												</div>
												<div class="text">
													<h5 class="name">Nicholas Martinez</h5>
													<p>You are now connected on message</p>
												</div>
											</div>
											<div class="au-message__item-time">
												<span>11:00 PM</span>
											</div>
										</div>
									</div>
									<div class="au-message__item">
										<div class="au-message__item-inner comment-food">
											<div class="au-message__item-text">
												<div class="avatar-wrap online">
													<div class="avatar">
														<img src="asset/admin/images/icon/avatar-04.jpg" alt="Michelle Sims">
													</div>
												</div>
												<div class="text">
													<h5 class="name">Michelle Sims</h5>
													<p>Lorem ipsum dolor sit amet</p>
												</div>
											</div>
											<div class="au-message__item-time">
												<span>Yesterday</span>
											</div>
										</div>
									</div>
									<div class="au-message__item">
										<div class="au-message__item-inner comment-food">
											<div class="au-message__item-text">
												<div class="avatar-wrap">
													<div class="avatar">
														<img src="asset/admin/images/icon/avatar-05.jpg" alt="Michelle Sims">
													</div>
												</div>
												<div class="text">
													<h5 class="name">Michelle Sims</h5>
													<p>Purus feugiat finibus</p>
												</div>
											</div>
											<div class="au-message__item-time">
												<span>Sunday</span>
											</div>
										</div>
									</div>
									<div class="au-message__item js-load-item">
										<div class="au-message__item-inner comment-food">
											<div class="au-message__item-text">
												<div class="avatar-wrap online">
													<div class="avatar">
														<img src="asset/admin/images/icon/avatar-04.jpg" alt="Michelle Sims">
													</div>
												</div>
												<div class="text">
													<h5 class="name">Michelle Sims</h5>
													<p>Lorem ipsum dolor sit amet</p>
												</div>
											</div>
											<div class="au-message__item-time">
												<span>Yesterday</span>
											</div>
										</div>
									</div>
									<div class="au-message__item js-load-item">
										<div class="au-message__item-inner comment-food">
											<div class="au-message__item-text">
												<div class="avatar-wrap">
													<div class="avatar">
														<img src="asset/admin/images/icon/avatar-05.jpg" alt="Michelle Sims">
													</div>
												</div>
												<div class="text">
													<h5 class="name">Michelle Sims</h5>
													<p>Purus feugiat finibus</p>
												</div>
											</div>
											<div class="au-message__item-time">
												<span>Sunday</span>
											</div>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>
    			</div>
    		</div>
    	</div>
    </section>

@endif