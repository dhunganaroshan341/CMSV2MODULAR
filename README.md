# Modular Laravel CMS

A modern, modular Content Management System built on Laravel.

The goal of this project is to provide a production-ready CMS architecture that is clean, scalable, and highly extensible. Every feature is designed as an independent module that can be installed, removed, or replaced with minimal effort.

---

# Philosophy

The CMS follows a few core principles.

- Modular over monolithic
- Convention over configuration
- Thin controllers
- Service-oriented architecture
- Reusable UI components
- Feature isolation
- Testability
- Performance first

Every feature should be treated as a package.

---

# Project Structure

```
app/
bootstrap/
config/
database/
modules/
resources/
routes/
storage/
```

The `modules` directory contains all business features.

```
modules/

    Banner/

    Gallery/

    Blog/

    News/

    Events/

    Users/

    Settings/
```

Each module is completely self-contained.

```
Gallery/

    Config/

    Console/

    Database/
        Migrations/
        Seeders/

    Http/
        Controllers/
        Middleware/
        Requests/

    Models/

    Policies/

    Providers/

    Repositories/

    Resources/
        views/
        lang/

    Routes/

    Services/

    Tests/

    module.json
```

A module should never depend directly on another module.

---

# Core

The core application provides only common infrastructure.

- Authentication
- Authorization
- Dashboard
- Settings
- Notifications
- Media
- Activity Logs
- Search
- Menu Builder
- Theme Engine
- Module Loader

Business logic belongs inside modules.

---

# Module System

Every feature is a module.

Examples:

- Banner
- Gallery
- Blog
- Pages
- Events
- FAQ
- Forms
- Newsletter

Modules can be

- Installed
- Enabled
- Disabled
- Removed
- Updated

without affecting the rest of the application.

---

# Module Manifest

Each module contains a manifest.

module.json

```json
{
    "name": "Gallery",
    "version": "1.0.0",
    "description": "Gallery Management",
    "provider": "Modules\\Gallery\\Providers\\GalleryServiceProvider",
    "enabled": true
}
```

The CMS automatically discovers enabled modules.

---

# Dependency Rules

Allowed

Controller

↓

Service

↓

Repository

↓

Model

Not Allowed

Controller → Model

Controller → Database

View → Database

Module → Module

---

# Coding Standards

Controllers

- Validation
- Authorization
- Service Calls
- Responses

Services

- Business Logic

Repositories

- Database Queries

Models

- Relationships
- Scopes
- Casts

Views

- Presentation Only

---

# Media

Media is shared across the system.

Supported

- Images
- Videos
- YouTube
- Files
- Documents

Every module uses the same media service.

---

# Events

Modules communicate using Laravel Events.

Instead of

Gallery directly updating Notifications

Use

GalleryCreated Event

↓

Notification Listener

↓

Search Listener

↓

Activity Log Listener

↓

Cache Listener

This keeps modules independent.

---

# Permissions

Permissions are generated automatically.

Example

gallery.view

gallery.create

gallery.edit

gallery.delete

gallery.publish

Each module registers its own permissions.

---

# Menu Registration

Modules register their own admin menu.

Example

Gallery

↓

GalleryServiceProvider

↓

AdminMenu::register(...)

The core automatically builds the sidebar.

---

# Routes

Every module owns its routes.

```
modules/
    Gallery/
        Routes/
            web.php
            api.php
```

No central route file should know about Gallery.

---

# Configuration

Each module owns its own configuration.

```
Gallery/

    Config/

        gallery.php
```

---

# Database

Every module owns its own migrations.

```
Gallery/

    Database/

        Migrations/
```

---

# Testing

Each module contains its own tests.

```
Gallery/

    Tests/
```

Modules should be testable independently.

---

# Future Goals

- Theme System
- Plugin Marketplace
- Multi-tenancy
- REST API
- GraphQL
- Queue Dashboard
- Workflow Engine
- Versioning
- Revisions
- Multi-language
- Headless CMS
- CLI Module Generator