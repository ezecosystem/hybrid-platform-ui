<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\HybridPlatformUi\Http;

use Symfony\Component\HttpFoundation\Request;

class ChainHybridRequestMatcher extends ChainRequestMatcher implements HybridRequestMatcher
{
    const PARTIAL_UPDATE = 'application/partial-update+html';

    public function __construct(
        AdminRequestMatcher $adminRequestMatcher,
        HtmlFormatRequestMatcher $htmlFormatRequestMatcher
    ) {
        parent::__construct($adminRequestMatcher, $htmlFormatRequestMatcher);
    }

    public function matches(Request $request)
    {
        return parent::matches($request) && !$this->isPartialUpdate($request);
    }

    private function isPartialUpdate(Request $request)
    {
        return in_array(
            self::PARTIAL_UPDATE,
            $request->getAcceptableContentTypes()
        );
    }
}
