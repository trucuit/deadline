<?php

class Helper
{
//Success
    public function success($message)
    {
        $xhtml = '<div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>' . $message . '</div></div>';
        return $xhtml;
    }
}