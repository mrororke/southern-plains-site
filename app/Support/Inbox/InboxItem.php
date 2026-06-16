<?php

namespace App\Support\Inbox;

class InboxItem
{
    public function __construct(
        public int $id,
        public string $type,
        public string $title,
        public ?string $subtitle,
        public string $status,
        public string $status_label,
        public string $status_color,
        public string $link,
        public string $created_at,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'status' => $this->status,
            'status_label' => $this->status_label,
            'status_color' => $this->status_color,
            'link' => $this->link,
            'created_at' => $this->created_at,
        ];
    }
}