<?php

class ComDossiersControllerArticle extends ComArticlesControllerArticle
{
    public function getRequest()
    {
        $this->_request->type = 'dossier';
        $this->_request->cck_fieldset_id = 103;

        return $this->_request;
    }
}
