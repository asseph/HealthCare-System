<?php
												$resiverid = $_POST['reciverid'];
                                                $senderid = $_POST['senderid'];
												
												include "connection.php";
												$ssql = "SELECT * FROM `chat` WHERE `reciver_id` = '$resiverid' AND `sender_id` = '$senderid'";
												$sres = mysqli_query($con,$ssql);
												while($row = mysqli_fetch_assoc($sres))
												{

                                                    $msg = $row['msg'];
													$date = $row['date'];
													if($row['msg_checker'] == 'reciver'){

														$class = 'sent';
														
													}
													if($row['msg_checker'] == 'sender'){
														$class = 'received';
													}

													echo '
													<li class="media '.$class.'">
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>'.$msg.'</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>'.$date.'</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
													';
												}

												?>