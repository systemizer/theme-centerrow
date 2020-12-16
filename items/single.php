<div class="item record">
    <?php
    $title = metadata($item, 'rich_title', array('no_escape' => true));
    $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
    ?>
    <?php if (metadata($item, 'has files')) {
        echo link_to_item(
            item_image('fullsize', array(), 0, $item),
            array('class' => 'image'), 'show', $item
        );
    }
    ?>
    <div class="featured-meta">
        <h3><?php echo link_to($item, 'show', $title); ?></h3>
        <?php if ($description): ?>
            <p class="item-description"><?php echo $description; ?></p>
        <?php endif; ?>
    </div>
</div>
