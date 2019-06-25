<?php 
namespace App\Helpers;
use Config;
class Form {
    public static function show ($elements) {
        $xhtml = null;
        foreach ($elements as $element) {
            $xhtml .= sprintf(
                    '<div class="form-group">
                            %s
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            %s
                        </div>
                    </div>', $element['label'], $element['element']);
        }

        return $xhtml;
    }
}