<h1 class="page-header"><?=$user->first_name."'s Bookshelf"?></h1>

                  
    <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <div class="result-container">
                        
                        <div class="dropdown pull-left">
                            <a href="javascript:;" class="btn btn-white btn-white-without-border dropdown-toggle" data-toggle="dropdown">
                                Filters by <span class="caret m-l-5"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="javascript:;">Posted Date</a></li>
                                <li><a href="javascript:;">View Count</a></li>
                                <li><a href="javascript:;">Total View</a></li>
                                <li class="divider"></li>
                                <li><a href="javascript:;">Location</a></li>
                            </ul>
                        </div>
                         <div class="btn-group m-l-10 m-b-20">
                            <a href="javascript:;" class="btn btn-white btn-white-without-border active"><i class="fa fa-list"></i></a>
                            <a href="javascript:;" class="btn btn-white btn-white-without-border"><i class="fa fa-th"></i></a>
                            <a href="javascript:;" class="btn btn-white btn-white-without-border"><i class="fa fa-th-large"></i></a>
                        </div>
                            <div class="pull-right result-price">
                              <?php if($this->session->userdata('user_id')==$user->id){?> 
                                <a onclick="add_book()" data-toggle="modal" class="btn  btn-block btn-success">
                                    <i class="fa fa-plus pull-left"></i>
                                    Add Book 
                                 
                                </a>
                            <?php }else{?> <a href="<?=site_url('collection')?>" class="btn  btn-block btn-success">
                                    <i class="fa fa-chevron-circle-left"></i>
                                    Return to Main Library
                                 
                                </a><?php }?>

                       </div>
  <ul class="result-list">
                     <?php foreach($books as $book):?>
                       
                       
                      
                            <li>
                                <div class="result-image xs-hidden" style="text-align: center;background-color: transparent;">
                                    <a href="javascript:;">
                                    <?php if($book->cover_photo!=null){?>
                                     <img data-src="<?=site_url('upload/'.$book->cover_photo)?>" alt="image"  />
                                     <?php }else{?>
                                         <img  data-src="<?=site_url('images/nocover.jpg')?>" alt="no cover"  />
                                        <?php } ?>
                                 </a>
                                </div>
                                <div class="result-info" style="width:55%">
                                    <h4 class="title"><a href="javascript:;"><?=$book->title?></a> </h4>
                                    <p class="location">By <a href=""><?=$book->author_name?></a></p>
                                    <p class="desc">
                                          <?=$book->synopsis?>
                                    </p>
                                    <div class="btn-row">
                                        <a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Analytics"><i class="fa fa-fw fa-bar-chart-o"></i></a>
                                        <a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Tasks"><i class="fa fa-fw fa-tasks"></i></a>
                                        <a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Configuration"><i class="fa fa-fw fa-cog"></i></a>
                                        <a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Performance"><i class="fa fa-fw fa-tachometer"></i></a>
                                        <a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Users"><i class="fa fa-fw fa-user"></i></a>
                                    </div>
                                </div>
                                   <div  style="width:15%">
                                     
                                   <h4 class="title"><a class="pull-right"><?=$book->status?></a></h4>
                               </div>
                                <div  style="width:15%">
                                     
                                   
                                    <?php if($this->session->userdata('user_id')==$book->owner_id){?>
                                
                                      <div class="dropdown">
                                            <a href="javascript:;" class="btn btn-white btn-block dropdown-toggle" data-toggle="dropdown">
                                                Change Status<span class="caret m-l-5"></span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="javascript:;">Available</a></li>
                                                <li><a href="javascript:;">Swapped</a></li>
                                                <li><a href="javascript:;">Borrowed</a></li>
                                            </ul>
                                     </div>   
                                    </p>
                                    <p>
                                    <a onclick="edit_book('<?=$book->book_id?>')" data-toggle="modal"  class="btn btn-inverse btn-block">Edit Details</a></p>
                                    <p>
                                     <a onclick="delete_book('<?=$book->book_id?>')" data-toggle="modal"  class="btn btn-danger btn-block">Delete Book</a></p>
                                   
                                    <?php }else{?>
                                     <a onclick="edit_book('<?=$book->book_id?>')" data-toggle="modal"  class="btn btn-inverse btn-block">Swap</a></p>
                                    <p>
                                     <a onclick="delete_book('<?=$book->book_id?>')" data-toggle="modal"  class="btn btn-danger btn-block">Borrow</a></p>

                                   <?php }?>
                                </div>
                            </li>
   <?php endforeach?> 
</ul>

