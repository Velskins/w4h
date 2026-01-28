<?php
declare(strict_types=1);

namespace App\Core;

class Mailer
{
    private string $host = 'host.docker.internal';
    private int $port = 1025;

    public function send(string $to, string $subject, string $message): bool
    {
        $socket = fsockopen($this->host, $this->port, $errno, $errstr, 10);

        if (!$socket) {
            error_log("Mailer Error: $errstr ($errno)");
            return false;
        }

        $this->read($socket);

        $this->write($socket, "EHLO " . gethostname());
        $this->write($socket, "MAIL FROM: <no-reply@web4heroes.com>");
        $this->write($socket, "RCPT TO: <$to>");
        $this->write($socket, "DATA");

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: Web4Heroes <no-reply@web4heroes.com>\r\n";
        $headers .= "To: $to\r\n";
        $headers .= "Subject: $subject\r\n";

        $content = "$headers\r\n$message\r\n.\r\n";

        $this->write($socket, $content);
        $this->write($socket, "QUIT");

        fclose($socket);
        return true;
    }

    private function write($socket, string $data): void
    {
        fwrite($socket, $data . "\r\n");
        $this->read($socket);
    }

    private function read($socket): string
    {
        $response = '';
        while ($str = fgets($socket, 515)) {
            $response .= $str;
            if (substr($str, 3, 1) == ' ') {
                break;
            }
        }
        return $response;
    }
}