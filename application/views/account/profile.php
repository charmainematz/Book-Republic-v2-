<div class="page-content">
		<div class="profile-header-photo">
			<div class="profile-header-photo-in">
				<div class="tbl-cell">
					<div class="info-block">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-9 col-xl-offset-3 col-lg-8 col-lg-offset-4 col-md-offset-0">
									<div class="tbl info-tbl">
										<div class="tbl-row">
											<div class="tbl-cell">
												<p class="title">Dan Counsell</p>
												<p>Company Founder</p>
											</div>
											<div class="tbl-cell tbl-cell-stat">
												<div class="inline-block">
													<p class="title">23К</p>
													<p>Followers</p>
												</div>
											</div>
											<div class="tbl-cell tbl-cell-stat">
												<div class="inline-block">
													<p class="title">938</p>
													<p>Photos</p>
												</div>
											</div>
											<div class="tbl-cell tbl-cell-stat">
												<div class="inline-block">
													<p class="title">18</p>
													<p>Videos</p>
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
			<button type="button" class="change-cover">
				<i class="font-icon font-icon-picture-double"></i>
				Change cover
				<input type="file"/>
			</button>
		</div><!--.profile-header-photo-->

		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-3 col-lg-4">
					<aside class="profile-side">
						<section class="box-typical profile-side-user">
							<button type="button" class="avatar-preview avatar-preview-128">
								<img src="<?= site_url('upload/'.$employee->photo); ?>" alt=""/>
								<span class="update">
									<i class="font-icon font-icon-picture-double"></i>
									Update photo
								</span>
								<input type="file"/>
							</button>
							<!-- <button type="button" class="btn btn-rounded">Send a Message</button> -->
							<header class="box-typical-header-sm bordered"><?= $employee->firstname .' '. $employee->middlename.' '. $employee->lastname; ?></header>
							<div class="bottom-txt">Standing: 154</div>
						</section>

						<section class="box-typical profile-side-stat">
							<div class="tbl">
								<div class="tbl-row">
									<div class="tbl-cell">
										<span class="number">9854</span>
										followers
									</div>
									<div class="tbl-cell">
										<span class="number">112</span>
										following
									</div>
								</div>
							</div>
						</section>

						<section class="box-typical">
							<header class="box-typical-header-sm bordered">About</header>
							<div class="box-typical-inner">
								<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vestibulum id ligula porta felis euismod semper.</p>
							</div>
						</section>

						

						<section class="box-typical">
							<header class="box-typical-header-sm bordered">Info</header>
							<div class="box-typical-inner">
								<p class="line-with-icon">
									<i class="font-icon font-icon-pin-2"></i>
									<?= $employee->address; ?>
								</p>
								<p class="line-with-icon">
									<i class="font-icon font-icon-phone"></i>
									<?= $employee->contact; ?>
								</p>
								<p class="line-with-icon">
									<i class="font-icon font-icon-star"></i>
									<?= format_date($employee->birthdate); ?>
								</p>
								<p class="line-with-icon">
									<i class="font-icon font-icon-learn"></i>
									<?= $employee->position_desc; ?>
								</p>
								<p class="line-with-icon">
									<i class="font-icon font-icon-github"></i>
									<?= $employee->personnel_type_name; ?>
								</p>
								
							</div>
						</section>

						<section class="box-typical">
							<header class="box-typical-header-sm bordered">Skills</header>
							<div class="box-typical-inner">
								<div class="progress-compact-style">
									<div class="progress-header">
										<div class="progress-lbl">AngularJS</div>
										<div class="progress-val">75%</div>
									</div>
									<progress class="progress progress-aquamarine" value="75" max="100">750%</progress>
								</div>
								<div class="progress-compact-style">
									<div class="progress-header">
										<div class="progress-lbl">Javascript</div>
										<div class="progress-val">100%</div>
									</div>
									<progress class="progress progress-danger" value="100" max="100">100%</progress>
								</div>
								<div class="progress-compact-style">
									<div class="progress-header">
										<div class="progress-lbl">Wordpress</div>
										<div class="progress-val">50%</div>
									</div>
									<progress class="progress progress-info" value="50" max="100">50%</progress>
								</div>
								<div class="progress-compact-style">
									<div class="progress-header">
										<div class="progress-lbl">HTML &amp; CSS</div>
										<div class="progress-val">10%</div>
									</div>
									<progress class="progress" value="10" max="100">10%</progress>
								</div>
							</div>
						</section>
					</aside><!--.profile-side-->
				</div>

				<div class="col-xl-9 col-lg-8">
					<section class="tabs-section">
						<div class="tabs-section-nav tabs-section-nav-left">
							<ul class="nav" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" href="#tabs-2-tab-1" role="tab" data-toggle="tab">
										<span class="nav-link-in">Activity</span>
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" href="#tabs-2-tab-3" role="tab" data-toggle="tab">
										<span class="nav-link-in">Projects</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#tabs-2-tab-4" role="tab" data-toggle="tab">
										<span class="nav-link-in">Settings</span>
									</a>
								</li>
							</ul>
						</div><!--.tabs-section-nav-->

						<div class="tab-content no-styled profile-tabs">
							<div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1">
								
								<?php if ($this->session->userdata('user_id') == $employee->employee_id): ?>
									<form class="box-typical">
									<input type="text" class="write-something" placeholder="What`s on your mind"/>
									<div class="box-typical-footer">
										<div class="tbl">
											<div class="tbl-row">
												<div class="tbl-cell">
													<button type="button" class="btn-icon">
														<i class="font-icon font-icon-earth"></i>
													</button>
													<button type="button" class="btn-icon">
														<i class="font-icon font-icon-picture"></i>
													</button>
													<button type="button" class="btn-icon">
														<i class="font-icon font-icon-calend"></i>
													</button>
													<button type="button" class="btn-icon">
														<i class="font-icon font-icon-video-fill"></i>
													</button>
												</div>
												<div class="tbl-cell tbl-cell-action">
													<button type="submit" class="btn btn-rounded">Send</button>
												</div>
											</div>
										</div>
									</div>
								</form><!--.box-typical-->

								<?php endif ?>
								

								<article class="box-typical profile-post">
									<div class="profile-post-header">
										<div class="user-card-row">
											<div class="tbl-row">
												<div class="tbl-cell tbl-cell-photo">
													<a href="#">
														<img src="<?= site_url('upload/'.$employee->photo); ?>" alt="">
													</a>
												</div>
												<div class="tbl-cell">
													<div class="user-card-row-name"><a href="#"><?= $employee->firstname .' '. $employee->lastname; ?></a></div>
													<div class="color-blue-grey-lighter">3 days ago - 23 min read</div>
												</div>
											</div>
										</div>
										<a href="#" class="shared">
											<i class="font-icon font-icon-share"></i>
										</a>
									</div>
									<div class="profile-post-content">
										<p class="profile-post-content-note">Added 4 new pictures</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="profile-post-gall-fluid profile-post-gall-grid" data-columns>
											<div class="col">
												<a class="fancybox" rel="gall-1" href="img/gall-img-1.jpg">
													<img src="img/gall-img-1.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-1" href="img/gall-img-2.jpg">
													<img src="img/gall-img-2.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-1" href="img/gall-img-3.jpg">
													<img src="img/gall-img-3.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-1" href="img/gall-img-4.jpg">
													<img src="img/gall-img-4.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-1" href="img/gall-img-5.jpg">
													<img src="img/gall-img-5.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-1" href="img/gall-img-6.jpg">
													<img src="img/gall-img-6.jpg" alt="">
												</a>
											</div>
										</div>
									</div>
									<div class="box-typical-footer profile-post-meta">
										<a href="#" class="meta-item">
											<i class="font-icon font-icon-heart"></i>
											45 Like
										</a>
										<a href="#" class="meta-item">
											<i class="font-icon font-icon-comment"></i>
											18 Comment
										</a>
									</div>
								</article>

								

								

								<article class="box-typical profile-post">
									<div class="profile-post-header">
										<div class="user-card-row">
											<div class="tbl-row">
												<div class="tbl-cell tbl-cell-photo">
													<a href="#">
														<img src="img/photo-64-2.jpg" alt="">
													</a>
												</div>
												<div class="tbl-cell">
													<div class="user-card-row-name"><a href="#">Tim Collins</a></div>
													<div class="color-blue-grey-lighter">3 days ago - 23 min read</div>
												</div>
											</div>
										</div>
										<a href="#" class="shared">
											<i class="font-icon font-icon-share"></i>
										</a>
									</div>
									<div class="profile-post-content">
										<p class="profile-post-content-note">Created an album collection</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="profile-post-gall-fluid profile-post-gall-grid" data-columns>
											<div class="col">
												<a class="fancybox" rel="gall-2" href="img/gall-img-1.jpg">
													<img src="img/gall-img-1.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-2" href="img/gall-img-2.jpg">
													<img src="img/gall-img-2.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-2" href="img/gall-img-3.jpg">
													<img src="img/gall-img-3.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-2" href="img/gall-img-4.jpg">
													<img src="img/gall-img-4.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-2" href="img/gall-img-5.jpg">
													<img src="img/gall-img-5.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-2" href="img/gall-img-6.jpg">
													<img src="img/gall-img-6.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-2" href="img/gall-img-7.jpg">
													<img src="img/gall-img-7.jpg" alt="">
												</a>
											</div>
										</div>
									</div>
									<div class="box-typical-footer profile-post-meta">
										<a href="#" class="meta-item">
											<i class="font-icon font-icon-heart"></i>
											45 Like
										</a>
										<a href="#" class="meta-item">
											<i class="font-icon font-icon-comment"></i>
											18 Comment
										</a>
									</div>
								</article>

								
							</div><!--.tab-pane-->
							
							<div role="tabpanel" class="tab-pane" id="tabs-2-tab-3">
								<section class="box-typical box-typical-padding">
									Projects
								</section>
							</div><!--.tab-pane-->
							<div role="tabpanel" class="tab-pane" id="tabs-2-tab-4">
								<section class="box-typical profile-settings">
									<section class="box-typical-section">
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">Name</label>
											</div>
											<div class="col-xl-4">
												<input class="form-control" type="text" value="Dan Counsell"/>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">Position</label>
											</div>
											<div class="col-xl-4">
												<input class="form-control" type="text" value="Company founder"/>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">About</label>
											</div>
											<div class="col-xl-6">
												<textarea rows="2" class="form-control">Maecenas sed diam eget risus varius blandit sit amet non magna.
