# Tickdesk

**Tickdesk** is a Ticket Support System built with [Laravel](https://laravel.com/), aiming to help teams manage customer support requests in an organized and efficient way.

⚠️ Tickdesk is currently under development. This is a class project for the back-end web programming class.

## 📌 Overview

Tickdesk will allow users to create, manage, and respond to support tickets through a web interface. The system is designed to be extendable and easy to use for both agents and users.

## 🛠️ Tech Stack

- **Backend:** Laravel (PHP)
- **Frontend:** Tailwind CSS
- **Database:** MySQL (or compatible)
- **Other:** Laravel Blade Templates, Laravel Migrations

## 📦 Getting Started

To run Tickdesk locally, follow these steps:

```bash
git clone https://github.com/Ferreira9006/pws-tickdesk.git
cd tickdesk
composer install
cp .env.example .env
php artisan key:generate
```

Update your `.env` file with your database and mail credentials.

Then run:

```bash
php artisan migrate
php artisan serve
```

> ⚠️ Seeding and ticket features are still under development.

## 🚧 Roadmap (WIP)

Planned features include:

- [ ] Ticket creation and management
- [ ] Ticket status tracking
- [ ] User roles (Admin, Agent, User)
- [ ] Commenting system
- [ ] Email notifications
- [ ] Dashboard with statistics
- [ ] API for external integration

## 🤝 Contributing

This project is still in its early stages. If you'd like to contribute, feel free to fork the repo and open a pull request.

## 📄 License

This project is open-source under the [MIT license](LICENSE).

## 📬 Contact

For questions or collaboration, reach out to [support@tickdesk.com](mailto:support@tickdesk.com)
