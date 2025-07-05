
# 🔥 Laravel Custom Firebase Notification Channel

This package shows how to build a custom **Firebase Cloud Messaging (FCM)** notification channel in **Laravel**, using the [Kreait Firebase PHP SDK](https://github.com/kreait/firebase-php).

> 💡 This repository is part of the tutorial:  
> 📖 [How to Build a Custom Firebase Notification Channel in Laravel](https://medium.com/@ppranav164/how-to-build-a-custom-firebase-notification-channel-in-laravel-2cfcf6ce7c64)

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

1. Clone this repository and install dependencies:

   ```bash
   git clone https://github.com/ppranav164/firebase-channel.git
   cd your-repo-name
   composer install
   ```

2. Add your Firebase service account credentials JSON file to:

   ```
   storage/app/firebase/firebase_credentials.json
   ```

3. Add the following config to `config/services.php`:

   ```php
   'firebase' => [
       'credentials' => storage_path('app/firebase/firebase_credentials.json'),
   ],
   ```

4. Update `.env`:

   ```
   FIREBASE_CREDENTIALS=storage/app/firebase/firebase_credentials.json
   ```
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
