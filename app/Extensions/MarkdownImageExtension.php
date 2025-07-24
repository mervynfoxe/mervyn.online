<?php

namespace App\Extensions;

use Prezet\Prezet\Exceptions\InvalidConfigurationException;
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

                // Generate the srcset attribute
//                $srcset = $this->generateSrcset($originalUrl);
                $node->data->set('attributes', [
                    'x-zoomable' => config('prezet.image.zoomable', true),
//                    'srcset' => $srcset,
//                    'sizes' => config('prezet.image.sizes'),
                    'loading' => 'lazy',
                    'decoding' => 'async',
                    'fetchpriority' => 'auto',
                ]);
            }
        }
    }

    private function generateSrcset(string $url): string
    {
        $srcset = [];
        $allowedSizes = config('prezet.image.widths');
        if (! is_array($allowedSizes)) {
            throw new InvalidConfigurationException('prezet.image.widths', $allowedSizes, 'is not a valid array');
        }

        foreach ($allowedSizes as $size) {
            $srcset[] = $this->generateImageUrl($url, $size).' '.$size.'w';
        }

        return implode(', ', $srcset);
    }

    private function generateImageUrl(string $url, int $width): string
    {
        // Generate the image URL for the specified width
        $filename = pathinfo($url, PATHINFO_FILENAME).'-'.$width.'w.'.pathinfo($url, PATHINFO_EXTENSION);

        return Storage::disk(Prezet::getPrezetDisk())->url('images/' . $filename);
    }
}
