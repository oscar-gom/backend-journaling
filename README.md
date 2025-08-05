# 📝 Journaling App Backend

A comprehensive journaling API built with Laravel that helps users track their daily thoughts, moods, habits, and tasks. This backend provides a complete REST API for managing personal journaling data with user authentication.

## ✨ Features

- 🔐 **User Authentication** - Secure registration and login with Laravel Sanctum
- 📖 **Journal Entries** - Create, read, update, and delete journal entries
- 😊 **Mood Tracking** - Track daily moods with descriptions
- 🎯 **Habit Management** - Create and track personal habits with frequency settings
- ✅ **Daily Tasks** - Manage up to 3 daily tasks with completion status
- 🚀 **RESTful API** - Clean and consistent API endpoints
- 🐳 **Docker Ready** - Easy setup with Laravel Sail

## 🏗️ Data Models

### User
- `id` - Primary key
- `name` - User's full name
- `email` - Email address (unique)
- `password` - Encrypted password
- `email_verified_at` - Email verification timestamp

### Journal
- `journal_id` - Primary key
- `user_id` - Foreign key to User
- `content` - Journal entry content
- `date` - Entry date

### Mood
- `mood_id` - Primary key
- `journal_id` - Foreign key to Journal
- `mood` - Mood value/rating
- `description` - Mood description

### Habit
- `habit_id` - Primary key
- `name` - Habit name
- `journal_id` - Foreign key to Journal
- `description` - Habit description
- `frequency_unit` - Frequency unit (daily, weekly, etc.)
- `frequency_value` - Frequency value
- `last_occurrence_at` - Last completion timestamp

### HabitEntry
- `habit_entry_id` - Primary key
- `habit_id` - Foreign key to Habit
- `done` - Completion status (boolean)
- `note` - Optional note

### DailyTask
- `daily_task_id` - Primary key
- `journal_id` - Foreign key to Journal
- `task_1`, `task_2`, `task_3` - Task descriptions
- `task_1_done`, `task_2_done`, `task_3_done` - Completion status

## 🔗 API Endpoints

### Authentication
- `POST /api/register` - User registration
- `POST /api/login` - User login
- `POST /api/logout` - User logout (authenticated)
- `GET /api/user` - Get authenticated user info

### Journal Entries
- `GET /api/journal` - List user's journal entries
- `POST /api/journal/store` - Create new journal entry
- `GET /api/journal/{id}` - Get specific journal entry
- `PUT /api/journal/update/{journal}` - Update journal entry
- `DELETE /api/journal/destroy/{journal}` - Delete journal entry

### Daily Tasks
- `GET /api/daily-task` - List user's daily tasks
- `POST /api/daily-task/store` - Create new daily task
- `GET /api/daily-task/{id}` - Get specific daily task
- `PUT /api/daily-task/update/{daily_task}` - Update daily task
- `DELETE /api/daily-task/destroy/{daily_task}` - Delete daily task

### Habits
- `GET /api/habit` - List user's habits
- `POST /api/habit/store` - Create new habit
- `GET /api/habit/{id}` - Get specific habit
- `PUT /api/habit/update/{habit}` - Update habit
- `DELETE /api/habit/destroy/{habit}` - Delete habit

### Habit Entries
- `GET /api/habit-entry` - List habit entries
- `POST /api/habit-entry/store` - Create new habit entry
- `GET /api/habit-entry/{id}` - Get specific habit entry
- `PUT /api/habit-entry/update/{habit_entry}` - Update habit entry
- `DELETE /api/habit-entry/destroy/{habit_entry}` - Delete habit entry

### Moods
- `GET /api/mood` - List user's moods
- `POST /api/mood/store` - Create new mood entry
- `GET /api/mood/{id}` - Get specific mood entry
- `PUT /api/mood/update/{mood}` - Update mood entry
- `DELETE /api/mood/destroy/{mood}` - Delete mood entry

> 🔒 **Note:** All endpoints except registration and login require authentication via Laravel Sanctum tokens.

## 🐳 Getting Started with Docker (Sail)

### Prerequisites
- Docker Desktop
- Git

### Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd backend-journaling
   ```

2. **Copy environment file**
   ```bash
   cp .env.example .env
   ```

3. **Install dependencies with Sail**
   ```bash
   ./vendor/bin/sail up -d
   ./vendor/bin/sail composer install
   ```

4. **Generate application key**
   ```bash
   ./vendor/bin/sail artisan key:generate
   ```

5. **Run database migrations**
   ```bash
   ./vendor/bin/sail artisan migrate
   ```

6. **Optional: Seed the database**
   ```bash
   ./vendor/bin/sail artisan db:seed
   ```

### 🚀 Running the Application

```bash
# Start the application
./vendor/bin/sail up -d

# Stop the application
./vendor/bin/sail down

# View logs
./vendor/bin/sail logs

# Access the application shell
./vendor/bin/sail shell
```

The API will be available at `http://localhost` (or the port specified in your `.env` file).

### 🗃️ Database

The application uses PostgreSQL as the default database. You can access it using:

```bash
# Access PostgreSQL shell
./vendor/bin/sail psql

# Run migrations
./vendor/bin/sail artisan migrate

# Reset database
./vendor/bin/sail artisan migrate:fresh --seed
```

## 🧪 Testing

Run the test suite with:

```bash
# Run all tests
./vendor/bin/sail test

# Run tests with coverage
./vendor/bin/sail test --coverage
```

## 🛠️ Development Commands

```bash
# Clear caches
./vendor/bin/sail artisan cache:clear
./vendor/bin/sail artisan config:clear
./vendor/bin/sail artisan route:clear

# Generate API documentation
./vendor/bin/sail artisan route:list

# Code formatting with Pint
./vendor/bin/sail pint
```

## 📋 Requirements

- PHP 8.2+
- Laravel 12.0+
- PostgreSQL 17
- Docker & Docker Compose

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
