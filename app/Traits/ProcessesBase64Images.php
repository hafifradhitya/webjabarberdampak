<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait ProcessesBase64Images
{
    /**
     * Process HTML content, extract base64 images, save them to storage, and replace src.
     *
     * @param string|null $content
     * @param string $disk
     * @param string $path
     * @return string|null
     */
    protected function processBase64Images(?string $content, string $disk = 'public', string $path = 'wysiwyg_images'): ?string
    {
        if (empty($content)) {
            return $content;
        }

        // Suppress HTML parsing errors for imperfect HTML snippets
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        
        // Use mb_convert_encoding to handle UTF-8 properly and prevent garbled characters
        $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
        $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');
        $hasChanges = false;
        
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            
            // Check if src is a base64 string
            if (preg_match('/^data:image\/(\w+);base64,/', $src, $type)) {
                $data = substr($src, strpos($src, ',') + 1);
                $type = strtolower($type[1]); // jpg, png, gif, webp
                
                if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png', 'webp'])) {
                    continue;
                }
                
                $data = base64_decode($data);
                if ($data === false) {
                    continue;
                }
                
                $imageName = Str::random(10) . '_' . time() . '.' . $type;
                $savePath = trim($path, '/') . '/' . $imageName;
                
                Storage::disk($disk)->put($savePath, $data);
                
                $img->removeAttribute('src');
                $img->setAttribute('src', Storage::disk($disk)->url($savePath));
                $hasChanges = true;
            }
        }
        
        if ($hasChanges) {
            $processedContent = $dom->saveHTML();
            return $processedContent;
        }

        return $content; // Return original if no base64 images found
    }
}
