<?php

class ComDossiersDispatcher extends ComDefaultDispatcher
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'controller' => 'dossier'
        ));

        parent::_initialize($config);
    }
}
