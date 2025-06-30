<?php

namespace App\Extensions;

use Prezet\Prezet\Prezet;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;
use League\CommonMark\Extension\ExtensionInterface;

class MarkdownImageExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addEventListener(DocumentParsedEvent::class, [$this, 'onDocumentParsed']);
    }

    public function onDocumentParsed(DocumentParsedEvent $event): void
    {
        $walker = $event->getDocument()->walker();

        while ($event = $walker->next()) {
            $node = $event->getNode();

            if (! $node instanceof Image || ! $event->isEntering()) {
                continue;
            }

            // if this isn't an external image, set the prefix
            if (! Str::startsWith($node->getUrl(), ['http://', 'https://'])) {
                $storage = Storage::disk(Prezet::getPrezetDisk());
                $originalUrl = $storage->url('images/' . $node->getUrl());
                $node->setUrl($originalUrl);

                $node->data->set('attributes', [
                    'x-zoomable' => config('prezet.image.zoomable', true),
                    'loading' => 'lazy',
                    'decoding' => 'async',
                    'fetchpriority' => 'auto',
                ]);
            }
        }
    }
}
