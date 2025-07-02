<?php

namespace App\Services;


class NotificationPayload
{
    protected $id;
    protected $icon;
    protected $message;
    protected $actions = [];

    protected $data = [];
    
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setIcon($icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    public function setMessage($message): self
    {
        $this->message = $message;
        return $this;
    }

    public function addAction(string $actionKey, string $actionUrl): self
    {
        $this->actions[$actionKey] = $actionUrl;
        return $this;
    }


    public function setData(array $data = [])
    {
        $this->data = $data;

        return $this;
    }

    public function getPayload(): array
    {
        return [
            'id'      => $this->id,
            'icon'    => $this->icon,
            'message' => $this->message,
            'actions' => $this->actions,
        ];
    }

}