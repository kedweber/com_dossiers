<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<div class="row-fluid">
    <form action="" method="get" class="-koowa-grid" data-toolbar=".toolbar-list">
        <div class="btn-toolbar" id="filter-bar">
            <div class="filter-search btn-group pull-left">
                <input type="text" value="<?= $state->search; ?>" placeholder="Search" id="filter_search" name="search" style="margin-bottom: 0;">
            </div>
            <div class="btn-group pull-left hidden-phone">
                <button title="" class="btn hasTooltip" type="submit" data-original-title="Search"><i class="icon-search"></i></button>
                <button onclick="document.id('filter_search').value='';this.form.submit();" title="" class="btn hasTooltip" type="button" data-original-title="Clear"><i class="icon-remove"></i></button>
            </div>

<!--            --><?//= @helper('com://admin/makundi.template.helper.listbox.categories', array(
//                'identifier' => 'com://admin/makundi.model.categories',
//                'prompt' => '- ' . JText::_('Filter by category') . ' -',
//                'check_access' => true,
//                'name' => 'category_id',
//                'attribs' => array(
//                    'id' => 'category_id',
//                    'onchange' => 'this.form.submit();',
//                    'style' => 'margin-left: 5px; font-size: 13px;'
//                ),
//            )); ?>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th style="text-align: center;" width="1">
                    <?= @helper('grid.checkall')?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'title', 'title' => @text('TITLE'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'topic', 'title' => @text('TOPIC'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'enabled', 'title' => @text('PUBLISHED'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'featured', 'title' => @text('FEATURED'))); ?>
                </th>
                <? if($dossiers->isTranslatable()) : ?>
                    <th>
                        <?= @text('Translations') ?>
                    </th>
                <? endif; ?>
                <th>
                    <?= @text('Owner'); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'created_on', 'title' => @text('Date'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'ordering', 'title' => @text('ORDER'))); ?>
                </th>
                <th>
                    <?= @helper('grid.sort', array('column' => 'id', 'title' => @text('ID'))); ?>
                </th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <td colspan="10">
                    <?= @helper('paginator.pagination', array('total' => $total)) ?>
                </td>
            </tr>
            </tfoot>

            <tbody>
            <? foreach ($dossiers as $dossier) : ?>
                <tr>
                    <td style="text-align: center;">
                        <?= @helper('grid.checkbox', array('row' => $dossier))?>
                    </td>
                    <td>
                        <a href="<?= @route('view=dossier&id='.$dossier->id); ?>">
                            <?= @escape($dossier->title); ?>
                        </a>
                    </td>
                    <td>
                        <?= $dossier->topic->title ? $dossier->topic->title : @text('UNCATEGORIZED'); ?>
                    </td>
                    <td>
                        <?= @helper('grid.enable', array('row' => $dossier)); ?>
                    </td>
                    <td>
                        <?= @helper('grid.enable', array('row' => $dossier, 'field' => 'featured')); ?>
                    </td>
                    <? if($dossier->isTranslatable()) : ?>
                        <td>
                            <?= @helper('com://admin/translations.template.helper.language.translations', array(
                                'row' => $dossier->id,
                                'table' => $dossier->getTable()->getName()
                            )); ?>
                        </td>
                    <? endif; ?>
                    <td>
                        <?= $dossier->created_by_name; ?>
                    </td>
                    <td>
                        <?= @helper('date.humanize', array('date' => $dossier->created_on)) ?>
                    </td>
                    <td>
                        <?= @helper('grid.order', array('row' => $dossier, 'total' => $total)); ?>
                    </td>
                    <td>
                        <?= $dossier->id; ?>
                    </td>
                </tr>
            <? endforeach; ?>

            <? if (!count($dossiers)) : ?>
                <tr>
                    <td colspan="10" align="center" style="text-align: center;">
                        <?= @text('NO_ITEMS') ?>
                    </td>
                </tr>
            <? endif; ?>
            </tbody>
        </table>
    </form>
</div>
