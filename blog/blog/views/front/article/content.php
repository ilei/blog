<div id="blog">
    <article id="post">
        <div class="meta-data">
            <span class="date"><?php echo date('Y-m-d', $article['updated_time']);?></span> 
        </div>
        <h1><?php echo htmlspecialchars($article['name']);?></h1>
        <div class="clear"></div>
        <div id="post-body">
            <?php echo $article['content'];?>
        </div>
        <div class="clear"></div>
    </article>
</div>
