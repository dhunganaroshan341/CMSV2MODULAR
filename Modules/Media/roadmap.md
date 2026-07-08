# Phase 1 — Media Module Foundation

> **Goal**
>
> Build the first working version of the Media Module capable of uploading and deleting images. The focus of this phase is to establish a clean architecture and a reusable API that future modules can depend on.

---

# Milestone 1 — Core Structure

## Objective

Establish the basic architecture of the module.

### Tasks

* [ ] Create `Media` model
* [ ] Create `MediaType` enum
* [ ] Create `MediaService`
* [ ] Create `MediaController`
* [ ] Create `UploadMediaRequest`

### Definition of Done

* Module structure completed.
* All core classes exist.
* Application compiles successfully.

---

# Milestone 2 — Database

## Objective

Persist uploaded media information.

### Tasks

* [ ] Create `media` migration
* [ ] Configure fillable fields
* [ ] Configure casts
* [ ] Generate UUID automatically
* [ ] Configure storage disk

### Initial Database Fields

```text
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
alt
caption
metadata
timestamps
```

### Definition of Done

* Database migration completed.
* Media records can be stored.

---

# Milestone 3 — Image Upload

## Objective

Upload and persist image files.

### Tasks

* [ ] Validate uploaded image
* [ ] Generate unique filename
* [ ] Store image
* [ ] Save media record
* [ ] Return Media model

### API

```php
$media = $mediaService->upload($request->file('image'));
```

### Definition of Done

* Images upload successfully.
* Physical files are stored.
* Database records are created.

---

# Milestone 4 — Image Deletion

## Objective

Safely remove uploaded media.

### Tasks

* [ ] Delete physical file
* [ ] Delete database record
* [ ] Gracefully handle missing files

### API

```php
$mediaService->delete($media);
```

### Definition of Done

* Files are deleted from storage.
* Database records are removed.
* No exceptions occur when files are already missing.

---

# Milestone 5 — HTTP Layer

## Objective

Expose upload functionality through HTTP.

### Tasks

* [ ] Create upload endpoint
* [ ] Create delete endpoint
* [ ] Return JSON responses
* [ ] Handle validation errors

### Routes

```text
POST   /media

DELETE /media/{media}
```

### Definition of Done

* Media can be uploaded using HTTP.
* Media can be deleted using HTTP.

---

# Milestone 6 — Testing

## Objective

Verify the module works reliably.

### Tasks

* [ ] Upload feature test
* [ ] Delete feature test
* [ ] Validation test

### Definition of Done

* Upload tested.
* Delete tested.
* Validation tested.

---

# Out of Scope

The following features are intentionally excluded from Phase 1.

* Polymorphic relationships
* Gallery integration
* Video upload
* YouTube support
* Document upload
* Audio upload
* Image compression
* Thumbnail generation
* WebP conversion
* Folder management
* Media Manager UI
* Search
* Cloud storage
* CDN integration
* AI features

---

# Phase 1 Success Criteria

Phase 1 is complete when:

* ✅ Images upload successfully.
* ✅ Files are stored correctly.
* ✅ Metadata is persisted.
* ✅ Images can be deleted safely.
* ✅ Upload logic exists only inside `MediaService`.
* ✅ Other modules can upload media without implementing their own storage logic.

---

# Next Phase

After completing Phase 1, the Media Module will evolve into a reusable asset management system by introducing:

* Polymorphic relationships (`mediaables`)
* Multiple media collections
* Gallery integration
* Banner integration
* Video support
* YouTube support
* Document support
* Media library
* Advanced asset management
