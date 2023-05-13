<div class="page-header">
							<h1>
								Data User
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->

								<div class="widget-body">
										<div class="widget-main">
										

												<div class="step-content pos-rel">
													<div class="step-pane active" data-step="1">
														<h3 class="lighter block green">Enter the following information</h3>

														<?php
                            include "config/config.php";
                            $sql="select * from tb_admin where id_admin='$_GET[id_admin]'";

                            $tampil=mysql_query($sql);
                            $data=mysql_fetch_array($tampil);
                        ?>

														<form method="post" action="control/update_user.php" class="form-horizontal">
														
														

															
													
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Nama Admin:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="nama_admin" value="<?php echo $data['nama_admin']; ?>"   class="col-xs-12 col-sm-6" />
																		<input type="hidden" name="id_admin" value="<?php echo $data['id_admin']; ?>"   class="col-xs-12 col-sm-6" />
																	</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">email :</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="email_admin" value="<?php echo $data['email_admin']; ?>"   class="col-xs-12 col-sm-6" />
																	</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">username:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="username" value="<?php echo $data['username']; ?>"   class="col-xs-12 col-sm-6" />
																	</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Pasword:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="password" name="password"   class="col-xs-12 col-sm-6" />
																		<input type="hidden" name="user" value="<?php echo $data['user']; ?>"   class="col-xs-12 col-sm-6" />
																	</div>
																</div>
															</div>

															

															

															
															
															
												<div class="wizard-actions">
												<a href="user" class="btn btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Cancel
												</a>
												<button type="submit"  class="btn btn-success">
													<span class="fa fa-save"></span> &nbsp; Save
													</button>
												
											</div>

														</form>
													</div>

													
												</div>
												<div class="hr hr-dotted"></div>
											</div>

										
											
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->


