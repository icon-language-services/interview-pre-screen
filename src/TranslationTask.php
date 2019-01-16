<?php

namespace IconLanguageServices\InterviewPreScreen;

class TranslationTask
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function targetLanguage(): string
    {
        if ($this->version() === null) {
            return $this->data["LocaleTarget"];
        }

        $parts = explode("(", $this->data["LocaleTarget"]);

        return $parts[0];
    }

    public function version(): ?string
    {
        if (preg_match("/\((v[0-9]+),/", $this->data["LocaleTarget"], $matches)) {
            return $matches[1];
        }

        return null;
    }
}
