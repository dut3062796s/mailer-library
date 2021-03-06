<?php
namespace Da\Mailer\Transport;

use Da\Mailer\Exception\InvalidTransportTypeArgumentException;

class TransportFactory
{
    /**
     * Creates one of the transport supported according to the type passed.
     *
     * @param array $options the options to configure the transport
     * @param string $type the type of transport
     *
     * @return MailTransportFactory|SendMailTransportFactory|SmtpTransportFactory
     */
    public static function create(array $options, $type)
    {
        switch ($type) {
            case TransportInterface::TYPE_SEND_MAIL:
                return new SendMailTransportFactory($options);
            case TransportInterface::TYPE_MAIL:
                return new MailTransportFactory($options);
            case TransportInterface::TYPE_SMTP:
                return new SmtpTransportFactory($options);
            default:
                throw new InvalidTransportTypeArgumentException("Unknown TransportType: '{$type}'");
        }
    }
}
