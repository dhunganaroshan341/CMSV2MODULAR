# Media Module

The **Media Module** is the central asset management system of the CMS. It is responsible for uploading, storing, managing, and serving all media assets used throughout the application.

Unlike feature modules such as Gallery, Banner, or Blog, the Media module contains **no business-specific logic**. It acts as a reusable infrastructure module that provides a unified API for handling files.

---

# Purpose

The goal of this module is to provide a single source of truth for all digital assets within the CMS.

Every module that requires media should communicate with the Media module instead of implementing its own upload logic.

Example:

```
Gallery
    ↓
Media Module

Banner
    ↓
Media Module

Blog
    ↓
Media Module

Pages
    ↓
Media Module

Events
    ↓
Media Module
```

---

# Responsibilities

The Media module is responsible for:

* Uploading files
* Managing file storage
* File validation
* Image management
* Video management
* YouTube media support
* Document management
* Audio management
* Media metadata
* File deletion
* Media replacement
* Media retrieval

---

# Supported Media Types

Version 1 will support:

* Images
* Videos
* YouTube Links

Future versions will add:

* Documents (PDF, DOCX, XLSX, etc.)
* Audio
* SVG
* ZIP Archives
* External URLs
* Cloud Storage Assets

---

# Architecture

```
Media Module

├── Upload
├── Storage
├── Validation
├── Metadata
├── Relationships
└── Retrieval
```

Business modules consume the Media module.

```
Gallery
Banner
Blog
Pages
Testimonials
Events
FAQ

        ↓

      Media
```

The Media module should never depend on any business module.

---

# Planned Directory Structure

```
Modules/
└── Media/
    ├── app/
    │   ├── Contracts/
    │   ├── DTOs/
    │   ├── Enums/
    │   ├── Exceptions/
    │   ├── Http/
    │   ├── Models/
    │   ├── Providers/
    │   ├── Repositories/
    │   ├── Services/
    │   ├── Support/
    │   └── Traits/
    │
    ├── config/
    ├── database/
    ├── resources/
    ├── routes/
    └── module.json
```

---

# Database Design

## media

Stores information about every uploaded asset.

Example fields:

```
id
uuid
disk
directory
filename
original_name
extension
mime_type
size
type
width
height
duration
youtube_url
alt
caption
metadata
timestamps
```

---

## mediaables

Stores polymorphic relationships between media and application models.

Example:

```
Media
      ▲
      │

Gallery
Banner
Blog
Pages
Events
```

A single media item can be associated with any module through Laravel's polymorphic relationships.

---

# Services

Initially, the module will expose a single service.

```
MediaService
```

Responsibilities:

* Upload files
* Attach media
* Replace media
* Delete media
* Generate URLs
* Retrieve media

As the module grows, responsibilities may be split into dedicated services.

Examples:

* ImageService
* VideoService
* YoutubeService
* ThumbnailService
* CompressionService

---

# Design Principles

* Single Responsibility Principle
* Service-Oriented Architecture
* Laravel Convention First
* Reusable Across Modules
* Storage Driver Agnostic
* Extensible
* Testable

---

# Version 1 Scope

The initial version will include:

* Image Upload
* Video Upload
* YouTube Support
* Media Model
* MediaService
* Polymorphic Relationships
* Basic CRUD
* File Deletion

---

# Future Roadmap

Planned enhancements include:

* Image Compression
* WebP Conversion
* Thumbnail Generation
* Image Cropping
* EXIF Metadata Extraction
* Video Metadata
* Drag-and-Drop Sorting
* Folder Management
* Cloud Storage (S3, R2, MinIO)
* Temporary URLs
* Signed URLs
* CDN Integration
* Media Optimization Queue
* Duplicate File Detection
* AI Image Tagging
* Image Search
* Version History

---

# Goal

The Media module should become the foundation for all asset management within the CMS.

No feature module should implement its own upload or storage logic. Instead, every module should rely on the Media module, ensuring consistency, maintainability, and reusability across the entire application.
