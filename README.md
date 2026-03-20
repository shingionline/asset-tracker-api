# Asset Tracker API

A comprehensive Laravel-based REST API for tracking and managing organizational assets and their inspection records. Built with Laravel 13 and featuring a complete asset management system with inspection history tracking.

## 📋 Features

- **Asset Management**: Create, view, and manage organizational assets
- **Inspection Tracking**: Record and track asset inspection history  
- **Relationship Management**: One-to-many relationship between assets and inspections
- **RESTful API**: Clean, JSON-based API endpoints
- **Database Integrity**: Foreign key constraints with cascade delete
- **Seeded Data**: Pre-populated with sample assets and inspection records

## 🛠️ Technologies Used

- **Laravel 13.1** - Modern PHP framework
- **PHP 8.3** - Latest PHP version support
- **MySQL 8.4** - Database management
- **Laravel Sail** - Docker development environment
- **Eloquent ORM** - Database interactions and relationships

## 📊 Database Structure

### Assets Table
- `id` - Primary key
- `name` - Asset name
- `serial_number` - Unique identifier
- `status` - Current status (available, assigned, maintenance, retired)

### Inspections Table  
- `id` - Primary key
- `asset_id` - Foreign key to assets table
- `inspector_name` - Name of the inspector
- `passed` - Boolean inspection result
- `notes` - Inspection notes and comments

## 🚀 Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/shingionline/asset-tracker-api.git
   cd asset-tracker-api
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Start the development environment**
   ```bash
   vendor/bin/sail up -d
   ```

4. **Setup database and seed data**
   ```bash
   vendor/bin/sail artisan migrate --seed
   ```

   > ⚠️ If you get SQLSTATE[HY000] [2002] Connection refused error wait for Docker MySQL database to load then try again

5. **Access the application**
   - API Base URL: `http://localhost:8005/api/`

## 📡 API Endpoints

### Assets

#### Get Asset by ID
```http
GET /api/assets/{id}
```
Returns an asset with its latest 3 inspections.

**Response Example:**
```json
{
  "asset": {
    "id": 1,
    "name": "HP Laptop ProBook 450",
    "serial_number": "HP450-2024-001",
    "status": "available",
    "created_at": "2026-03-20T11:00:18.000000Z",
    "updated_at": "2026-03-20T11:00:18.000000Z",
    "inspections": [
      {
        "id": 7,
        "asset_id": 1,
        "inspector_name": "David Wilson",
        "passed": 1,
        "notes": "All components functioning properly",
        "created_at": "2025-10-27T11:00:19.000000Z",
        "updated_at": "2025-10-27T11:00:19.000000Z"
      },
      {
        "id": 6,
        "asset_id": 1,
        "inspector_name": "Lisa Garcia",
        "passed": 1,
        "notes": "Minor cosmetic wear only",
        "created_at": "2025-11-22T11:00:19.000000Z",
        "updated_at": "2025-11-22T11:00:19.000000Z"
      },
      {
        "id": 5,
        "asset_id": 1,
        "inspector_name": "Lisa Garcia",
        "passed": 1,
        "notes": "Good working order",
        "created_at": "2025-12-20T11:00:19.000000Z",
        "updated_at": "2025-12-20T11:00:19.000000Z"
      }
    ]
  }
}
```

#### Create New Asset
```http
POST /api/assets
```
**Request Body:**
```json
{
  "name": "MacBook Pro M3",
  "serial_number": "MBP-M3-001",
  "status": "available"
}
```

## 📋 Postman Collection

For easy API testing, download the Postman collection:

[Download Postman Collection](https://github.com/shingionline/asset-tracker-api/blob/main/storage/app/public/postman-collection.json)

## 🧪 Sample Data

The application includes comprehensive seed data

## 🔧 Development Commands

```bash
# Start services
vendor/bin/sail up -d

# Stop services  
vendor/bin/sail down

# Run migrations
vendor/bin/sail artisan migrate

# Reset database with fresh data
vendor/bin/sail artisan migrate:fresh --seed

```