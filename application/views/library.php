<div class="span9">
        <div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Articles</a></li>
                <li><a href="#tab2" data-toggle="tab">Books</a></li>
                <li><a href="#tab3" data-toggle="tab">Audio</a></li>
                <li><a href="#tab4" data-toggle="tab">Video</a></li>
            </ul>
            <div class="tab-content">
                
                <div class="tab-pane active" id="tab1">
                    <div class="title_bar_white span9">Library | Articles</div>
                        <?php foreach($articles as $article): ?>
                        <div class='row'>
                        <div class="opacity-5 span9">

                            <div class="span1"><img src="img/library/articles_icon.png" alt="" /></div>
                            <div class="span7 white">
                                <div class="heading2"><?php echo $article->lib_title; ?></div>
                                <p class='lighter font-12'><?php echo $article->lib_desc; ?></p>
                                <span class='lighter font-13'><?php echo $article->lib_author . " | " . $article->lib_date;?></span>
                                <a href="<?php echo $article->lib_file; ?>" class="btn btn-default btn-small pull-right"> Download</a>
                            </div>
                        </div>
                        <div class='span9'></div>
                        </div>
                        <?php endforeach; ?>
                </div>
                
                <div class="tab-pane" id="tab2">
                    <div class="title_bar_white span9">Library | Books</div>
                        <?php foreach($books as $book): ?>
                    <div class='row'>
                        <div class="opacity-5 span9">
                            <div class="span1"><img src="img/library/books_icon.png" alt="" /></div>
                            <div class="span7 white">
                                <div class="heading2"><?php echo $book->lib_title; ?></div>
                                <p class='lighter font-12'><?php echo $book->lib_desc; ?></p>
                                <span class='lighter font-13'><?php echo $book->lib_author . " | " . $book->lib_date;?></span>
                                <a href="<?php echo $book->lib_file; ?>" class="btn btn-default btn-small pull-right"> Download</a>
                            </div>
                        </div>
                        <div class='span9'></div>
                        </div>
                        <?php endforeach; ?>
                </div>
                
                <div class="tab-pane" id="tab3">
                    <div class="title_bar_white span9">Library | Audios</div>
                        <?php foreach($audios as $audio): ?>
                    <div class='row'>
                        <div class="opacity-5 span9">
                            <div class="span1"><img src="img/library/audios_icon.png" alt="" /></div>
                            <div class="span7 white">
                                <div class="heading2"><?php echo $audio->lib_title; ?></div>
                                <p class='lighter font-12'><?php echo $audio->lib_desc; ?></p>
                                <span class='lighter font-13'><?php echo $audio->lib_author . " | " . $audio->lib_date;?></span>
                                <a href="<?php echo $audio->lib_file; ?>" class="btn btn-default btn-small pull-right"> Download</a>
                            </div>
                        </div>
                        <div class='span9'></div>
                        </div>
                        <?php endforeach; ?>
                </div>
                
                <div class="tab-pane" id="tab4">
                    <div class="title_bar_white span9">Library | Videos</div>
                        <?php foreach($videos as $video): ?>
                    <div class='row'>
                        <div class="opacity-5 span9">
                            <div class="span1"><img src="img/library/videos_icon.png" alt="" /></div>
                            <div class="span7 white">
                                <div class="heading2"><?php echo $video->lib_title; ?></div>
                                <p class='lighter font-12'><?php echo $video->lib_desc; ?></p>
                                <span class='lighter font-13'><?php echo $video->lib_author . " | " . $video->lib_date;?></span>
                                <a href="<?php echo $video->lib_file; ?>" class="btn btn-default btn-small pull-right"> Download</a>
                            </div>
                        </div>
                        <div class='span9'></div>
                        </div>
                        <?php endforeach; ?>
                </div>
                
            </div>
      </div>
</div>