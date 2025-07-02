
# 🔥 Laravel Custom Firebase Notification Channel

This package shows how to build a custom **Firebase Cloud Messaging (FCM)** notification channel in **Laravel**, using the [Kreait Firebase PHP SDK](https://github.com/kreait/firebase-php).

> 💡 This repository is part of the tutorial:  
> 📖 [How to Build a Custom Firebase Notification Channel in Laravel](https://medium.com/@ppranav164/how-to-build-a-custom-firebase-notification-channel-in-laravel-2cfcf6ce7c64)

---

## 📦 Requirements

- Laravel 9/10/11+
- PHP 8.1+
- `kreait/firebase-php` ^7.16
- Firebase Project with service account credentials

---

## 🚀 Features

- Custom FCM channel via Laravel's notification system
- Clean `FCMChannel` class with support for `sendMulticast()`
- Uses `FcmNotifiable` interface for structured payloads
- Works seamlessly with Laravel's queuing and notifiables
- FCM token lookup logic using `user_id`

---

## 📂 Folder Structure

```
app/
├── Notifications/
│   └── Channels/
│       └── FCMChannel.php
├── Services/
│   └── Firebase/
│       ├── Contracts/
│       │   └── FcmNotifiable.php
│       └── FcmNotification.php
```

---

## 🛠 Setup

1. Install the Firebase PHP SDK:
   ```bash
   composer require kreait/firebase-php:^7.16
   ```

2. Add your Firebase credentials to `config/services.php`:
   ```php
   'firebase' => [
       'credentials' => storage_path('app/firebase/firebase_credentials.json'),
   ],
   ```

3. Register the FCM channel in your `AppServiceProvider`.

---

## ✉️ Usage

Send a notification via FCM:

```php
$user->notify(new BadgeUpdateNotification());
```

---

## 📖 Full Guide

Check the full article with code breakdown and explanation:  
👉 [Read on Medium](https://medium.com/@ppranav164/how-to-build-a-custom-firebase-notification-channel-in-laravel-2cfcf6ce7c64)

---

## 📄 License

MIT
