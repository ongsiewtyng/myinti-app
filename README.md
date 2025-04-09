# MyINTI Campus Portal 🏫✨

*A one-stop portal for campus life at INTI International College*

## 🔥 Key Features
### 🎛️ Realtime Campus Management
- **Facility Booking** (Rooms, Sports courts, etc.) with live availability
- **Food Ordering** from campus cafeterias with order tracking
- **Club Management** for student organizations

### 📱 Student Essentials
- Personalized dashboard with upcoming bookings/orders
- Campus event calendar with push notifications
- Profile management with INTI ID integration

### ⚡ Tech Highlights
- Realtime updates for bookings/orders
- Secure role-based authentication (Students & Staff)

## 🛠️ Tech Stack
| Layer          | Technology                          |
|----------------|-------------------------------------|
| **Frontend**   | React Native (Expo) + TypeScript    |
| **Backend**    | Node.js + Express                   |
| **Database**   | Firebase Realtime Database          |
| **Auth**       | Firebase Authentication             |
| **State**      | Zustand + Firebase Subscriptions    |
| **UI**         | NativeBase + Lottie Animations      |
| **Deployment** | Firebase Hosting + Cloud Functions  |

## 🚀 Installation (Dev)
```bash
# 1. Clone repo
git clone https://github.com/ongsiewtyng/myinti-app.git
cd myinti-app

# 2. Install dependencies
npm install

# 3. Set up Firebase config
cp .env.example .env
# Add your Firebase config from console

# 4. Run on Android/iOS
npx expo start
```

## 🔥 Firebase Setup
1. Enable these services in [Firebase Console](https://console.firebase.google.com/):
   - Realtime Database (with rules)
   - Authentication (Email/Google)
   - Hosting (for web version)

2. Database structure example:
```json
{
  "bookings": {
    "lab1_20231120": {
      "userId": "student123",
      "status": "confirmed",
      "timestamp": 1700000000
    }
  },
  "food_orders": {
    "order123": {
      "items": {"nasi_lemak": 2},
      "status": "preparing"
    }
  }
}
```

## 🤝 Contribution
Want to improve campus life?  
1. Fork the repo  
2. Create a feature branch  
3. Submit a PR with:  
   - Screenshots of changes  
   - Test cases for Firebase rules  

## 📬 Contact
**Maintainer**: Ong Siew Tyng  
📧 [cybergenetic1@gmail.com](mailto:cybergenetic1@gmail.com)    

---
*Developed for INTI International College with ♥ by students*
