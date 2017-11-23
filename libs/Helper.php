<?php

class Helper
{
//Success
    public static function success($message)
    {
        $xhtml = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                ' . $message . '
              </div>';
        return $xhtml;
    }

    public static function cutCharacter($string, $pattern, $num = 0)
    {
        $pos = mb_stripos($string, $pattern);
        if ($num > 0) {
            $pos += $num;
        }
        return mb_substr($string, $pos);
    }

    public static function cmsSelecbox($listItem, $name = null, $class = null, $selected = null)
    {
        $xhtml = "<select name='$name' class='$class''>";
        $xhtml .= "<option value='0'>-- Select  --</option>";
        foreach ($listItem as $key => $item) {
            if ($selected == $item['id'])
                $xhtml .= "<option value='" . $item['id'] . "' selected>" . $item['name'] . "</option>";
            else
                $xhtml .= "<option value='" . $item['id'] . "'>" . $item['name'] . "</option>";
        }
        $xhtml .= '</select>';
        return $xhtml;
    }
}