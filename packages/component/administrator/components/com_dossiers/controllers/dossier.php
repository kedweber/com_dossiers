<?php

class ComDossiersControllerDossier extends ComTermsControllerTerm
{
    public function getRequest()
    {
        $this->_request->type = 'dossier';
        $this->_request->cck_fieldset_id = 1102;

        return $this->_request;
    }
}