Vestibulum id ligula porta felis euismod semper.</textarea>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">Recomendation</label>
											</div>
											<div class="col-xl-6">
												<input class="form-control" type="text" value="All stream, Connected Apps, Photos, Most recent"/>
											</div>
										</div>
									</section>
									<section class="box-typical-section">
										<header class="box-typical-header-sm">Info</header>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">
													<i class="font-icon font-icon-pin-2"></i>
													City
												</label>
											</div>
											<div class="col-xl-4">
												<input class="form-control" type="text" value="New York"/>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">
													<i class="font-icon font-icon-users-two"></i>
													Group
												</label>
											</div>
											<div class="col-xl-4">
												<input class="form-control" type="text" value="Group1, Group2"/>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">
													<i class="font-icon font-icon-case-3"></i>
													Code
												</label>
											</div>
											<div class="col-xl-6">
												<input class="form-control" type="text" value="Symfony, PHP, JavaScript, Java, Android, SQL, OOP, OOD"/>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">
													<i class="font-icon font-icon-learn"></i>
													Edication
												</label>
											</div>
											<div class="col-xl-6">
												<input class="form-control" type="text" value="VSU, Compiter Science, Master"/>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">
													<i class="font-icon font-icon-github"></i>
													Github
												</label>
											</div>
											<div class="col-xl-4">
												<input class="form-control" type="text" value="Nickname"/>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">
													<i class="font-icon font-icon-earth"></i>
													Web
												</label>
											</div>
											<div class="col-xl-4">
												<input class="form-control" type="text" value="example.com"/>
											</div>
										</div>
									</section>
									<section class="box-typical-section">
										<header class="box-typical-header-sm">Skills</header>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">AngularJS</label>
											</div>
											<div class="col-xl-4">
												<div class="range-settings range-slider-simple range-slider-aquamarine">
													<input type="text" id="range-slider-1" name="example_name" value="" />
													<div class="range-settings-percent">30%</div>
													<div class="range-setting-actions">
														<button type="button">
															<i class="font-icon font-icon-pencil"></i>
														</button>
														<button type="button" class="del">
															<i class="font-icon font-icon-trash"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">Javascript</label>
											</div>
											<div class="col-xl-4">
												<div class="range-settings range-slider-simple range-slider-red">
													<input type="text" id="range-slider-2" name="example_name" value="" />
													<div class="range-settings-percent">30%</div>
													<div class="range-setting-actions">
														<button type="button">
															<i class="font-icon font-icon-pencil"></i>
														</button>
														<button type="button" class="del">
															<i class="font-icon font-icon-trash"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">Wordpress</label>
											</div>
											<div class="col-xl-4">
												<div class="range-settings range-slider-simple range-slider-purple">
													<input type="text" id="range-slider-3" name="example_name" value="" />
													<div class="range-settings-percent">30%</div>
													<div class="range-setting-actions">
														<button type="button">
															<i class="font-icon font-icon-pencil"></i>
														</button>
														<button type="button" class="del">
															<i class="font-icon font-icon-trash"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">HTML &amp; CSS</label>
											</div>
											<div class="col-xl-4">
												<div class="range-settings range-slider-simple">
													<input type="text" id="range-slider-4" name="example_name" value="" />
													<div class="range-settings-percent">30%</div>
													<div class="range-setting-actions">
														<button type="button">
															<i class="font-icon font-icon-pencil"></i>
														</button>
														<button type="button" class="del">
															<i class="font-icon font-icon-trash"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-xl-2">
												<label class="form-label">
													<a href="#">Add new skill</a>
												</label>
											</div>
											<div class="col-xl-4">
												<div class="input-group">
													<input type="text" class="form-control" value="Logo design">
													<span class="input-group-btn">
														<button class="btn btn-grey" type="button">Add</button>
													</span>
												</div>
											</div>
										</div>
									</section>
									<section class="box-typical-section profile-settings-btns">
										<button type="submit" class="btn btn-rounded">Save Changes</button>
										<button type="button" class="btn btn-rounded btn-grey">Cancel</button>
									</section>
								</section>
							</div><!--.tab-pane-->
						</div><!--.tab-content-->
					</section><!--.tabs-section-->
				</div>
			</div><!--.row-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->