<?php

namespace App\Kafka;

use Illuminate\Queue\Connectors\ConnectorInterface;
use RdKafka\Conf;

class KafkaConnector implements ConnectorInterface
{

    public function connect(array $config)
    {
        $conf = new Conf();

        $conf->set("bootstrap.servers", $config['bootstrap_servers']);
        $conf->set("security.protocol", $config['security_protocol']);
        $conf->set("sasl.mechanisms", $config['sasl_mechanisms']);
        $conf->set("sasl.username", $config['sasl_username']);
        $conf->set("sasl.password", $config['sasl_password']);

        $producer = new \RdKafka\Producer($conf);

        $conf->set("group.id", $config['group_id']);
        $conf->set("auto.offset.reset", 'earliest');

        $consumer = new \RdKafka\KafkaConsumer($conf);

        return new KafkaQueue($consumer,$producer);
    }
}
