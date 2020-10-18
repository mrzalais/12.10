<?php


class Safe
{
    public string $title = 'Enter the pin';

    public string $code = '1111';

    public function __construct()
    {
        session_start();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function updateEnteredCode(): string
    {
        if (isset($_SESSION['digit'], $_POST['result'])) {
            return $_SESSION['digit'] .= $_POST['result'];
        }
        return $_SESSION['digit'] = '';
    }

    public function updateHidden(): string
    {
        $length = strlen($_SESSION['digit']);

        return str_repeat('*', $length);
    }

    public function getStatus(): void
    {
        $length = strlen($_SESSION['digit']);

        if ($_SESSION['digit'] === $this->code) {
            $this->title = 'UNLOCKED';
        }

        if ($_SESSION['digit'] !== $this->code && $length === 4) {
            $this->title = 'BLOCKED';
        }
    }

    public function resetSafe(): void
    {
        if (strlen((string)$_SESSION['digit']) >= 4) {
            $_SESSION['digit'] = '';
        }
    }
}