<? defined('KOOWA') or die; ?>
<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>
<?= @helper('behavior.keepalive'); ?>
<?= @helper('behavior.validator'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<form action="" class="form-horizontal -koowa-form" method="post">
    <input type="hidden" name="type" value="dossier" />
    <div class="row-fluid">
        <div class="span8">
            <fieldset>
                <legend><?= @text('CONTENT'); ?></legend>
                <div class="form-inline form-inline-header row-fluid">
                    <div class="span7">
                        <input type="text" name="title" class="input-block-level input-large-text" value="<?= $dossier->title; ?>" placeholder="<?= @text('UNTITLED_DOSSIER'); ?>" required>
                    </div>

                    <div class="span5">
                        <div class="row-fluid">
                            <div class="span2">
                                <div class="control-label" style="vertical-align: sub;"><label><?= @text('SLUG_LABEL'); ?></label></div>
                            </div>
                            <div class="span9">
                                <input type="text" class="input-block-level" name="slug" value="<?= $dossier->slug; ?>" placeholder="<?= @text('SLUG_PLACEHOLDER'); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <hr />

                <div class="control-group">
                    <label class="control-label"><?= @text('TOPIC'); ?></label>
                    <div class="controls">
                        <?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array(
                            'identifier' => 'com://admin/terms.model.terms',
                            'name' => 'topic',
                            'deselect' => false,
                            'selected' => $dossier->topic ? $dossier->topic->id : array(),
                            'attribs' => array('multiple' => true, 'size' => 10, 'data-placeholder' => @text('Select a topic')),
                            'filter' => array(
                                'type' => 'topic',
                            )
                        )); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('ARTICLES'); ?></label>
                    <div class="controls">
                        <?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array(
                            'identifier' => 'com://admin/articles.model.articles',
                            'name' => 'articles[]',
                            'deselect' => false,
                            'selected' => $dossier->articles ? $dossier->articles->getColumn('id') : array(),
                            'attribs' => array('multiple' => true, 'size' => 10, 'data-placeholder' => @text('Select articles')),
                            'type'  => 'dossier',
                            'filter' => array(
                                'type' => 'dossier',
                            )
                        )); ?>
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
					<label class="control-label"><?= @text('PUBLISHED'); ?></label>
					<div class="controls">
						<?= @helper('select.booleanlist', array('name' => 'enabled', 'selected' => $dossier->enabled)); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?= @text('Translated'); ?></label>
					<div class="controls">
						<?= @helper('select.booleanlist', array('name' => 'translated', 'selected' => $dossier->translated)); ?>
					</div>
				</div>
            </fieldset>
        </div>
    </div>
</form>