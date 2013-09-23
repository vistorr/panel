<?php

namespace Panel\CtrlwBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PanelCtrlwBundle extends Bundle
{
    public function getParent()
    {
	return 'FOSUserBundle';
    }
}
