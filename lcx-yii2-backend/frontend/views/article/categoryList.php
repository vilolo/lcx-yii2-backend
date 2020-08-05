<div class="section">
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="comments-box">
                <?php foreach ($list as $v): ?>
                <div class="media comment">
                    <img class="mr-3" src="<?=$v['cover']?>">
                    <div class="media-body">
                        <h2 class="media-heading mt-0 mb-1"><small class="date"><?=$v['title']?></small></h2>
                    </div>
                </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
