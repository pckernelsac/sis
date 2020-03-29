<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<?php $info = base64_decode($data);
    $ex = explode('-', $info);
?>
<?php $current_homework = $this->db->get_where('homework' , array('homework_code' => $homework_code))->result_array();
    foreach ($current_homework as $row):
?>
<div class="content-w">
  <div class="conty">
  <?php include 'fancy.php';?>
  <div class="header-spacer"></div>
    <div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="navs navs-tabs upper">
			<li class="navs-item">
			  <a class="navs-links active" href="<?php echo base_url();?>teacher/homeworkroom/<?php echo $homework_code;?>/"><i class="os-icon picons-thin-icon-thin-0014_notebook_paper_todo"></i><span><?php echo get_phrase('homework_details');?></span></a>
			</li>
			<li class="navs-item">
			  <a class="navs-links" href="<?php echo base_url();?>teacher/homework_details/<?php echo $homework_code;?>/"><i class="os-icon picons-thin-icon-thin-0100_to_do_list_reminder_done"></i><span><?php echo get_phrase('deliveries');?></span></a>
			</li>
			<li class="navs-item">
			  <a class="navs-links" href="<?php echo base_url();?>teacher/homework_edit/<?php echo $homework_code;?>/"><i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i><span><?php echo get_phrase('edit');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
    <div class="content-i">
      <div class="content-box">
          <div class="back hidden-sm-down" style="margin-top:-20px;margin-bottom:10px">		
	<a href="<?php echo base_url();?>teacher/homework/<?php echo base64_encode($row['class_id']."-".$row['section_id']."-".$row['subject_id']);?>/"><i class="picons-thin-icon-thin-0131_arrow_back_undo"></i></a>	
	</div>	
        <div class="row">
          <main class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div id="newsfeed-items-grid">                
              <div class="ui-block">
                <article class="hentry post thumb-full-width">                
                  <div class="post__author author vcard inline-items">
                    <img src="<?php echo $this->crud_model->get_image_url($row['uploader_type'], $row['uploader_id']); ?>" alt="author">                
                    <div class="author-date">
                      <a class="h6 post__author-name fn" href="#"><?php echo $this->crud_model->get_name($row['uploader_type'], $row['uploader_id']);?></a>
                      <div class="post__date">
                        <time class="published" datetime="2017-03-24T18:18">
                            <?php if($row['status'] == 1):?>
                                <span class="text-success"><?php echo get_phrase('published');?></span>
                            <?php else:?>
                                <span class="text-danger"><?php echo get_phrase('no_published');?></span>
                            <?php endif;?>
                        </time>
                      </div>
                    </div>                
                    <div class="more">
                      <i class="icon-options"></i>                                
                      <ul class="more-dropdown">
                        <li><a href="<?php echo base_url();?>teacher/homework_edit/<?php echo $row['homework_code'];?>/"><?php echo get_phrase('edit');?></a></li>
                        <li><a href="<?php echo base_url();?>teacher/homework_details/<?php echo $row['homework_code'];?>/"><?php echo get_phrase('deliveries');?></a></li>
                      </ul>
                    </div>                
                  </div>                
                  <div class="edu-posts cta-with-media verde">
                    <div class="cta-content">
                      <div class="highlight-header morado">
                        <?php echo $this->db->get_where('subject', array('subject_id' => $row['subject_id']))->row()->name;?>
                      </div>            
                      <div class="grado">
                        <?php echo $this->db->get_where('class', array('class_id' => $row['class_id']))->row()->name;?>
                      </div>
                      <h3 class="cta-header"><?php echo $row['title'];?></h3>           
                      <div class="descripcion">
                        <?php echo $row['description'];?>
                      </div>
                      <?php if($row['file_name'] != ""):?>
                      <div class="table-responsive">
                        <table class="table table-down">
                          <tbody>
                            <tr>
                              <td class="text-left cell-with-media" >
                                <a href="<?php echo base_url() . 'uploads/homework/' . $row['file_name']; ?>"><img src="<?php echo base_url();?>uploads/icons/file.svg" style="height: 25px;"><span><?php echo $row['file_name'];?></span><span class="smaller">(<?php echo $row['filesize'];?>)</span></a>
                              </td>             
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <?php endif;?>
                      <div class="deadtime">
                        <span><?php echo get_phrase('date');?>:</span><i class="picons-thin-icon-thin-0027_stopwatch_timer_running_time"></i><?php echo $row['date_end'];?> @ <?php echo $row['time_end'];?>
                      </div>
                    </div>
                  </div>
                  <div class="control-block-button post-control-button">
                    <a href="#" class="btn btn-control featured-post" style="background-color: #99bf2d; color: #fff;" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('homework');?>">
                      <i class="picons-thin-icon-thin-0004_pencil_ruler_drawing"></i>
                    </a>
                  </div>                
                </article>
              </div>

            </div>
          </main>





          
              <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                <div class="crumina-sticky-sidebar">
                  <div class="sidebar__inner ">
                      <div class="ui-block ">
                          <div class="ui-block-title">
                        <h6 class="title"><?php echo get_phrase('information');?></h6>
                      </div>
                      <div class="ui-block-content">
      <div class="table-responsive">
      <table class="table table-lightbor">
        <tr>
        <th>
          <?php echo get_phrase('subject');?>:
        </th>
        <td>
          <?php echo $this->crud_model->get_type_name_by_id('subject',$row['subject_id']);?>
        </td>
        </tr>
        <tr>
        <th>
          <?php echo get_phrase('class');?>:
        </th>
        <td>
         <?php echo $this->crud_model->get_type_name_by_id('class',$row['class_id']);?>
        </td>
        </tr>
        <tr>
        <th>
          <?php echo get_phrase('section');?>:
        </th>
        <td>
          <?php echo $this->crud_model->get_type_name_by_id('section',$row['section_id']);?>
        </td>
        </tr>
        <tr>
        <th>
          <?php echo get_phrase('total_students');?>:
        </th>
        <td>
          <a class="btn nc btn-rounded btn-sm btn-secondary" style="color:white"><?php $this->db->where('class_id', $row['class_id']); $this->db->where('section_id', $row['section_id']); echo $this->db->count_all_results('enroll');?></a>
        </td>
        </tr>
        <tr>
        <th>
          <?php echo get_phrase('delivered');?>:
        </th>
        <td>
          <a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php $this->db->where('class_id', $row['class_id']); $this->db->where('section_id', $row['section_id']); $this->db->where('homework_code', $homework_code); echo $this->db->count_all_results('deliveries');?></a>
        </td>
        </tr>
        <tr>
        <th>
         <?php echo get_phrase('undeliverable');?>:
        </th>
        <td>
          <?php $this->db->where('class_id', $row['class_id']); $this->db->where('section_id', $row['section_id']); $all = $this->db->count_all_results('enroll');?>
          <?php $this->db->where('class_id', $row['class_id']); $this->db->where('section_id', $row['section_id']); $this->db->where('homework_code', $homework_code); $deliveries = $this->db->count_all_results('deliveries');?>

          <a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo $all - $deliveries; ?></a>
        </td>
        </tr>
      </table>
    </div>
    </div></div>
                    <div class="ui-block">
                      <div class="ui-block-title">
                        <h6 class="title"><?php echo get_phrase('students');?></h6>
                      </div>
                      <ul class="widget w-friend-pages-added notification-list friend-requests">
                          <?php $students   =   $this->db->get_where('enroll' , array('class_id' => $row['class_id'], 'section_id' => $row['section_id'] , 'year' => $running_year))->result_array();
                foreach($students as $row2):?>
                          <li class="inline-items">
                            <div class="author-thumb">
                              <img src="<?php echo $this->crud_model->get_image_url('student', $row2['student_id']); ?>" width="35px" alt="author">
                            </div>
                            <div class="notification-event">
                              <a href="javascript:void(0);" class="h6 notification-friend"><?php echo $this->crud_model->get_name('student', $row2['student_id']);?></a>
                              <span class="chat-message-item"><?php echo get_phrase('roll');?>: <?php echo $this->db->get_where('enroll' , array('student_id' => $row2['student_id']))->row()->roll; ?></span>
                            </div>
                          </li>
                          <?php endforeach;?>
                        </ul>
                      </div> 
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach;?>