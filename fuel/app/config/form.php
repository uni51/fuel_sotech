<?php


return array(
    'auto_id_prefix' => '',
    'field_template' => "\t\t<tr>\n\t\t\t<td class=\"{error_class}\">{label}{required}</td>\n\t\t\t<td class=\"{error_class}\">{error_msg}<br>{field}</td>\n\t\t</tr>\n",
    'required_mark' => '※ ',
    'inline_errors' => true,
    'error_class' => 'validation_error',
);