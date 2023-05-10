<?php
include "connection.php";
$doctorId = $_POST['doctorId'];
$duration = $_POST['duration'];
$day = $_POST['day'];
$time = $_POST['time'];

?>
<!-- Sunday Slot -->
                                                                <div id="slot_sunday" class="tab-pane fade">    
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<div class="doc-times">
                                                                    <?php
                                                                                                                                                    
                                                                            $sql = "SELECT * FROM `schedule-slot` WHERE dcotorId = '$doctorId' AND day = 'Sunday'";
                                                                            $res = mysqli_query($con,$sql);
                                                                        while($row = mysqli_fetch_assoc($res))
                                                                        {
                                                                            echo'
                                                                            <div class="doc-slot-list">
																			'.$row['time'].'
																			<a href="javascript:void(0)" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
                                                                            
                                                                            ';
                                                                        }

                                                                        ?>
																		
																	</div>
																</div>
																<!-- /Sunday Slot -->

																<!-- Monday Slot -->
																<div id="slot_monday" class="tab-pane fade show active">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" data-toggle="modal" href="#edit_time_slot"><i class="fa fa-edit mr-1"></i>Edit</a>
																	</h4>
																	
																	<!-- Slot List -->
																	<div class="doc-times">
                                                                    <?php
                                                                                                                                                    
                                                                            $sql = "SELECT * FROM `schedule-slot` WHERE dcotorId = '$doctorId' AND day = 'Monday'";
                                                                            $res = mysqli_query($con,$sql);
                                                                        while($row = mysqli_fetch_assoc($res))
                                                                        {
                                                                            echo'
                                                                            <div class="doc-slot-list">
																			'.$row['time'].'
																			<a href="javascript:void(0)" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
                                                                            
                                                                            ';
                                                                        }

                                                                        ?>
																		
																	</div>
																	<!-- /Slot List -->
																	
																</div>
																<!-- /Monday Slot -->

																<!-- Tuesday Slot -->
																<div id="slot_tuesday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<div class="doc-times">
                                                                    <?php
                                                                                                                                                    
                                                                            $sql = "SELECT * FROM `schedule-slot` WHERE dcotorId = '$doctorId' AND day = 'tuesday'";
                                                                            $res = mysqli_query($con,$sql);
                                                                        while($row = mysqli_fetch_assoc($res))
                                                                        {
                                                                            echo'
                                                                            <div class="doc-slot-list">
																			'.$row['time'].'
																			<a href="javascript:void(0)" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
                                                                            
                                                                            ';
                                                                        }

                                                                        ?>
																		
																	</div>
																</div>
																<!-- /Tuesday Slot -->

																<!-- Wednesday Slot -->
																<div id="slot_wednesday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<p class="text-muted mb-0">Not Available</p>
																</div>
																<!-- /Wednesday Slot -->

																<!-- Thursday Slot -->
																<div id="slot_thursday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<p class="text-muted mb-0">Not Available</p>
																</div>
																<!-- /Thursday Slot -->

																<!-- Friday Slot -->
																<div id="slot_friday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<p class="text-muted mb-0">Not Available</p>
																</div>
																<!-- /Friday Slot -->

																<!-- Saturday Slot -->
																<div id="slot_saturday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<p class="text-muted mb-0">Not Available</p>
																</div>
																<!-- /Saturday Slot -->

