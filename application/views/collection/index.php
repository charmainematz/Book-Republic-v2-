<!-- begin breadcrumb -->
			
			<!-- end page-header -->
			
            <div id="options" class="m-b-10">
                <span class="gallery-option-set" id="filter" data-option-key="filter">
                    <a href="#show-all" class="btn btn-default btn-xs active" data-option-value="*">
                        Show All
                    </a>
                    <a href="#gallery-group-1" class="btn btn-default btn-xs" data-option-value=".gallery-group-1">
                       Newly Added
                    </a>
                    <a href="#gallery-group-2" class="btn btn-default btn-xs" data-option-value=".gallery-group-2">
                        Top Rated
                    </a>
                    <a href="#gallery-group-3" class="btn btn-default btn-xs" data-option-value=".gallery-group-3">
                       Most Borrowed
                    </a>
                    <a href="#gallery-group-4" class="btn btn-default btn-xs" data-option-value=".gallery-group-4">
                      Most Swapped
                    </a>
                </span>
            </div>
            <div id="gallery" class="gallery">
                  <?php if ($this->session->flashdata('message') ): ?>
                 <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <?= $this->session->flashdata('message')?></strong>
                 </div>
                 
                <?php endif ?>

                   <?php if ($this->session->flashdata('message2') ): ?>
                 <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <?= $this->session->flashdata('message2')?></strong>
                 </div>
                 
                <?php endif ?>
                    <?php foreach($books as $book):?>
                <div class="image gallery-group-1" >
                    <div class="image-inner" style="text-align: center">
                       <br>

                        <?php if($book->cover_photo!=null){?>
                             <a href="<?=site_url('upload/'.$book->cover_photo)?>" data-lightbox="gallery-group-1">
                                     <img style="width:150px; text-align: center" src="<?=site_url('upload/'.$book->cover_photo)?>" alt="image"  />
                            </a>
                                     <?php }else{?>
                                      <a href="<?=site_url('images/nocover.jpg')?>" data-lightbox="gallery-group-1">
                                         <img style="width:150px; text-align: center" src="<?=site_url('images/nocover.jpg')?>" alt="no cover"  />
                                        <?php } ?>
                             </a>

                        <p class="image-caption">
                           <?=$book->genre_name;?>
                        </p>
                    </div>
                    <div class="image-info">
                       
                       
                      
                        <div class="panel-footer text-center">
                          
                              <a href="<?=site_url('book/bookshelf/'.$book->owner_id)?>"> View in <?=$book->first_name."'s Bookshelf";?></a><br><br>
                                <?php if($this->session->userdata('user_id')!=$book->owner_id){?>
                               <p>
                                <a href="javascript:;" class="btn btn-success btn-sm m-r-5">Borrow</a>
                                <a href="javascript:;" class="btn btn-inverse btn-sm">Swap</a>
                                </p>
                                <?php }else{?>
                                <a  onclick="edit_book('<?=$book->book_id?>')" data-toggle="modal"   class="btn btn-white btn-sm">Edit Book</a>
                                <?php }?>
                        </div>
                    </div>
                </div>
                    <?php endforeach?> 
              
                <div class="image gallery-group-2">
                    
                </div>
                <div class="image gallery-group-2">
                    
                </div>
                <div class="image gallery-group-3">
                   
                </div>
                <div class="image gallery-group-3">
                   
                </div>
                <div class="image gallery-group-4">
                    
                </div>
                <div class="image gallery-group-4">
                    
                </div>
                <div class="image gallery-group-4">
                    
                </div>
            </div>

<?php $this->load->view('book/scripts');?>