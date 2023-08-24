<?php
$linkToFileMetadata = get_option('link_to_file_metadata');
$itemFiles = $item->Files;
if ($itemFiles) {
    queue_lightgallery_assets();
}
echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>



<div class="item-container">
    <div class="item-metadata">
        <h1>
            <?php echo metadata('item', 'rich_title', array('no_escape' => true)); ?>
        </h1>
        <p>
            <?php echo metadata('item', array('Dublin Core', 'Description'), array('no_escape' => true)); ?>
        </p>
        <div id="publisher" class="element">
            <h3>
                <?php echo __('Publisher'); ?>
            </h3>
            <div class="element-text">
                <?php echo metadata('item', array('Dublin Core', 'Publisher'), array('no_escape' => true)); ?>
            </div>
        </div>
        <!-- If the item belongs to a collection, the following creates a link to that collection. -->
        <?php if (metadata('item', 'Collection Name')) : ?>
            <div id="collection" class="element">
                <h3>
                    <?php echo __('Collection'); ?>
                </h3>
                <div class="element-text">
                    <?php echo link_to_collection_for_item(); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (metadata('item', 'has tags')) : ?>
            <div id="item-tags" class="element">
                <h3>
                    <?php echo __('Tags'); ?>
                </h3>
                <div class="element-text">
                    <?php echo tag_string('item'); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="accessing-document-section">
            <h2>Physical Location of the Document</h2>
            <div id="ispartof" class="element">
                <h3>
                    <?php echo __('Item Location'); ?>
                </h3>
                <div class="element-text">
                    <?php echo metadata('item', array('Dublin Core', 'Is Part Of'), array('no_escape' => true)); ?>
                </div>
            </div>
            <div id="source" class="element">
                <h3>
                    <?php echo __('Source'); ?>
                </h3>
                <div class="element-text">
                    <?php echo metadata('item', array('Dublin Core', 'Source'), array('no_escape' => true)); ?>
                </div>
            </div>
            <p>Not all documents in the archive have been digitized. If the download is not available, please inquire about accessing the item, which is housed at the Trades Union Congress Library's Special Collections in London, England.</p>
            <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
        </div>

    </div>
    <div class="item-document">
        <?php if ($itemFiles) : ?>
            <?php echo lightGallery($itemFiles); ?>
        <?php endif; ?>
        <div class="actions-box">
            <ul>
                <li>
                    <b>Download: </b>
                    <?php if ($itemFiles) : ?>
                        <b><a target="_blank" href="<?php echo metadata($itemFiles[0], 'uri') ?>">Click to Download</a></b>
                    <?php else : ?>
                        <i>download not available</i>
                    <?php endif; ?>
                </li>
                <li>
                    <b>Citation: </b>
                    <?php echo metadata('item', 'citation', array('no_escape' => true)); ?>
                </li>
            </ul>
        </div>

    </div>
</div>



<!-- The following prints a list of all tags associated with the item -->


<?php if ((get_theme_option('other_media') == 1) && $itemFiles) : ?>
    <?php echo lightgallery_other_files($itemFiles); ?>
<?php endif; ?>



<nav>
    <ul class="item-pagination navigation">
        <li id="previous-item" class="previous">
            <?php echo link_to_previous_item_show(); ?>
        </li>
        <li id="next-item" class="next">
            <?php echo link_to_next_item_show(); ?>
        </li>
    </ul>
</nav>

<?php echo foot(); ?>