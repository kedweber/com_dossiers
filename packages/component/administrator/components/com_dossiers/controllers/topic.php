<?php

class ComDossiersControllerTopic extends ComTermsControllerTerm
{
    public function getRequest()
    {
        $this->_request->type            = 'topic';
        $this->_request->cck_fieldset_id = 1101;

        return $this->_request;
    }
}
