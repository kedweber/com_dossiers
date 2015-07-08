<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>
<?= @helper('behavior.keepalive'); ?>
<?= @helper('behavior.validator'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<form action="" class="form-horizontal -koowa-form" method="post">
    <div class="row-fluid">
        <div class="span8">
            <fieldset>
                <legend><?= @text('CONTENT'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('NAME'); ?></label>
                    <div class="controls">
                        <input class="span12 required" type="text" name="name" value="<?= @escape($person->name); ?>" placeholder="<?= @text('NAME'); ?>" />
                    </div>
                </div>

                <?= @service('com://admin/cck.controller.element')->cck_fieldset_id($state->cck_fieldset_id)->row($person->id)->table('people_people')->getView()->assign('row', $person)->layout('list')->display(); ?>
            </fieldset>
        </div>
        <div class="span4">
            <fieldset>
                <legend><?= @text('DETAILS'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('PUBLISHED'); ?></label>
                    <div class="controls">
                        <?= @helper('select.booleanlist', array('name' => 'enabled', 'selected' => $person->enabled)); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('Translated'); ?></label>
                    <div class="controls">
                        <?= @helper('select.booleanlist', array('name' => 'translated', 'selected' => $person->translated)); ?>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend><?= @text('META'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('DESCRIPTION'); ?></label>
                    <div class="controls">
                        <textarea name="meta_description"><?= $person->meta_description; ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('KEYWORDS'); ?></label>
                    <div class="controls">
                        <textarea name="meta_keywords"><?= $person->meta_keywords; ?></textarea>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</form>