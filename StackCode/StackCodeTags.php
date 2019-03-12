<?php

namespace Statamic\Addons\StackCode;

use Statamic\Extend\Tags;

class StackCodeTags extends Tags
{
    public static $header = [];
    public static $footer = [];

    /**
     * The {{ stack_code }} tag
     *
     * @return string|array
     */
    public function index()
    {
        if ($this->getParam('dump')) {
            return $this->dump();
        }
        
        return $this->header();
    }

    public function header()
    {
        self::$header[] = $this->content;
    }

    public function footer()
    {
        self::$footer[] = $this->content;
    }

    public function dump()
    {
        if ($this->getParam('dump') == 'footer') {
            return $this->dump_footer();
        }
        
        return $this->dump_header();
    }
    
    public function dump_header()
    {
        return implode(PHP_EOL, self::$header);
    }

    public function dump_footer()
    {
        return implode(PHP_EOL, self::$footer);
    }
}
