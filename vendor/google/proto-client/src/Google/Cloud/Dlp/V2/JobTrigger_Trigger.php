<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/privacy/dlp/v2/dlp.proto

namespace Google\Cloud\Dlp\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * What event needs to occur for a new job to be started.
 *
 * Generated from protobuf message <code>google.privacy.dlp.v2.JobTrigger.Trigger</code>
 */
class JobTrigger_Trigger extends \Google\Protobuf\Internal\Message
{
    protected $trigger;

    public function __construct() {
        \GPBMetadata\Google\Privacy\Dlp\V2\Dlp::initOnce();
        parent::__construct();
    }

    /**
     * Create a job on a repeating basis based on the elapse of time.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.Schedule schedule = 1;</code>
     * @return \Google\Cloud\Dlp\V2\Schedule
     */
    public function getSchedule()
    {
        return $this->readOneof(1);
    }

    /**
     * Create a job on a repeating basis based on the elapse of time.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.Schedule schedule = 1;</code>
     * @param \Google\Cloud\Dlp\V2\Schedule $var
     * @return $this
     */
    public function setSchedule($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dlp\V2\Schedule::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getTrigger()
    {
        return $this->whichOneof("trigger");
    }

}

