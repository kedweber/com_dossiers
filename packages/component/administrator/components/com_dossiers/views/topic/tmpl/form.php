<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>
<?= @helper('behavior.keepalive'); ?>
<?= @helper('behavior.validator'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<form action="" class="form-horizontal -koowa-form" method="post">
    <input type="hidden" name="type" value="topic" />
    <div class="row-fluid">
        <div class="span8">
            <fieldset>
                <legend><?= @text('CONTENT'); ?></legend>
                <div class="form-inline form-inline-header row-fluid">
                    <div class="span7">
                        <input type="text" name="title" class="input-block-level input-large-text" value="<?= $topic->title; ?>" placeholder="<?= @text('UNTITLED_DEBATE'); ?>" required>
                    </div>

                    <div class="span5">
                        <div class="row-fluid">
                            <div class="span2">
                                <div class="control-label" style="vertical-align: sub;"><label><?= @text('SLUG_LABEL'); ?></label></div>
                            </div>
                            <div class="span9">
                                <input type="text" class="input-block-level" name="slug" value="<?= $topic->slug; ?>" placeholder="<?= @text('SLUG_PLACEHOLDER'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="span4">
            <fieldset>
                <legend><?= @text('DETAILS'); ?></legend>
				<div class="control-group">
					<label class="control-label"><?= @text('PUBLISHED'); ?></label>
					<div class="controls">
						<?= @helper('select.booleanlist', array('name' => 'enabled', 'selected' => $topic->enabled)); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?= @text('Translated'); ?></label>
					<div class="controls">
						<?= @helper('select.booleanlist', array('name' => 'translated', 'selected' => $topic->translated)); ?>
					</div>
				</div>
            </fieldset>
        </div>
    </div>
</form>