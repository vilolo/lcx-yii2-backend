<style>
    .post-list {
        width: 100%;
    }
    .post-list img{
        width: 300px;
        height: 200px;
        border: dotted #3c3c3c 1px;
    }
    .post-item{
        padding: 10px;
    }

    .post-item:hover{
        background-color: #eee;
    }

    .post-title{
        color: #000;
        margin-left: 20px;
        size: 16px;
    }
</style>
<div class="section">
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="post-list">
                    <?php foreach ($list as $item):?>
                        <div class="post-item">
                            <a href="/index.php/article?id=<?=$item['id']?>">
                                <img src="<?=$item['cover']?>">
                                <span class="post-title"><?=$item['title']?></span>
                            </a>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
