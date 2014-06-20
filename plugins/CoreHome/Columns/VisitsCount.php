<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\CoreHome\Columns;

use Piwik\Plugin\VisitDimension;
use Piwik\Plugins\CoreHome\Segment;
use Piwik\Tracker\Action;
use Piwik\Tracker\Request;
use Piwik\Tracker\Visitor;

class VisitsCount extends VisitDimension
{
    protected $fieldName = 'visitor_count_visits';
    protected $fieldType = 'SMALLINT(5) UNSIGNED NOT NULL';

    public function getName()
    {
        return '';
    }

    protected function init()
    {
        $segment = new Segment();
        $segment->setType(Segment::TYPE_METRIC);
        $segment->setSegment('visitCount');
        $segment->setName('General_NumberOfVisits');
        $this->addSegment($segment);
    }

    /**
     * @param Request $request
     * @param Visitor $visitor
     * @param Action|null $action
     * @return mixed
     */
    public function onNewVisit(Request $request, Visitor $visitor, $action)
    {
        return $request->getVisitCount();
    }

    /**
     * @param Request $request
     * @param Visitor $visitor
     * @param Action|null $action
     * @return mixed
     */
    public function onRecordGoal(Request $request, Visitor $visitor, $action)
    {
        return $visitor->getVisitorColumn($this->fieldName);
    }
}