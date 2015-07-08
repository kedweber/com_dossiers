<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>
<?= @helper('behavior.keepalive'); ?>
<?= @helper('behavior.validator'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<form action="<?= @route('option=com_dossiers&view=article&id='.$article->id); ?>" class="form-horizontal -koowa-form" method="post">
    <input type="hidden" name="type" value="dossier" />
    <input type="hidden" name="cck_fieldset_id" value="<?= $state->cck_fieldset_id; ?>" />

    <div class="row-fluid">
        <div class="span8">
            <fieldset>
                <legend><?= @text('CONTENT'); ?></legend>
                <div class="form-inline form-inline-header row-fluid">
                    <div class="span7">
                        <input type="text" name="title" class="input-block-level input-large-text" value="<?= $article->title; ?>" placeholder="<?= @text('UNTITLED_ARTICLE'); ?>" required>
                    </div>

                    <div class="span5">
                        <div class="row-fluid">
                            <div class="span2">
                                <div class="control-label" style="vertical-align: sub;"><label><?= @text('SLUG_LABEL'); ?></label></div>
                            </div>
                            <div class="span9">
                                <input type="text" class="input-block-level" name="slug" value="<?= $article->slug; ?>" placeholder="<?= @text('SLUG_PLACEHOLDER'); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <br />

                <div class="control-group">
                    <label class="control-label"><?= @text('SUBTITLE'); ?></label>
                    <div class="controls">
                        <input class="span12" type="text" name="subtitle" value="<?= @escape($article->subtitle); ?>" placeholder="<?= @text('SUBTITLE'); ?>" />
                    </div>
                </div>

                <hr />

                <div class="control-group">
                    <label class="control-label"><?= @text('DOSSIER'); ?></label>
                    <div class="controls">
                        <?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array(
                            'identifier' => 'com://admin/terms.model.terms',
                            'name' => 'dossier',
                            'deselect' => false,
                            'selected' => $article->dossier ? $article->dossier->id : array(),
                            'attribs' => array('multiple' => true, 'size' => 10, 'data-placeholder' => @text('Select a dossier')),
                            'relation' => 'ancestors',
                            'filter'=> array(
                                'type' => 'dossier',
                            )
                        )); ?>

                        <a href="<?= @route('view=dossier'); ?>" class="btn btn-primary" target="_blank"><?= @text('Add'); ?></a>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"><?= @text('TAGS'); ?></label>
                    <div class="controls">
                        <?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array(
                            'identifier' => 'com://admin/terms.model.tags',
                            'name' => 'tags[]',
                            'deselect' => false,
                            'selected' => $article->tags ? $article->tags->getColumn('id') : array(),
                            'attribs' => array('multiple' => true, 'size' => 10, 'data-placeholder' => @text('Select tags')),
                            'relation' => 'descendant',
                            'filter'=> array(
                                'type' => 'tag',
                            )
                        )); ?>

                        <a href="<?= @route('view=author'); ?>" class="btn btn-primary" target="_blank"><?= @text('Add'); ?></a>
                    </div>
                </div>

                <hr />

                <?= @service('com://admin/cck.controller.element')->cck_fieldset_id($state->cck_fieldset_id)->row($article->id)->table('articles_articles')->getView()->assign('row', $article)->layout('list')->display(); ?>
            </fieldset>
        </div>
        <div class="span4">
            <fieldset>
                <legend><?= @text('DETAILS'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('START_PUBLISHING'); ?></label>
                    <div class="controls">
                        <?= @helper('behavior.calendar', array('date' => $article->publish_up === '0000-00-00' ? date('Y-m-d') : $article->publish_up, 'name' => 'publish_up', 'format'  => '%Y-%m-%d')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('END_PUBLISHING'); ?></label>
                    <div class="controls">
                        <?= @helper('behavior.calendar', array('date' => $article->publish_down, 'name' => 'publish_down', 'format'  => '%Y-%m-%d')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('PUBLISHED'); ?></label>
                    <div class="controls">
                        <?= @helper('select.booleanlist', array('name' => 'enabled', 'selected' => $article->enabled)); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('Translated'); ?></label>
                    <div class="controls">
                        <?= @helper('select.booleanlist', array('name' => 'translated', 'selected' => $article->translated)); ?>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend><?= @text('META'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('DESCRIPTION'); ?></label>
                    <div class="controls">
                        <textarea name="meta_description"><?= $article->meta_description; ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('KEYWORDS'); ?></label>
                    <div class="controls">
                        <textarea name="meta_keywords"><?= $article->meta_keywords; ?></textarea>
                    </div>
                </div>
            </fieldset>

            <!--            <fieldset>-->
            <!--                <legend>--><?//= @text('RELATIONS'); ?><!--</legend>-->
            <!--                <div class="control-group">-->
            <!--                    <label class="control-label">--><?//= @text('CATEGORY'); ?><!--</label>-->
            <!---->
            <!--                    <div class="controls">-->
            <!--                        --><?//= @helper('com://admin/makundi.template.helper.listbox.categories', array(
            //                            'value' => 'id',
            //                            'deselect' => true,
            //                            'check_access' => true,
            //                            'name' => 'category',
            //                            'attribs' => array('id' => 'parent_id'),
            //                            'selected' => $article->category->id,
            //                            'filter' => array('type' => 'category')
            //                        )); ?>
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="control-group">-->
            <!--                    <label class="control-label">--><?//= @text('TAGS'); ?><!--</label>-->
            <!--                    <div class="controls">-->
            <!--                        --><?//= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array(
            //                            'identifier' => 'com://admin/terms.model.tags',
            //                            'name' => 'tags[]',
            //                            'deselect' => false,
            //                            'selected' => $article->tags ? $article->tags->getColumn('id') : array(),
            //                            'attribs' => array('multiple' => true, 'size' => 10, 'data-placeholder' => @text('Select tags&hellip;')),
            //                            'type' => 'tag',
            //                            'relation' => 'ancestors'
            //                        )); ?>
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </fieldset>-->
        </div>
    </div>
</form>
