📖 WikiSearchBot
<div align="center"> <img src="https://upload.wikimedia.org/wikipedia/commons/6/63/Wikipedia-logo.png" width="140" alt="Wikipedia Logo"/> <img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" width="120" alt="Telegram Logo"/> </div>

🌍 About the Project

WikiSearchBot is a Telegram bot that allows users to search Wikipedia directly from their Telegram chat.
It fetches summaries and images (if available) using Wikipedia’s public API and sends them instantly in a neat format.

✔ Simple
✔ Fast
✔ Useful for quick research
---
🛠 Features:

🔎 Search any term on Wikipedia

📸 Sends back summary + image if available

🤖 Powered by the Telegram Bot API

📜 Lightweight and written in PHP

---
📂 Project Structure:

📦 WikiSearchBot
 ┣ 📜 wikipedia.php   # Main bot script
 ┣ 📜 README.md       # Documentation
 
---
🚀 Getting Started:
1️⃣ Requirements

PHP 7+

cURL enabled

A Telegram Bot Token (get one from @BotFather
)

---
2️⃣ Installation:
🚀 Getting Started
1️⃣ Requirements

PHP 7+

cURL enabled

A Telegram Bot Token (get one from @BotFather
)

2️⃣ Installation
Clone the repo:
```git clone https://github.com/ahmed-gocode/WikiSearchBot.git
cd WikiSearchBot
```
---
3️⃣ Configure Your Bot

Open wikipedia.php and replace this line with your bot token:
```define("API_KEY", 'YOUR_BOT_TOKEN_HERE');```

---
4️⃣ Deploy

Upload the file to your hosting or server

Set your bot webhook with: 
```https://api.telegram.org/bot<YOUR_BOT_TOKEN>/setWebhook?url=https://yourdomain.com/wikipedia.php```

---
⚡ Usage

/start → Welcome message & instructions

Send any word → Bot replies with a summary + image

---
🤝 Contributing

Pull requests are welcome!
If you’d like to improve the project, feel free to fork it and submit changes.

---
🧑‍💻 Author

👨‍💻 Made with ❤️ by [Ahmed-GoCode](https://github.com/ahmed-gocode)

---
⭐ Support

If you like this project, don’t forget to star 🌟 the repo!

Would you like me to also design a nice banner image
