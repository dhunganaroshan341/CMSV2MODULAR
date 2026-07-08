<?php

namespace Modules\Media\App\Enums;

enum MediaType: string
{
    case IMAGE = 'image';
    case VIDEO = 'video';
    case YOUTUBE = 'youtube';
    case DOCUMENT = 'document';
    case AUDIO = 'audio';
}
